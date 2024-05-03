<style>
    .order-btn{
           display: flex;
    justify-content: center;
    width: 60%;
    margin: 0 auto;
    background: #a5823e;
    border-color: #a5823e;
    color:#fff;
    }   
    
    a#get_email {
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
</style>
  <section class="inner-banner package-banner" style="background-repeat: no-repeat !important;
    background-position: 100% 100% !important;
    background-size: cover !important;
    padding: 300px 0 200px;
    position: relative;
    z-index: 1; background: url(<?php echo base_url(); ?>/assets/front/images/Renewal_Passport_Header.jpg); ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h2>Renewal Passport Services</h2>
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
                                        <h6>Renewal Passport Application</h6>
                                        <h4>ALL OF THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT:</h4>
                                        <ol>
                                            <li>You are in possession of a previously issued US Passport and it is in fair condition.</li>
                                            <li>You were at least 16 years of age when this passport was issued.</li>
                                            <li>This passport was issued less than 15 years ago.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-box">
                                    <h2>Submit Your Most Current Passport</h2>
                                    <div class="slider-box-content">
                                        <p>Submit your most current US Passport as Described Above. Copies are not acceptable</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-box">
                                    <h2>Application Form</h2>
                                    <div class="slider-box-content">
                                        <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">download</a> complete and sign the US Passport Application <a href="javascript:;" class="hyperlink" data-link="https://pptform.state.gov/?Submit2=Complete+Online+%26+Print">DS-82</a>.
                                            Be sure to complete all fields and make sure you date your form</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-box">
                                    <h2>Proof of Name Change or Data Correction</h2>
                                    <div class="slider-box-content">
                                        <p>If you are changing the name or the data on your passport, submit original certified documents justifying the change you are requesting. For example: if you want to change it due to marriage submit an original Certified
                                            Copy of a Marriage Certificate. If you are changing vital information such as your date of birth or gender, submit original Certified Copies justifying this change such as a previously issued passport or a Certified
                                            Copy of your Birth record or Court Order. For more information you may visit the State Department’s website click here or call us on our toll-free number <strong>(800) 783-8472.</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-box">
                                    <h2>Photo Requirements</h2>
                                    <div class="slider-box-content text-center">
                                        <p>Submit ONE recently taken passport type or size photograph. <strong>Do not submit pictures with eyewear (glasses), headwear, jewelry, or with any objects in the background, as they will not be accepted.</strong>                                            Passport Photo <strong>MUST</strong> have a completely <strong>blank white background,</strong> without any other shades or tints (i.e., dark gray, tan, off-white). See below for proper sizing and examples of
                                            well composed photos.</p>
                                        <p><a href="javascript:;" class="hyperlink" data-link="https://travel.state.gov/content/travel/en/passports/how-apply/photos.html">click here</a> for a description of the State Department requirements on passport photos.</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-box">
                                    <h2>Letter of Authorization</h2>
                                    <div class="slider-box-content text-center">
                                        <p><a href="javascript:;" class="hyperlink pdf" data-link="doc/LOA_new_RJR.pdf">download</a> complete and DO SIGN the Letter of Authorization Form(s). This form allows our company to expedite your passport and represent
                                            you at the State Department respecting your application form. Choose the first TWO boxes only and check them. The 3rd box indicates you want us to represent you but would rather the State Department deal directly
                                            with you when there are problems.</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-box">
                                    <h2>Proof of Departure</h2>
                                    <div class="slider-box-content">
                                        <p><strong>The US State Department</strong> requests that you provide with your application proof of your upcoming departure date. Please include this with your application.</p>
                                        <p>(If you do not have confirmation of your trip yet, please let us know in advance)</p>
                                        <h4>EXAMPLES:</h4>
                                        <p>Print-out of online booking reservations from an online or airline reservations system, or travel agency. It must have your name and international destination and departure date on it</p>
                                        <h4>OR</h4>
                                        <p>A signed Letter on Letterhead from your Employer or your Travel Agent addressed to the US State Department confirming your departure date and International Destination. Again, it must state your passport name.</p>
                                        <a class="offer-visa" href="travel-visas.html" tabindex="0">DO YOU NEED A VISA TO TRAVEL TO YOUR DESTINATION?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
						<button type="button" class="btn  btn email-requirements" data-bs-toggle="modal" data-bs-target="#emailRequirements">
                              email requirments
                            </button>
                        <a class="print-requirements" href="<?php echo base_url('requirements/9cd80fd1cdbbf950461673613a026085.pdf')?>" target="_blank">print requirements</a>
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
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-1.png');?>">
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
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-2.png');?>">
                                </div>
                                <div class="content-process">
                                    <h4>Receive detailed checklist and easy to follow procedures</h4>
                                    <p>Once your order is placed you will get a detailed checklist and easy to follow procedures
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card-process">
                                <div class="img-process">
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-3.png');?>">
                                </div>
                                <div class="content-process">
                                    <h4> Hand-carry your passport request into a State Department Passport Agency for issuance
                                    </h4>
                                    <p>Upon receipt of your passport packet, RJR Passport will hand carry your application for your passport into a Federal Passport Agency and have issued quickly</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card-process">
                                <div class="img-process">
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets/front/images/passport-process-4.png');?>">
                                </div>
                                <div class="content-process">
                                    <h4>Deliver New Passport using FedEx</h4>
                                    <p>Once issued, we will ship your passport FedEx directly to the address you specify on your order</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <!-- Button trigger modal -->



<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>-->
<!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--        ...-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
        
        <script>
            $(document).ready(function() {
    $(".slick-next").click(function(){
        var next_btn = $(".slick-next").attr("aria-disabled");
        // console.log(next_btn);
        if(next_btn == "true"){
            $(".slick-next").css("display","none");
        } else{
            $(".slick-next").css("display","block");
        }
    });
    
    $(".slick-prev").click(function(){
        var next_btn = $(".slick-next").attr("aria-disabled");
        // console.log(next_btn);
        if(next_btn == "false"){
            $(".slick-next").css("display","block");
        } 
    });
});
        </script>
