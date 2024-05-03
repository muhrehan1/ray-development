<style>
    .about-us-btn a {
    color:#756330
}
.about-us-btn a:hover {color: #fff !important;}


</style>
<div class="about-us">
            <section class="inner-banner" style=" background: url(<?php echo base_url(); ?>/assets/front/images/paramaxaboutus_banner.jpg); ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <h2>ABOUT US</h2>
                            <ul>
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="JavaScript:;" class="active">ABOUT US</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="detail">
            <div class="container">
                <div class="pad">
                    <div class="detail1st">
                        <h2><?php echo $about->about_us_first_heading;?></h2>
                        <div class="about-us-img">
                            <img src="<?php echo base_url('assets/front/images/').$about->about_us_first_heading_image;?>" class="img-fluid" alt="img">
                        </div> 
                        <p><?php echo $about->about_us_first_heading_first_text;?></p>
                        <p><?php echo $about->about_us_first_heading_second_text;?></p>
                        <p><?php echo $about->about_us_first_heading_third_text;?></p>
                    </div>
                </div>

                <div class="pad">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="CHOOSE-US">
                                <h2><?php echo $about->about_us_second_heading;?></h2>
                                <p><?php echo $about->about_us_second_heading_first_text;?></p>
                                <p><?php echo $about->about_us_second_heading_second_text;?></p>
                            </div>
                            <div class="about-us-btn">
                                <button>Call Now: <a href="tel:(800) 783-8472">(800) 783-8472</a></button>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="about-us-img">
                            <img src="<?php echo base_url('assets/front/images/').$about->about_us_second_heading_image;?>" class="img-fluid" alt="img">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pad">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">

                            <div class="about-us-img">
                                <img src="<?php echo base_url('assets/front/images/').$about->about_us_third_heading_image;?>" class="img-fluid" alt="img">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">

                            <div class="FACTS">
                                <h2><?php echo $about->about_us_third_heading;?></h2>
                                <ul>
                                    <li><?php echo $about->about_us_third_heading_first_text;?></li>
                                    <li><?php echo $about->about_us_third_heading_second_text;?></li>
                                    <li><?php echo $about->about_us_third_heading_third_text;?></li>
                                    <li><?php echo $about->about_us_third_heading_fourth_text;?></li>
                                </ul>
                            </div>
                            <div class="about-us-btn">
                                <button>Call Now: <a href="tel:(800) 783-8472">(800) 783-8472</a></button>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="EXPERTISE">
                    <h2><?php echo $about->about_us_fourth_heading;?></h2>
                    <p><?php echo $about->about_us_fourth_heading_first_text;?></p>
                    <p><?php echo $about->about_us_fourth_heading_second_text;?></p>
                    <p><?php echo $about->about_us_fourth_heading_third_text;?></p>
                </div>
                <div class="redspan">
                    <p><?php echo $about->about_us_fourth_heading_fourth_text;?></p>
                    <p><?php echo $about->about_us_fourth_heading_fifth_text;?>
                    </p>
                    <h6><?php echo $about->about_us_fourth_heading_sixth_text;?></h6>
                </div>
                <div class="link-about">
                    <ul>
                        <li><i class="fal fa-external-link-square"></i><a href="#">www.rjrpassports.com </a></li>
                        <li><i class="far fa-phone-alt"></i><a href="tel:(800) 783-8472">(800) 783-8472</a></li>
                        <li><i class="far fa-envelope"></i><a href="mailto:info@rjrpv.com">info@rjrpv.com</a></li>
                    </ul>


                </div>



            </div>
        </section>
