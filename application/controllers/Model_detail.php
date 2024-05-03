<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_detail extends Front_Controller
{
	
	public function index($id)
	{
		$data['model'] = $this->general->single('models',array('models_id' => $id));
		$data['models'] = $this->general->all('models','','12','models_id','DESC');
		$data['main_content']= 'model-Detail';
		$this->load->view('front/inc/view',$data);
	}
}
