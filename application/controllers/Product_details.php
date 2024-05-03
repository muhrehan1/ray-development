<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_details extends Front_Controller
{
	
	public function index($slug)
	{
		$this->load->helper('admin_helper');
		$data['record'] = $this->general->single('product', array('vendor_sku' => $slug));
		$data['latestpro'] = $this->general->all('product',array('category_id' => $data['record']->category_id),10,'product_id','DESC');
		$data['main_content'] = 'product-detail';
		$this->load->view('front/inc/view',$data);
	}
}
?>
