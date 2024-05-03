<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Profile Update</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Admin profile update</h4>
					<span class="alert-success"><?php echo $this->session->flashdata('profileupdatesuccess'); ?></span>
					<span class="alert-danger"><?php echo $this->session->flashdata('profileupdatefail'); ?></span>
					<form class="cmxform" id="signupForm" method="post" action="<?php echo base_url('admin-update-profile');?>" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<label for="name">Name</label>
								<input id="name" value="<?php echo $admin->admin_name ?>" required class="form-control" name="admin_name" type="text">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" value="<?php echo $admin->admin_email ?>" required class="form-control" name="admin_email" type="email">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input id="password" value="<?php echo $this->encryption->decrypt($admin->admin_password); ?>" required class="form-control" name="admin_password" type="password">
							</div>

							<div class="form-group">
								<label for="password">Admin Profile Picture | Previous image &nbsp; </label>
								<a href="javascript:;" class="color popover-dismiss" data-toggle="popover" data-trigger="" title="" data-content="<img src='<?php echo base_url('uploads/admin/').$admin->admin_image; ?>' />" tabindex="0">
								<img style="width:40px;" src="<?php echo base_url('uploads/admin/').$admin->admin_image; ?>">
							</a>

							<div class=" stretch-card">
								<div class="card">
									<div class="card-body">
										<h6 class="card-title"></h6>
										<input type="hidden" value="<?php echo $admin->admin_image ?>" name="admin_image">
										<input type="file" name="admin_image" value="" id="myDropify" class="border myDropify"/>
									</div>
								</div>
							</div>
						</div>

						<input class="btn btn-primary" type="submit" value="Submit">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</div>