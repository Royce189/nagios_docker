<?php 
//
// Nagios XI API Documentation
// Copyright (c) 2023 Nagios Enterprises, LLC. All rights reserved.
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
    $page = grab_request_var("page", "");

    switch ($page) {
        default:
            show_tours();
            break;
    }
}

function show_tours() {
    do_page_start(array("page_title" => _('Start Tours')), true);
    ?>

    <div class="col-sm-8 col-md-9 col-lg-9">
        <h1>Reset tours</h1>

        <table class="table table-condensed table-no-border table-auto-width">
        <tr>
            <td><label>Page Tours</label></td> <!-- placeholder -->
            <td><label>Wizard Tours</label></td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-primary" id="home-tour" style="width: 200px;">Introduction Tour</button>
            </td>
            <td>
                <button class="btn btn-primary" id="wizard-website-tour" style="width: 200px;">Website Wizard Tour</button>
            </td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-primary" id="wizard-tour" style="width: 200px;">Wizards Selection Tour</button>
            </td>
        </tr>
    </table>

        <script src="../includes/js/api-help.js"></script>
        <script>
            function tourTarget(tourName, step, windowTarget, target, callback = null) {
                ajaxSetStep(tourName, 0, result => {
                    if (result === "success") {
                        if (callback !== null) {
                            callback();
                        } else {
                            if (windowTarget !== null) {
                                windowTarget.location = target;
                            }
                        }
                    } else {
                        alert("<?php echo _("Error setting tour step"); ?>");
                    }
                });
            }


            $('#home-tour').click(function() {
                tourTarget("home", 0, top, window.location.origin + "/nagiosxi");
            });
            
            $('#wizard-tour').click(function() {
                tourTarget("wizard-landing", 0, null, null, () => {
                    tourTarget("wizard-landing", 0, top, window.location.origin + "/nagiosxi/config/?xiwindow=monitoringwizard.php");
                });
            });

            $('#wizard-website-tour').click(function() {
                tourTarget("wizard-website", 0, window, window.location.origin + "/nagiosxi/config/monitoringwizard.php?update=1&nextstep=2&nsp=<?= get_nagios_session_protector_id() ?>&wizard=website");
            });

        </script>
    </div>
    <?php
    do_page_end(true);
}