<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	function __construct() {
		parent::__construct();
//		if(!empty($this->session->userdata('user_id'))) { $this->user_dashboard(); }
		$this->load->library('encryption');
		$this->load->library('form_validation');

	}

	public function user_dashboard()
	{
		$data['customerData'] = $this->general->single('user',array('user_id' =>$this->session->userdata('user_id')));
		$data['main_content'] = 'customer/customer-dashboard';				
		$this->load->view('front/inc/view',$data);
	}
	
		public function order_details_user()
	{
	    $user_id = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM transaction_details WHERE user_id = $user_id");
        $data['applications'] = $query->result_array();

		$data['main_content'] = 'customer/order-details';				
		$this->load->view('front/inc/view',$data);
	}

	public function user_logout()
	{
		$this->session->unset_userdata('user_id');
		redirect();
	}

	public function index()
	{
		//$data['records'] = $this->general->all('website_register');

		if(!empty($_POST))
		{
			$userdata = $this->general->single('user',array('user_email' => $this->input->post('user_email')));
			if(!empty($userdata))
			{
				if($this->encryption->decrypt($userdata->user_pass) == $this->input->post('user_password'))
				{
					$usersession = array(
						'user_id' => $userdata->user_id,
						'user_name' => $userdata->user_name,
						'user_email' => $userdata->user_email,
						'user_image' => $userdata->user_image

					);
					$this->session->set_userdata($usersession);

					redirect('user-dashboard');
				}
				else
				{

					$this->session->set_flashdata('login','Email or password is invalid');
					redirect('login');
				}
			}
			else
			{
				$this->session->set_flashdata('login','Email or password is invalid');
				redirect('login');
			}
		}
		else
		{
			$data['main_content']= 'login';
			$this->load->view('front/inc/view',$data);
		}

	}


	public function sign_up()
	{
		if($_POST)
		{
			$this->form_validation->set_rules("user_name","Name",'required|min_length[3]');
			$this->form_validation->set_rules("contact_number","Number",'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules("user_email","Email",'required|is_unique[user.user_email]');
			$this->form_validation->set_rules("user_pass","Password",'required');
			$this->form_validation->set_rules("confirm_password","Confirm Password",'required|matches[user_pass]');

			if($this->form_validation->run())
			{
				$data = array(
					"user_name" => $this->input->post("user_name",TRUE),
					"user_email" => $this->input->post("user_email",TRUE),
					"contact_number" => $this->input->post("contact_number",TRUE),
					"user_pass" => $this->encryption->encrypt($this->input->post("user_pass",TRUE)),
				);
				$user_id =	$this->general->gadd('user',$data);

				$response = array(
					'type' => "success",
				);
				echo json_encode($response);
			}
			else
			{
				$this->form_validation->set_error_delimiters('', '');
				$response = array(
					'type' => "valid_error",
					'user_name' => form_error('user_name'),
					'user_email' => form_error('user_email'),
					'contact_number' => form_error('contact_number'),
					'user_pass' => form_error('user_pass'),
					'confirm_password' => form_error('confirm_password','<div style="color:#de002e" class="p-1 m-1">','</div>'),

				);

				echo json_encode($response);
			}

		}
		else
		{

			$data['main_content']= 'register';
			$this->load->view('front/inc/view',$data);
		}
	}
	
	public function user_edit_profile()
	{
	            	
	                	
	    if($_POST)
		{
		   	    
                    $this->form_validation->set_rules("user_name","User Name",'required');
                    $this->form_validation->set_rules("last_name","Last Name",'required');
                    $this->form_validation->set_rules("emergency_contact_number","User Name",'required');
                    $this->form_validation->set_rules("user_address","User Name",'required');
                    $this->form_validation->set_rules("state","User Name",'required');
                     $this->form_validation->set_rules("city","User Name",'required');
                    
				if($this->form_validation->run())
				{
				   
					$data = array(
					   // "user_email"=>$this->input->post("user_email",TRUE),
						"user_name" => $this->input->post("user_name",TRUE),
						"last_name" => $this->input->post("last_name",TRUE),
						"emergency_contact_number" => $this->input->post("emergency_contact_number",TRUE),
						"user_address" => $this->input->post("user_address",TRUE),
						"state" => $this->input->post("state",TRUE),
						"city" => $this->input->post("city",TRUE),
					
					);
			    
					$this->general->gupdate('user',array('user_id'=>$this->session->userdata('user_id')),$data);
					$this->session->set_flashdata('msg', '1');
					$this->session->set_flashdata('alert_data', 'Customer Updated Successfully');
					redirect('user/profile');
				}
				else
				{
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data','Update Failed');
					redirect('user/profile');
				}
			
		}
		else
		{
			$data['customerDetails'] = $this->general->single('user',array('user_id' =>$this->session->userdata('user_id')));
			$data['main_content']= 'customer/profile-settings';
			$this->load->view('front/inc/view',$data);
		}
	}
	
}
