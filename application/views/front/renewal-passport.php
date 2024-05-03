
<section class="inner-banner" style=" background: url(<?php echo base_url(); ?>/assets/front/images/Renewal_Passport_Header.jpg); ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h2>RENEWAL PASSPORT</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="new-passport-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                        <h2><?php echo $renewal_passport->renewal_passport_main_heading?></h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="passport-box">
                            <p><?php echo $renewal_passport->renewal_passport_box_first_text?></p>
                            <ul>
                                <li><?php echo $renewal_passport->renewal_passport_box_second_text?></li>
                                <li><?php echo $renewal_passport->renewal_passport_box_third_text?>
                                </li>
                                <li><?php echo $renewal_passport->renewal_passport_box_fourth_text?></li>
                            </ul>
                        </div>
                        <a href="<?php echo base_url('renewal-packages') ;?>"><?php echo $renewal_passport->renewal_passport_anchor_text?></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->

   