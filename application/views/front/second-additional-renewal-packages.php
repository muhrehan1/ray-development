<style>
#second-additiaonal-renewal-btn_send {
    background: #C9B474;
    color: #fff;
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
    .order-btn{
           display: flex;
    justify-content: center;
    width: 60%;
    margin: 0 auto;
    background: #a5823e;
    border-color: #a5823e;
    color:#fff;
    }.tag-line {
		 text-align: center;
		 font-size: 16px;
		 text-transform: capitalize;
		 letter-spacing: 1px;
		 margin-bottom: 15px;
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
		margin: 10px 50px 50px;
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
		max-width: 70%;
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
<section class="inner-banner package-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                    <h2>2ND PASSPORT RENEWAL OPTIONS Services</h2>


                </div>
            </div>
        </div>
        <div class="packages">
            <div class="container">
                   <div class="row ">
							<?php
							foreach($packages as $key => $package):
							?>
                        <div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="passport-package">
                                <h4><?php echo $package->plan_name ; ?></h4>
                                <h6><?php echo $package->plan_processing_time;?></h6>
                                <p>Processing Weeks</p>
                               
								<form id="order-process" action="<?php echo base_url('checkout-process')?>" method="post">
									<input type="hidden" name="order_id" value="<?php echo $package->plans_id;?>">
									<input type="hidden" name="action" value="add">
									<input type="submit" class="submit-order" value="Order now">
								</form>
							
                                <h3><?php  $price = number_format( $package->plan_price, 2 ); echo '$'.$price ;?></h3>
                                <p>Service Fee</p>
                            </div>
                        </div>
						<?php endforeach ;?>
                    </div>
            </div>
        </div>
    </section>
    <section class="package-detail">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8">
                    <h2>Requirements</h2>
                    <div class="slider-of-info">
                        <div>
                            <div class="slider-box">
                                <h2>Passport Application Qualifications</h2>
                                <div class="slider-box-content">
                                    <h6>Additional or 2nd US Passport Renewal</h6>
                                    <p><strong>Note:</strong> It is <u>not</u> commonly known that the U.S. State Department issues to qualified applicants 2nd or additional U.S. passports. They are legally issued under specific circumstances by the Federal government. Normally they are issued for the following two reasons:</p>
                                    <ol>
                                        <li>Applicant is traveling to countries having known diplomatic conflict with each other such as Israel and Saudi Arabia. If you have an Israeli embarkation stamp in your current passport you cannot obtain nor apply for a Saudi Arabian visa.</li>
                                        <li>Applicant is traveling abroad so frequently and to countries which require visas that they are unable to meet deadlines. An example of this would be traveling to China departing in 3-4 days and returning 10 days later, then departing to Russia 3 days after returning from China; this itinerary wouldn’t allow for a person to travel and get visas within the allotted time they have.</li>
                                    </ol>
                                    <p>The State Department allows the issuance of the 2nd passport when evidence of such a travel conflict is stated and proven. This is achieved through formal requests and fight reservations showing travel intentions.</p>
                                    <p><strong>Description:</strong> The following must be true in order for you to use this method of obtaining a 2ND or Additional US Passport:</p>
                                    <ol>
                                        <li>You are in possession of a previously issued full term (10 year) US Passport in fair condition which still has at least 1 or 2 years remaining validity, or</li>
                                        <li>You are in possession of a previously issued 2nd or limited US passport expired or still valid and this passport was issued not greater than 5 years ago.</li>
                                        <li>You were at least 16 years of age when this passport was issued.</li>
                                        <li>This passport was issued less than 15 years ago.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Submit Your Most Curent Passport</h2>
                                <div class="slider-box-content">
                                    <p>Submit your most current US Passport as Described Above. <i>Copies are not acceptable</i></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Application Form</h2>
                                <div class="slider-box-content text-center">
                                    <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">Download</a> complete and sign the US Passport Application DS-82. Be sure to complete all fields and make sure you date your form</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>2nd Passport Request Form</h2>
                                <div class="slider-box-content text-center">
                                    <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">Download</a> complete and sign the State Department Letter form. This form is a formal request for a 2nd passport which is required by the US State Department.</p>
                                    <p>If your request for a 2nd passport is being made for <strong>business</strong> purposes, submit a formal request on letterhead from your company to the State Dept. Follow this format:</p>
                                    <ol>
                                        <li>Must be on official Letterhead of the company requesting the 2nd passport to be issued in your behalf.</li>
                                        <li>Address the letter to the US State Department, Passport Services (no address required).</li>
                                        <li>Have the company formally request that the State Department grant or issue you a 2nd passport and explain the circumstances.</li>
                                        <li>Make sure to be specific respecting dates and international destinations and if you do or do not need visas to these destinations.</li>
                                        <li>Signed by appropriate company representative.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Photo Requirements</h2>
                                <div class="slider-box-content text-center">
                                    <p>Submit ONE recently taken passport type or size photograph. <strong>Do not submit pictures with eyewear (glasses), headwear, jewelry, or with any objects in the background, as they will not be accepted.</strong> Passport Photo <strong>MUST</strong> have a completely <strong>blank white background</strong>, without any other shades or tints (i.e. dark gray, tan, off-white). See below for proper sizing and examples of well composed photos.</p>
                                    <p>Click Here for a description of the State Department requirements on passport photos.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Letter of Authorization</h2>
                                <div class="slider-box-content text-center">
                                    <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">Download</a> complete and DO SIGN the Letter of Authorization Form(s). This form allows our company to expedite your passport and represent you at the State Department respecting your application form. Choose the first TWO boxes only and check them. The 3rd box indicates you want us to represent you but would rather the State Department deal directly with you when there are problems.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Proof of Departure</h2>
                                <div class="slider-box-content text-center">
                                    <p><strong>The US State Department</strong> requests that you provide with your application proof of your upcoming departure date. Please include this with your application.</p>
                                    <p>(If you don’t have confirmation of your trip yet please let us know in advance)</p>
                                    <h4>EXAMPLES:</h4>
                                    <p>Print-out of online booking reservations from an airline reservations system or travel agency. It must have your name and International destination and departure date on it</p>
                                    <h4>OR</h4>
                                    <p>A signed Letter on Letterhead from your Employer or your Travel Agent addressed to the US State Department confirming your departure date and International Destination. Again it must state your passport name.</p>
                                    <a class="offer-visa" href="travel-visas.php">DO YOU NEED A VISA TO TRAVEL TO YOUR DESTINATION?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                      <button type="button" id="second-additiaonal-renewal-btn" class="btn email-requirements" data-toggle="modal" data-target="#emailRequirements">
						email requirments
						</button>
                    <a class="print-requirements" href="<?php echo base_url('requirements/State-Dept-Form-2nd-Passport-2024-for-website.pdf')?>" target="_blank">print requirements</a>
					<div id="myModal" class="modal">

						<!-- Modal content -->
						<div class="modal-content">
							<span class="close">&times;</span>
							<div class="mail-icon">
								<img src="<?php echo base_url('assets/front/images/mail-icon.jpg') ;?>" alt="mail icon">
							</div>
							<h4>Email Requirements</h4>
							<p class="tag-line">Get all requirments through email!</p>
							<div class="email-field">
								<input placeholder="Your Email" id="email" type="email">
								<a href="javascript:void(0);" id="second-additiaonal-renewal-btn_send">Send</a>
							</div>
							<div class="email-field" style="display:none;" id="response"></div>
						</div>

					</div>
                </div>
            </div>
        </div>
    </section>
     <section class="simple-process">
        <div class="container">
            <div class="simple-process-content">
                <h2>Simple passport process</h2>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card-process">
                            <div class="img-process">
                                <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-1.png');?>" />
                            </div>
                            <div class="content-process">
                                <h4>Apply Online</h4>
                                <p>Choose the processing time for your passport and place your order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card-process">
                            <div class="img-process">
                                <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-2.png');?>" />
                            </div>
                            <div class="content-process">
                                <h4>Receive detailed checklist and easy to follow procedures</h4>
                                <p>Once your order is placed you will get a detailed checklist and easy to follow
                                    procedures</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card-process">
                            <div class="img-process">
                                <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-3.png');?>" />
                            </div>
                            <div class="content-process">
                                <h4> Hand-carry your passport request into a State Department Passport Agency for
                                    issuance</h4>
                                <p>Upon receipt of your passport packet, RJR Passport will hand carry your application
                                    for your passport into a Federal Passport Agency and have issued quickly</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card-process">
                            <div class="img-process">
                                <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-4.png');?>" />
                            </div>
                            <div class="content-process">
                                <h4>Deliver New Passport using FedEx</h4>
                                <p>Once issued, we will ship your passport FedEx directly to the address you specify on
                                    your order</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	jQuery('#second-additiaonal-renewal-btn_send').click(function (e) {
		e.preventDefault();
		var get_email =  $('#email').val();
		var send_email_data = {
			admin_email:get_email,
		};
		$.ajax({
			url: '<?php echo base_url('send-email-additional-renewal');?>',
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
		$("#second-additiaonal-renewal-btn").click(function(){
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
