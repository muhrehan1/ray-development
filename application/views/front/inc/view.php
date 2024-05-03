<?php
 // if($this->uri->segment(1)=='')
 // {
 // 	$this->load->view('front/inc/header');
 // }
 // else
 // {
 // 	$this->load->view('front/inc/header');
 // }
	$this->load->view('front/inc/header');
	isset($main_content)?$this->load->view('front/'.$main_content.''):'';
	$this->load->view('front/inc/footer');	
?>