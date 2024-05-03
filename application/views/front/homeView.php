<style>
	.tag-line {
		text-align: center;
		font-size: 16px;
		text-transform: capitalize;
		letter-spacing: 1px;
		margin-bottom: 15px;
	}
#ask-email-send {
    background: #C9B474;
    color: #fff;
      align-content: center;
}
	div#response {
    margin-top: 20px;
    background: #A5823E;
    padding: 10px;
    color: #fff;
    border-radius: 10px;
   
}

div#response:before {
    content: '\f058';
    font-family: 'Font Awesome 5 Free';
    margin-right: 10px;
}
    	.email-field input {
		background-color: #ebebeb;
	}
	.email-field * {
		display: block;
		padding: 12px 25px;
		margin: 0 7px;
		border-radius: 30px;
		border: 2px solid transparent;
		outline: none;
		font-size: 14px;
	}
	.modal-content .email-field {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 10px 30px 20px;
    }
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		padding-top: 60px; /* Location of the modal */
	}
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto; /* 15% from the top and centered */
		padding: 20px;
		border: 1px solid #888;
		width: 500px; /* Could be more or less, depending on screen size */
		box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
		border-radius: 15px;
	}

	.modal-content  h4 {
		text-align: center;
		color: #c7a543;
		font-size: 24px;
		margin-bottom: 10px;
	}


	.mail-icon img {
        display: block;
        max-width: 35%;
        margin: 0 auto;
    }
	.close {
		color: #aaa;
		float: left;
		font-size: 28px;
		font-weight: bold;
	}
	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}
</style>
<section class="sec-slick sec-home-banner">

    <!-- <div class="multiple-items ">
  <div><img src="images/our.jpg" class="img-fluid" alt="img"></div>
  <div><img src="images/our2.jpg" class="img-fluid" alt="img"></div>
  <div><img src="images/our3.jpg" class="img-fluid" alt="img"></div>
  <div><img src="images/our4.jpeg" class="img-fluid" alt="img"></div>
 
