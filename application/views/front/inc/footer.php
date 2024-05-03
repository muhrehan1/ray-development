</main>
<!--footer start-->
<style>
    .condition {
        text-align: center;
        border-top: 1px solid black;
    }
</style>
<footer>
    <div class="footerend">
        <div class="container">
            <h2>contact- us</h2>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="mainlogo">
                        <img src="<?php echo base_url('assets/front/images/our1.png');?>" class="img-fluid" alt="img">
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 frst_tab_ftr">
                    <div class="links-footer">
                        <img src="<?php echo base_url('assets/front/images/contact-icon.png');?>" class="img-fluid" alt="img">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('contact') ;?>">
                                    <h5>CONTACT US</h5>
                                </a>
                            </li>
                            <ul>
                                <li><i class="fas fa-phone-alt"></i> <a href="tel:+1-800-783-8472">(800) 783-8472</a></li>
                                <li><i class="fas fa-envelope"></i> <a href="mailto:ray@rjrpv.com">ray@rjrpv.com</a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="link-send">
                        <img src="<?php echo base_url('assets/front/images/location-icon.png');?>" class="img-fluid" alt="img">
                        <h5>DALLAS CORPORATE ADDRESS</h5>
                        <p>
                            5301 Alpha Road, Suite 80-13 Dallas, TX 75240
                        </p>
                        <h5>DENVER ADDRESS</h5>
                        <p>
                            44 Cook Street, Ste 100 Denver, CO 80206
                        </p>


                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 frst_tab_ftr">
                    <div class="lastest">
                        <img src="<?php echo base_url('assets/front/images/clock-icon.png');?>" class="img-fluid" alt="img">
                        <h5>OFFICE HOURS</h5>
                        <p>
                            Monday- Friday <span>10:00 AM- 6:00 PM</span>
                        </p>
                        <p>
                            Saturday (By Appointment Only)<span>11:00 AM- 3:00 PM</span>
                        </p>

                    </div>
                </div>
                <div class="condition">
                    <p>Copyright © 1981-2024. RJRPASSPORTS. ALL RIGHT RESERVED.</p>
                    <ul>
                        <li><a href="<?php echo base_url('privacy-policy');?>">Privacy Policy</a></li>
                        <li><a href="<?php echo base_url('refund-policy');?>">Refund Policy</a></li>
                        <li><a href="<?php echo base_url('terms-of-services');?>">Terms of Services</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer close-->


<div class="email-requirmentd-modal modal fade" id="emailRequirements" tabindex="-1" aria-labelledby="emailRequirementsLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="mail-icon">
				<img src="<?php echo base_url('assets/front/images/mail-icon.jpg') ;?>" alt="mail icon">
			</div>
			<h4>Email Requirements</h4>
			<p class="tag-line">Get all requirments through email!</p>
			<form>
				<div class="email-field">
					<input placeholder="Your Email" id="email" type="email">
					<a href="javascript:void(0);" id="get_email">Send</a>
				
				</div>
					
				<div class="email-field" style="display:none;" id="response"></div>
			
			</form>
				
		</div>
	</div>
</div>
<script>
	jQuery('#get_email').click(function (e) {
		e.preventDefault();
		var get_email =  $('#email').val();
		var send_email_data = {
			admin_email:get_email,
		};
		$.ajax({
			url: '<?php echo base_url('send-email');?>',
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
				console.error("Error in vacation_room_category AJAX request:", error);
			}
		});
	});
</script>
<script src="<?php echo base_url('assets/front/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js.map"></script>
<script src="<?php echo base_url('assets/front/js/owl.carousel.min.js') ;?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/slick/slick.js');?>"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" integrity="sha256-+mWd/G69S4qtgPowSELIeVAv7+FuL871WXaolgXnrwQ=" crossorigin="anonymous"></script>-->

<script src="<?php echo base_url('assets/front/js/custom.js');?>"></script>
</body>

</html>
