<?php
require('core/init.php');
require('../includes/function.php');
require('../includes/db.php');
function gen_passkey()
{
    return Hash::unique();
}
$user = new User();
if ($user->isLoggedIn()) {
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
        <title>Faculty | KIOT</title>
        <meta name="description" content="View all Faculty" />
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
        <link href="../theme/plugins/custom/datatables/datatables.bundlec7e5.css?v=7.1.2" rel="stylesheet" type="text/css">
        <link href="../theme/plugins/custom/fullcalendar/fullcalendar.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="../theme/plugins/global/plugins.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
        <link href="../theme/plugins/custom/prismjs/prismjs.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
        <link href="../theme/css/style.bundlec7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="../theme/media/logos/favicon.ico" />
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="../theme/css/pages/wizard/wizard-4c7e5.css?v=7.1.1" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->

    </head>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body" class="header-fixed header-mobile-fixed mr-4 page-loading">
        <!--begin::Main-->
        <?php require('aside.php'); ?>
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
                                        <a href="../index.php" class="menu-link">
                                            <span class="menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="../em_department/index.php" class="menu-link">
                                            <span class="menu-text">Department</span>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-active" aria-haspopup="true">
                                        <a href="index.php" class="menu-link">
                                            <span class="menu-text">Faculty</span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="../em_student/index.php" class="menu-link">
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
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-drop"></i>
                                                </span>
                                                <span class="navi-text">New Group</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-list-3"></i>
                                                </span>
                                                <span class="navi-text">Contacts</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-rocket-1"></i>
                                                </span>
                                                <span class="navi-text">Groups</span>
                                                <span class="navi-link-badge">
                                                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-bell-2"></i>
                                                </span>
                                                <span class="navi-text">Calls</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-gear"></i>
                                                </span>
                                                <span class="navi-text">Settings</span>
                                            </a>
                                        </li>
                                        <li class="navi-separator my-3"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-magnifier-tool"></i>
                                                </span>
                                                <span class="navi-text">Help</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-bell-2"></i>
                                                </span>
                                                <span class="navi-text">Privacy</span>
                                                <span class="navi-link-badge">
                                                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
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
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-header font-weight-bold py-4">
                                            <span class="font-size-lg">Choose Label:</span>
                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                        </li>
                                        <li class="navi-separator mb-3 opacity-70"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-success">Customer</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-primary">Member</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-separator mt-3 opacity-70"></li>
                                        <li class="navi-footer py-4">
                                            <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                                <i class="ki ki-plus icon-sm"></i>Add new</a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
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

                </div>
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container-fluid">
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
							<div class="alert-text font-size-h3 font-weight-bold">Recently Added Faculty </div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<button class="btn btn-danger font-weight-bolder" data-toggle="modal" data-target="#DepartmentModel" id="add_department">
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
									</span>New Faculty
								</button>
								<!--end::Button-->
							</div>
						</div>
						<!--begin::Row-->
						<div class="row">
							<div class="col-xl-4">
								<div class="card card-custom card-stretch gutter-b">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label font-weight-bolder text-dark">Recently Added Faculty's</span>
											<span class="text-muted mt-3 font-weight-bold font-size-sm">More Than <?php echo $user->faculty_count() ?> Faculty's</span>
										</h3>										
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-8">
										<?php 
											$query = "SELECT * FROM em_faculty ORDER BY fac_id DESC";
											$statement = $connect->prepare($query);
											$statement->execute();
											if($statement->rowCount()){
												foreach($statement->fetchAll() as $row){
                                                    if($row["fac_status"] == 'Active'){
                                                        $bg = 'bg-info';
                                                    }else{
                                                        $bg = 'bg-danger';
                                                    }
										?>
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-10">
												<!--begin::Symbol-->
												<div class="symbol symbol-80 symbol-light-primary mr-5">
													<?php if($row["fac_image"]){ ?>														
															<img src="data:image/png;base64,<?php echo base64_encode($row["fac_image"]) ?>" class="h-50 align-self-center" alt="<?php echo $row["fac_name"] ?>">
													<?php	}else{ ?>
																<span class="symbol-label"><?php echo $row["fac_name"] ?></span>
													<?php	} ?>
													<i class="symbol-badge <?php echo $bg ?>"></i>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column font-weight-bold">
													<a href="em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row["fac_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark text-hover-primary mb-1 font-size-lg"><?php echo $row["fac_name"] ?></a>
													<span class="text-muted"><i class="fa fa-1x fa-clock text-warning mr-2"></i><?php echo time_difference($row["fac_created_at"]) ?></span>
                                                    <div class="mt-2">
                                                        <a href="profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row["fac_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-light btn-icon btn-hover-primary btn-sm">
                                                            <span class="svg-icon svg-icon-md svg-icon-info">
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
                                                        <button id="<?php echo convert_string('decrypt',$row["fac_hash"]) ?>" class="ett_edit btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                            <span class="svg-icon svg-icon-md svg-icon-info">
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
                                                        <button id="<?php echo convert_string('decrypt',$row["fac_hash"]) ?>" data-status="<?php echo  $row["fac_status"] ?>" class="ett_delete btn btn-icon btn-light btn-hover-primary btn-sm">
                                                            <span class="svg-icon svg-icon-md svg-icon-info">
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
                                                    </div>
												</div>
												<!--end::Text-->
											</div>
											<!--end::Item-->
										<?php
												}
											}
										?>
									</div>
									<!--end::Body-->
								</div>
							</div>
							<div class="col-xl-8">
								<div class="row">
									<?php 
										$fac = $db->get('em_faculty',array());
										if($fac->count()){
											$i = 0;
											foreach($fac->results() as $row){ 
                                                $i++; 
                                                if($row->fac_status == 'Active'){
                                                    $bgs = 'bg-info';
                                                }else{
                                                    $bgs = 'bg-danger';
                                                }
									?>
									<div class="col-lg-6">
										<!--begin::List Widget 14-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Body-->
											<div class="card-body pt-4 ribbon ribbon-clip ribbon-right">
												<?php  
													if($row->fac_role == 'HOD'){
														$bg = 'bg-primary';
													}elseif($row->fac_role == 'Faculty'){
														$bg = 'bg-info';
													}else{
														$bg = 'bg-danger';
													}
												?>
												<div class="ribbon-target" style="top: 12px;">
													<span class="ribbon-inner <?php echo $bg ?>"></span><?php echo $row->fac_role ?>
												</div>												
												<!--begin::User-->
												<div class="d-flex align-items-center flex-column flex-center mb-7">
													<!--begin::Pic-->
													<div class="d-flex flex-column flex-center flex-shrink-0 mr-4">
														<?php if($row->fac_image){ ?>
															<div class="symbol symbol-circle symbol-100">
																<img src="data:image/png;base64,<?php echo base64_encode($row->fac_image) ?>" alt="<?php echo $row->fac_name ?> image">
                                                                <i class="symbol-badge <?php echo $bgs ?>"></i>
															</div>
														<?php }else{ ?> 
															<div class="symbol symbol-circle symbol-100">
																<div class="symbol-label font-size-auto"><?php echo description($row->fac_name) ?></div>
                                                                <i class="symbol-badge <?php echo $bgs ?>"></i>
															</div>
														<?php } ?>
														
													</div>
													<!--end::Pic-->
													<!--begin::Title-->
													<div class="d-flex flex-center flex-column mt-2">
														<a href="em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0"><?php echo $row->fac_name ?></a>
														<div class="mt-1">
															<span class="text-white font-weight-bold label label-inline label-danger"><?php echo $user->department_name($row->fac_dept_hash) ?></span>
															<span class="ml-2 text-white font-weight-bold label label-inline label-primary"><?php echo $row->fac_designation ?></span>
														</div>
														
													</div>
													<!--end::Title-->
												</div>
												<!--end::User-->                                                    
												<!--begin::Info-->
												<div class="mb-7">
													<div class="d-flex justify-content-between align-items-center">
														<span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
														<a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_email ?></a>
													</div>
													<div class="d-flex justify-content-between align-items-cente my-1">
														<span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
														<a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_phone ?></a>
													</div>
													<div class="d-flex justify-content-between align-items-center">
														<span class="text-dark-75 font-weight-bolder mr-2">Desegination:</span>
														<a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_designation ?></a>
													</div>
													<div class="d-flex justify-content-between align-items-cente my-1">
														<span class="text-dark-75 font-weight-bolder mr-2">Qualification:</span>
														<a href="#" class="text-muted text-hover-primary"><?php echo $row->fac_qualification ?></a>
													</div>
													<div class="d-flex justify-content-between align-items-center">
														<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
														<span class="text-muted font-weight-bold"><?php echo $row->fac_address ?></span>
													</div>
													<div class="d-flex justify-content-between align-items-center">
														<span class="text-dark-75 font-weight-bolder mr-2">Created At:</span>
														<span class="text-muted font-weight-bold"><?php echo $row->fac_created_at ?></span>
													</div>
												</div>
												<!--end::Info-->
												<div class="text-center">
                                                    <div class="mt-2">
                                                        <a href="profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-light btn-icon btn-hover-primary btn-sm">
                                                            <span class="svg-icon svg-icon-md svg-icon-danger">
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
                                                        <button id="<?php echo convert_string('decrypt',$row->fac_hash) ?>" class="ett_edit btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                            <span class="svg-icon svg-icon-md svg-icon-danger">
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
                                                        <button id="<?php echo convert_string('decrypt',$row->fac_hash) ?>" data-status="<?php echo  $row->fac_status ?>" class="ett_delete btn btn-icon btn-light btn-hover-primary btn-sm">
                                                            <span class="svg-icon svg-icon-md svg-icon-danger">
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
                                                    </div>
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 14-->
									</div>
									<?php
											}
										}
									?>
								</div>
							</div>
						</div>
						<!--end::Row-->
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label">Faculty Details
                                        <div class="text-muted pt-2 font-size-sm">View all faculty details</div>
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline mr-2 show">
                                        <button type="button" class="btn btn-light font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo10/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>Export</button>
                                        <!--begin::Dropdown Menu-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-62px, -254px, 0px);" x-placement="top-end">
                                            <!--begin::Navigation-->
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export_print">
                                                        <span class="navi-icon">
                                                            <i class="la la-print"></i>
                                                        </span>
                                                        <span class="navi-text">Print</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export_copy">
                                                        <span class="navi-icon">
                                                            <i class="la la-copy"></i>
                                                        </span>
                                                        <span class="navi-text">Copy</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export_excel">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-excel-o"></i>
                                                        </span>
                                                        <span class="navi-text">Excel</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export_csv">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-text-o"></i>
                                                        </span>
                                                        <span class="navi-text">CSV</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export_pdf">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-pdf-o"></i>
                                                        </span>
                                                        <span class="navi-text">PDF</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                        <!--end::Dropdown Menu-->
                                    </div>
                                    <!--end::Dropdown-->
                                    <!--begin::Button-->
                                    <button class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#DepartmentModel" id="add_department">
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
                                        </span>New Faculty</button>
                                    <!--end::Button-->
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 footer">
                                    <table id="DepartmentData" class="table table-separate table-head-custom dataTable dtr-inline" role="grid">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Username</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Location</th>
                                                <th>Created at</th>
                                                <th class="sorting-disabled">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Username</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                <th>Location</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th class="sorting-disabled">Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>                                        
                                </div>
                                <!--end: Datatable-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!-- Modal-->
            <div class="modal fade" id="DepartmentModel" tabindex="-1" role="dialog" aria-labelledby="DepartmentModelLabel" aria-hidden="true">
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
                                        <div class="alert-text font-weight-bold">Don't forget to generate Faculty <b>Passkey</b> & <b>Token</b></div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-8">
                                            <label class="col-xl-4">Department</label>
                                            <select class="form-control form-control-solid selectpicker" name="ett_dept" id="ett_dept" data-style="btn-primary" data-size="4" required>
                                                <option val="">Select an option</option>
                                                <?php
                                                $query = "SELECT * FROM em_department";
                                                $statement = $connect->prepare($query);
                                                $statement->execute();
                                                if ($statement->rowCount() > 0) {
                                                    $result = $statement->fetchAll();
                                                    foreach ($result as $row) {
                                                ?>
                                                        <option value="<?php echo convert_string('decrypt', $row["dept_passkey"]) ?>"><?php echo $row["dept_name"]  ?>(<?php echo $row["dept_sname"]  ?>)</option>
                                                    <?php   }
                                                } else { ?>
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
                                            <label class="col-xl-8">Faculty Role</label>
                                            <select class="form-control form-control-solid selectpicker" name="ett_role" id="ett_role" data-style="btn-danger" data-size="4" required>
                                                <option value="">Choose an option</option>
                                                <option>HOD</option>
                                                <option>Faculty</option>
                                                <option>Staff</option>
                                            </select>
                                            <span class="form-text text-muted">
                                                Please select faculty type
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-8">
                                            <label>Faculty Name:</label>
                                            <input class="form-control form-control-solid" name="ett_name" type="text" id="ett_name" placeholder="Enter Faculty Name" required />
                                            <span class="form-text text-muted">
                                                Please enter faculty name
                                            </span>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Qualification:</label>
                                            <input class="form-control form-control-solid" name="ett_qua" type="text" id="ett_qua" placeholder="Enter Qualification" required />
                                            <span class="form-text text-muted">
                                                Please enter qualification
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
                                            <span class="form-text text-muted">Please enter faculty phone no</span>
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
                                            <span class="form-text text-muted">Please enter faculty email</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Username:</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-solid " name="ett_username" type="text" id="ett_username" placeholder="Enter faculty Username" required />
                                            </div>
                                            <span class="form-text text-muted">Please enter faculty Username</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Password:</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-solid " name="ett_password" type="password" id="ett_password" placeholder="Enter faculty Password" required />
                                            </div>
                                            <span class="form-text text-muted">Please enter faculty Password</span>
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
                                        <div class="col-xl-6">
                                            <label>Designation:</label>
                                            <input class="form-control form-control-solid" name="ett_des" type="text" id="ett_des" placeholder="Enter Faculty Designation" required />
                                            <span class="form-text text-muted">
                                                Please enter designation
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
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
                                                Please generate teacher passkey
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
                                            <span class="form-text text-muted">Please generate teacher token</span>
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
            <!--begin::Page Scripts(used by this page)-->
            <script src="../theme/plugins/custom/datatables/datatables.bundlec7e5.js"></script>
            <!--end::Page Scripts-->
            <script src="script.js"></script>
            <script type="text/javascript" language="javascript">
                $(document).ready(function() {
                    $('#add_department').click(function() {
                        $('#department_form')[0].reset();
                        $('.modal-title').text("Add Faculty");
                        $('#action').val("Add");
                        $('#operation').val("Add");
                        $('#teacher_uploaded_avatar').html('');
                    });
                    var t = $("#DepartmentData").DataTable({
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                            url: "emd_fetch.php",
                            dataType: "json",
                            type: "POST"
                        },
                        "columnDefs": [{
                            "target": [0, 1, 2, 3, 4, 5, 6, 7],
                            "orderable": true
                        }],
                        buttons: [
                            'print',
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ],
                        "pageLength": 10,
                        "responsive": true,
                    });

                    $("#export_print").on("click", function(e) {
                            e.preventDefault(), t.button(0).trigger()
                        }),
                        $("#export_copy").on("click", function(e) {
                            e.preventDefault(), t.button(1).trigger()
                        }),
                        $("#export_excel").on("click", function(e) {
                            e.preventDefault(), t.button(2).trigger()
                        }),
                        $("#export_csv").on("click", function(e) {
                            e.preventDefault(), t.button(3).trigger()
                        }),
                        $("#export_pdf").on("click", function(e) {
                            e.preventDefault(), t.button(4).trigger()
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

                    $(document).on('click', '.ett_edit', function() {
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
                                $('#DepartmentModel').modal('show');
                                $("#ett_password").prop("type", "text");
                                $("#ett_cpassword").prop("type", "text");
                                $(".teacher_action").prop("type", "hidden");
                                $(".alert").hide();
                                $('#ett_name').val(data.te_name);
                                $('#ett_sname').val(data.te_sname);
                                $('#ett_phone').val(data.te_phone);
                                $('#ett_email').val(data.te_email);
                                $('#ett_role').val(data.te_role).change();
                                $('#ett_dept').val(data.te_dept).change();
                                $('#ett_location').val(data.te_location);
                                $('#ett_des').val(data.te_des);
                                $('#ett_qua').val(data.te_qua);
                                $('#ett_username').val(data.te_username);
                                $('#ett_password').val(data.te_password);
                                $('#ett_cpassword').val(data.te_password);
                                $('#ett_passkey').val(data.te_passkey);
                                $('#ett_hash').val(data.te_token);
                                $('.modal-title').text("View Faculty Details");

                            }
                        })
                    });

                    $(document).on('click', '.ett_delete', function() {
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
                                        )
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
} else {
    Redirect::to(404);
}
?>