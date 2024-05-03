<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login_signup extends Front_Controller
{
	
	public function index()
	{
		//print_r($this->cart->contents());die;
		// if(!empty($this->cart->contents()))
		// {
			$data['main_content']= 'login-signup';
			$this->load->view('front/inc/view',$data);
		// }
		// else
		// {
		// 	$this->session->set_flashdata('msg', '2');
		// 	$this->session->set_flashdata('alert_data', 'Cart is empty');
		// 	redirect('');
		// }
		
	}
}
