<style>
#get_email_lost_passport {
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
<section class="inner-banner package-banner" style=" background: url(<?php echo base_url(); ?>/assets/front/images/Kak-vernutsya-v-Rossiyu-esli-za-granitsey-uteryan-pasport.jpg); ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                    <h2>Lost Passport Services</h2>
                </div>
            </div>
        </div>
        <div class="packages">
            <div class="container">
                <div class="row ">

					<?php
					foreach($lost_passport_packages as $key => $lost_passport_package):
						?>
						<div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
							<div class="passport-package">
								<h4><?php echo $lost_passport_package->plan_name ; ?></h4>
								<h6><?php echo $lost_passport_package->plan_processing_time;?></h6>
								<p>Processing Weeks</p>
								
								<form id="order-process" action="<?php echo base_url('checkout-process')?>" method="post">
									<input type="hidden" name="order_id" value="<?php echo $lost_passport_package->plans_id;?>">
									<input type="hidden" name="action" value="add">
									<input type="submit" class="submit-order" value="Order now">
								</form>
								
								<h3><?php  $price = number_format( $lost_passport_package->plan_price, 2 ); echo '$'.$price ;?></h3>
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
                                    <h6>First Time Application of a US Passport</h6>
                                    <h4>ONE OF MORE OF THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT:</h4>
                                    <ul>
                                        <li>You have never previously been issued a US passport.</li>
                                        <li>You have had a passport issued, but it is lost or stolen, and you cannot locate it.</li>
                                        <li>You have previously been issued a US Passport but were under the age of 16 when it was issued.</li>
                                        <li>Your most recent passport was issued over 15 years ago.</li>
                                        <li>Your existing passport was mutilated or somehow destroyed (washing machine etc.), but you still have it, or it remains in your possession.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Proof of Citizenship</h2>
                                <div class="slider-box-content">
                                    <h4>Submit one of the following as original proof of US Citizenship</h4>
                                    <h6>(NO Photocopies or notarized copies accepted, and no Hospital Records):</h6>
                                    <ol>
                                        <li>Certified Original Copy of a State, City or County Birth Record. Must list applicant's and parent's full names with official registrar seal and signature. <a href="javascript:;" class="hyperlink" data-link="https://travel.state.gov/content/travel/en/passports/how-apply/citizenship-evidence.html">click here</a> for specifics</li>
                                        <li>Any previously issued US Passport is in fair condition regardless of how long ago it was issued. Note: Passport must have been issued as a fully valid U.S. Passport (5 year for minors or 10 years for adults)</li>
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
                                <div class="slider-box-content">
                                    <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">download</a> complete but <strong style="text-decoration: underline">DO NOT SIGN</strong> the <a href="javascript:;" class="hyperlink" data-link="https://pptform.state.gov/?Submit2=Complete+Online+%26+Print">DS-11</a> US Passport Application as well as <a href="javascript:;" class="hyperlink" data-link="https://eforms.state.gov/Forms/ds64.pdf">DS-64</a> form.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Lost or Stolen Passport Statement</h2>
                                <div class="slider-box-content">
                                    <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">download</a> complete and <strong style="text-decoration: underline">DO SIGN</strong> the Statement Regarding a Lost or Stolen US Passport application form <a href="javascript:;" class="hyperlink" data-link="">DS-64</a></p>
                                <h4>Note: </h4>
                                <p>There is no real position the government takes on what kind of information they expect to have reported on this form, aside from answering the questions clearly, honestly, and accurately. Often people would say “well if I knew where my passport was, it wouldn’t be lost”. It is a good point, however, what they are trying to determine here is if there has been any inappropriate activity such as fraud or other criminal behavior or just negligence on the part of the passport holder or parent, or more importantly whether it can be located. So, it is best to just explain as much information as you possibly can to help them to determine if you might be able to find it, or - if it is lost - is it in the hands of the wrong person.</p>
                                </div>
                            </div>
                        </div>
                          <div>
                            <div class="slider-box">
                                <h2>Photo Requirements</h2>
                                <div class="slider-box-content">
                                    <p>Submit ONE recently taken passport type or size photograph. <strong>Do not submit pictures with eyewear (glasses), headwear, jewelry, or with any objects in the background, as they will not be accepted.</strong> Passport Photo <strong>MUST</strong> have a completely <strong>blank white background,</strong> without any other shades or tints (i.e. dark gray, tan, off-white). See below for proper sizing and examples of well composed photos.</p>
                                    <p><a href="javascript:;" class="hyperlink" data-link="https://travel.state.gov/content/travel/en/passports/how-apply/photos.html">Click here</a> for a description of the State Department requirements on passport photos.</p>
                                </div>
                            </div>
                        </div>
                          <div>
                            <div class="slider-box">
                                <h2>Letter of Authorization</h2>
                                <div class="slider-box-content">
                                    <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">Download</a> complete and DO SIGN the Letter of Authorization Form(s). This form allows our company to expedite your passport and represent you at the State Department respecting your application form. Choose the first TWO boxes only and check them. The 3rd box indicates you want us to represent you but would rather the State Department deal directly with you when there are problems.</p>
                                </div>
                            </div>
                        </div>
                         <div>
                            <div class="slider-box">
                                <h2>Personal Identification</h2>
                                <div class="slider-box-content">
                                    <p><a href="javascript:;" class="hyperlink" data-link="">Submit ONE</a> of the following</p>
                                     <ul>
                                        <li>Previously issued, undamaged U.S. passport</li>
                                        <li>Certificate of Naturalization or Citizenship</li>
                                        <li>Fully valid Driver's License</li>
                                        <li>Current Government Employee ID (city, state or federal)</li>
                                        <li>Current Military ID (military and dependents)</li>
                                    </ul>
                                    <h4>Notes:</h4>
                                    <ul>
                                        <li>If you cannot submit primary identification, please <a href="javascript:;" class="hyperlink" data-link="https://travel.state.gov/content/travel/en/passports/how-apply/identification.html">click here</a> for acceptable forms of secondary identification</li>
                                        <li>If you apply at an Acceptance Facility and submit out-of-state primary identification, you must present an additional ID document, as well. For example, if you apply in Maryland with a Virginia Driver's License, you must present a second ID containing as much of the following information as possible: your photo, full name, date of birth and the document issuance date.</li>
                                        <li>If you have undergone or are going through gender transition, please <a href="javascript:;" class="hyperlink" data-link="https://travel.state.gov/content/travel/en/passports/need-passport/selecting-your-gender-marker.html">click here</a> for additional requirements.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            <div>
                            <div class="slider-box">
                                <h2>US Government Filing Fee</h2>
                                <div class="slider-box-content text-center">
                                    <p>This is the fee the State Department charges you when they issue your passport. You are issuing your passport quickly, so their fee is higher than normal. The Standard fee for an adult expedited passport is $190.00. In addition, there is a fee paid to the witnessing facility for witnessing your form, and this fee is a separate $35.00, to be paid directly to the witnessing agent. <span style="color: rgb(68,114,196); font-weight: 700">Our service fee is additional to the government fee.</span></p>
                                    <p>The State Department will not accept Personal, or Business issued checks that are starter checks, and they will only accept checks from the applicant or family member, or from business checks with affiliation to applicant. The Check must have the <strong>account holders full name and address and phone number printed on the check,</strong> and the <strong>applicant's full name and date of birth should be written in the memo field.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Proof of Departure</h2>
                                <div class="slider-box-content text-center">
                                    <p><strong>The US State Department </strong> requests that you provide with your application proof of your upcoming departure date. Please include this with your application.</p>
                                    <p>(If you don’t have confirmation of your trip yet, please let us know in advance)</p>
                                  <h4>EXAMPLES:</h4>
                                 <p>Print-out of online booking reservations from an airline reservations system or travel agency. It must have your name and international destination and departure date on it</p>
                                 <h4>OR</h4>
                                 <p>A signed Letter on Letterhead from your Employer or your Travel Agent addressed to the US State Department confirming your departure date and International Destination. Again, it must state your passport name.</p>
                                 <a class="offer-visa" href="#" tabindex="0">DO YOU NEED A VISA TO TRAVEL TO YOUR DESTINATION?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <button type="button" id="myBtn_lost" class="btn email-requirements" data-toggle="modal" data-target="#emailRequirements">
						email requirments
						</button>
                    <a class="print-requirements" href="<?php echo base_url('requirements/9cce24fe67d0787efccee9dd113b4223.pdf')?>" target="_blank">print requirements</a>

					<!-- The Modal -->
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
								<a href="javascript:void(0);" id="get_email_lost_passport">Send</a>
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
	jQuery('#get_email_lost_passport').click(function (e) {
		e.preventDefault();
		var get_email =  $('#email').val();
		var send_email_data = {
			admin_email:get_email,
		};
		$.ajax({
			url: '<?php echo base_url('send-email-lost-passport');?>',
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
		$("#myBtn_lost").click(function(){
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
