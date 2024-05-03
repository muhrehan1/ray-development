<?php


defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends Front_Controller
{
	public function faq()
	{
		$data['faqs'] = $this->general->all('faq',array('is_featured' => 'Faq'));
		$data['general_faqs'] = $this->general->all('faq',array('is_featured' => 'General Visa Question'));
		$data['main_content']= 'faq';
		$this->load->view('front/inc/view',$data);
	}
	
}
