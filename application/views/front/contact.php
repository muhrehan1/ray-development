<style>
    div#response {
    margin-top: 20px;
    background: #A5823E;
    padding: 10px;
    color: #fff;
    border-radius: 10px;
    width: fit-content;
}

div#response:before {
    content: '\f058';
    font-family: 'Font Awesome 5 Free';
    margin-right: 10px;
}
</style>
<section class="inner-banner" style=" background: url(<?php echo base_url(); ?>/assets/front/images/contact.jpg); ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><a href="JavaScript:;" class="active">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-detail">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                        <h6><i class="fas fa-mobile-alt"></i></h6>
                        <h4>phone</h4>
                        <p><a href="tel:8007838472">(800) 783-8472</a></p>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                        <h6><i class="fas fa-map-marker-alt"></i></h6>
                        <h4>address</h4>
                        <p><strong>DALLAS CORPORATE ADDRESS:</strong> 5301 Alpha Road, Suite 80-13 Dallas, TX 75240</p>
                        <p><strong>DENVER ADDRESS:</strong> 44 Cook Street, Ste 100 Denver, CO 80206</p>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                        <h6><i class="far fa-envelope"></i></h6>
                        <h4>e-mail</h4>
                        <p><a href="mailto:ray@rjrpv.com">ray@rjrpv.com</a></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h6>LET'S TALK</h6>
                        <h2>Get in Touch</h2>
                        <form>
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="custom-input">
                                        <input type="text" name="name" id="customer_name" placeholder="Name *">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="custom-input">
                                        <input type="email" name="email" id="email" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="custom-input">
                                        <input type="tel" name="phone" id="phone" placeholder="Phone *">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="custom-input">
                                        <textarea placeholder="Message *" id="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <button id="request-consultation">Request Consultation</button>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div style="display:none;" id="response"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
jQuery('#request-consultation').click(function (e) {
    e.preventDefault();

    // Get input values
    var customer_name = $('#customer_name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();

    if (customer_name === '' || email === '' || phone === '' || message === '') {
        alert('Please fill in all fields.');
        return; // Prevent further execution
    }

    var send_email_data = {
        customer_name: customer_name,
        email: email,
        phone: phone,
        message: message
    };

    $.ajax({
        url: '<?php echo base_url('request-consultation');?>',
        method: 'post',
        data: send_email_data,
        dataType: 'json',
        timeout: 2000,
        success: function (response) {
              $('#response').show();
              $('#response').text(response.message);
            setTimeout(function() {
                $('#response').hide();
            }, 3000); // 2000 milliseconds = 2 seconds
        },
        error: function (error) {
            console.error("Error in AJAX request:", error);
        }
    });
});

</script>