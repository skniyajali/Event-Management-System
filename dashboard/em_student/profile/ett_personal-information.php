<?php

require_once 'core/init.php';
require '../../includes/function.php';
$user = new User();
if($user->isLoggedIn()){

?>
<?php
if (!$ett_hash = Input::get('emd_department_hash')) {
    Redirect::to('../index.php');
} else {
    $ett_teacher = new Student(convert_string('encrypt', $ett_hash));

    if (!$ett_teacher->exists()) {
        Redirect::to('../index.php');
    } else {
        $data = $ett_teacher->data();
        $d_data = new Department($data->fac_dept_hash);
        $datas = $d_data->data();
        $d_datas = new Faculty($data->fac_mentor_hash);
        $mentor = $d_datas->data();
?>

        <!DOCTYPE html>
            <!--
            Page Name: Event Management System(EMS)
            Author: Sk Niyaj Ali
            Website: https://www.niyaj.enhancedteaching.co.in/
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
            <title><?php echo escape($data->fac_name) ?> | Personal Information</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta http-equiv="x-ua-compatible" content="ie=edge">
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
        <body id="kt_body" class="header-fixed header-mobile-fixeds">
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
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="../../em_faculty/index.php" class="menu-link">
                                                <span class="menu-text">Faculty</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-active" aria-haspopup="true">
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
                                    <h5 class="text-dark font-weight-bold my-1 mr-5">KIOT@<?php echo $datas->dept_name ?>#<?php echo $mentor->fac_name ?></h5>
                                    <!--end::Page Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Student</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted"><?php echo escape($data->fac_name) ?></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Profile</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#" class="text-muted">Personal Information</a>
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
                    <div class="d-flex flex-column-fluid" id="div_content">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <!--begin::Profile Personal Information-->
                            <div class="d-flex flex-row">
                                <!--begin::Aside-->
                                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                                    <!--begin::Profile Card-->
                                    <div class="card card-custom card-stretch">
                                        <!--begin::Body-->
                                        <div class="card-body pt-4">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <?php if ($data->fac_image) { ?>
                                                    <div class="symbol mr-5 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <img src="data:image/png;base64,<?php echo base64_encode($ett_teacher->data()->fac_image); ?>" alt="<?php echo escape($data->fac_name); ?> image">
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
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
                                                        <a href="#" class="btn btn-sm btn-danger font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><?php echo escape($data->fac_year) ?></a>                                                        
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
                                                    <span class="font-weight-bold mr-2">Gender:</span>
                                                    <span class="text-muted"><?php echo escape($data->fac_gender); ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Date of Birth:</span>
                                                    <span class="label label-inline label-warning"><?php echo escape($data->fac_dob); ?></span>
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
                                                    <a href="index.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4">
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
                                                    <a href="ett_personal-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4 active">
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
                                                    <a href="ett_account-information.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4">
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
                                                    <a href="efp_event.php?emd_department_hash=<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>&em_admin=admin" class="navi-link py-4" data-toggle="tooltip" title="Event Participates" data-placement="right">
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
                                                        <span class="navi-text font-size-lg">Event Participated</span>
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
                                    <form class="form" id="ett_personal_form" method="post" enctype="multipart/form-data">
                                        <div class="card card-custom card-stretch" id="kt_page_sticky_card">

                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update Student personal information</span>
                                                </div>

                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Form-->
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <div class="form-group row">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <?php if ($data->fac_image) { ?>
                                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(data:image/png;base64,<?php echo escape(base64_encode($data->fac_image)); ?>)">
                                                            <?php } else { ?>
                                                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(../../includes/asset/image/blank.png)">
                                                                <?php } ?>
                                                                <div class="image-input-wrapper"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="ett_image" id="ett_image" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                                </div>
                                                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                            </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Department Name</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" type="text" name="te_name" id="te_name" value="<?php echo escape($data->fac_name); ?>" />
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Date of Birth</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" type="text" name="te_dob" id="te_dob" value="<?php echo escape($data->fac_dob); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Roll/Reg No</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" type="text" name="te_roll" id="te_roll" value="<?php echo escape($data->fac_rollno); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control selectpicker" id="ett_gen" name="ett_gen" data-style="btn-light-primary">
                                                                <option value="">Select an Option</option>
                                                                <option value="Male" <?php if($data->fac_gender == 'Male'){echo 'selected';} ?>>Male</option>
                                                                <option value="Female" <?php if($data->fac_gender == 'Female'){echo 'selected';} ?>>Female</option>
                                                                <option value="Other" <?php if($data->fac_gender == 'Other'){echo 'selected';} ?>>Other</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="separator separator-dashed"></div>
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mt-4 mb-4 text-center">Communication Info</h5>
                                                        </div>
                                                    </div>

                                                    <div class="separator separator-dashed mb-4"></div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="<?php echo escape($data->fac_phone); ?>" placeholder="Phone" name="te_phone" id="te_phone" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-at"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="<?php echo escape($data->fac_email); ?>" placeholder="Email" name="te_email" id="te_email" />
                                                            </div>
                                                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-home"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Website" value="<?php echo escape($data->fac_address); ?>" name="te_location" id="te_location" />                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--end::Body-->
                                            <!-- begin::Footer -->
                                            <div class="card-footer">
                                                <div class="card-toolbar">
                                                    <input type="hidden" name="action" id="action" value="insert" />
                                                    <input type="hidden" name="ett_token" id="ett_token" value="<?php echo escape(convert_string('decrypt',$data->fac_hash)); ?>" />
                                                    <input type="hidden" name="ett_passkey" id="ett_passkey" value="<?php echo escape(convert_string('decrypt',$data->fac_passkey)); ?>" />
                                                    <button type="submit" id="ett_personal_submit" name="ett_personal_submit" class="btn btn-success mr-2 float-right">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary">Cancel</button>
                                                </div>
                                            </div>
                                            <!-- End::Footer -->
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Profile Personal Information-->
                    </div>
                    <!--end::Container-->
                
                <!--end::Entry-->
                <!--end::Content-->
                <?php require('footer.php'); ?>
                <!-- Modal-->
                <div class="modal fade" id="errorMsg" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="text-primary" id="exampleModalLabel"> <span class="text-center">There are Some Message</span></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="alert_action"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

                <script src="../../theme/js/pages/widgetsc7e5.js?v=7.1.1"></script>
                <script src="../../theme/js/pages/custom/profile/profilec7e5.js?v=7.1.1"></script>

        </body>
        <!--end::Body-->
        <!-- Begin::script -->
        <script>
            $(document).ready(function() {
                $('#ett_personal_form').submit(function(e) {
                    e.preventDefault();
                    var ett_image = $('#ett_image').val();
                    $('#action').val('Department_update');
                    if (ett_image) {
                        var extension = $('#ett_image').val().split('.').pop().toLowerCase();
                        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                            alert("Invalid Image File");
                            $('#ett_image').val('');
                            return false;
                        }
                    }
                    $.ajax({
                        url: "ett_personal-information_action.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.error != '') {
                                //$('.modal-title').text("Success!");
                                //$('#errorMsg').modal('show');
                                //$('#alert_action').html(data.error);
                                //$("#form-div").load(" #form-div");
                                $("#kt_page_sticky_card").load(" #kt_page_sticky_card");
                                //$("#kt_wrapper").load(" #kt_wrapper > *");
                                $("#profile-div").load(" #profile-div > *");

                                Swal.fire({
                                    position: "top-right",
                                    icon: "error",
                                    title: data.error,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                
                            } else {
                                //$('.modal-title').text("Success!");
                                //$('#errorMsg').modal('show');
                                //$('#alert_action').html(data.message);
                                //$("#form-div").load(" #form-div");
                                //$("#kt_wrapper").load(" #kt_wrapper > *");
                                //$("#kt_page_sticky_card").load(" #kt_page_sticky_card > *");
                                //$("#profile-div").load(" #profile-div");

                                Swal.fire({
                                    position: "top-right",
                                    icon: "success",
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function() {
                                    location.reload(); //Refresh page
                                }, 1500);
                            }
                        }
                    });
                });
            });
        </script>
        <!-- End::script -->


        </html>
<?php
    }
}
}

?>