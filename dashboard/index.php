<?php
require_once 'core/init.php';
require_once 'function.php';
require_once 'includes/db.php';
$user = new User(); //Current
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

	<title>Dashboard | KIOT@EMS</title>
	<meta charset="utf-8">
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
	<link href="theme/css/pages/login/login-1c7e5.css?v=7.1.5" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)
    <link href="theme/plugins/custom/prismjs/prismjs.bundlec7e5.css?v=7.1.5" rel="stylesheet" type="text/css" />
    -->
	<link href="theme/plugins/global/plugins.bundlec7e5.min.css" rel="stylesheet" type="text/css" />

	<link href="theme/css/style.bundlec7e5.min.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="theme/media/logos/favicon.ico" />


</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed mr-4">

	<!--begin::Main-->
	<?php
	if ($user->isLoggedIn()) { ?>
		<?php require_once('aside.php'); ?>
		<!--begin::Wrapper-->
		<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
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
									<li class="menu-item menu-item-active" aria-haspopup="true">
										<a href="index.php" class="menu-link">
											<span class="menu-text">Dashboard</span>
										</a>
									</li>
									<li class="menu-item" aria-haspopup="true">
										<a href="em_department/index.php" class="menu-link">
											<span class="menu-text">Department</span>
										</a>
									</li>								
									<li class="menu-item" aria-haspopup="true">
										<a href="em_faculty/index.php" class="menu-link">
											<span class="menu-text">Faculty</span>
										</a>
									</li>
									<li class="menu-item" aria-haspopup="true">
										<a href="em_student/index.php" class="menu-link">
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
				<!--begin::Entry-->
				<div class="d-flex flex-column-fluid">
					<!--begin::Container-->
					<div class="container-fluid">
						<!--begin::Dashboard-->						
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
							<div class="alert-text font-size-h3 font-weight-bold">Recently Added Department </div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<button class="btn btn-info font-weight-bolder" data-toggle="modal" data-target="#DepartmentModel" id="add_departments">
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
									</span>New Department
								</button>
								<!--end::Button-->
							</div>
						</div>

						<div class="row">
							<div class="col-xl-4">
								<div class="card card-custom card-stretch bg-light-danger gutter-b">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label font-weight-bolder text-dark">Recently Added Departments</span>
											<span class="text-muted mt-3 font-weight-bold font-size-sm">More Than <?php echo $user->department_count() ?> Department</span>
										</h3>										
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-8">
										<?php 
											$query = "SELECT * FROM em_department WHERE dept_status = :_status ORDER BY dept_id DESC LIMIT 6";
											$statement = $connect->prepare($query);
											$statement->execute(array(
												':_status' => 'Active'
											));
											if($statement->rowCount()){
												foreach($statement->fetchAll() as $row){
										?>
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-10">
												<!--begin::Symbol-->
												<div class="symbol symbol-60 symbol-light-primary mr-5">
													<?php if($row["dept_image"]){ ?>														
															<img src="data:image/png;base64,<?php echo base64_encode($row["dept_image"]) ?>" class="h-50 align-self-center" alt="<?php echo $row["dept_name"] ?>">
													<?php	}else{ ?>
																<span class="symbol-label"><?php echo $row["dept_sname"] ?></span>
													<?php	} ?>
													
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column font-weight-bold">
													<a href="em_department/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row["dept_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark text-hover-primary mb-1 font-size-lg"><?php echo $row["dept_name"] ?></a>
													<span class="text-muted"><i class="fa fa-clock text-danger fa-1x mr-2"></i><?php echo time_difference($row["dept_created_at"]) ?></span>
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
										$query = "SELECT * FROM em_department WHERE dept_status = :_status ORDER BY dept_id DESC LIMIT 4";
										$statement = $connect->prepare($query);
										$statement->execute(array(
											':_status' => 'Active'
										));
										if($statement->rowCount()){
											foreach($statement->fetchAll() as $row){
									?>
									<div class="col-xl-6">
										<div class="card card-custom gutter-b">
											<!--begin::Card body-->
											<div class="card-body">
												<div class="d-flex flex-wrap align-items-center py-1">
													<!--begin::Pic-->
													<div class="symbol symbol-80 symbol-light-success mr-5 flex-shrink-0">
														<?php if($row["dept_image"]){ ?>														
																<img src="data:image/png;base64,<?php echo base64_encode($row["dept_image"]) ?>" class="h-50 align-self-center" alt="<?php echo $row["dept_name"] ?>">
														<?php	}else{ ?>
																	<span class="symbol-label"><?php echo $row["dept_sname"] ?></span>
														<?php	} ?>
														
													</div>
													<!--end::Pic-->
													<!--begin::Title-->
													<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
														<a href="em_department/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row["dept_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark text-hover-primary mb-1 font-size-lg font-weight-bolder"><?php echo $row["dept_name"] ?></a>
														<span class="text-muted font-weight-bold font-size-sm mb-1"><i class="fa fa-1x fa-clock mr-1"></i> <?php echo time_difference($row["dept_created_at"]) ?></span>
														<div class="text-muted font-size-lg">
															<span class="label label-inline label-danger"><?php echo $row["dept_sname"] ?></span>
															<span class="label label-inline label-primary"><i class="fa fa-1x fa-at mr-1"></i><?php echo $row["dept_username"] ?></span>
														</div>
																												
														
													</div>
													<!--end::Title-->
													<!--begin::Stats-->
													<div class="d-flex flex-column w-100 mt-12">
														<div class="text-dark mr-2 font-size-lg font-weight-bolder pb-3">
															Students
															<span class='float-right label label-inline label-danger'><?php echo $user->dept_student_count($row["dept_passkey"]) ?> /100</span>
														</div>
														
														<div class="progress w-100">
															<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $user->dept_student_count($row["dept_passkey"]) ?>%;" aria-valuenow="<?php echo $user->dept_student_count($row["dept_passkey"]) ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $user->dept_student_count($row["dept_passkey"]) ?>%</div>
														</div>
													</div>
													<!--end::Stats-->
													<!--begin::Team-->
													<div class="d-flex flex-column w-100 mt-10">														
														<div class="text-dark mr-2 font-size-lg font-weight-bolder pb-3">
															Faculty's
															<span class='float-right label label-inline label-primary'><?php echo $user->dept_faculty_count($row["dept_passkey"]) ?> /100</span>
														</div>
														<div class="symbol-list d-flex flex-wrap ml-1">
															<?php 
																$query = "SELECT * FROM em_faculty WHERE fac_dept_hash = :_hash AND fac_status = :_status ORDER BY RAND() LIMIT 8";
																$statement = $connect->prepare($query);
																$statement->execute(array(
																	':_status' => 'Active',
																	':_hash' => $row["dept_passkey"]
																));
																if($statement->rowCount()){
																	foreach($statement->fetchAll() as $rows){
																
															?>
															<!--begin::Pic-->
															<a href="em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$rows["fac_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="symbol symbol-40 mr-3">
																<?php if($rows["fac_image"]){ ?>														
																		<img src="data:image/png;base64,<?php echo base64_encode($rows["fac_image"]) ?>" class="h-50 align-self-center" alt="<?php echo $rows["fac_name"] ?>">
																<?php	}else{ ?>
																			<span class="symbol-label"><?php echo $rows["fac_name"] ?></span>
																<?php	} ?>
																
															</a>
															<!--end::Pic-->	
															<?php
																	}
																}
															?>													
														</div>
													</div>
													<!--end::Team-->
												</div>
											</div>
											<!--end::Body-->
										</div>
									</div>
									<?php
											}
										}
									?>
								</div>
							</div>
						</div>

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
								<div class="card card-custom card-stretch bg-light-warning gutter-b">
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
											$query = "SELECT * FROM em_faculty WHERE fac_status = :_status ORDER BY fac_id DESC LIMIT 7";
											$statement = $connect->prepare($query);
											$statement->execute(array(
												':_status' => 'Active'
											));
											if($statement->rowCount()){
												foreach($statement->fetchAll() as $row){
										?>
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-10">
												<!--begin::Symbol-->
												<div class="symbol symbol-60 symbol-light-primary mr-5">
													<?php if($row["fac_image"]){ ?>														
															<img src="data:image/png;base64,<?php echo base64_encode($row["fac_image"]) ?>" class="h-50 align-self-center" alt="<?php echo $row["fac_name"] ?>">
													<?php	}else{ ?>
																<span class="symbol-label"><?php echo $row["fac_name"] ?></span>
													<?php	} ?>
													
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column font-weight-bold">
													<a href="em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row["fac_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark text-hover-primary mb-1 font-size-lg"><?php echo $row["fac_name"] ?></a>
													<span class="text-muted"><i class="fa fa-1x fa-clock text-warning mr-2"></i><?php echo time_difference($row["fac_created_at"]) ?></span>
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
										$fac = $db->get('em_faculty',array('fac_status','=','Active'));
										if($fac->count()){
											$i = 0;
											foreach($fac->results() as $row){ $i++; 
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
															</div>
														<?php }else{ ?> 
															<div class="symbol symbol-circle symbol-100">
																<div class="symbol-label font-size-auto"><?php echo description($row->fac_name) ?></div>
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
													<a href="em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-danger font-weight-bolder font-size-sm py-3 px-14">View Profile</a>
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

						<!--begin::Row-->
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
							<div class="col-xl-4">
								<div class="card card-custom card-stretch bg-light-primary gutter-b">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label font-weight-bolder text-dark">Recently Added Student's</span>
											<span class="text-muted mt-3 font-weight-bold font-size-sm">More Than <?php echo $user->student_count() ?> Student</span>
										</h3>										
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-8">
										<?php 
											$query = "SELECT * FROM em_students WHERE fac_status = :_status ORDER BY fac_id DESC LIMIT 7";
											$statement = $connect->prepare($query);
											$statement->execute(array(
												':_status' => 'Active'
											));
											if($statement->rowCount()){
												foreach($statement->fetchAll() as $row){
										?>
											<!--begin::Item-->
											<div class="d-flex align-items-center mb-10">
												<!--begin::Symbol-->
												<div class="symbol symbol-60 symbol-light-primary mr-5">
													<?php if($row["fac_image"]){ ?>														
															<img src="data:image/png;base64,<?php echo base64_encode($row["fac_image"]) ?>" class="h-50 align-self-center" alt="<?php echo $row["fac_name"] ?>">
													<?php	}else{ ?>
																<span class="symbol-label"><?php echo $row["fac_name"] ?></span>
													<?php	} ?>
													
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column font-weight-bold">
													<a href="em_student/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$rows["fac_passkey"]) ?>&&em_admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark text-hover-primary mb-1 font-size-lg"><?php echo $row["fac_name"] ?></a>
													<span class="text-muted"><?php echo $row["fac_created_at"] ?></span>
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
										$fac = $db->get('em_students',array('fac_status','=','Active'));
										if($fac->count()){
											$i = 0;
											foreach($fac->results() as $row){ $i++; 
									?>
									<div class="col-lg-6">                                            
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
													<div class="d-flex flex-center">
														<a href="../../em_student/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">View Profile</a>
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
							</div>
						</div>
						<!--end::Row-->

						
						<!--begin::Advance Table: Widget 7-->
						<div class="card card-custom gutter-b">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label font-weight-bolder text-dark">Recently Added Faculty</span>
									<span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
								</h3>
								<div class="card-toolbar">
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
										</span>New Faculty
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
											$fac = $db->get('em_faculty',array('fac_status','=','Active'));
											if($fac->count()){
												foreach($fac->results() as $row){ ?>
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
													<a href="em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg"><?php echo $row->fac_name ?></a>
													<span class="text-muted font-weight-bold d-block mt-1 mb-1"><?php echo $row->fac_email ?></span>
													<span class="text-muted font-weight-bold d-block"><?php echo $row->fac_phone ?></span>
												</td>
												<td class="text-right pr-0">
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $row->fac_designation ?></span>
													<span class="text-muted font-weight-bold"><?php echo $row->fac_qualification ?></span>
												</td>
												<td class="text-right pr-0">
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $row->fac_department ?></span>
													<span class="text-muted font-weight-bold"><?php echo $row->fac_role ?></span>
												</td>
												<td class="text-right pr-0">
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $row->fac_address ?></span>
													<span class="text-muted font-weight-bold"><?php echo $row->fac_created_at ?></span>
												</td>                                                            
												<td class="text-right">
													<span class="label label-lg label-light-danger label-inline"><?php echo $row->fac_status ?></span>
												</td>
												<td class="pr-0 text-right">
													<a href="../../em_faculty/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_passkey) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
													<button type="button" id="<?php echo convert_string('decrypt',$row->fac_hash) ?>" class="ett_edit btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
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
													<button type="button" id="<?php echo convert_string('decrypt',$row->fac_hash) ?>" data-status="<?php echo $row->fac_status ?>" class="ett_delete btn btn-icon btn-light btn-hover-primary btn-sm">
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
											$fac = $db->get('em_students',array('fac_status','=','Active'));
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
													<a href="em_student/profile/index.php?emd_department_hash=<?php echo convert_string('decrypt',$row->fac_hash) ?>&&admin=<?php echo convert_string('decrypt',$user->data()->passkey) ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
						<!--end::Dashboard-->
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
											<select class="form-control selectpicker" id="ett_dept" name="ett_dept" data-style="btn-danger">
												<option value="<?php echo escape(convert_string('decrypt', $data->dept_passkey)) ?>"><?php echo $data->dept_name ?>(<?php echo $data->dept_sname ?>)</option>
												<?php
												$query = "SELECT * FROM em_department WHERE dept_passkey != :pass";
												$statement = $connect->prepare($query);
												$statement->execute(array(
													':pass' => $data->dept_passkey
												));
												if ($statement->rowCount() > 0) {
													$result = $statement->fetchAll();
													foreach ($result as $row) {
												?>
														<option value="<?php echo escape(convert_string('decrypt', $row["dept_passkey"])) ?>"><?php echo $row["dept_name"] ?>(<?php echo $row["dept_sname"] ?>)</option>
												<?php
													}
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

			<!-- Modal-->
			<div class="modal fade" id="DepartmentModels" tabindex="-1" role="dialog" aria-labelledby="DepartmentModelLabels" aria-hidden="true">
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
							<form class="form" id="department_forms" method="post" enctype="multipart/form-data">
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
											<select class="form-control form-control-solid selectpicker" name="ett_dept" id="ett_depts" data-style="btn-primary" data-size="4" required>
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
											<select class="form-control form-control-solid selectpicker" name="ett_mentor" id="ett_mentors" data-style="btn-danger" data-size="4" required>
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
											<select class="form-control form-control-solid selectpicker" name="ett_year" id="ett_years" data-style="btn-info" data-size="4" required>
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
											<input class="form-control form-control-solid" name="ett_name" type="text" id="ett_names" placeholder="Enter Name" required />
											<span class="form-text text-muted">
												Please enter student name
											</span>
										</div>
										<div class="col-xl-4">
											<label>Gender:</label>
											<select class="form-control form-control-solid selectpicker" name="ett_gen" id="ett_gens" data-style="btn-warning" data-size="4" required>
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
												<input type="text" class="form-control form-control-solid" name="ett_phone" id="ett_phones" placeholder="Enter Phone No" required />
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
												<input type="text" class="form-control form-control-solid " name="ett_email" id="ett_emails" placeholder="Enter Student E-Mail Address" required />
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
												<input class="form-control form-control-solid " name="ett_username" type="text" id="ett_usernames" placeholder="Enter student Username" required />
											</div>
											<span class="form-text text-muted">Please enter student Username</span>
										</div>
										<div class="col-lg-4">
											<label>Password:</label>
											<div class="input-group">
												<input class="form-control form-control-solid " name="ett_password" type="password" id="ett_passwords" placeholder="Enter student Password" required />
											</div>
											<span class="form-text text-muted">Please enter student Password</span>
										</div>
										<div class="col-lg-4">
											<label>Confirm Password:</label>
											<div class="input-group">
												<input class="form-control form-control-solid " name="ett_cpassword" type="password" id="ett_cpasswords" placeholder="Confirm Password" required />
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
											<input class="form-control form-control-solid" name="ett_roll" type="text" id="ett_rolls" placeholder="Roll/Reg No" required />
											<span class="form-text text-muted">
												Please enter you rollno or regno
											</span>
										</div>
										<div class="col-xl-4">
											<label>Location:</label>
											<input class="form-control form-control-solid" name="ett_location" type="text" id="ett_locations" placeholder="Enter Address" required />
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
													<button class="btn btn-primary" type="button" id="gen_passkeys" name="gen_passkey" title="Generate Passkey"><i class="flaticon-refresh"></i></button>
												</div>
												<input class="form-control form-control-solid form-control-lg" name="ett_passkey" type="text" id="ett_passkeys" required />

											</div>
											<span class="form-text text-muted">
												Please generate student passkey
											</span>
										</div>
										<div class="col-lg-6">
											<label>Token:</label>
											<div class="input-group">
												<div class="input-group-append">
													<button class="btn btn-primary" type="button" id="gen_tokens" name="gen_token" title="Generate Token!"><i class="flaticon-refresh"></i></button>
												</div>
												<input class="form-control form-control-solid form-control-lg" name="ett_hash" type="text" id="ett_hashs" required />

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
											<input type="hidden" name="ett_id" id="ett_ids" />
											<input type="hidden" name="operation" id="operations" />
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

			<!--end::Page Scripts-->

		<?php } else { ?>
			<!--begin::loginModel-->
			<!--begin::Main-->
			<div class="d-flex flex-column flex-root">
				<!--begin::Login-->
				<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
					<!--begin::Aside-->
					<div class="login-aside d-flex flex-column flex-row-auto">
						<!--begin::Aside Top-->
						<div class="d-flex  flex-column-auto flex-column">
							<!--begin::Aside header-->
							<a href="#" class="text-center mb-10">
								<img src="" class="mt-20 max-h-70px" alt="" />
							</a>
							<!--end::Aside header-->
							<!--begin::Aside title-->
							<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
							</h3>
							<!--end::Aside title-->
						</div>
						<!--end::Aside Top-->
						<!--begin::Aside Bottom-->
						<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(theme/media/svg/login-visual-5.svg)"></div>
						<!--end::Aside Bottom-->
					</div>
					<!--begin::Aside-->
					<!--begin::Content-->
					<div class="login-content flex-row-fluid d-flex flex-column justify-content-between position-relative overflow-hidden p-2 mx-auto">
						<!--begin::Content body-->
						<div class="d-flex flex-column-fluid flex-center">
							<!--begin::Signin-->
							<div class="login-form login-signin">
								<!--begin::Form-->
								<form class="form" method="post" novalidate="novalidate" id="kt_login_signin_form">
									<!--begin::Title-->
									<div class="pb-13 pt-lg-0 pt-5">
										<h3 class="font-weight-bolder text-dark font-size-h3-lg">Welcome to KIOT@EMS</h3>
										<span class="text-muted font-weight-bold font-size-h4">New Here?
											<a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span>
									</div>
									<!--begin::Title-->
									<!--begin::Form group-->
									<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Email/Username</label>
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="user_username" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
											<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
											<a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>
										</div>
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="user_password" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<label class="checkbox mb-0">
											<input type="checkbox" name="agree" />
											<span></span>
											<div class="ml-2">Remember me.</div>
										</label>
									</div>
									<!--end::Form group-->
									<!--begin::Action-->
									<div class="pb-lg-0 pb-5">
										<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
										<input type="hidden" name="login_action" id="login_action" value="login_action" />
										<button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
										<button type="button" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:/metronictheme/html/demo4/dist/assets/media/svg/social-icons/google.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
													<path d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z" fill="#4285F4" />
													<path d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z" fill="#34A853" />
													<path d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z" fill="#FBBC05" />
													<path d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z" fill="#EB4335" />
												</svg>
												<!--end::Svg Icon-->
											</span>Sign in with Google</button>
									</div>
									<!--end::Action-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Signin-->
							<!--begin::Signup-->
							<div class="login-form login-signup">
								<!--begin::Form-->
								<form class="form" method="post" novalidate="novalidate" id="kt_login_signup_form" autocomplete="off">
									<!--begin::Title-->
									<div class="pb-13 pt-lg-0 pt-5">
										<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
										<p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
									</div>
									<!--end::Title-->
									<!--begin::Form group-->
									<div class="form-group">
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" placeholder="Fullname" name="fullname" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<label class="checkbox mb-0">
											<input type="checkbox" name="agree" />
											<span></span>
											<div class="ml-2">I Agree the
												<a href="#">terms and conditions</a>.
											</div>
										</label>
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
										<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
										<input type="hidden" name="passkey" value="<?php echo Hash::unique(); ?>">
										<input type="hidden" id="signup_action" name="signup_action" value="signup_action">
										<button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
										<button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
									</div>
									<!--end::Form group-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Signup-->
							<!--begin::Forgot-->
							<div class="login-form login-forgot">
								<!--begin::Form-->
								<form class="form" novalidate="novalidate" method="post" id="kt_login_forgot_form">
									<!--begin::Title-->
									<div class="pb-13 pt-lg-0 pt-5">
										<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
										<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
									</div>
									<!--end::Title-->
									<!--begin::Form group-->
									<div class="form-group">
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group d-flex flex-wrap pb-lg-0">
										<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
										<input type="hidden" name="passkey" value="<?php echo Hash::unique(); ?>">
										<input type="hidden" id="forgot_action" name="forgot_action" value="forgot_action">
										<button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
										<button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
									</div>
									<!--end::Form group-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Forgot-->
						</div>
						<!--end::Content body-->
						<!--begin::Content footer-->
						<div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="font-weight-bold font-weight-bold mr-2">2020©</span>
								<a href="" target="_blank" class="text-dark-75 text-hover-primary">Enhanced Teaching</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark order-1 order-md-2">
								<a href="#" target="_blank" class="nav-link pr-3 pl-0">Privacy</a>
								<a href="#" target="_blank" class="nav-link px-3">About</a>
								<a href="#" target="_blank" class="nav-link pl-3 pr-0">Contact</a>
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Content footer-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Login-->
			</div>
			<!--end::Main-->
			<!--End::loginModel-->
		<?php }
		?>

</body>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#8950FC",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="theme/plugins/global/plugins.bundlec7e5.min.js"></script>
<!---->
<script src="theme/plugins/custom/prismjs/prismjs.bundlec7e5.js"></script>

<script src="theme/js/pages/widgetsc7e5.js"></script>

<script src="theme/js/scripts.bundlec7e5.min.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="login/login-generalc7e5.js?v=7.1.5"></script>
<!--end::Page Vendors-->

<!--end::Page Scripts-->
<script>
	$(document).ready(function() {
		$(document).on('click', '.resend_ver', function() {
			var ets_id = $(this).attr("id");
			var operation = "mail";
			$.ajax({
				url: "user_signup.php",
				method: "POST",
				data: {
					ets_id: ets_id,
					operation: operation
				},
				dataType: "json",
				success: function(data) {
					if (data.error != '') {
						swal.fire({
							position: "top-right",
							icon: "error",
							title: data.error,
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						swal.fire({
							position: "top-right",
							icon: "success",
							title: data.message,
							showConfirmButton: false,
							timer: 1500
						});
					}

				}
			});
		});
	});
</script>

</html>