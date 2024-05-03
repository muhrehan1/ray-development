<style>
#minor-passport-btn-send {
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
    }

	.tag-line {
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
<section class="inner-banner package-banner" style="background-size: 100% 170% !important; background:  url(<?php echo base_url(); ?>/assets/front/images/AdobeStock_307099703.jpeg); ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                    <h2>Minor Passport Services</h2>
                </div>
            </div>
        </div>
        <div class="packages">
            <div class="container">
                <div class="row ">
                 	<?php
							foreach($minor_passport_packages as $key => $minor_passport_package):
							?>
                        <div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="passport-package">
                                <h4><?php echo $minor_passport_package->plan_name ; ?></h4>
                                <h6><?php echo $minor_passport_package->plan_processing_time;?></h6>
                                <p>Processing Weeks</p>
                                
								<form id="order-process" action="<?php echo base_url('checkout-process')?>" method="post">
									<input type="hidden" name="order_id" value="<?php echo $minor_passport_package->plans_id;?>">
									<input type="hidden" name="action" value="add">
									<input type="submit" class="submit-order" value="Order now">
								</form>
								
                                <h3><?php  $price = number_format( $minor_passport_package->plan_price, 2 ); echo '$'.$price ;?></h3>
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
                                    <h6>Children’s Application of a US Passport</h6>
                                    <h4>THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT:</h4>
                                    <ul>
                                        <li>Your Child is under the age of 16 on the actual date your passport is applied for,</li>
                                        <li>Your Child has never been issued a US passport,</li>
                                        <li>Your Child has had a passport issued but it has been lost and cannot locate it,</li>
                                        <li>or, Your Child has been issued a US Passport, but they were under the age of 16 when it was issued.</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Proof of Citizenship</h2>
                                <div class="slider-box-content">
                                    <h4>Submit one of the following as original proof of US Citizenship</h4>
                                    <h4>(NO Photocopies or notarized copies accepted):</h4>
                                    <ol>
                                        <li>Certified Original Copy of a State, City or County Birth Record. Must list applicant's and parent's full names with official registrar seal and signature. Click Here for specifics</li>
                                        <li>Any previously issued US Passport in fair condition regardless how long ago it was issued. Note: Passport must have been issued as a fully valid U.S. Passport (5 year for minors or 10 years for adults)</li>
                                        <li>Consular Report of Birth Abroad or Certification of Birth</li>
                                        <li>Original Certificate of Nationalization.</li>
                                        <li>Original Certificate of Citizenship.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Application Form</h2>
                                <div class="slider-box-content text-center">
                                    <p>Download complete but DO NOT SIGN the DS-11 US Passport Application.</p>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Photo Requirements</h2>
                                <div class="slider-box-content text-center">
                                    <p>Submit ONE recently taken passport type or size photograph.<strong> Do not submit pictures with eyewear (glasses), headwear, jewelry, or with anything objects in the background, as they will not be accepted.</strong> Passport Photo <strong>MUST</strong> have a completley <strong>blank white background,</strong> without any other shades or tints (i.e. dark gray, tan, off-white). See below for proper sizing and examples of well composed photos.</p>
                                    <p>Click Here for a description of the State Department requirements on passport photos.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Letter of Authorization</h2>
                                <div class="slider-box-content text-center">
                                    <p>Download complete and DO SIGN the Letter of Authorization Form(s). This form allows our company to expedite your passport and represent you at the State Department respecting your application form. Choose the first TWO boxes only and check them. The 3rd box indicates you want us to represent you but would rather the State Department deal directly with you when there are problems.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Personal Identification</h2>
                                <div class="slider-box-content text-center">
                                    <p>Personal Identification of Parents e.g. Drivers License etc. For a full list of acceptable documents Click Here</p>
                                    <p><strong>Note:</strong> The following rules apply to Parents and their minor children when applying for a US Passport:</p>
                                    <ol>
                                        <li>If the Child is under the age of 18 the Child must have at least one parent apply with them</li>
                                        <li>If the Child is under the age of 16 the Child must have BOTH parents apply with them.</li>
                                        <li>If Child is under the age of 16 and BOTH parents cannot be present then a State Department Form DS-3053 must accompany the application process. The DS-3053 must be filled out carefully and it also must be notarized. You must also submit a clear and legible copy of the front and back sides of the Driver’s License (or other form of acceptable I.D.) of the parent giving permission on the DS-3053.</li>
                                        <li>If either Parent is deceased the other parent must submit an original Death Certificate with the passport application.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>US Government Filing Fee</h2>
                                <div class="slider-box-content text-center">
                                    <p>This is the fee the State Department charges you when they issue your passport. You are issuing your passport quickly so their fee is higher than normal. The Standard fee for an adult expedited passport is $165.00. This fee includes a witnessing fee of $25 to be given directly to the witnessing agent. Our service fee is additional to the government fee.</p>
                                    <p>The State Department will not accept Personal or Business issued checks that are starter checks and they will only accept checks from the applicant or family member, or from business checks with affiliation to applicant. The Check must have the <strong>account holders full name and address</strong> and the <strong>applicant's full name and date of birth.</strong></p>
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
                                    <h6>OR</h6>
                                    <p>A signed Letter on Letterhead from your Employer or your Travel Agent addressed to the US State Department confirming your departure date and International Destination. Again it must state your passport name.</p>
                                    <a class="offer-visa" href="#">DO YOU NEED A VISA TO TRAVEL TO YOUR DESTINATION?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                      <button type="button" id="minor-passport-btn" class="btn email-requirements" data-toggle="modal" data-target="#emailRequirements">
						email requirments
						</button>
                    <a class="print-requirements" href="<?php echo base_url('requirements/d567668a0052f8070f6b6568d8e0cc6b.pdf');?>" target="_blank">print requirements</a>
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
								<a href="javascript:void(0);" id="minor-passport-btn-send">Send</a>
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
	jQuery('#minor-passport-btn-send').click(function (e) {
		e.preventDefault();
		var get_email =  $('#email').val();
		var send_email_data = {
			admin_email:get_email,
		};
		$.ajax({
			url: '<?php echo base_url('send-email-minor-passport');?>',
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
		$("#minor-passport-btn").click(function(){
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
