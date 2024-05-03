<style>
#data-correction-btn_send {
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
<section class="inner-banner package-banner"  style=" background: url(<?php echo base_url(); ?>/assets/front/images/how-to-change-your-name-on-your-passport-1701937446.jpg); ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                    <h2>Name Change or correction options Services</h2>
                </div>
            </div>
        </div>
        <div class="packages">
            <div class="container">
               <div class="row">
                <?php foreach ($packages as $key => $package): ?>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="passport-package">
                            <h4><?php echo $package->plan_name; ?></h4>
                            <h6><?php echo $package->plan_processing_time; ?></h6>
                            <p>Processing Weeks</p>
                           
                                <form id="order-process" action="<?php echo base_url('checkout-process') ?>" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $package->plans_id; ?>">
                                    <input type="hidden" name="action" value="add">
                                    <input type="submit" class="submit-order" value="Order now">
                                </form>
                           
                            <h3><?php $price = number_format($package->plan_price, 2);
                                echo '$' . $price; ?></h3>
                            <p>Service Fee</p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                                    <h6>Name Change or Data Correction</h6>
                                    <h4>THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT:</h4>
                                    <ul>
                                        <li>You are in possession of a previously issued US Passport and it is in fair condition.</li>
                                        <li>You were at least 16 years of age when this passport was issued.</li>
                                        <li>This passport was issued less than 15 years ago.</li>
                                        <li>You have Legally changed your name or gender e.g. marriage, divorce, court order etc.</li>
                                        <li>The current passport you are in possession of was issued with errors. (i.e. your name was misspelled or your date of birth is wrong etc and you need to correct it).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Submit Your Most Current Passport</h2>
                                <div class="slider-box-content">
                                    <p>Submit your most current US Passport. Copies are not acceptable</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-box">
                                <h2>Application Form</h2>
                                <div class="slider-box-content text-center">
                                    <p>Download complete and sign the US Passport Application DS-82. Be sure to complete all fields and make sure you date your form</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="slider-box">
                                <h2>Photo Requirements</h2>
                                <div class="slider-box-content text-center">
                                    <p>Submit ONE recently taken passport type or size photograph. <strong>Do not submit pictures with eyewear (glasses), headwear, jewelry, or with any objects in the background, as they will not be accepted.</strong> Passport Photo <strong>MUST</strong> have a completely <strong>blank white background,</strong> without any other shades or tints (i.e. dark gray, tan, off-white). See below for proper sizing and examples of well composed photos.</p>
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
                                <h2>Proof of Departure</h2>
                                <div class="slider-box-content text-center">
                                    <h6>The US State Department </h6>
                                    <p>requests that you provide with your application proof of your upcoming departure date. Please include this with your application.</p>
                                    <p>(If you don’t have confirmation of your trip yet please let us know in advance)</p>
                                    <h6>EXAMPLES:</h6>
                                    <p>Print-out of online booking reservations from an airline reservations system or travel agency. It must have your name and International destination and departure date on it</p>
                                    <h6>OR</h6>
                                    <p>A signed Letter on Letterhead from your Employer or your Travel Agent addressed to the US State Department confirming your departure date and International Destination. Again it must state your passport name.</p>
                                    <a class="offer-visa" href="#">DO YOU NEED A VISA TO TRAVEL TO YOUR DESTINATION?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    	<button type="button" id="data-correction-btn" class="btn  btn email-requirements" data-bs-toggle="modal" >
                              email requirments
                            </button>
                
                    <a class="print-requirements" href="<?php echo base_url('requirements/8cafb42b14b1e46964bb6caf3ae3d195.pdf');?>" target="_blank">print requirements</a>
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
								<a href="javascript:void(0);" id="data-correction-btn_send">Send</a>
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
	jQuery('#data-correction-btn_send').click(function (e) {
		e.preventDefault();
		var get_email =  $('#email').val();
		var send_email_data = {
			admin_email:get_email,
		};
		$.ajax({
			url: '<?php echo base_url('send-email-data-correction-passport');?>',
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
		$("#data-correction-btn").click(function(){
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
