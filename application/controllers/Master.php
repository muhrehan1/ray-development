<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends MY_Controller{

	function __construct() {
		parent::__construct();
		$this->developer = $this->global_model->records_single('developer');
	}

	public function listinvoice()
	{	
		if(empty($this->session->userdata('user_id')))
		{
			redirect('login');die;
		}
		$data['records'] = $this->global_model->records_all('orders',array('order_completion'=> 'pending'));
		$data['main_content'] = 'admin/invoice/list';		
		$this->load->view('admin/inc/view',$data);

	}
	
	public function listcompletedinvoice()
	{	
		if(empty($this->session->userdata('user_id')))
		{
			redirect('login');die;
		}
		$data['records'] = $this->global_model->records_all('orders',array('order_completion'=> 'completed'));
		$data['main_content'] = 'admin/invoice/listcomplete';		
		$this->load->view('admin/inc/view',$data);

	}

	public function viewinvoice($id)
	{	
		if(empty($this->session->userdata('user_id')))
		{
			redirect('login');die;
		}
		$data = array('read_status' => 'read');
		$this->global_model->update_record('orders',$data,array('orders_id' => $id));
		$data['order'] = $this->global_model->records_single('orders',array('orders_id' =>$id));
		$data['main_content'] = 'admin/invoice/view';		
		$this->load->view('admin/inc/view',$data);

	}
	
	public function updateorder($id)
	{
	    if(empty($this->session->userdata('user_id')))
		{
			redirect('login');die;
		}
		
		$data = array('order_completion' => 'completed');
		$this->global_model->update_record('orders',$data,array('orders_id' => $id));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function updateorderpending($id)
	{
	    if(empty($this->session->userdata('user_id')))
		{
			redirect('login');die;
		}
		
		$data = array('order_completion' => 'pending');
		$this->global_model->update_record('orders',$data,array('orders_id' => $id));
		redirect($_SERVER['HTTP_REFERER']);
	}
}