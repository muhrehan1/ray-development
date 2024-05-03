<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Front_Controller
{
	public function index()
	{

		$data['home_setting'] = $this->general->single('hompage_settings');
		$data['client_reviews'] = $this->general->all('reviews');
		// $data['client_reviews'] = $this->general->all('reviews',array(),'2','review_id ','ASC');
		
		$data['main_content']= 'homeView';
		$this->load->view('front/inc/view',$data);
	}
	
	
		public function privacy_policy()
	{

		$data['main_content']= 'privacy-policy';
		$this->load->view('front/inc/view',$data);
	}
	
		public function refund_policy()
	{

		$data['main_content']= 'refund-policy';
		$this->load->view('front/inc/view',$data);
	}
	
		public function terms_of_services()
	{

		$data['main_content']= 'terms-of-services';
		$this->load->view('front/inc/view',$data);
	}
	
}