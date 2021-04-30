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
        $ett_teacher = new Faculty(convert_string('encrypt', $ett_hash));

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

            <head>
                <meta charset="utf-8" />
                <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
                <title><?php echo escape($data->fac_name) ?> | Student Information</title>
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
                                                <a href="../../em_department/index.php" class="menu-link">
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
                            <div class="container d-flex align-items-start justify-content-between flex-wrap flex-sm-nowrap">
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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">KIOT@<?php echo escape($datas->dept_name) ?></h5>
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
                                                <a href="#" class="text-muted">Account Information</a>
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
                                <!--begin::Profile Account Information-->
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
                                                        <a href="ett_student-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4 active">
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
                                                        <a href="efo_event.php?emd_department_hash=<?php echo escape(convert_string('decrypt', $data->fac_passkey)); ?>&em_admin=admin" class="navi-link py-4" data-toggle="tooltip" title="Event Organized" data-placement="right">
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
                                    <div class="flex-row-fluid ml-lg-6">
                                        <!--begin::Card-->
                                        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                                            <div class="alert-icon">
                                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/icons/Tools/Compass.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <div class="alert-text font-size-h3 font-weight-bold">Students Details </div>
                                            <div class="card-toolbar">
                                                <!--begin::Button-->
                                                <button class="btn btn-info font-weight-bolder" data-toggle="modal" data-target="#DepartmentModels" id="add_departments">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Design/Flatten.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>New Student
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                        </div>
                                        <!--begin::Row-->
                                        <div class="row">
                                            <?php 
                                                $fac = $db->get('em_students',array('fac_mentor_hash','=',$data->fac_passkey));
                                                if($fac->count()){
                                                    $i = 0;
                                                    foreach($fac->results() as $row){ $i++; 
                                            ?>
                                            <div class="col-lg-4">                                            
                                                <div class="card card-custom gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex justify-content-between flex-column pt-4 h-100">
                                                            <!--begin::Container-->
                                                            <div class="pb-5">
                                                                <!--begin::Header-->
                                                                <div class="d-flex flex-column flex-center">
                                                                    <?php  
                                                                        if($row->fac_year == 1){
                                                                            $year = "First Year";
                                                                        }elseif($row->fac_year == 2){
                                                                            $year = "Second Year";
                                                                        }elseif($row->fac_year == 3){
                                                                            $year = "Third Year";
                                                                        }else{
                                                                            $year = "Final Year";
                                                                        }

                                                                    ?>
                                                                    <!--begin::Symbol-->                                                                                                                                
                                                                    <?php if($row->fac_image){ ?>
                                                                        <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                                                            <img src="data:image/png;base64,<?php echo base64_encode($row->fac_image) ?>" alt="<?php echo $row->fac_name ?> image">
                                                                        </div>
                                                                    <?php }else{ ?> 
                                                                        <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                                                            <div class="symbol-label font-size-auto"><?php echo description($row->fac_name) ?></div>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <!--end::Symbol-->
                                                                    <!--begin::Username-->
                                                                    <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1"><?php echo $row->fac_name ?></a>
                                                                    <!--end::Username-->
                                                                    <!--begin::Info-->
                                                                    <div class="font-weight-bold text-dark-50 font-size-sm pb-6"><span class="label label-lg label-light-primary label-inline"><?php echo $year ?></span><span class="label label-lg ml-2 label-light-danger label-inline"><?php echo $row->fac_gender ?></span></div>
                                                                    <!--end::Info-->
                                                                </div>
                                                                <!--end::Header-->
                                                                <!--begin::Body-->
                                                                <!--begin::Info-->
                                                                <div class="pt-1">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                                                        <a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_email ?></a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                                                                        <a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_phone ?></a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">Date of Birth:</span>
                                                                        <a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_dob ?></a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">Mentor:</span>
                                                                        <a href="#" class=" text-hover-primary label label-danger label-inline"><?php echo $row->fac_mentor ?></a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-center my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                                                                        <span class="text-muted font-weight-bold"><?php echo $row->fac_address ?></span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">Created At:</span>
                                                                        <span class="text-muted font-weight-bold"><?php echo $row->fac_created_at ?></span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--end::Body-->
                                                            </div>
                                                            <!--eng::Container-->
                                                            <!--begin::Footer-->
                                                            <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1">
                                                                <a href="../../em_student/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">Write a Message</a>
                                                            </div>
                                                            <!--end::Footer-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                            </div>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Advance Table: Widget 7-->
                                        <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Students Informations</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <!--begin::Button-->
                                                    <button class="btn btn-warning font-weight-bolder" data-toggle="modal" data-target="#DepartmentModels" id="add_departments">
                                                        <span class="svg-icon svg-icon-md">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Design/Flatten.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>New Studnet
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <!--begin::Table-->
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-vertical-center">                                                    
                                                        <thead>
                                                            <tr class="text-uppercase">
                                                                <th class="pl-0" style="width: 100px"></th>
                                                                <th class="pl-0" style="min-width: 100px"></th>
                                                                <th style="min-width: 120px"></th>
                                                                <th style="min-width: 180px"></th>
                                                                <th style="min-width: 100px"></th>
                                                                <th style="min-width: 80px"></th>
                                                                <th style="min-width: 100px"></th>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                            $fac = $db->get('em_students',array('fac_mentor_hash','=',$data->fac_passkey));
                                                            if($fac->count()){
                                                                foreach($fac->results() as $row){                                                                
                                                                        if($row->fac_year == 1){
                                                                            $year = "First Year";
                                                                        }elseif($row->fac_year == 2){
                                                                            $year = "Second Year";
                                                                        }elseif($row->fac_year == 3){
                                                                            $year = "Third Year";
                                                                        }else{
                                                                            $year = "Final Year";
                                                                        }                                                                
                                                        ?>
                                                            <tr>
                                                                <td class="p-0 py-4">
                                                                    <div class="symbol symbol-70 symbol-light mr-5">
                                                                        <?php if($row->fac_image){ ?>                                                                        
                                                                                <img src="data:image/png;base64,<?php echo base64_encode($row->fac_image) ?>" class="h-50 align-self-center" alt="" />                                                                        
                                                                            <?php }else{ ?>
                                                                                <span class="symbol-label">
                                                                                    <?php echo description($row->fac_name) ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td class="pl-0">
                                                                    <a href="../../em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg"><?php echo $row->fac_name ?></a>
                                                                    <span class="text-muted font-weight-bold d-block mt-1 mb-1"><?php echo $row->fac_email ?></span>
                                                                    <span class="text-muted font-weight-bold d-block"><?php echo $row->fac_phone ?></span>
                                                                </td>
                                                                <td class="text-right pr-0">
                                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $row->fac_gender ?></span>
                                                                    <span class="text-muted font-weight-bold d-block mt-1 mb-1"><?php echo $year ?></span>
                                                                    <span class="label label-lg label-light-info label-inline"><?php echo $row->fac_dob ?></span>
                                                                </td>
                                                                <td class="text-right pr-0">
                                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $row->fac_department ?></span>
                                                                    <span class="text-muted font-weight-bold"><?php echo $row->fac_mentor ?></span>
                                                                </td>
                                                                <td class="text-right pr-0">
                                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $row->fac_address ?></span>
                                                                    <span class="text-muted font-weight-bold"><?php echo $row->fac_created_at ?></span>
                                                                </td>                                                            
                                                                <td class="text-right">
                                                                    <span class="label label-lg label-light-danger label-inline"><?php echo $row->fac_status ?></span>
                                                                </td>
                                                                <td class="pr-0 text-right">
                                                                    <a href="../../em_student/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_hash) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/icons/General/Settings-1.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                                                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                                                    </a>
                                                                    <button type="button" id="<?php echo convert_string('decrypt',$row->fac_hash) ?>" class="ett_edits btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                                                    </button>
                                                                    <button type="button" id="<?php echo convert_string('decrypt',$row->fac_hash) ?>" data-status="<?php echo $row->fac_status ?>" class="ett_deletes btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                    }
                                                                }else{
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
                                        <!--end::Advance Table Widget 7-->
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Profile Account Information-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    <!-- Modal-->
                    <div class="modal fade" id="DepartmentModels" tabindex="-1" role="dialog" aria-labelledby="DepartmentModelLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="teacherModelLabel">Modal Title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!--begin::Entry-->
                                    <form class="form" id="department_form" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="alert alert-custom alert-primary fade show" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text font-weight-bold">Don't forget to generate Student <b>Passkey</b> & <b>Token</b></div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>                                    
                                            <div class="form-group row">
                                                <div class="col-xl-4">                                            
                                                    <label>Department</label>
                                                    <select class="form-control form-control-solid selectpicker" name="ett_dept" id="ett_dept" data-style="btn-primary" data-size="4" required>
                                                        <option val="">Select an option</option>
                                                        <?php  
                                                            $query = "SELECT * FROM em_department";
                                                            $statement = $connect->prepare($query);
                                                            $statement->execute();
                                                            if($statement->rowCount() > 0){
                                                                $result = $statement->fetchAll();
                                                                foreach($result as $row){                                                        
                                                        ?>
                                                            <option value="<?php echo convert_string('decrypt',$row["dept_passkey"]) ?>"><?php echo $row["dept_name"]  ?>(<?php echo $row["dept_sname"]  ?>)</option>
                                                        <?php   }}else{ ?>
                                                            <option>No Option Found.</option>
                                                        <?php
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                    <span class="form-text text-muted">
                                                        Please select department
                                                    </span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label>Mentor</label>
                                                    <select class="form-control form-control-solid selectpicker" name="ett_mentor" id="ett_mentor" data-style="btn-danger" data-size="4" required>
                                                    <option val="">Select an option</option>
                                                        <?php  
                                                            $query = "SELECT * FROM em_faculty";
                                                            $statement = $connect->prepare($query);
                                                            $statement->execute();
                                                            if($statement->rowCount() > 0){
                                                                $result = $statement->fetchAll();
                                                                foreach($result as $row){                                                        
                                                        ?>
                                                            <option value="<?php echo convert_string('decrypt',$row["fac_passkey"]) ?>"><?php echo $row["fac_name"]  ?></option>
                                                        <?php   }}else{ ?>
                                                            <option>No Option Found.</option>
                                                        <?php
                                                            }
                                                        ?>                                               
                                                    </select>
                                                    <span class="form-text text-muted">
                                                        Please select mentor name
                                                    </span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label>Year:</label>
                                                    <select class="form-control form-control-solid selectpicker" name="ett_year" id="ett_year" data-style="btn-info" data-size="4" required>
                                                        <option value="">Select an option</option>
                                                        <option value="1">1st Year</option>
                                                        <option value="2">2nd Year</option>
                                                        <option value="3">3rd Year</option>
                                                        <option value="4">4th Year</option>                                                                                            
                                                    </select>                                              
                                                    <span class="form-text text-muted">
                                                        Please select year
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-8">
                                                    <label>Student Name:</label>
                                                    <input class="form-control form-control-solid" name="ett_name" type="text" id="ett_name" placeholder="Enter Name" required />
                                                    <span class="form-text text-muted">
                                                        Please enter student name
                                                    </span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label>Gender:</label>
                                                    <select class="form-control form-control-solid selectpicker" name="ett_gen" id="ett_gen" data-style="btn-warning" data-size="4" required>
                                                        <option value="">Select an option</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                                                                    
                                                    </select>                                            
                                                    <span class="form-text text-muted">
                                                        Please select gender
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Phone:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid" name="ett_phone" id="ett_phone" placeholder="Enter Phone No" required />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter student phone no</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Email:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid " name="ett_email" id="ett_email" placeholder="Enter Department E-Mail Address" required />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-at"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter student email</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>Username:</label>
                                                    <div class="input-group">
                                                        <input class="form-control form-control-solid " name="ett_username" type="text" id="ett_username" placeholder="Enter student Username" required />
                                                    </div>
                                                    <span class="form-text text-muted">Please enter student Username</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Password:</label>
                                                    <div class="input-group">
                                                        <input class="form-control form-control-solid " name="ett_password" type="password" id="ett_password" placeholder="Enter student Password" required />
                                                    </div>
                                                    <span class="form-text text-muted">Please enter student Password</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Confirm Password:</label>
                                                    <div class="input-group">
                                                        <input class="form-control form-control-solid " name="ett_cpassword" type="password" id="ett_cpassword" placeholder="Enter Teacher Password" required />
                                                    </div>
                                                    <span class="form-text text-muted">
                                                        Please confirm Password
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-4">                                            
                                                    <label>Date of birth:</label>                                            
                                                    <div class="input-group date">
                                                    <input type="text" class="form-control form-control-solid" readonly name="ett_dob" id="kt_datepicker_3"/>
                                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label>Roll No/Reg No:</label>
                                                    <input class="form-control form-control-solid" name="ett_roll" type="text" id="ett_roll" placeholder="Roll/Reg No" required />
                                                    <span class="form-text text-muted">
                                                        Please enter you rollno or regno
                                                    </span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label>Location:</label>
                                                    <input class="form-control form-control-solid" name="ett_location" type="text" id="ett_location" placeholder="Enter Address" required />
                                                    <span class="form-text text-muted">
                                                        Please enter qualification
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Passkey:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" id="gen_passkey" name="gen_passkey" title="Generate Passkey"><i class="flaticon-refresh"></i></button>
                                                        </div>
                                                        <input class="form-control form-control-solid form-control-lg" name="ett_passkey" type="text" id="ett_passkey" required />

                                                    </div>
                                                    <span class="form-text text-muted">
                                                        Please generate student passkey
                                                    </span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Token:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" id="gen_token" name="gen_token" title="Generate Token!"><i class="flaticon-refresh"></i></button>
                                                        </div>
                                                        <input class="form-control form-control-solid form-control-lg" name="ett_hash" type="text" id="ett_hash" required />

                                                    </div>
                                                    <span class="form-text text-muted">Please generate student token</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button data-dismiss="modal" class="btn btn-primary mr-2">
                                                        Close
                                                    </button>
                                                </div>
                                                <div class="col-lg-6 text-lg-right">
                                                    <input type="hidden" name="ett_id" id="ett_id" />
                                                    <input type="hidden" name="operation" id="operation" />
                                                    <input type="submit" name="teacher_action" value="Submit" class="teacher_action btn btn-danger">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Entry-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require('footer.php'); ?>
                    <script src="../../theme/js/pages/widgetsc7e5.js?v=7.1.1">
                    </script>
                    <script src="../../theme/js/pages/custom/profile/profilec7e5.js?v=7.1.1"></script>
                    <!--begin::Page Scripts(used by this page)-->
                    <script src="../../theme/plugins/custom/datatables/datatables.bundlec7e5.js"></script>
                    <script src="../../theme/js/pages/crud/forms/widgets/bootstrap-datepickerc7e5.js?v=7.2.6"></script>
                    
                    <script src="script.js"></script>
                    <script type="text/javascript" language="javascript">
                        $(document).ready(function() {
                            $('#add_departments').click(function() {
                                $('#department_form')[0].reset();
                                $('.modal-title').text("Add Student");
                                $('#action').val("Add");
                                $('#operation').val("Add");
                                $('#teacher_uploaded_avatar').html('');
                            });
                            
                            $(document).on('submit', '#department_form', function(event) {
                                event.preventDefault();
                                var form_data = $(this).serialize();
                                $.ajax({
                                    url: "emd_insert.php",
                                    method: 'POST',
                                    data: form_data,
                                    dataType: "json",
                                    success: function(data) {
                                        if (data.err != '') {
                                            $('.alert_text').html(data.err);
                                            Swal.fire({
                                                title: "Error",
                                                text: data.err,
                                                icon: "warning",
                                                showClass: {
                                                    popup: 'animate__animated animate__fadeInDown'
                                                },
                                                hideClass: {
                                                    popup: 'animate__animated animate__fadeOutUp'
                                                },
                                                timer: 2000,
                                                onOpen: function() {
                                                    Swal.showLoading()
                                                }
                                            }).then(function(result) {
                                                if (result.dismiss === "timer") {
                                                    //console.log("I was closed by the timer")
                                                }
                                            });
                                            t.ajax.reload();
                                        } else {
                                            Swal.fire({
                                                title: "Message",
                                                text: data.msg,
                                                icon: "success",
                                                showClass: {
                                                    popup: 'animate__animated animate__fadeInDown'
                                                },
                                                hideClass: {
                                                    popup: 'animate__animated animate__fadeOutUp'
                                                },
                                                timer: 2000,
                                                onOpen: function() {
                                                    Swal.showLoading()
                                                }
                                            }).then(function(result) {
                                                if (result.dismiss === "timer") {
                                                    //console.log("I was closed by the timer")
                                                }
                                            });
                                            $('#department_form')[0].reset();
                                            $('#DepartmentModel').modal('hide');
                                            t.ajax.reload();
                                            setTimeout(function(){
                                                location.reload();
                                            },1500);
                                        }
                                    }
                                });

                            });

                            $(document).on('click', '.ett_edits', function() {
                                var ett_id = $(this).attr("id");
                                var operation = 'fetch_single';
                                $.ajax({
                                    url: "emd_insert.php",
                                    method: "POST",
                                    data: {
                                        ett_id: ett_id,
                                        operation: operation
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        $('#DepartmentModels').modal('show');
                                        $("#ett_password").prop("type", "text");
                                        $("#ett_cpassword").prop("type", "text");                                
                                        $(".teacher_action").val('Back');                                
                                        $('#ett_name').val(data.te_name);
                                        $('#kt_datepicker_3').val(data.te_dob);
                                        $('#ett_phone').val(data.te_phone);
                                        $('#ett_email').val(data.te_email);
                                        $('#ett_mentor').val(data.te_mentor).change();
                                        $('#ett_dept').val(data.te_dept).change();
                                        $('#ett_year').val(data.te_year).change();
                                        $('#ett_gen').val(data.te_gen).change();                                                          
                                        $('#ett_location').val(data.te_location);
                                        $('#ett_roll').val(data.te_roll);                                
                                        $('#ett_username').val(data.te_username);
                                        $('#ett_password').val(data.te_password);
                                        $('#ett_cpassword').val(data.te_password);
                                        $('#ett_passkey').val(data.te_passkey);
                                        $('#ett_hash').val(data.te_token);
                                        $('.modal-title').text("View Student Details");

                                    }
                                })
                            });

                            $(document).on('click', '.ett_deletes', function() {
                                var ett_id = $(this).attr("id");
                                var ett_status = $(this).data('status');
                                var operation = "delete";
                                Swal.fire({
                                    title: "Are you sure to change the status?",
                                    text: "You will be revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes, change it!"
                                }).then(function(result) {
                                    if (result.value) {
                                        $.ajax({
                                            url: "emd_insert.php",
                                            method: "POST",
                                            data: {
                                                ett_id: ett_id,
                                                ett_status: ett_status,
                                                operation: operation
                                            },
                                            success: function(data) {
                                                Swal.fire(
                                                    "Changed!",
                                                    "Department status has been changed!.",
                                                    "success"
                                                );
                                                t.ajax.reload();
                                                setTimeout(function(){
                                                location.reload();
                                            },1500);
                                            }
                                        });

                                    }
                                });
                            });

                            $(document).on('click', '#gen_passkey', function() {
                                var passkey = generate_passkey(60);
                                document.getElementById("ett_passkey").value = passkey;
                            });

                            $(document).on('click', '#gen_token', function() {
                                var token = generate_token(60);
                                document.getElementById("ett_hash").value = token;
                            });

                            

                        });
                    </script>

                    <script>
                        function generate_passkey(length) {
                            //edit the token allowed characters
                            var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890~`@#$%^&*--+=".split("");
                            var b = [];
                            for (var i = 0; i < length; i++) {
                                var j = (Math.random() * Math.random() * Math.random() * (a.length - 1)).toFixed(0);
                                b[i] = a[j];
                            }
                            return b.join("");
                        }

                        function generate_token(length) {
                            //edit the token allowed characters
                            var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*_-+=".split("");
                            var b = [];
                            for (var i = 0; i < length; i++) {
                                var j = (Math.random() * Math.random() * (a.length - 1)).toFixed(0);
                                b[i] = a[j];
                            }
                            return b.join("");
                        }
                    </script>
            </body>
            <!--end::Body-->


            </html>
<?php
        }
    }
}
?>