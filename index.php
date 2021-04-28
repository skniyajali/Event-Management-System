<?php
require_once 'core/init.php';
require_once 'core/DB.php';
require_once 'includes/function.php';
require_once 'header.php';
$user = new Department();

if ($user->isLoggedIn()) {
    //echo 'ok department';
    $username = "department";
} else {
    $user = new Faculty();
    if ($user->isLoggedIn()) {
        $username = "faculty";
        //echo 'ok faculty';
    } else {
        $user = new Student();
        if ($user->isLoggedIn()) {
            $username = "student";
            //echo 'ok student';
        } else {
            //echo 'notok';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>EMS - KIOT</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="EMS KIOT" />
    <meta name="keywords" content="ems,kiot" />
    <meta name="author" content="EMS Team" />
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon and Touch Icons-->
    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css" />

</head>
<!-- Body-->

<body style="background-color: #f7f7fc">

    <main class="cs-page-wrapper d-flex flex-column">
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <header class="cs-header navbar navbar-expand-lg navbar-light bg-light navbar-sticky" data-scroll-header>
            <div class="container px-0 px-xl-3">
                <button class="navbar-toggler ml-n2 mr-2" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4 font-weight-bolder" href="index.php">EMS</a>
                <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
                    <?php  
                        if($user->isLoggedIn()){ ?>
                            <a class="nav-link-style font-size-sm text-nowrap" href="<?php echo $username ?>/"><i class="fe-user font-size-xl mr-2"></i>Dashboard</a>
                            <a class="btn btn-primary ml-grid-gutter btn-sm d-lg-inline-block" href="logout.php?username=<?php echo $username ?>">Logout</a>
                        <?php }else{ ?>
                            <a class="nav-link-style font-size-sm text-nowrap" href="#modal-signin" data-toggle="modal" data-view="#modal-signin-view"><i class="fe-user font-size-xl mr-2"></i>Sign in</a>
                            <a class="btn btn-primary ml-grid-gutter btn-sm d-lg-inline-block" href="dashboard/">Admin</a>
                        <?php } ?>
                    
                </div>
                <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
                    <div class="cs-offcanvas-cap navbar-box-shadow">
                        <h5 class="mt-1 mb-0">Menu</h5>
                        <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="cs-offcanvas-body">
                        <!-- Menu-->
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="event.php">Event</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutus.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactus">Contact Us</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero-->
        <section class="bg-size-cover overflow-hidden pt-5 pt-md-6 pt-lg-7" style="max-height: 750px; background-image: url(img/demo/event-landing/hero-bg.jpg);">
            <div class="container pt-2 pb-4 pb-md-2">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-8 text-center">
                        <h1 class="display-4 text-light mb-4">KNOWLEDGE INSTITUTE OF TECHNOLOGY</h1>
                        <div class="d-inline-flex align-items-center mx-1 px-3 mb-4"><i class="fe-phone h2 mb-0 mr-2 text-light"></i><span class="text-light">+91 98947 01234</span></div>
                        <div class="d-inline-flex align-items-center mx-1 px-3 mb-4"><i class="fe-map-pin h2 mb-0 mr-2 text-light"></i><span class="text-light">KIOT Campus, SALEM - 637 504</span></div>                        
                    </div>
                </div>
            </div>
            <div data-jarallax-element="50" data-disable-parallax-down="md"><img class="d-block mx-auto" src="img/demo/event-landing/people.png" alt="People" />
            </div>
        </section>
        
        <!-- Sign In Modal-->
        <div class="modal fade" id="modal-signin" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="cs-view show" id="modal-signin-view">
                        <div class="modal-header border-0 bg-dark px-4">
                            <h4 class="modal-title text-light">Sign in</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">Sign in to your account using email and password provided during registration.</p>
                            <p class="font-size-ms text-muted mt-2" id="error"></p>
                            <form class="needs-validation" method="post" id="login_form">
                                <!-- Select -->
                                <div class="input-group-overlay form-group">
                                    <select class="form-control custom-select" name="select" id="select-input" required>
                                        <option>Choose option...</option>
                                        <option>Department</option>
                                        <option>HOD</option>
                                        <option>Faculty</option>
                                        <option>Student</option>
                                    </select>
                                </div>
                                <div class="input-group-overlay form-group">
                                    <div class="input-group-prepend-overlay">
                                        <span class="input-group-text"><i class="fe-mail"></i></span>
                                    </div>
                                    <input class="form-control prepended-form-control" name="email" type="text" placeholder="Email/Username" required />
                                </div>
                                <div class="input-group-overlay cs-password-toggle form-group">
                                    <div class="input-group-prepend-overlay">
                                        <span class="input-group-text"><i class="fe-lock"></i></span>
                                    </div>
                                    <input class="form-control prepended-form-control" type="password" name="password" placeholder="Password" required />
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox" /><i class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="agree" type="checkbox" id="keep-signed-2" />
                                        <label class="custom-control-label" for="keep-signed-2">Keep me signed in</label>
                                    </div>
                                    <a class="nav-link-style font-size-ms" href="password-recovery.html">Forgot password?</a>
                                </div>
                                <input type="hidden" name="action" value="login">
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                <p class="font-size-sm pt-3 mb-0 text-center">
                                    Don't have an account?
                                    <a href="#" class="font-weight-medium" data-view="#signup-view">Sign up</a>
                                </p>

                            </form>
                        </div>
                    </div>
                    <div class="modal-body text-center px-4 pt-2 pb-4">
                        <hr>
                        <p class="font-size-sm font-weight-medium text-heading pt-4">Or sign in with</p><a class="social-btn sb-facebook sb-lg mx-1 mb-2" href="#"><i class="fe-facebook"></i></a><a class="social-btn sb-twitter sb-lg mx-1 mb-2" href="#"><i class="fe-twitter"></i></a><a class="social-btn sb-instagram sb-lg mx-1 mb-2" href="#"><i class="fe-instagram"></i></a><a class="social-btn sb-google sb-lg mx-1 mb-2" href="#"><i class="fe-google"></i></a>
                    </div>
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
                <span class="text-muted mr-1">©2021 All rights reserved. Developed by</span><a class="nav-link-style font-weight-normal" href="" target="_blank" rel="noopener">SK NIYAJ ALI</a>
            </p>
        </div>
    </footer>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i class="btn-scroll-top-icon fe-arrow-up">
        </i></a>
    <script src="vendor/jquery/dist/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="vendor/jarallax/dist/jarallax-element.min.js"></script>
    <script src="vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js"></script>
    <script src="vendor/lg-zoom.js/dist/lg-zoom.min.js"></script>
    <script src="vendor/lg-video.js/dist/lg-video.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#login_form', (function(e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "login.php",
                    method: "POST",
                    data: form_data,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.message) {
                            window.location.href = data.msg;
                        } else {
                            $('#error').html(data.error);
                        }
                    }
                });
            }));
        });
    </script>

</body>

</html>