<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Website_Policies extends Front_Controller
{
	public function index()
	{
		// $data['about'] = $this->global_model->records_single('about_page');
		$data['main_content'] = 'website-conditions/terms-and-conditions';
		$this->load->view('front/inc/view',$data);
	}
	
}
