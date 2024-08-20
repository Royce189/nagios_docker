<?php
//
// Copyright (c) 2008-2020 Nagios Enterprises, LLC. All rights reserved.
//

require_once(dirname(__FILE__) . '/../includes/common.inc.php');


// Initialization stuff
pre_init();
init_session();

// Grab GET or POST variables and check pre-reqs
grab_request_vars();
check_prereqs();
check_authentication();


route_request();


function route_request()
{
    $pageopt = grab_request_var("pageopt", "info");
    switch ($pageopt) {
        default:
            show_page();
            break;
    }
}


function show_page()
{
    $theme = get_theme();
    $neptune =0;

    if ($theme == 'neptune') {
        $neptune = 1;
    }

    do_page_start(array("page_title" => _('Tools')), true);
?>
<?php if ($neptune): ?>
    <h1><?php echo _('Tools'); ?></h1>
    <div class="subtext neptune-subtext"><?php echo _("Tools are utilities that you can quickly access from Nagios using your web browser.") ?></div><br/>
    <h3 class="neptune-sub-header"><?php echo _('Manage Tools'); ?></h3>
    <div class="tools-card-parent">
        <a class="tools-card-child" href="mytools.php">
            <div class="tools-card-child-sub">
            <span class="material-symbols-outlined tools-card-icon">settings_account_box</span>
                <div class="tools-card-title">
                    <?php echo _("Personal Tools") ?></h3>
                </div>
                <div class="subtext neptune-subtext neptune-geist-mono">
                    <?php echo _("Manage your own personal tools") ?>
                </div>
            </div>
        </a>
        <a class="tools-card-child" href="commontools.php">
            <div class="tools-card-child-sub">
            <span class="material-symbols-outlined tools-card-icon">workspaces</span>
                <div class="tools-card-title">
                    <?php echo _("Common Tools") ?>
                </div>
                <div class="subtext neptune-subtext neptune-geist-mono">
                    <?php echo _("Manage Shared Tools") ?>
                </div>
            </div>
        </a>
    </div>
<?php else: ?>
    <h1><?php echo _('Tools'); ?></h1>
    <p><?php echo _("Tools are utilities that you can quickly access from Nagios using your web browser.") ?></p>

    <h2><?php echo _("My Tools") ?></h2>
    <p><a href="mytools.php"><?php echo _("Manage your own personal tools") ?></a>.</p>

    <h2><?php echo _("Common Tools"); ?></h2>
    <p><a href="commontools.php"><?php echo _("Access tools pre-defined by the administrator") ?></a>.</p>

    <?php endif;
    do_page_end(true);
    exit();
}