</div> -->
    <video autoplay="" muted="" loop="">
            <source src="<?php echo base_url('assets/front/images/video.mp4');?>" type="video/mp4">
        </video>
    <div class="content-banner">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="content-head-set">
                    <div class="img-content-24-hour">
                        <img src="<?php echo base_url('assets/front/images/24_Hour_Passports_LOGO.png');?>" class="img-fluid" alt="img">
                    </div>
                    <div class="content-img-center-type">
                        <h2><?php echo $home_setting->hompage_settings_banner_main_heading;?></h2>
                         <!-- EXPEDITED PASSPORTS AND VISAS -->
                        <p><?php echo $home_setting->hompage_settings_banner_sub_heading;?></p>
                        <!-- TRUSTED REGISTERED GOVERNMENT COURIER FOR OVER 40 YEARS -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="passport-sec">
        <div class="container">
            <div class="passport-sec-tabs">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Expedited-->
                            <!--            Visas</button>-->
                            <!--</li>-->
                            <li class="nav-item" role="presentation">
                                <a href="<?php echo base_url('get-passport') ;?>">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="<?php echo base_url('get-passport') ;?>" type="button" role="tab" aria-controls="profile" aria-selected="false">Expedited Passports</button>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <h2>Apply for a Travel Visa:</h2>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                                        <div class="layout">
                                            <h4>Citezen OF</h4>

                                            <select class="country-select" name="country"></select>

                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                                        <div class="layout">
                                            <h4>Traveling to</h4>

                                            <select class="country-select" name="country"></select>

                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                                        <div class="layout">
                                            <h4>Purpose</h4>

                                            <input type="text" name="purpose" placeholder="Type Purpose Here">

                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                                        <div class="layout">
                                            <h4>RESIDING IN</h4>

                                            <select class="country-select" name="country"></select>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h2><?php echo $home_setting->hompage_settings_banner_second_heading;?></h2>
                                <div class="d-flex justify-content-center">
                                    <a href="<?php echo $home_setting->hompage_settings_banner_anchor_link;?>"><?php echo $home_setting->hompage_settings_banner_anchor_text;?></a>

                                    <!--    <div class="button-go"><button><i class="fas fa-plane-departure"></i></button></div> -->
                                </div>
                                <div class="banner-heading">
                                    <h2><?php echo $home_setting->hompage_settings_banner_heading_after_button?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--New Section Added-->

		<section class="grid_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12">
						<h2>Get Your Passport or Visa in 5 Easy Steps</h2>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 ">
						<div class="box_cont">
							<span class="count">01</span>
						<div class="d-flex align-content-center">
							<img src="assets/front/images/map.png" alt="">
							<h4>Place your order</h4>
						</div>
						<p>Select your Service Passport Visa or <br>Both.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 ">
					<div class="box_cont">
							<span class="count">02</span>
						<div class="d-flex align-content-center">
							<img src="assets/front/images/process.png" alt="">
							<h4>Application process
							and submission to
							RJR</h4>
						</div>
						<p>You are assigned a Personal Assistant who
							will contact you after your order is placed,
							and be with you throughout the process,
						including preparation.</p>
					</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 ">
						<div class="box_cont">
							<span class="count">03</span>
						<div class="d-flex align-content-center">
							<img src="assets/front/images/shopping.png" alt="">
							<h4>RJR Delivers your application to the Government for submission</h4>
						</div>
						<p>Our Certified State Department Employees
							hand-carry your application into the
						government for issuance within 3 days.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="box_cont">
							<span class="count">04</span>
						<div class="d-flex align-content-center">
							<img src="assets/front/images/problem.png" alt="">
							<h4>RJR Picks up in-person
							issued Passports</h4>
						</div>
						<p>RJR picks up your issued passport and
							related documents from the government
						office we dropped off at.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 ">
						<div class="box_cont">
							<span class="count">05</span>
						<div class="d-flex align-content-center">
							<img src="assets/front/images/deliver.png" alt="">
							<h4>Documents
							delivered</h4>
						</div>
						<p>RJR ships your documents immediately
						using FedEx courier services.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="cont_sec_pass">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<img class="about-img" src="assets/front/images/about-img.jpeg" alt="">
					</div>
					<div class="col-lg-6 col-sm-12">
						<h2>Why use RJR Passports and Visas to get my passport faster?</h2>
						<p>Our company has been Registered by the US Department of State Since
							1981, to not only speed up the period of time your passport is issue in, but
							our company provides full phone, text and email support in completion
							of your forms and explanation of procedures which can be confusing
							and intimidating if you are not familiar with the way our government
						does passports.</p>
						<div class="theme_btn">
							<a href="<?php echo base_url('about-us');?>">About Us</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="post_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<p>The passports we process are all
							issued within 3 days of when we
							hand deliver your application to
						the Government.</p>
					</div>
					<div class="col-lg-9 col-sm-12">
						<div class="table_row row">
							<div class="col-lg-4 blank"></div>
							<div class="col-lg-4 grey"><span>Post Office</span></div>
							<div class="col-lg-4 golden"><strong>RJR*</strong><span>Always Expedited</span></div>
						</div>
						<div class="table_row row">
							<div class="col-lg-4">Routine Service</div>
							<div class="col-lg-4">approx. 4-6 weeks</div>
							<div class="col-lg-4 golden">8-10 business days</div>
						</div>
						<div class="table_row row">
							<div class="col-lg-4">Expedited Service</div>
							<div class="col-lg-4">3 weeks door-to-door</div>
							<div class="col-lg-4 golden">As little as 1 day</div>
						</div>
						<div class="table_row row justify-content-end">
							<div class="col-lg-4">
								<div class="blk_btn">
									<a href="<?php echo base_url('get-passport');?>">Get started With My Passport</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<section class="call-to-action">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-12 col-sm-12 col-lg-9 col-xl-9 col-xxl-9">
                <h3>Need help navigating the visa process? Our team is here to assist you every step of the way. Whether you're unsure about which visa type suits your needs, need guidance on documentation, or have questions about the application process, we've got you covered. Get contacted now for expert assistance!</h3>
               
                <p>We will do all we can to return your inquiry within 24 hours. You may also call our Toll Free number, we are open from 8:00am EST to 8pm CST 800 783-8472</p>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                <a id="ask-email" href="javascript:void(0);">Get Contacted</a>
                	<div id="myModal" class="modal">

						<!-- Modal content -->
						<div class="modal-content">
							<span class="close">&times;</span>
							<div class="mail-icon">
								<img src="<?php echo base_url('assets/front/images/mail-icon.jpg') ;?>" alt="mail icon">
							</div>
								<div class="email-field">
								<input placeholder="Enter your name" id="customer_name" type="text">
							
							</div>
								<div class="email-field">
								<input placeholder="Enter your phone" id="phone" type="number">
							
							</div>
							<div class="email-field">
								<input placeholder="Enter your email" id="email" type="text">
							
							</div>
								<div class="email-field">
							
								<a href="javascript:void(0);" id="ask-email-send">Send</a>
							</div>
								<div class="email-field" style="display:none;" id="response"></div>
						</div>

					</div>
            </div>
        </div>
    </div>
