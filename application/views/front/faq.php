<div class="faq">
            <section class="inner-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <h2>FAQ</h2>
                            <ul>
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="JavaScript:;" class="active">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="faqs-about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-9 col-xl-9 col-xxl-9">
                        <h1>Frequently Ask Questions</h1>
                        <div class="container-inner">

                            <!-- Section Title -->

                            <!-- Tab / Collapse Section -->

                            <div class="tab-container">

                                <!-- Tab 1 -->

								<?php 
								if(!empty($faqs)):
									foreach($faqs as $key => $faq):
								?>
									<div class="tab-accordian">
										<div class="titleWrapper inactive">
											<h3><?php echo $faq->question; ?></h3>
											<div class="collapse-icon">
												<div class="acc-close"></div>
												<div class="acc-open"></div>
											</div>
										</div>
										<div id="descwrapper" class="desWrapper">
											<?php echo $faq->answer; ?> 
										</div>
									</div>
								<?php 
									endforeach;
								endif;
								?>



                        <h1>GENERAL VISA QUESTIONS</h1>

						<?php 
								if(!empty($general_faqs)):
									foreach($general_faqs as $key => $general_faq):
								?>
									<div class="tab-accordian">
										<div class="titleWrapper inactive">
											<h3><?php echo $general_faq->question; ?></h3>
											<div class="collapse-icon">
												<div class="acc-close"></div>
												<div class="acc-open"></div>
											</div>
										</div>
										<div id="descwrapper" class="desWrapper">
											<?php echo $general_faq->answer; ?> 
										</div>
									</div>
								<?php 
									endforeach;
								endif;
								?>





                    </div>
                </div>
            </div>
        </section>

