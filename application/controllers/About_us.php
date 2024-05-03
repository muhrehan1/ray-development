<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About_us extends Front_Controller
{
	public function index()
	{
		$data['about'] = $this->general->single('about_us');
		$data['main_content'] = 'about';
		$this->load->view('front/inc/view',$data);
	}
	
}