</section>

        <section class="who-we-are">
          
        </section>
<section class="counter-sec">
    <div class="container-fluid">
        <div class="our-satisfied-counts">
            <div class="counter-container">
                <div class="counter" data-target="41">41</div>
                <span>Business Year</span>
            </div>
            <div class="counter-container">
                <div class="counter" data-target="50">All 50 US States</div>
                <span>NATIONWIDE SERVICE</span>
            </div>
            <div class="counter-container">
                <div class="counter" data-target="100000">100,000</div>
                <span>PASSPORTS AND VISAS ISSUED</span>
            </div>

            <div class="counter-container">
                <div class="counter" data-target="43000">43,000</div>
                <span>Satisfied Clients</span>
            </div>
        </div>
    </div>
</section>
<section class="experties">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-sm-12 col-lg-7 col-xl-7 col-xxl-7">
                <div class="box-here-expert">
                    <h4><?php echo $home_setting->hompage_settings_third_section_first_heading;?></h4>
                    <h2><?php echo $home_setting->hompage_settings_third_section_second_heading;?></h2>
                    <p><?php echo $home_setting->hompage_settings_third_section_second_heading_text;?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testi-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                <h6>TESTIMONIAL</h6>
                <h3>Our Client reviews</h3>
                <div class="single-item">
                     <?php 
        if (!empty($client_reviews)):
            foreach ($client_reviews as $key => $client_review):
        ?>
                <div>
    <div class="test-reviews">
       
            <img src="<?php echo base_url('uploads/reviews/') . $client_review->reviews_image; ?>" class="img-fluid" alt="img">
            <p><?php echo $client_review->reviews_text; ?></p>
            <h4><?php echo $client_review->reviews_customer_name; ?></h4>
            <h5>Customer</h5>
      
    </div>
      
</div>
<?php 
            endforeach;
        endif;
        ?>
   </div>
        </div>
    </div>
</div>
</section>
<section class="call-to-action">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-12 col-sm-12 col-lg-9 col-xl-9 col-xxl-9">
                <h3><?php echo $home_setting->hompage_settings_footer_main_heading;?></h3>
                <p><?php echo $home_setting->hompage_settings_footer_main_heading_text;?>
                </p>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                <a href="<?php echo $home_setting->hompage_settings_footer_anchor_link;?>"><?php echo $home_setting->hompage_settings_footer_anchor_text;?></a>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	jQuery('#ask-email-send').click(function (e) {
		e.preventDefault();
            var customer_name =  $('#customer_name').val();
            var phone =  $('#phone').val();
            var get_email =  $('#email').val();
		
		var send_email_data = {
			customer_name:customer_name,
			phone:phone,
			get_email:get_email
		};
		$.ajax({
			url: '<?php echo base_url('visa-ask-email');?>',
			method: 'post',
			data: send_email_data,
			dataType: 'json',
			success: function (response) {

							$('#response').show();
              $('#response').text(response.message);
            setTimeout(function() {
                $('#response').hide();
            }, 3000); // 2000 milliseconds = 2 seconds
			},
			error: function (error) {
				console.error("Error in  AJAX request:", error);
			}
		});
	});
</script>
<script>
	$(document).ready(function(){
		// When the button is clicked, open the modal
		$("#ask-email").click(function(){
			$("#myModal").css("display", "block");
		});

		// When the user clicks on <span> (x), close the modal
		$(".close").click(function(){
			$("#myModal").css("display", "none");
		});

		// When the user clicks anywhere outside of the modal, close it
		$(window).click(function(event) {
			if (event.target == $("#myModal")[0]) {
				$("#myModal").css("display", "none");
			}
		});
	});
</script>
