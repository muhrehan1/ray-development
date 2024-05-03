<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visa extends Front_Controller
{
	
	public function index()
	{
		
		$data['main_content'] = 'travel-visas';
		$this->load->view('front/inc/view',$data);
	}
}
?>
