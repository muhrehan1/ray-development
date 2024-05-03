<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RJR Passports| Admin </title>
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/core/core.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>css/demo_1/style.css">
  <link rel="shortcut icon" href="https://staging.designinternal.com/dev/ray-development/uploads/settings/our12.png" />
</head>
<body >
	<div  class="main-wrapper">
		<div  class="page-wrapper full-page video-background">
		<video autoplay="" muted="" loop="">
            <source src="<?php echo base_url('assets/front/images/video.mp4');?>" type="video/mp4">
        </video>
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div style="width: 100%;background-repeat: no-repeat !important;background-size: cover !important;background-position:center !important;background: url(<?php echo base_url('assets/front/images/about-img.jpeg') ?>);" class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2"><span><?php echo $this->settings->title; ?></span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <span class="text-danger"><?php echo $this->session->flashdata('login'); ?></span>
                    <span style="color:green;"><?php echo $this->session->flashdata('recoversuccess'); ?></span>
                    
                    <form method="post" action="<?php echo base_url('admin'); ?>" class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="admin_email" required class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" required name="admin_password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" name="Remember" class="form-check-input">
                          Remember me
                        </label>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>
                        <a type="button" class="btn forgetPass btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          Forget Password
                        </a>
                      </div>
                    </form>
                    <div class="showForget" style="display: none;">
                      <div style="margin-top:20px;" class="form-group">
                        <label for="emailRecovery"><b>Enter your email to get recovery link</b></label>
                        <input type="email" required class="form-control" id="emailRecovery" placeholder="Email">
                      </div>
                      <button type="button" class="btn btn-primary RecoveryButton mr-2 mb-2 mb-md-0 text-white">Get Recovery Link</button>
                      <div class="HidMsg"></div>
                    </div>
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
