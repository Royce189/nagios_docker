<?php
//
// Report Exporting Utilities
// Copyright (c) 2015-2020 Nagios Enterprises, LLC. All rights reserved.
//


define('EXPORT_PDF', 'pdf');
define('EXPORT_JPG', 'jpg');
define('EXPORT_PORTRAIT', 0);
define('EXPORT_LANDSCAPE', 1);

/*
 * Export a report as a PDF file or JPG image
 *
 * @param   string      $reportname         The name of the report file (i.e. 'availability')
 * @param   constant    $type               Must be EXPORT_PDF (default) or EXPORT_JPG
 * @param   constant    $orientation        Can be either EXPORT_PORTRAIT (default) or EXPORT_LANDSCAPE
 * @param   string      $report_location    Used to override the folder in which the $reportname .php resides
 * @param   string      $filename           The name of the file that runs the report (i.e. index.php or availability.php)
 */
function export_report($reportname, $type = EXPORT_PDF, $orientation = EXPORT_PORTRAIT, $report_location = "reports")
{
    global $cfg;
    $username = $_SESSION['username'];
    $language = $_SESSION['language'];

    // Grab the current URL parts
    $query = array();
    foreach($_GET as $key => $value) {
        $query[$key] = $value;
    }

    // Add in some required components to the query
    $query['token'] = user_generate_auth_token(get_user_id($username));
    $query['locale'] = $language;
    $query['records'] = 100000;
    $query['mode'] = 'getreport';
    $query['hideoptions'] = 1;
    $query['export'] = 1;
    $query['old_browser_compat'] = 1;

    if ($reportname == 'execsummary') {
        $query['records'] = 10;
    }

    $content_type = 'application/pdf';
    if($type == EXPORT_JPG) {
        $content_type = 'application/jpg';
    }

    $url = get_localhost_url() . $report_location . '/' . urlencode($reportname) . '.php?' . http_build_query($query);

    $id = uniqid();
    $tempfile = get_tmp_dir() . "/$reportname-" . $id . ".$type";
    $counter = 0;
    while(!file_exists($tempfile) && $counter < 3) {
        do_chrome_export($url, $tempfile, $type);
        $counter++;
    }

    if (!file_exists($tempfile)) {
        fail_report($url, $type);
    } else {
        header('Content-type: ' . $content_type);
        header('Content-Disposition: inline; filename="' . time() . '-' . $reportname . '.' . $type . '"');
        readfile($tempfile);
        unlink($tempfile);
    }
}


/**
 * @param   string      $url            URL to pass to chromium
 * @param   string      $filename       Name of the file you want to save
 * @param   string      $type           PDF or JPG
 */
function do_chrome_export($url, $filename, $type) {
    global $cfg;

    $bin = 'HOME=' . get_tmp_dir() . ' chromium-browser --headless=new --ignore-certificate-errors --enable-low-end-device-mode --disable-gpu --virtual-time-budget=10000 --run-all-compositor-stages-before-draw';

    // Do specifics for each type of report
    switch ($type)
    {
        case EXPORT_PDF:
            // $opts = " --no-pdf-header-footer --window-size=1080,1920 --print-to-pdf=" . escapeshellarg($tempfile) . " ";
            $opts = " --no-pdf-header-footer --desktop-window-1080p --print-to-pdf=" . escapeshellarg($filename) . " ";
            break;
        case EXPORT_JPG:
            // $opts = " --hide-scrollbars --window-size=1920,1080  --screenshot=" . escapeshellarg($tempfile) . " ";
            $opts = " --hide-scrollbars --screenshot=" . escapeshellarg($filename) . " ";
            break;
        default:
            die(_('ERROR: Could not export report as ') . $type . '. ' . _('This type is not defined.'));
    }

    $log = $cfg['root_dir'].'/var/chromium_report.log';

    $cmd = $bin . $opts . escapeshellarg($url);
    
    if (file_exists($log) && is_writable($log)) {
        file_put_contents($log, "[".date(DATE_RFC2822)."] {$cmd}\n", FILE_APPEND);
        $cmd .= " &>> $log";
    }
    clearstatcache();
    $lockfile = get_tmp_dir()."/.config/chromium/SingletonLock";
    if (file_exists($lockfile) || is_link($lockfile)) {
        if (`pgrep -u $(whoami) -f -c "[c]hromium-browser"` == "0") {
            exec("rm -rf ".get_tmp_dir()."/.config/chromium");
        }
    }
    exec($cmd);
}


function fail_report($url, $type) {
    $color = "#000";
    if (get_theme() == 'xi5dark') { $color = "#EEE"; }
    echo '<div style="margin: 7% auto; color: '.$color.'; max-width: 80%; text-align: center; font-family: verdana, arial; font-size: 1rem; word-wrap: break-word;">';
    echo '<div><strong>' . _('Failed to create ') . '<span style="text-transform: uppercase;">' . $type . '</span></strong></div>';
    echo '<div style="margin: 10px 0 30px 0;">' . _('Verify that your Nagios XI server can connect to the URL') . ':</div>';
    echo '<div style="font-size: 0.7rem;">' . $url . '</div>';
    echo '</div>';
    die();
}
