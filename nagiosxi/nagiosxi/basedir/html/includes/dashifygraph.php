<?php
ob_start();

require_once(dirname(__FILE__) . '/common.inc.php');

// Initialization stuff
pre_init();
init_session();

// Grab GET or POST variables and check pre-reqs
grab_request_vars();
check_prereqs();
check_authentication(false);
//check_nagios_session_protector();

// Process variables and submit to dashboard 
$title = grab_request_var('dashletName');
$board = grab_request_var('boardName');
$graphChoice = grab_request_var('graphChoice');
$sortChoice = grab_request_var('sortChoice');
$hostChoice = grab_request_var('hostChoice');
$hostgroupChoice = grab_request_var('hostgroupChoice');
$divId = uniqid();
$dargs = array('divId' => $divId, 'graphChoiceSelect' => $graphChoice, 'sortChoiceSelect' => $sortChoice, 'hostChoiceSelect' => $hostChoice, 'hostgroupChoiceSelect' => $hostgroupChoice);

add_dashlet_to_dashboard(0, $board, 'highchart-dashlet', $title, null, $dargs);

/* Old way...
$returnto = urlencode($url); 
$newurl=get_base_url().'/includes/components/graphexplorer/?r='.$returnto;  
header("Location: $newurl"); 
*/

// New way ... just prints json
print json_encode(array('success' => 1));

ob_end_flush(); 

