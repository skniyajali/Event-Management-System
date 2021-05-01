<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';

$user = new Faculty();
if ($user->isLoggedIn()) {
    $data = $user->data();
    if (Input::exists('get')) {
        if (Input::get('hash')) {
            if (convert_string('encrypt', Input::get('hash')) == $data->fac_passkey) {
                $db = DB::getInstance();

?>
                <!DOCTYPE html>
                <html lang="en">
                <!--
        Page Name: Event Management System(EMS)
        Author: Sk Niyaj Ali
        Website: http://niyaj.enhancedteaching.in/
        Contact: niyaj320@gmail.com
        Facebook : https://www.facebook.com/skniyajali7/
        Instagram : https://www.instagram.com/_niyajali/
        Twitter : https://twitter.com/skniyajali1
        Behance.net : https://www.behance.net/skniyajali/
        Codepen.io : https://codepen.io/skniyajali/
        Creativemarket : https://creativemarket.com/users/skniyajali
        Medium : https://medium.com/@skniyajali
        Portfolio : https://skniyajali.myportfolio.com/
        Vimeo : https://vimeo.com/skniyajali/
        Etsy : https://www.etsy.com/in-en/people/esgrwk5wckeq57ef
        YouTube : https://www.youtube.com/channel/UCjUaGdLeQBLtB_2zvakJ-6A
        Pinterest : https://in.pinterest.com/skniyajali/
        Thumblr : https://skniyajali2.tumblr.com/
        Github : https://github.com/niyaj320/
        Dribbble : https://dribbble.com/skniyajali/
        Flickr : https://www.flickr.com/people/skniyajali/
        Figma : https://www.figma.com/@skniyajali
        LinkedIn : https://www.linkedin.com/in/sk-niyaj-ali-373a94131/
        Society6 : https://society6.com/skniyajali
        Website : https://skniyaj.blogspot.com/?m=1
        Hackaday.io : https://hackaday.io/niyaj320

        License: You must have a valid license only from Sk Niyaj Ali. in order to legally use the theme for your project.
        -->

                <head>
                    <meta charset="utf-8" />
                    <title><?php echo $data->fac_name ?> | EMS@Faculty</title>
                    <!-- SEO Meta Tags-->
                    <link rel="canonical" href="http://niyaj.enhancedteaching.in" />
                    <meta name="keywords" content="SK NIYAJ ALI, Niyaj ali, Sk Niyaj, Sk Ali" />
                    <meta name="description" content="EMS Dashboard" />
                    <meta name="robots" content="index, follow" />
                    <meta name="author" content="SK NIYAJ ALI" />
                    <!-- Viewport-->
                    <meta name="viewport" content="width=device-width, initial-scale=1" />

                    <!-- Vendor Styles-->
                    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css" />
                    <!-- Main Theme Styles + Bootstrap-->
                    <link rel="stylesheet" media="screen" href="../css/theme.min.css" />
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

                </head>
                <!-- Body-->

                <body style="background-color: #f7f7fc">

                    <main class="cs-page-wrapper">
                        <header class="cs-header navbar navbar-expand-lg navbar-dark navbar-floating navbar-sticky" data-scroll-header>
                            <div class="container px-0 px-xl-3">
                                <button class="navbar-toggler ml-n2 mr-2" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <a class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4 font-weight-bolder" href="../index.php">EMS</a>
                                <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
                                    <div class="navbar-tool dropdown">
                                        <?php if ($data->fac_image) { ?>
                                            <a class="navbar-tool-icon-box" href="account-profile.html">
                                                <img class="navbar-tool-icon-box-img" src="data:image/png;base64,<?php echo base64_encode($data->fac_image) ?>" alt="<?php echo $data->fac_name ?>" />
                                            </a>
                                        <?php } else { ?>
                                            <img src="../img/blank.png" class="navbar-tool-icon-box-img" alt="<?php echo $row->fac_name ?>">
                                        <?php } ?>

                                        <a class="navbar-tool-label dropdown-toggle" href="account-profile.html"><small>Hello,</small><?php echo $data->fac_name ?></a>
                                        <ul class="dropdown-menu dropdown-menu-right" style="width: 15rem">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="index.php"><i class="fe-shopping-bag font-size-base opacity-60 mr-2"></i>My Profile<span class="nav-indicator"></span><span class="ml-auto font-size-xs text-muted"></span></a>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#"><i class="fe-message-square font-size-base opacity-60 mr-2"></i>Messages<span class="nav-indicator"></span><span class="ml-auto font-size-xs text-muted"></span></a>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="#"><i class="fe-users font-size-base opacity-60 mr-2"></i>Followers<span class="ml-auto font-size-xs text-muted"></span></a>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="fe-log-out font-size-base opacity-60 mr-2"></i>Sign out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
                                    <div class="cs-offcanvas-cap navbar-box-shadow">
                                        <h5 class="mt-1 mb-0">Menu</h5>
                                        <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="cs-offcanvas-body">
                                        <!-- Menu-->
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php">Home</a>
                                            </li>
                                            <?php if ($data->fac_role == 'HOD') { ?>
                                                <li class="nav-item dropdown active">
                                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Faculty</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item active" href="fac_overview.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Overview</a></li>
                                                        <li class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item" href="fac_event_report.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Event Report</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Student</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="fas_overview.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Overview</a></li>
                                                        <li class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item" href="fas_event_report.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Event Report</a></li>
                                                    </ul>
                                                </li>
                                            <?php } else { ?>
                                                <li class="nav-item dropdown active">
                                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Faculty</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item active" href="fac_overview.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Overview</a></li>
                                                        <li class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item" href="fac_event_create.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Event Participated</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Student</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="fas_overview.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Overview</a></li>
                                                        <li class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item" href="fas_event_report.php?hash=<?php echo convert_string('decrypt', $data->fac_passkey) ?>">Event Report</a></li>
                                                    </ul>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- Page content-->
                        <!-- Slanted background-->
                        <div class="position-relative bg-gradient" style="height: 480px">
                            <div class="cs-shape cs-shape-bottom cs-shape-slant bg-secondary d-none d-lg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                                    <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                                </svg>
                            </div>
                        </div>
                        <!-- Page content-->
                        <div class="container bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px">
                            <div class="d-flex flex-column h-100 bg-light rounded-lg box-shadow-lg p-4">
                                <?php if ($data->fac_role == 'HOD') { ?>
                                    <div class="py-2 p-md-3 border-bottom">
                                        <!-- Title + Delete link-->
                                        <div class="d-sm-flex align-items-center justify-content-between pb-2 text-center text-sm-left">

                                            <h1 class="h3 mb-2 text-nowrap">Faculty Event Report <span class="ml-2 badge badge-primary"><?php echo $user->dept_event($user->data()->fac_dept_hash) ?></span></h1>
                                        </div>
                                        <!-- Content-->
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Journal Publications</h3>
                                                        </div>
                                                        <?php
                                                        $jp = $db->get('fac_event', array('fe_activity', '=', 'Journal Publications'));
                                                        if ($jp->count()) {
                                                            $jpc = $jp->count();
                                                        } else {
                                                            $jpc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $jpc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Courses</h3>
                                                        </div>
                                                        <?php
                                                        $co = $db->get('fac_event', array('fe_activity', '=', 'Courses'));
                                                        if ($co->count()) {
                                                            $coc = $co->count();
                                                        } else {
                                                            $coc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $coc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Guest Lectures</h3>
                                                        </div>
                                                        <?php
                                                        $gl = $db->get('fac_event', array('fe_activity', '=', 'Guest Lectures'));
                                                        if ($gl->count()) {
                                                            $glc = $gl->count();
                                                        } else {
                                                            $glc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $glc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">STTP</h3>
                                                        </div>
                                                        <?php
                                                        $gl = $db->get('fac_event', array('fe_activity', '=', 'STTP'));
                                                        if ($gl->count()) {
                                                            $glc = $gl->count();
                                                        } else {
                                                            $glc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $glc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">FDP</h3>
                                                        </div>
                                                        <?php
                                                        $gp = $db->get('fac_event', array('fe_activity', '=', 'FDP'));
                                                        if ($gp->count()) {
                                                            $gpc = $gp->count();
                                                        } else {
                                                            $gpc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $gpc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Conference</h3>
                                                        </div>
                                                        <?php
                                                        $gc = $db->get('fac_event', array('fe_activity', '=', 'Conference'));
                                                        if ($gc->count()) {
                                                            $gcc = $gc->count();
                                                        } else {
                                                            $gcc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $gcc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Industrial Traning</h3>
                                                        </div>
                                                        <?php
                                                        $gi = $db->get('fac_event', array('fe_activity', '=', 'Industrial Traning'));
                                                        if ($gi->count()) {
                                                            $gic = $gi->count();
                                                        } else {
                                                            $gic = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $gic ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Technical Book Publications</h3>
                                                        </div>
                                                        <?php
                                                        $gt = $db->get('fac_event', array('fe_activity', '=', 'Technical Book Publications'));
                                                        if ($gt->count()) {
                                                            $gtc = $gt->count();
                                                        } else {
                                                            $gtc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $gtc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <!-- Pricing -->
                                            <div class="card border-0 box-shadow">
                                                <div class="">
                                                    <div class="d-sm-flex align-items-start justify-content-between py-2 py-sm-2">

                                                        <div class="ml-4 ml-sm-0 py-2">
                                                            <h3 class="mb-2 ml-4">Others</h3>
                                                        </div>
                                                        <?php
                                                        $go = $db->get('fac_event', array('fe_activity', '=', 'Others'));
                                                        if ($go->count()) {
                                                            $goc = $go->count();
                                                        } else {
                                                            $goc = 0;
                                                        }
                                                        ?>
                                                        <div class="d-flex align-items-end py-3 py-sm-2 px-4">
                                                            <span class="cs-price display-2 font-weight-normal text-primary px-1 mr-2"><?php echo $goc ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-top mt-4">
                                        <?php
                                        $fac_event = $db->get('fac_event', array('fe_dept_hash', '=', $data->fac_dept_hash));
                                        if ($fac_event->count()) {
                                            foreach ($fac_event->results() as $row) {
                                                $fac = new Faculty($row->fe_fac_hash);
                                                $fac_data = $fac->data();

                                        ?>
                                                <div class="col-xl-3 mt-4">
                                                    <div class="card border-0 box-shadow">
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <?php if ($fac_data->fac_image) { ?>
                                                                    <img class="d-inline-block rounded-circle mb-1 text-center" width="96" src="data:image/png;base64,<?php echo base64_encode($fac_data->fac_image) ?>" alt="<?php echo $fac_data->fac_name ?>" />
                                                                <?php } else { ?>
                                                                    <img class="d-inline-block rounded-circle mb-1 text-center" width="96" src="../img/blank.png" alt="<?php echo $fac_data->fac_name ?>" />
                                                                <?php } ?>
                                                            </div>
                                                            <h3 class="h6 pt-1 mb-1 text-center"><?php echo $fac_data->fac_name ?></h3>
                                                            <ul class="list-unstyled mb-0 font-size-sm">
                                                                <li class="media pb-1 border-bottom">
                                                                    <i class="fe-award font-size-lg mt-1 mb-0 text-primary"></i>
                                                                    <div class="media-body pl-3">
                                                                        <span class="font-size-ms text-muted">Event Name</span>
                                                                        <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_name ?></a>
                                                                    </div>
                                                                </li>
                                                                <li class="media pb-1 border-bottom">
                                                                    <i class="fe-bookmark font-size-lg mt-1 mb-0 text-primary"></i>
                                                                    <div class="media-body pl-3">
                                                                        <span class="font-size-ms text-muted">Topic</span>
                                                                        <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_topic ?></a>
                                                                    </div>
                                                                </li>
                                                                <li class="media pb-1 border-bottom">
                                                                    <i class="fe-flag font-size-lg mt-2 text-primary"></i>
                                                                    <div class="media-body pl-3">
                                                                        <span class="font-size-ms text-muted">Activity</span>
                                                                        <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_activity ?></a>
                                                                    </div>
                                                                </li>
                                                                <li class="media pt-1 pb-1">
                                                                    <i class="fe-map-pin font-size-lg mt-2 mb-0 text-primary"></i>
                                                                    <div class="media-body pl-3">
                                                                        <span class="font-size-ms text-muted">Venue</span>
                                                                        <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_venue ?></a>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo '<p class="text-center">Faculty Event Not Found.</p>';
                                        }
                                        ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="py-2 p-md-3">
                                        <!-- Title + Delete link-->
                                        <div class="d-sm-flex align-items-center justify-content-between pb-2 text-center text-sm-left">

                                            <h1 class="h3 mb-2 text-nowrap">Overview</h1>
                                        </div>
                                        <!-- Content-->
                                    </div>
                                    <?php
                                    $query = "SELECT * FROM fac_event WHERE fe_fac_hash = '$data->fac_passkey' GROUP BY fe_year";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    if ($statement->rowCount()) {
                                        $rows = $statement->rowCount();
                                        $result = $statement->fetchAll();

                                        foreach ($result as $row) {
                                            $year = $row["fe_year"];
                                    ?>
                                            <div class="py-1 p-md-2 mt-2 border-bottom border-top">
                                                <!-- Title + Delete link-->
                                                <div class="d-sm-flex pb-1 text-sm-left text-center">

                                                    <h1 class="h3 text-center"><?php echo $row["fe_year"] ?></span></h1>
                                                </div>
                                                <!-- Content-->
                                            </div>

                                            <div class="row">
                                                <?php
                                                $fac_event = $db->get('fac_event', array('fe_fac_hash', '=', $data->fac_passkey, 'fe_year', '=', $year));
                                                if ($fac_event->count()) {
                                                    foreach ($fac_event->results() as $row) {
                                                        $fac = new Faculty($row->fe_fac_hash);
                                                        $fac_data = $fac->data();

                                                ?>
                                                        <div class="col-xl-3 mt-4">
                                                            <div class="card border-0 box-shadow">
                                                                <div class="card-body">
                                                                    <ul class="list-unstyled mb-0 font-size-sm">
                                                                        <li class="media pb-1 border-bottom">
                                                                            <i class="fe-award font-size-lg mt-1 mb-0 text-primary"></i>
                                                                            <div class="media-body pl-3">
                                                                                <span class="font-size-ms text-muted">Event Name</span>
                                                                                <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_name ?></a>
                                                                            </div>
                                                                        </li>
                                                                        <li class="media pb-1 border-bottom">
                                                                            <i class="fe-bookmark font-size-lg mt-1 mb-0 text-primary"></i>
                                                                            <div class="media-body pl-3">
                                                                                <span class="font-size-ms text-muted">Topic</span>
                                                                                <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_topic ?></a>
                                                                            </div>
                                                                        </li>
                                                                        <li class="media pb-1 border-bottom">
                                                                            <i class="fe-flag font-size-lg mt-2 text-primary"></i>
                                                                            <div class="media-body pl-3">
                                                                                <span class="font-size-ms text-muted">Activity</span>
                                                                                <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_activity ?></a>
                                                                            </div>
                                                                        </li>
                                                                        <li class="media pb-1 border-bottom">
                                                                            <i class="fe-clock font-size-lg mt-2 text-primary"></i>
                                                                            <div class="media-body pl-3">
                                                                                <span class="font-size-ms text-muted">Start Date</span>
                                                                                <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_s_date ?></a>
                                                                            </div>
                                                                        </li>
                                                                        <li class="media pb-1 border-bottom">
                                                                            <i class="fe-clock font-size-lg mt-2 text-primary"></i>
                                                                            <div class="media-body pl-3">
                                                                                <span class="font-size-ms text-muted">End Date</span>
                                                                                <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_e_date ?></a>
                                                                            </div>
                                                                        </li>
                                                                        <li class="media pt-1 pb-1">
                                                                            <i class="fe-map-pin font-size-lg mt-2 mb-0 text-primary"></i>
                                                                            <div class="media-body pl-3">
                                                                                <span class="font-size-ms text-muted">Venue</span>
                                                                                <a href="#" class="d-block nav-link-style font-size-sm"><?php echo $row->fe_venue ?></a>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<p class="text-center">Faculty Event Not Found.</p>';
                                                }
                                                ?>
                                            </div>
                                    <?php }
                                    } else {
                                        echo '<p class="text-center">No Data Found</p>';
                                    }
                                    ?>
                                <?php } ?>
                            </div>
                        </div>
                    </main>
                    <!-- Footer-->
                    <footer class="cs-footer py-4">
                        <div class="container d-md-flex align-items-center justify-content-between py-2 text-center text-md-left">
                            <ul class="list-inline font-size-sm mb-3 mb-md-0 order-md-2">
                                <li class="list-inline-item my-1"><a class="nav-link-style" href="#">Support</a></li>
                                <li class="list-inline-item my-1"><a class="nav-link-style" href="#">Contacts</a></li>
                                <li class="list-inline-item my-1"><a class="nav-link-style" href="#">Terms &amp; Conditions</a></li>
                            </ul>
                            <p class="font-size-sm mb-0 mr-3 order-md-1">
                                <span class="text-muted mr-1">©2021 All rights reserved. Developed by</span><a class="nav-link-style font-weight-normal" href="http://niyaj.enhancedteaching.in/" target="_blank" rel="noopener">SK NIYAJ ALI</a>
                            </p>
                        </div>
                    </footer>
                    <!-- Back to top button-->
                    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i class="btn-scroll-top-icon fe-arrow-up">
                        </i></a>
                    <!-- Vendor scrits: js libraries and plugins -->
                    <script src="..js/theme.min.js"></script>
                    <script src="../vendor/jquery/dist/jquery.slim.min.js"></script>
                    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="../vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
                    <script src="../vendor/simplebar/dist/simplebar.min.js"></script>
                    <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

                </body>

                </html>
<?php
            }
        }
    }
} else {
    Redirect::to('../index.php');
}
?>