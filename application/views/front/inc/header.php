<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $this->settings->title; ?></title>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/front/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/front/css/bootstrap.css.map');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/front/css/bootstrap.min.css.map');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/front/css/animate.css');?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/flag-icon.css');?>">
    <link rel="icon" href="<?php echo base_url('assets/front/images/fav.png');?>" type="image/png" sizes="">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/slick/slick.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/slick-theme.css');?>">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/custom.css');?>" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header-1">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url('uploads/settings/').$this->settings->header_logo;?>" class="img-fluid big-logo"><img src="<?php echo base_url('uploads/settings/').$this->settings->header_logo;?>" class="img-fluid scroll-logo" alt="img"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url();?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">US Passport</a>
                           <div class="dropdown-menu">
                                <ul>
                                    <li><a href="<?php echo base_url('renewal-passport');?>">Renewal Passports</a></li>
                                    <li><a href="<?php echo base_url('new-passport');?>">New Passports</a></li>
                                    <li><a href="<?php echo base_url('lost-passport');?>">Lost Passports</a></li>
                                    <li><a href="<?php echo base_url('minor-passport');?>">Minor Passports</a></li>
                                    <!-- <li><a href="<?php //echo base_url('renewal-passport');?>JavaScript:;">Lost Minor Passports</a></li> -->
                                    <li><a href="<?php echo base_url('data-correction-passport');?>">Name Change or Correction Passports</a></li>
                                    <li><a href="<?php echo base_url('second-additonal-passport');?>">2nd or Additional Passports</a></li>
                                    <li><a href="<?php echo base_url('second-additonal-renewal-passport');?>">2nd or Additional Renewal Passports</a></li>
                                </ul>
                            </div>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="<?php //echo base_url('travel-visas') ;?>"> Travel Visas</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('about-us');?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('faq');?>"> FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('contact') ;?>">Contact</a>
                        </li>
                       
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="#"> Affiliates</a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="#"> Legalization</a>-->
                        <!--</li>-->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="login"> LOG IN</a>
                        </li> -->
                    </ul>
                   
                    <!--<div class="search-box">-->
                    <!--    <a href="JavaScript:;"><i class="far fa-search"></i></a>-->
                    <!--</div>-->
                    <form class="d-flex form_menu_btns">
                        <ul>
                            <li><a href="tel:<?php echo $this->settings->website_contact;?>"><i class="fas fa-phone-alt"></i><?php echo $this->settings->website_contact;?></a></li>
                            <?php if(!empty($this->session->userdata('user_id'))):  ?>
							
								<a  href="<?php echo base_url('user-dashboard')?>" style="background:#a5823e; border-color:#a5823e;" class="btn btn-danger login-btn">DASHBOARD</a>
							<?php else: ?>
							
								<a  href="<?php echo base_url('login')?>" style="background:#a5823e;border-color:#a5823e;" class="btn text-white  login-btn">Login</a>
								<a   href="<?php echo base_url('sign-up')?>" style="background:#a5823e; border-color:#a5823e;" class="btn btn-danger login-btn">Register</a>
								
							<?php endif; ?>
                            
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
