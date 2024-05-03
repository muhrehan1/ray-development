<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Front_Controller
{
	public function index()
	{
		if($_POST)
		{
			$this->form_validation->set_rules("name","Name",'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules("email","Email Address",'required|min_length[5]|max_length[300]');
			$this->form_validation->set_rules("phone","Phone",'required|min_length[6]|numeric|max_length[20]');
			$this->form_validation->set_rules("subject","Subject",'required|min_length[6]|max_length[300]');
			$this->form_validation->set_rules("message","Messgae",'required|min_length[3]|max_length[500]');

			if($this->form_validation->run())
			{
				$data = array(
					"name" => $this->input->post("name"),
					"subject" => $this->input->post("subject"),
					"email" => $this->input->post("email"),
					"phone" => $this->input->post("phone"),
					"message" => $this->input->post("message"),
				);
				$this->global_model->insert_record('contact_inquiry',$data);

				$section['body'] = '<table width="100%" border="1px" >';
				$section['body'] .='<tr><td>Name:</td><td>'.$this->input->post("name",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Subject:</td><td>'.$this->input->post("subject",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Email:</td><td>'.$this->input->post("email",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Phone:</td><td>'.$this->input->post("phone",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Message:</td><td>'.$this->input->post("message",TRUE).'<td></tr>';
				$section['body'] .='<br>';
				$section['body'] .='<tr><td>Contact Inquiry</td></tr>';
				$section['body'].= '</table>';

				$section['subject'] = 'Contact Inquiry';
				$body = $this->load->view('email/template',$section, TRUE);
				$result = send_email($this->adminEmail,'Contact Inquiry',$body);

				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Thankyou! We will contact you soon');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data','Failed');
				$data['main_content']='contact';
				$this->load->view('front/inc/view',$data);
			}
		}
		else
		{
			$data['main_content']= 'contact';
			$this->load->view('front/inc/view',$data);

		}
		
		
	}
}
?>
