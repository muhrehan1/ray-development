<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $this->settings->title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/core/core.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>css/demo_1/style.css">
  <link rel="shortcut icon" href="<?php echo base_url('assets/admin/')?>images/favicon.png" />
</head>
<body >
	<div  class="main-wrapper">
		<div style="background: url(<?php echo base_url('assets/admin/login-back.jpg') ?>);" class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div style="width: 100%;background-repeat: no-repeat !important;background-size: cover !important;background-position:center !important;background: url(<?php echo base_url('assets/admin/login.jpg') ?>);" class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2"><span><?php echo $this->settings->title; ?></span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome Admin! Update your password to recover your account.</h5>
                    <span class="text-danger"><?php echo $this->session->flashdata('login'); ?></span>
                    <form method="post" action="<?php echo base_url('password-recovery/').$this->uri->segment(2); ?>" class="forms-sample">
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" required name="new_password" class="form-control valid validate-equalTo-blur" id="passwo" autocomplete="current-password" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input type="password" required name="confirm_password" class="form-control" id="exampleInputPassword2" autocomplete="current-password" placeholder="Password">
                      </div>
         
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Update Password</button>
                      </div>
                      <span class="text-danger"><?php echo $this->session->flashdata('password'); ?></span>
                    </form>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="<?php echo base_url('assets/admin/')?>vendors/core/core.js"></script>
  <script src="<?php echo base_url('assets/admin/')?>vendors/feather-icons/feather.min.js"></script>
  <script src="<?php echo base_url('assets/admin/')?>js/template.js"></script>
  <script>
    $('.forgetPass').on('click',function(){
      $('.showForget').show(1000);
    });
    $('.RecoveryButton').on('click',function(){
      var useremail = $('#emailRecovery').val();
      $.ajax({
        url: '<?php echo base_url("get-recovery-link") ?>',
        type: 'post',
        data: {
          admin_email:useremail,
        },
        success: function(data){       
         if(data == 1){ $('.HidMsg').html('<b style="color:green;">Recovery link has been sent to your email.</b>');}
         else if(data == 2){$('.HidMsg').html('<b style="color:red;">Invalid email address</b>');}
         else if(data == 3){$('.HidMsg').html('<b style="color:red;">Provided email address does not exists</b>');}
         else if(data == 3){$('.HidMsg').html('<b style="color:red;">Something went wrong</b>');}
       }
     });
    });
  </script>
</body>
</html>