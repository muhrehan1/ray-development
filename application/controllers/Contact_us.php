<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_us extends Front_Controller
{
	public function index()
	{
		// $data['about'] = $this->global_model->records_single('about_page');
		$data['main_content'] = 'contact-us';
		$this->load->view('front/inc/view',$data);
	}
	
}
