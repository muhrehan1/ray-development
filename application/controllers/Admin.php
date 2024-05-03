<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {

	function __construct() {
		parent::__construct();
		if(empty($this->session->userdata('admin_id'))){ redirect('admin'); }
		// if($this->session->userdata('admin_type') !="admin"){ redirect('user'); }
		$this->database = "staging_rjr_developemnt";
		$this->load->helper('admin');
		$this->load->library('encryption');
	}
	public function index()
	{
		print_r($_POST);die;
	}

	public function dashboard()
	{
		$data['page'] = 'admin/dashboard';
		$this->load->view('admin/inc/render',$data);
	}
	public function get_relations()
	{
		$parent_id = $_POST['parent'].'_id';
		$child_id = $_POST['child'].'_id';
		$child_name = $_POST['child'].'_name'; 

		$data = $this->general->all($_POST['child'],array($parent_id => $_POST['id']));
		$option = "<option value=''>Please Select</option>";
		foreach($data as $filter)
		{
			$option .= '<option value="'.$filter->$child_id.'">'.$filter->$child_name.'</option>';
		}
		echo $option;
	}
	
	public function dynamic_add($table)
	{
	    
	   
		$tableFields = $this->general->get_fields_with_comments($this->database,$table);
		$fieldsToRender = array();
		foreach($tableFields as $field)
		{
			$commentChecker =  explode('|',$field->COLUMN_COMMENT);

			if(in_array("RESTRICTED",$commentChecker))
			{
				redirect('dashboard'); 
			}
			if(in_array("UONLY",$commentChecker))
			{
				redirect('dashboard');
			}
			elseif(in_array("NN",$commentChecker) || in_array("NIA",$commentChecker))
			{

			}
			else
			{
				$fieldArray = array('field_name' => $field->COLUMN_NAME,'comment' => $field->COLUMN_COMMENT);
				array_push($fieldsToRender,$fieldArray);
			}
		}

            $startdata = array('entry_process' => 'pending');
    	    $new_record_id = $this->general->gadd($table,$startdata);
    	    $this->dynamic_edit($table,$new_record_id);
	}
	
	public function dynamic_edit($table,$id)
	{
		$tableFields = $this->general->get_fields_with_comments($this->database,$table);
		$fieldsToRender = array();
		foreach($tableFields as $field)
		{
			$commentChecker =  explode('|',$field->COLUMN_COMMENT);

			if(in_array("RESTRICTED",$commentChecker))
			{
				redirect('dashboard'); 
			}
			if(in_array("UONLY",$commentChecker))
			{
				
			}
			elseif(in_array("NN",$commentChecker) || in_array("NIA",$commentChecker))
			{

			}
			else
			{
				$fieldArray = array('field_name' => $field->COLUMN_NAME,'comment' => $field->COLUMN_COMMENT);
				array_push($fieldsToRender,$fieldArray);
			}
		}

		$data['table'] = $table;
		$data['edit_record_id'] = $id;
		$data['fields'] = $fieldsToRender;
		$data['record'] = $this->general->single($table,array($table.'_id' => $id));
		$data['page'] = 'admin/sa_parser/edit';
		$this->load->view('admin/inc/render',$data);
	}
	
	public function update_record_data($table,$record_id)
	{
	    
	    foreach($_POST as $key => $val)  
		{  					
			if(strpos($key ,'slug') !== false)
			{
				$result = check_slug($table,$this->input->post($key));					
				$data[$key] = $result;					
			}
			else
			{
				$data[$key] = $this->input->post($key);  
			}				
		} 
		
		$update_id = $this->general->gupdate($table,array($table.'_id' => $record_id),$data);
		if(!empty($update_id))
		{
		    $this->session->set_flashdata('success',"Record Updated Successfully");
	        //$this->dynamic_edit($table,$record_id);
	        redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
		    $this->session->set_flashdata('fail',"Record Update Failed");
	        redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
	
	public function dynamic_listing($table)
	{
	    $this->db->delete($table,array('entry_process' => 'pending'));
		$tableFields = $this->general->get_fields_with_comments($this->database,$table);
		$fieldsToRender = array();
		foreach($tableFields as $field)
		{
			$commentChecker =  explode('|',$field->COLUMN_COMMENT);
			
			if(in_array("RESTRICTED",$commentChecker))
			{ 
				redirect('dashboard'); 
			}
			if(in_array("UONLY",$commentChecker))
			{
				redirect('dashboard');
			}
			elseif(in_array("NN",$commentChecker) || in_array("NIL",$commentChecker))
			{

			}
			else
			{
				$fieldArray = array('field_name' => $field->COLUMN_NAME,'comment' => $field->COLUMN_COMMENT);
				array_push($fieldsToRender,$fieldArray);
			}
		}

		$data['records'] = $this->general->all($table);
		$data['table'] = $table;
		$data['fields'] = $fieldsToRender;
		$data['page'] = 'admin/sa_parser/listing';
		$this->load->view('admin/inc/render',$data);

	}
	public function specific_listing($table,$record_id)
	{
	    $this->db->delete($table,array('entry_process' => 'pending'));
		$tableFields = $this->general->get_fields_with_comments($this->database,$table);
		$fieldsToRender = array();
		foreach($tableFields as $field)
		{
			$commentChecker =  explode('|',$field->COLUMN_COMMENT);
			
			if(in_array("RESTRICTED",$commentChecker))
			{ 
				redirect('dashboard'); 
			}
			if(in_array("UONLY",$commentChecker))
			{
				redirect('dashboard');
			}
			elseif(in_array("NN",$commentChecker) || in_array("NIL",$commentChecker))
			{

			}
			else
			{
				$fieldArray = array('field_name' => $field->COLUMN_NAME,'comment' => $field->COLUMN_COMMENT);
				array_push($fieldsToRender,$fieldArray);
			}
		}

		$data['records'] = $this->general->all($table,array($table.'_id'=> $record_id));
		$data['table'] = $table;
		$data['fields'] = $fieldsToRender;
		$data['page'] = 'admin/sa_parser/listing';
		$this->load->view('admin/inc/render',$data);

	}

	

	
	public function viewrecord()
	{
		$table = $_POST['table'];

		$tableFields = $this->general->get_fields_with_comments($this->database,$table);
		$fieldsToRender = array();
		foreach($tableFields as $field)
		{
			$commentChecker =  explode('|',$field->COLUMN_COMMENT);
			
			if(in_array("RESTRICTED",$commentChecker))
			{ 
				redirect('dashboard'); 
			}
			if(in_array("UONLY",$commentChecker))
			{
				redirect('dashboard');
			}
			elseif(in_array("NN",$commentChecker) || in_array("NIV",$commentChecker))
			{

			}
			else
			{
				$fieldArray = array('field_name' => $field->COLUMN_NAME,'comment' => $field->COLUMN_COMMENT);
				array_push($fieldsToRender,$fieldArray);
			}

		}
		$filteredFields = $fieldsToRender;
		$record_id = $_POST['record_id'];
		$data = $this->general->single($table,array($table.'_id' => $record_id));
		$filterData = array();
		foreach($data as $key => $valuedata)
		{
			foreach($filteredFields as $rfield)
			{
				if($key == $rfield['field_name'])
				{
					$commentChecker =  explode('|',$rfield['comment']);
					if(in_array("MULTIIMAGE",$commentChecker))
					{
						$valuedata = "<div class='row'><div class='col-sm-12'><img style='width: 313px !important;height:auto;border-radius:0;' src='".base_url().'uploads/'.$table.'/'.$valuedata."' ></div>";
						$string = preg_split("/[\s|]+/",$rfield['comment']); 
						if(preg_match_all("/IMGREL_/i",$string[0]))
						{
							$newField = str_replace('IMGREL_','',$string[0]);
							$allimages = $this->general->all($newField,array($table.'_id' => $record_id));
							$tableField = $newField."_image";

							$valuedata .= "<div style='padding-top:5px;' class='col-sm-12'><h4>MULTI IMAGES</h4></div>";
							if(!empty($allimages))
							{
								foreach($allimages as  $image)
								{
									$valuedata .= "<div class='col-sm-4'>";
									$valuedata .= "<img style='width: 313px !important;padding-top:5px;height:auto;border-radius:0;' src='".base_url('uploads/').$newField."/".$image->$tableField."'>";
									$valuedata .= "</div>";
								}
							}

						}
						$valuedata .= '</div>';


						$field = ucwords(str_replace('_id','',str_replace('_'," ",$rfield['field_name'])));
						$filterData[$field] = $valuedata;
					}
					elseif(in_array("IMAGE",$commentChecker))
					{
						$valuedata = "<img style='width: 313px !important;height:auto;border-radius:0;' src='".base_url().'uploads/'.$table.'/'.$valuedata."' >";
						$field = ucwords(str_replace('_id','',str_replace('_'," ",$rfield['field_name'])));
						$filterData[$field] = $valuedata;
					}
					elseif(in_array("SELFDROP",$commentChecker))
					{
						$selftable = str_replace('_id','',$rfield['field_name']);
						$valuedata = name_id($selftable,$valuedata);
						if(empty($valuedata))
						{
							$valuedata = "No Record Found";
						}
						$field = ucwords(str_replace('id','',str_replace('_'," ",$rfield['field_name'])));
						$filterData[$field] = $valuedata;
					}
					else
					{
						$field = ucwords(str_replace('id','',str_replace('_'," ",$rfield['field_name'])));
						$filterData[$field] = $valuedata;
					}
				}
			}
		}
		echo json_encode($filterData);
	}
	
	

	public function upload_single($id)
	{
	    $table = $_POST['table'];
	    $field = $_POST['field'];
	    $table_id = $_POST['table'].'_id';
	    $image = single_image_upload($_FILES['image'],"./uploads/".$_POST['table']);
	    $this->general->gupdate($table,array($table_id => $id),array($field => $image));
	}

	public function admin_logout()
	{
		$this->session->unset_userdata('admin_id');
		redirect('admin');
	}
	
	public function deletef($id)
	{
	    $this->db->delete('product_img',array('product_id' => $id,'product_img_image' => $_POST['name']));
	}

	public function uploadsf($table="",$parent_table="",$id="")
	{
	    $path = "./uploads/".$table;
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}
		
		$field = "files";
		$imageField = $table."_image";
		$parent_table_id = $parent_table."_id";

		$config['upload_path'] = './uploads/'.$table.'';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size']     = '0';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);		
		$files = $_FILES;
		$cpt = count($_FILES[$field]['name']);
		$cpt;
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['f']['name']= $files[$field]['name'][$i];
			$_FILES['f']['type']= $files[$field]['type'][$i];
			$_FILES['f']['tmp_name']= $files[$field]['tmp_name'][$i];
			$_FILES['f']['error']= $files[$field]['error'][$i];
			$_FILES['f']['size']= $files[$field]['size'][$i]; 
			if($this->upload->do_upload('f')){
				
				$file_detail = $this->upload->data();
				$data1[$imageField] = $file_detail['file_name'];
				$data1[$parent_table_id] = $id;
				$result = $this->general->gadd($table,$data1);	
				
			}else{						
				if(strpos($this->upload->display_errors(), 'did not select') !== false){
					return 1;
				}else{
					$_SESSION["msg_detail"] = $this->upload->display_errors() ; 
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data', 'Failed');
					echo $this->upload->display_errors();
					return 0;
				}
			}
		}		
		return 1;
	}

	public function profile_update()
	{
		if($_POST)
		{
			$data = array(
				'admin_name' => $this->input->post('admin_name'),
				'admin_email' => $this->input->post('admin_email'),
				'admin_password' => $this->encryption->encrypt($this->input->post('admin_password')),
			);
			if(!empty($_FILES['admin_image']['name'])){$data['admin_image'] =single_image_upload($_FILES['admin_image'],"./uploads/admin");}
			else{ $data['admin_image'] = $this->input->post('admin_image'); }
			$update = $this->general->gupdate('admin',array('admin_id' => $this->session->userdata('admin_id')),$data);
			if(!empty($update))
			{
				$this->session->set_flashdata('profileupdatesuccess','Admin profile updated');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$this->session->set_flashdata('profileupdatefail','Admin profile update failed');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			$data['admin'] = $this->general->single('admin',array('admin_id' => $this->session->userdata('admin_id')));
			$data['page'] = 'admin/admin-profile';
			$this->load->view('admin/inc/render',$data);
		}
	}






}
