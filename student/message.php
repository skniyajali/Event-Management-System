<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';

$user = new Student();
if ($user->isLoggedIn()) {
    $data = $user->data();

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
        <title><?php echo $data->fac_name ?> | EMS@Student</title>
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
        <link rel="stylesheet" media="screen" href="../vendor/flatpickr/dist/flatpickr.min.css" />
        <!-- Main Theme Styles + Bootstrap-->
        <link rel="stylesheet" media="screen" href="../css/theme.min.css" />

    </head>
    <!-- Body-->

    <body style="background-color: #f7f7fc">

        <main class="cs-page-wrapper d-flex flex-column">
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
                                <?php }else{ ?>
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Event</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="overview.php?hash=<?php echo convert_string('decrypt',$data->fac_hash) ?>">Overview</a></li>
                                        <li class="dropdown-divider"></li>                                        
                                        <li><a class="dropdown-item" href="event_create.php?hash=<?php echo convert_string('decrypt',$data->fac_hash) ?>">Event Participated</a></li>                                        
                                    </ul>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Page content-->
            <div class="position-relative bg-gradient" style="height: 480px">
                <div class="cs-shape cs-shape-bottom cs-shape-slant bg-secondary d-none d-lg-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                        <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                    </svg>
                </div>
            </div>
            <!-- Page content-->
            <div class="container d-flex flex-column justify-content-center py-5" style="flex: 1 0 auto;">
                <div class="row align-items-center pb-2">
                    <div class="col-xl-5 col-md-6 text-center text-md-left mb-5 mb-md-0">
                        <h1 class="mb-3">Coming soon...</h1>
                        <p class="mb-grid-gutter">We are working hard to deliver best possible experience. The website is currently under construction. <u>It goes live in:</u></p>
                        <div class="cs-countdown h2 justify-content-center justify-content-md-start" data-countdown="10/01/2021 07:00:00 PM">
                            <div class="cs-countdown-days mr-grid-gutter"><span class="cs-countdown-value">0</span><span class="cs-countdown-label text-body font-size-sm">Days</span></div>
                            <div class="cs-countdown-hours mr-grid-gutter"><span class="cs-countdown-value">0</span><span class="cs-countdown-label text-body font-size-sm">Hours</span></div>
                            <div class="cs-countdown-minutes mr-grid-gutter"><span class="cs-countdown-value">0</span><span class="cs-countdown-label text-body font-size-sm">Mins</span></div>
                            <div class="cs-countdown-seconds"><span class="cs-countdown-value">0</span><span class="cs-countdown-label text-body font-size-sm">Secs</span></div>
                        </div>
                        <p class="pt-4">Let me know when your website is live.</p>
                        <form class="d-flex align-items-start needs-validation" novalidate>
                            <div class="mr-2 mr-sm-3 w-100">
                                <input class="form-control" type="email" placeholder="Email address" required>
                                <div class="invalid-tooltip">Please provide a valid email address!</div>
                            </div>
                            <button class="btn btn-primary" type="submit">Notify Me</button>
                        </form>
                    </div>
                    <div class="col-md-6 offset-xl-1">
                    </div>
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
        <!-- Vendor scrits: js libraries and plugins-->
        <script src="../vendor/jquery/dist/jquery.slim.min.js"></script>
        <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
        <script src="../vendor/simplebar/dist/simplebar.min.js"></script>
        <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Main theme script-->
        <script src="../js/theme.min.js"></script>
    </body>

    </html>
<?php

} else {
    Redirect::to('../index.php');
}
?>