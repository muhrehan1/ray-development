<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class My_account extends Front_Controller
{
	
	public function index()
	{
		
		$data['main_content']= 'my-account';
		$this->load->view('front/inc/view',$data);
	}
}
?>