<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_auth extends MY_Controller 
{
	function __construct() {
		parent::__construct();
		if(!empty($this->session->userdata('admin_id'))){ redirect('dashboard'); }
		$this->load->helper('admin');
		$this->load->library('encryption');
	}

	public function index()
	{
		if($_POST)
		{
			$userdata = $this->general->single('admin',array('admin_email' => $this->input->post('admin_email')));
			if(!empty($userdata))
			{
				if($this->encryption->decrypt($userdata->admin_password)
				 == $this->input->post('admin_password'))
				{
					$adminsession = array(
						'admin_id' => $userdata->admin_id,
						'admin_name' => $userdata->admin_name,
						'admin_email' => $userdata->admin_email,
						'admin_image' => $userdata->admin_image,
						'admin_type' => $userdata->admin_type
						
					);
					$this->session->set_userdata($adminsession);
					redirect('dashboard');
				}
				else
				{
					$this->session->set_flashdata('login','Email or password is invalid');
					redirect('admin');
				}
			} 
			else
			{
				$this->session->set_flashdata('login','Email or password is invalid');
				redirect('admin');
			}
		}
		else
		{
			$this->load->view('admin/auth/login');	
		}
	}

	public function get_recovery_link()
	{
		if(!empty($_POST))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('admin_email','Email','valid_email');
			if($this->form_validation->run())
			{
				$admindata = $this->general->single('admin',array('admin_email' => $this->input->post('admin_email')));
				if(!empty($admindata))
				{
					$today = date("Ymd");$rand = strtoupper(substr(uniqid(sha1(time())),0,120));
					$unique = $today . $rand;$forgot_password_token = $unique;
					$data['forget_token'] = $forgot_password_token;
					$result = $this->general->gupdate('admin',$data,array('admin_email'=>$this->input->post('admin_email')));
					if(!empty($result))
					{
						
						$section['heading'] = 'Account Recovery Link';
						$section['descripition'] = 'you recently requested to reset your password for your website admin panel account. Click the button below to reset it.';
						$section['body'] = '<table border="0" cellspacing="0" cellpadding="0">';
						$section['body'] .='<tr><td><a style="background:#727cf5;padding:10px;color:#fff;text-decoration:none" href="'.base_url('recover-password/').$forgot_password_token.'">RESET YOUR PASSWORD</a></td></tr>';
						$section['body'].= '</table>';
						
						$section['subject'] = 'Account Recovery';
						$body = $this->load->view('emails/adminemail',$section, TRUE);
						$result = send_email($this->input->post('admin_email'),'Account Recovery Link',$body);
						echo 1;
					}
					else
					{
						echo 4;
					}
					
				}
				else
				{
					echo 3;
				}
				
			}
			else
			{
				echo 2;
			}
		}
	}

	public function recover_account($token="")
	{
		if(!empty($_POST))
		{
			if($this->input->post('new_password') == $this->input->post('confirm_password'))
			{
				$get_user = $this->general->single('admin',array('forget_token'=> $token));
				
				if(!empty($get_user))
				{
					$result = $this->general->gupdate('admin',array('forget_token'=>"",'admin_password' => $this->encryption->encrypt($this->input->post('new_password'))),array('forget_token'=>$token));
					$this->session->set_flashdata('recoversuccess','Password updated successfully. Please proceed to login');
					redirect('admin');
				}
				else
				{
					$this->session->set_flashdata('password','Invalid or expired token');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			else
			{
				$this->session->set_flashdata('password','New password and confirm password does not match');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			$this->load->view('admin/auth/passwordrecovery');
		}
	}
}
