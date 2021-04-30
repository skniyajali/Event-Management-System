<?php

require_once 'core/init.php';
require '../../includes/function.php';
require '../../includes/db.php';

$user = new User();
if ($user->isLoggedIn()) {


?>
    <?php
    if (!$ett_hash = Input::get('emd_department_hash')) {
        Redirect::to('../index.php');
    } else {

        $ett_teacher = new Faculty(convert_string('encrypt', Input::get('emd_department_hash')));

        if (!$ett_teacher->exists()) {
            Redirect::to('../index.php');
        } else {
            $data = $ett_teacher->data();
            $d_data = new Department($data->fac_dept_hash);
            $datas = $d_data->data();
            $db = DB::getInstance();

    ?>



            <!DOCTYPE html>
            <!--
        Page Name: Event Management System(EMS)
        Author: Sk Niyaj Ali
        Website: http://www.niyaj.enhancedteaching.in/
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
            <html lang="en">
            <!--begin::Head-->

            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

            <head>
                <meta charset="utf-8" />
                <title><?php echo escape($data->fac_name) ?> | Event Organized</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <link rel="canonical" href="http://niyaj.enhancedteaching.in" />
                <meta name="keywords" content="SK NIYAJ ALI, Niyaj ali, Sk Niyaj, Sk Ali" />
                <meta name="description" content="EMS Dashboard" />
                <meta name="robots" content="index, follow" />
                <meta name="author" content="SK NIYAJ ALI" />
                <!--begin::Fonts-->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
                <!--end::Fonts-->
                <!--begin::Page Vendors Styles(used by this page)-->
                <link href="../../theme/plugins/custom/datatables/datatables.bundlec7e5.css?v=7.1.2" rel="stylesheet" type="text/css">
                <link href="../../theme/plugins/custom/fullcalendar/fullcalendar.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
                <!--end::Page Vendors Styles-->
                <!--begin::Global Theme Styles(used by all pages)-->
                <link href="../../theme/plugins/global/plugins.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
                <link href="../../theme/plugins/custom/prismjs/prismjs.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
                <link href="../../theme/css/style.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles-->
                <!--begin::Layout Themes(used by all pages)-->
                <!--end::Layout Themes-->
                <link rel="shortcut icon" href="../theme/media/logos/favicon.ico" />

            </head>
            <!--end::Head-->
            <!--begin::Body-->

            <body id="kt_body" class="header-fixed header-mobile-fixed">
                <!--begin::Main-->
                <?php require('../aside.php'); ?>
                <!--begin::Wrapper-->
                <div class="d-flex flex-column-fluid flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header header-fixed">
                        <!--begin::Header Wrapper-->
                        <div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
                            <!--begin::Container-->
                            <div class="container-fluid d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
                                <!--begin::Menu Wrapper-->
                                <div class="header-menu-wrapper header-menu-wrapper-left py-lg-5" id="kt_header_menu_wrapper">
                                    <!--begin::Menu-->
                                    <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                        <!--begin::Nav-->
                                        <ul class="menu-nav">
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="../../index.php" class="menu-link">
                                                    <span class="menu-text">Dashboard</span>
                                                </a>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="../index.php" class="menu-link">
                                                    <span class="menu-text">Department</span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                                <a href="../../index.php" class="menu-link">
                                                    <span class="menu-text">Faculty</span>
                                                </a>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="../../em_student/index.php" class="menu-link">
                                                    <span class="menu-text">Students</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <!--end::Nav-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu Wrapper-->
                                <!--begin::Toolbar-->
                                <div class="d-flex">
                                    <!--begin::Desktop Search-->
                                    <div class="quick-search quick-search-inline flex-grow-1" id="kt_quick_search_inline">
                                        <!--begin::Form-->
                                        <form method="get" class="quick-search-form">
                                            <div class="input-group rounded bg-light">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span class="svg-icon svg-icon-lg">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/Search.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control h-40px" placeholder="Search..." />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                        <!--end::Form-->
                                        <!--begin::Search Toggle-->
                                        <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                                        <!--end::Search Toggle-->
                                        <!--begin::Dropdown-->
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-anim-up">
                                            <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
                                        </div>
                                        <!--end::Dropdown-->
                                    </div>
                                    <!--end::Desktop Search-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                        <a href="#" class="btn btn-icon btn-light-info ml-3 h-40px w-40px flex-shrink-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>                                        
                                    </div>
                                    <!--end::Dropdown-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="More links" data-placement="left">
                                        <a href="#" class="btn btn-icon btn-light-danger ml-3 h-40px w-40px flex-shrink-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Layout/Layout-vertical.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="5" y="4" width="6" height="16" rx="1.5" />
                                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="6" height="16" rx="1.5" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>                                        
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Header Wrapper-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex align-items-start flex-wrap mr-1">
                                    <!--begin::Mobile Toggle-->
                                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                                        <span></span>
                                    </button>
                                    <!--end::Mobile Toggle-->
                                    <!--begin::Page Heading-->
                                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                                        <!--begin::Page Title-->
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">KIOT@<?php echo $datas->dept_name ?></h5>
                                        <!--end::Page Title-->
                                        <!--begin::Breadcrumb-->
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item">
                                                <a href="#" class="text-muted">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#" class="text-muted">Faculty</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#" class="text-muted"><?php echo escape($data->fac_name) ?></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#" class="text-muted">Profile</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#" class="text-muted">Overview</a>
                                            </li>
                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page Heading-->
                                </div>
                                <!--end::Info-->

                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container-fluid">
                                <!--begin::Profile Overview-->
                                <div class="d-flex flex-row">
                                    <!--begin::Aside-->
                                    <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                                        <!--begin::Profile Card-->
                                        <div class="card card-custom card-stretch">
                                            <!--begin::Body-->
                                            <div class="card-body pt-4">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mt-2">
                                                    <?php if ($data->fac_image) { ?>
                                                        <div class="symbol mr-5 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                            <img src="data:image/png;base64,<?php echo base64_encode($ett_teacher->data()->fac_image); ?>" alt="<?php echo escape($data->fac_name); ?> image">
                                                            <i class="symbol-badge bg-success"></i>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="symbol symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                            <div class=" symbol-label font-size-auto"><?php echo $data->fac_name; ?>
                                                            </div>
                                                            <i class="symbol-badge bg-success"></i>
                                                        </div>
                                                    <?php } ?>
                                                    <div>
                                                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo escape($data->fac_name); ?></a>
                                                        <div class="text-muted"><?php echo escape($data->fac_department) ?></div>
                                                        <div class="mt-2">
                                                            <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><?php echo escape($datas->dept_sname) ?></a>
                                                            <a href="#" class="btn btn-sm btn-danger font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><?php echo escape($data->fac_role) ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="py-9">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Name:</span>
                                                        <a href="#" class="text-muted text-hover-primary"><?php echo escape($data->fac_name); ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Email:</span>
                                                        <a href="#" class="text-muted text-hover-primary"><?php echo escape($data->fac_email); ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Phone:</span>
                                                        <span class="text-muted"><?php echo escape($data->fac_phone); ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Desgination:</span>
                                                        <span class="label label-inline label-warning"><?php echo escape($data->fac_designation); ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Qualification:</span>
                                                        <span class="text-muted"><?php echo escape($data->fac_qualification); ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Location:</span>
                                                        <span class="text-muted"><?php echo escape($data->fac_address); ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="font-weight-bold mr-2">Joined at:</span>
                                                        <span class="text-muted"><?php echo escape($data->fac_created_at); ?></span>
                                                    </div>
                                                </div>
                                                <!--end::Contact-->
                                                <!--begin::Nav-->
                                                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                                    <div class="navi-item mb-2">
                                                        <a href="index.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Design/Layers.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Profile Overview</span>
                                                        </a>
                                                    </div>
                                                    <div class="navi-item mb-2">
                                                        <a href="ett_personal-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/General/User.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Personal Information</span>
                                                        </a>
                                                    </div>
                                                    <div class="navi-item mb-2">
                                                        <a href="ett_account-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Code/Compiling.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24" />
                                                                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                                                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Account Information</span>
                                                        </a>
                                                    </div>
                                                    <div class="navi-item mb-2">
                                                        <a href="ett_student-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Code/Compiling.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24" />
                                                                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                                                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Student Information</span>
                                                        </a>
                                                    </div>
                                                    <div class="navi-item mb-2">
                                                        <a href="efo_event.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4 active" data-toggle="tooltip" title="Event Organized" data-placement="right">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Layout/Layout-top-panel-6.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24" />
                                                                            <rect fill="#000000" x="2" y="5" width="19" height="4" rx="1" />
                                                                            <rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Event Organized</span>
                                                            <span class="navi-label">
                                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="navi-item mb-2">
                                                        <a href="efp_event.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4" data-toggle="tooltip" title="Event Participates" data-placement="right">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Files/File.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                                                                            <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Event Participate</span>
                                                            <span class="navi-label">
                                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Profile Card-->
                                    </div>
                                    <!--end::Aside-->
                                    <!--begin::Content-->
                                    <div class="flex-row-fluid ml-lg-8">
                                        <!--begin::Card-->
                                        <div class="row">
                                            <?php
                                            $event = $db->get('dept_event', array('fe_fac_hash', '=', $data->fac_passkey));
                                            if ($event->count()) {
                                                $i = 0;
                                                foreach ($event->results() as $rows) {
                                                    $fac = $db->get('em_faculty', array('fac_passkey', '=', $rows->fe_fac_hash));
                                                    if ($fac->count()) {
                                                        $i = 0;
                                                        foreach ($fac->results() as $row) {
                                            ?>
                                                            <div class="col-xl-4">
                                                                <!--begin::Featured Product-->
                                                                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(../../theme/media/svg/shapes/abstract-3.svg)">
                                                                    <div class="card-body d-flex flex-column bg-white shadow-sm border-1 border-bottom justify-content-between ribbon ribbon-top">
                                                                        <div class="ribbon-target bg-info" style="top: -2px; right: 20px;">
                                                                            <?php echo $rows->fe_activity ?>
                                                                        </div>
                                                                        
                                                                        <div class="text-center mt-3">
                                                                            <h3 class="font-size-h1">
                                                                                <a href="" class="text-dark font-weight-bolder text-hover-info"><?php echo $rows->fe_name ?></a>
                                                                            </h3>
                                                                            <div class="font-size-h4 text-primary">
                                                                                <span class="label label-light-info label-inline mr-2"><?php echo $rows->fe_activity ?></span>
                                                                                <span class="label label-light-danger label-inline"><?php echo $rows->fe_topic ?></span>
                                                                            </div>

                                                                            <!--begin::Contact-->
                                                                            <div class="py-9">
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Event Name:</span>
                                                                                    <a href="#" class="text-info text-hover-primary font-size-h6"><?php echo escape($rows->fe_name); ?></a>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Activity:</span>
                                                                                    <span class="text-info font-size-h6"><?php echo escape($rows->fe_activity); ?></span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Topic:</span>
                                                                                    <span class="text-info font-size-h6"><?php echo escape($rows->fe_topic); ?></span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Venue:</span>
                                                                                    <span class="text-info font-size-h6"><?php echo escape($rows->fe_venue); ?></span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Start Date:</span>
                                                                                    <a href="#" class="text-light font-size-h6 label label-inline label-danger"><?php echo escape($rows->fe_s_date); ?></a>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">End Date:</span>
                                                                                    <span class="text-light font-size-h6 label label-inline label-danger"><?php echo escape($rows->fe_e_date); ?></span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Academic Year:</span>
                                                                                    <span class="text-info font-size-h6"><?php echo escape($rows->fe_year); ?></span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                    <span class="font-weight-bold mr-2 font-size-h6 text-danger">Created at:</span>
                                                                                    <span class="text-info font-size-h6"><?php echo escape($rows->fe_created_at); ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Contact-->
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <!--end::Featured Product-->
                                                            </div>
                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                        <!--end::Card-->

                                        <!--begin::Card-->
                                        <div class="card card-custom card-border gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 py-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Faculty Event Organized</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than <?php echo $user->fac_fevent_org($data->fac_passkey); ?>+ new event</span>
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body py-0">
                                                <!--begin::Table-->
                                                <div class="table-responsive">
                                                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                                                        <thead>
                                                            <tr class="text-uppercase">
                                                                <th class="pl-0" style="width: 40px">
                                                                    <span class="text-primary">id</span>
                                                                </th>
                                                                <th class="pl-0" style="min-width: 100px"><span class="text-primary">Image</span></th>
                                                                <th class="pl-0" style="min-width: 100px"><span class="text-primary">Faculty Name</span></th>
                                                                <th style="min-width: 80px"><span class="text-primary">Event Info</span></th>
                                                                <th style="min-width: 120px"><span class="text-primary">Event Period</span></th>
                                                                <th style="min-width: 100px"><span class="text-primary">Venue</span></th>
                                                                <th style="min-width: 60px"><span class="text-primary">status</span></th>
                                                                <th style="min-width: 100px"><span class="text-primary">Created at</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $event = $db->get('dept_event', array('fe_fac_hash', '=', $data->fac_passkey));
                                                            if ($event->count()) {
                                                                $i = 0;
                                                                foreach ($event->results() as $rows) {
                                                                    $i++;
                                                                    $fac = $db->get('em_faculty', array('fac_passkey', '=', $rows->fe_fac_hash));
                                                                    if ($fac->count()) {
                                                                        foreach ($fac->results() as $row) {
                                                            ?>
                                                                            <tr>
                                                                                <td class="pl-0 py-6">
                                                                                    <?php echo $i; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="symbol symbol-70 symbol-light mr-5">
                                                                                        <?php if ($row->fac_image) { ?>
                                                                                            <img src="data:image/png;base64,<?php echo base64_encode($row->fac_image) ?>" class="h-50 align-self-center" alt="" />
                                                                                        <?php } else { ?>
                                                                                            <span class="symbol-label">
                                                                                                <?php echo description($row->fac_name) ?>
                                                                                            </span>
                                                                                        <?php } ?>

                                                                                    </div>
                                                                                </td>
                                                                                <td class="pl-0">
                                                                                    <a href="../../em_student/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt', $row->fac_hash) ?>&&admin=<?php echo convert_string('decrypt', $user->data()->passkey) ?>" class="text-info font-weight-bolder text-hover-primary font-size-lg"><?php echo $row->fac_name; ?></a>
                                                                                    <span class="text-muted font-weight-bold d-block"><?php echo $row->fac_email; ?></span>
                                                                                    <span class="text-muted font-weight-bold mt-1"><?php echo $row->fac_phone; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="text-warning font-weight-bolder d-block font-size-lg"><?php echo $rows->fe_activity; ?></span>
                                                                                    <span class="text-danger font-weight-bolder d-block font-size-lg"><?php echo $rows->fe_topic; ?></span>

                                                                                </td>
                                                                                <td>
                                                                                    <span class="label label-lg label-light-primary mb-1 label-inline font-weight-bold"><?php echo $rows->fe_s_date; ?> -> <?php echo $rows->fe_e_date; ?></span>

                                                                                    <span class="label label-lg label-light-danger label-inline "><?php echo $rows->fe_year; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="text-danger font-weight-bolder d-block font-size-lg"><?php echo $rows->fe_venue; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="label label-lg label-light-primary label-inline"><?php echo $rows->fe_status; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="text-info font-weight-bolder d-block font-size-lg"><?php echo $rows->fe_created_at; ?></span>
                                                                                </td>

                                                                            </tr>
                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                                echo '<p class="text-center">No Data Found</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Profile Overview-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->


                    <?php require('footer.php'); ?>
                    <script src="../../theme/js/pages/widgetsc7e5.js?v=7.1.1"></script>
                    <script src="../../theme/js/pages/custom/profile/profilec7e5.js?v=7.1.1"></script>
                    <!--begin::Page Scripts(used by this page)-->
                    <script src="../../theme/plugins/custom/datatables/datatables.bundlec7e5.js"></script>
                    <script src="../../theme/js/pages/crud/forms/widgets/bootstrap-datepickerc7e5.js?v=7.2.6"></script>

            </body>
            <!--end::Body-->


            </html>

<?php
        }
    }
} else {
    Redirect::to('../../../index.php');
}

?>