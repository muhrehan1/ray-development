<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $this->settings->title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/core/core.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>/css/demo_1/style.css">
	<link rel="shortcut icon" href="<?php echo base_url('uploads/settings/').$this->settings->fav_icon;?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/select2/select2.min.css">
	<script src="<?php echo base_url('assets/admin/')?>vendors/core/core.js"></script>
	

</head>
<body>
	<div class="main-wrapper">
		<?php $this->load->view('admin/inc/side-nav'); ?>
		<div class="page-wrapper">	
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">

					<ul class="navbar-nav">

						<div id="google_translate_element"></div>
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo base_url('uploads/admin/').$this->session->userdata('admin_image')?>" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="<?php echo base_url('uploads/admin/').$this->session->userdata('admin_image')?>" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0"><?php echo $this->session->userdata('admin_name'); ?></p>
										<p class="email text-muted mb-3"><?php echo $this->session->userdata('admin_email'); ?></p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">

										<li class="nav-item">
											<a href="<?php echo base_url('admin-update-profile'); ?>" class="nav-link">
												<i data-feather="edit"></i>
												<span>Edit Profile</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url('admin-logout'); ?>" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->
