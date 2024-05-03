<style>
.signup-btn {
	height: 55px;
	line-height: 55px;
	color: #a5823e;
	border: 2px solid #a5823e;
	font-family: Proxima Nova;
	font-weight: 600;
	font-size: 14px;
	background-color: #fff;
	letter-spacing: 0.35px;
	text-transform: uppercase;
	text-align: center;
	display: block;
	width: 100%;
	transition: .3s all ease-in-out;
	margin: 0 auto;
}
</style>
<div class="about-us">
	<section class="inner-banner">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
					<h2>Register</h2>
				</div>
			</div>
		</div>
	</section>
</div>
<section class="login">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
				<form action="javascript:;">
					<div class="row">
						<div class="login-box">
						<div class="col-lg-12 input_wrap">
							
							<input name="user_name" type="text" placeholder="Name" >
							<div style="color:#de002e" style="display:none" class="validation-error user_name_error" ></div>
						</div>
						<div class="col-lg-12 input_wrap">
							
							<input type="email" name="user_email" placeholder="Email" >
							<div style="color:#de002e" style="display:none" class="validation-error user_email_error"></div>
						</div>
						<div class="col-lg-12 input_wrap">
						
							<input type="number" name="contact_number" placeholder="Phone" >
							<div style="color:#de002e" style="display:none" class="validation-error contact_number_error"></div>
						</div>

						<div class="col-lg-12 input_wrap" >
							
							<input type="password" name="user_pass" placeholder="Password" >
							<div style="color:#de002e" style="display:none" class="validation-error user_pass_error"></div>
						</div>
						<div class="col-lg-12 input_wrap">
						
							<input type="password" name="confirm_password" placeholder="Confirm Password" >
							<div style="color:#de002e" style="display:none" class="validation-error confirm_password_error"></div>
						</div>
						<div class="col-lg-12" id="sign-up">
							<input type="submit" class="signup-btn" value="sign up">
						</div>
						<div class="haveacc">
							<p>Already Have An Account? <a href="<?php echo base_url('login')?>">Login</a></p>
						</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".signup-btn").click(function(e){
				e.preventDefault();
				var aurl='<?php echo base_url('sign-up');?>';
				var str = $("form").serializeArray();
				console.log(str);

				$.ajax({
					url: aurl,
					type:'POST',
					dataType: "json",
					data: str,
					success: function(data) {
						console.log(data);
						if(data.user_name !== '')
						{
							$(".user_name_error").css('display','block');
							$(".user_name_error").html(data.user_name);
						}
						if(data.user_email !== '')
						{
							$(".user_email_error").css('display','block');
							$(".user_email_error").html(data.user_email);
						}
						if(data.contact_number !== '')
						{
							$(".contact_number_error").css('display','block');
							$(".contact_number_error").html(data.contact_number);
						}
						if(data.user_pass !== '')
						{
							$(".user_pass_error").css('display','block');
							$(".user_pass_error").html(data.user_pass);
						}
						if(data.confirm_password !== '')
						{
							$(".confirm_password_error").css('display','block');
							$(".confirm_password_error").html(data.confirm_password);
						}

						if(data.type=='success')
						{
							Swal.fire({
								title: 'Success!',
								text: 'User Registrated Successfully',
								icon: 'success',
								confirmButtonText: 'OK'
							}).then(function(){
								window.location = "<?php echo base_url('login')?>";
							});
						}

					}
				});


			});


		});


	</script>
</section>
