

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css">
		@media screen {
			@font-face {
				font-family: 'Lato';
				font-style: normal;
				font-weight: 400;
				src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
			}

			@font-face {
				font-family: 'Lato';
				font-style: normal;
				font-weight: 700;
				src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
			}

			@font-face {
				font-family: 'Lato';
				font-style: italic;
				font-weight: 400;
				src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
			}

			@font-face {
				font-family: 'Lato';
				font-style: italic;
				font-weight: 700;
				src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
			}
		}

		/* CLIENT-SPECIFIC STYLES */
		body,
		table,
		td,
		a {
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
		}

		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}

		img {
			-ms-interpolation-mode: bicubic;
		}

		/* RESET STYLES */
		img {
			border: 0;
			height: auto;
			line-height: 100%;
			outline: none;
			text-decoration: none;
		}

		table {
			border-collapse: collapse !important;
		}

		body {
			height: 100% !important;
			margin: 0 !important;
			padding: 0 !important;
			width: 100% !important;
		}

		/* iOS BLUE LINKS */
		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* MOBILE STYLES */
		@media screen and (max-width:600px) {
			h1 {
				font-size: 32px !important;
				line-height: 32px !important;
			}
		}

		/* ANDROID CENTER FIX */
		div[style*="margin: 16px 0;"] {
			margin: 0 !important;
		}
		.mainlogo {
			margin: 3px 0 20px 0;
		}

		.icons ul li {
			display: inline-block;
		}

		.footerend h3 {
			margin-bottom: 40px;
			color: #DDDDDD;
			font-size: 28px;
			font-weight: 400;
			font-family: Proxima Nova;
		}

		.footerend span {
			font-family: Proxima Nova;
		}

		.footerend .links-footer ul li i {
			color: #bea367;
			font-size: 16px;
			padding: 0 8px 0 0;
		}

		.footerend .links-footer ul li a {
			display: inline-flex;
			justify-content: center;
			align-items: center;
			padding: 0 0 0 0;
			font-weight: 400;
			font-size: 16px;
			letter-spacing: 1px;
			line-height: 20px;
			color: #fff;
			font-family: Proxima Nova;
		}

		.footerend .links-footer ul li a:hover {
			color: #A5823E;
		}

		.links-footer ul li {
			text-decoration: none;
			padding: 0 0 0 0;
		}

		.links-footer ul li a i {
			padding: 0 12px 22px 0px;
			font-size: 22px;
		}

		footer .link-send .footer-img img {
			width: 100%;
			height: 100%;
		}

		footer .link-send {
			text-align: center;
			position: relative;
			margin-bottom: 40px;
		}

		footer .link-send h5 {
			color: #ae803c;
			font-family: Proxima Nova;
			font-weight: 600;
			font-size: 15px;
			line-height: 1;
			padding: 11px 0 0 0px;
		}

		footer .link-send p {
			color: #fff;
		}

		footer .link-send span {
			font-family: Proxima Nova;
		}

		footer .lastest input {
			width: 100%;
			background-color: transparent;
			outline: none;
			border: solid 1px #777777;
			padding: 0 10px;
			color: #777777;
			font-size: 12PX;
			border-width: 2px 2px 2px 2px;
			height: 45px;
		}

		footer .lastest button {
			height: 45px;
			width: 100px;
			background-color: transparent;
			font-size: 16px;
			border-radius: 0px 0px 0px 0px;
			border-width: 2px 2px 2px 2px;
			border-style: solid;
			border: SOLID 1PX #A5823E;
			color: #A5823E;
			transition: .3s all ease-in-out;
		}

		footer .lastest button:hover {
			background-color: #A5823E;
			color: #fff;
		}

		footer .lastest p {
			margin: 0;
			font-size: 16px;
			font-weight: 400;
			text-align: center;
			color: #fff;
			line-height: 22px;
			/* padding: 18px 0 0 0; */
			font-family: Proxima Nova;
		}

		footer .lastest h5 {
			font-size: 15px;
			font-weight: 700;
			padding: 15px 0 0 0;
			color: #b97e39;
			text-align: center;
			letter-spacing: 4px;
		}

		footer .icons ul li:nth-child(1) a:hover {
			border-color: #3B5999;
			background-color: #3B5999;
			color: #fff;
		}

		footer .icons ul li:nth-child(2) a:hover {
			border-color: #00adef;
			background-color: #00adef;
			color: #fff;
		}

		footer .icons ul li:nth-child(3) a:hover {
			border-color: #0073b2;
			background-color: #0073b2;
			color: #fff;
		}

		footer .icons ul li:nth-child(4) a:hover {
			border-color: #cc0001;
			background-color: #cc0001;
			color: #fff
		}

		footer .icons ul li {
			margin: 0 20px 0 0px;
		}

		footer .icons ul li a {
			height: 39px;
			width: 39px;
			line-height: 39px;
			color: #FFFFFF99;
			border: 1px solid #FFFFFF33;
			display: block;
			text-align: center;
			border-radius: 50%;
			transition: .3s all ease-in-out;
			background-color: transparent;
		}

	</style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<!-- LOGO -->
	<tr>
		<td  align="center" style="padding: 0px 10px 0px 10px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
				<tr>
					<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 28px; font-weight: 400; letter-spacing: 4px; line-height: 48px; display: flex; align-items: center; justify-content: space-between;">
						<div style="display: flex; align-items: center; justify-content: left; width: 50%;">
							<img src="<?php echo base_url('uploads/settings/').$this->settings->header_logo; ?>" width="125" height="120" style="display: block; border: 0px;" /><span>Passpost</span>
						</div>
						<div>
							<a href="tel:1.800.783.8472" style="color: #000; font-size: 15px;">1.800.783.8472</a>
						</div>

					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
				<tr>
					<td bgcolor="#ffffff" align="left" style="display:flex; align-items: center;justify-content: center; height: 200px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; background: url('https://staging.designinternal.com/dev/ray-development/assets/front/images/AdobeStock_173050666.jpeg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
						<p style="margin: 0; font-size: 30px; font-family: 'lato';color: #fff; font-weight: 500;">Your Order has Been Received.</p>
					</td>
				</tr>
				<tr>
					<td bgcolor="#ffffff" align="left">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td bgcolor="#ffffff" align="left" style="padding: 50px 30px 50px 30px;">
									<h6 style="font-size: 22px; font-weight: 500; font-family: 'lato'; color: #000;">Dear, {<span style="color: red;">Recipient Name</span>}</h6>
									<p style="font-family: 'lato'; font-size: 18px; font-weight: 400; color: #000;">Thank you for previously placing your order with RJR Passports!</p>
									<p style="font-family: 'lato'; font-size: 18px; font-weight: 400; color: #000;">Your order has been received and is currently being reviewed.</p>
									<p style="font-family: 'lato'; font-size: 18px; font-weight: 400; color: #000;">After reviewing your documents, we will inform you in the event there are any problems associated with your order. Otherwise assume your order is being processed according to your original order with us.</p>
									<p style="font-family: 'lato'; font-size: 18px; font-weight: 400; color: #000;">If you have any additional questions regarding your order, please call us at 800.783.8472 (Allow link), and we will be happy to assist you.</p>
									<p style="font-family: 'lato'; font-size: 18px; font-weight: 400; color: #000;">Thank you,</p>
									<p style="font-family: 'lato'; font-size: 18px; font-weight: 400; color: #000;">RJR Passports</p>
								</td>
							</tr>
						</table>
					</td>
				</tr> <!-- COPY -->
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#f4f4f4" align="center" style="padding: 0;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
				<tr>
					<td align="center" style=" border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
						<div class="footerend" style="background-position: 100%;background-position: bottom center;background-repeat: no-repeat;background-size: cover;position: relative;padding: 47px 0 0 0;background-image: url('https://staging.designinternal.com/dev/ray-development/assets/front/images/footer-background.jpg')">
							<div class="container">
								<h2 style="color: #fff;font-size: 18px;font-weight: 600;text-transform: uppercase;letter-spacing: 3.6px;	line-height: 1.75;font-family: 'lato';margin: 0rem 0rem 20px 0rem;text-align: center;">contact- us</h2>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
										<div class="mainlogo">
											<img style="margin: 0 auto;
														display: block;
														width: 16%;
														height: auto;" src="https://staging.designinternal.com/dev/ray-development/assets/front/images/our1.png" class="img-fluid" alt="img">
										</div>

									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
										<div class="links-footer">
											<img src="https://staging.designinternal.com/dev/ray-development/assets/front/images/contact-icon.png" class="img-fluid" alt="img">
											<ul style="text-align: center;list-style: none;padding: 0;margin: 0;">
												<li>
													<a href="#" style="font-size: 21px;font-weight: 700;color: #969696;line-height: 17px;">
														<h5 style="text-transform: uppercase; margin: 0; font-family: 'lato'; padding-top: 10px;font-size: 12px;font-weight: 700;color: #fff;letter-spacing: 4px;-webkit-box-sizing: border-box;box-sizing: border-box;">Phone</h5>
													</a>
												</li>
												<ul>
													<li><i class="fas fa-phone-alt"></i> <a href="tel:+1-800-783-8472" style="font-size: 18px;font-weight: 700;color: #fff;line-height: 1;">(800) 783-8472</a></li>
												</ul>
											</ul>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
										<div class="link-send">
											<img src="https://staging.designinternal.com/dev/ray-development/assets/front/images/contact-icon.png" class="img-fluid" alt="img">
											<h5 style="font-family: 'lato';padding-top: 10px; font-size: 12px; color: #fff;">DALLAS CORPORATE ADDRESS</h5>
											<p style="font-size: 15px; color: #fff;">
												5301 Alpha Road, Suite 80-13 Dallas, TX 75240
											</p style="font-size: 15px; color: #fff;">
											<h5 style="font-family: 'lato'; font-size: 12px; color: #fff;">DENVER ADDRESS</h5>
											<p style="font-size: 15px; color: #fff;">
												44 Cook Street, Ste 100 Denver, CO 80206
											</p>


										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
										<div class="lastest">
											<img src="https://staging.designinternal.com/dev/ray-development/assets/front/images/contact-icon.png" class="img-fluid" alt="img">
											<h5 style="padding-top: 10px; font-size: 12px; color: #fff;">OFFICE HOURS</h5>
											<p style="font-size: 15px; color: #fff;">
												Monday- Friday <span>10:00 AM- 6:00 PM</span>
											</p>
											<p style="font-size: 15px; color: #fff;">
												Saturday (By Appointment Only)<span>11:00 AM- 3:00 PM</span>
											</p>

										</div>
									</div>
									<div class="condition" style="width: 100%;">
										<p style="padding: 10px 0 4px 0;color: #bea367;margin: 0;font-size: 14px;font-weight: 300;font-family: 'lato';font-style: italic;line-height: 30px;text-align: center;">
											Copyright © 1981-2023. RJRPASSPORTS. ALL RIGHT RESERVED.</p>
										<ul style="list-style: none;display: flex;align-items: center;justify-content: center; padding: 10px 0; border-top: 1px solid #000;">
											<li style="padding: 0 10px; width: 30%; float: left;margin: 0;"><a href="<?php echo base_url('privacy-policy');?>" style="color: #bea367;">Privacy Policy</a></li>
												<li style="padding: 0 10px; width: 30%; float: left;margin: 0;"><a href="<?php echo base_url('refund-policy');?>" style="color: #bea367;">Refund Policy</a></li>
												<li style="padding: 0 10px; width: 30%; float: right;margin: 0;"><a href="<?php echo base_url('terms-of-services');?>" style="color: #bea367;">Terms of Services</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>

</table>
</body>

</html>
