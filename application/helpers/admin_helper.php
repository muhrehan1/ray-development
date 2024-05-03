<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('all'))
{
	function all($tabel="",$where="")
	{		
		$ci =& get_instance();
		$records = $ci->general->all($tabel,$where);
		if($records){	
			return $records;
		}else{
			return  FALSE;
		}

	}
}

if(!function_exists('single'))
{
	function single($tabel="",$where="")
	{		
		$ci =& get_instance();
		$records = $ci->general->single($tabel,$where);
		if($records){	
			return $records;
		}else{
			return  FALSE;
		}

	}
}

if (!function_exists('one'))
{
	function one($tabel="",$where="",$field="")		
	{	
		$ci =& get_instance();
		$result = $ci->general->one($tabel,$where,$field);
		if($result){			
			return $result;
		}else{
			return FALSE;
		}	
	}	
}

if(!function_exists('send_email')){	
	function send_email($send_to,$subject,$body){
		$ci =& get_instance();
		$config['mailtype'] ='html';
		$ci->email->set_header('Header1', 'Email Information');
		$ci->email->initialize($config);    
		$ci->email->from($ci->settings->info_email,$ci->settings->title);
		$ci->email->to($send_to);		
		$ci->email->subject($subject);
		$ci->email->message($body);
		if($ci->email->send()){
			return TRUE;	
		}else{
			return FALSE;
		}
	}
}

if(!function_exists('single_image_upload')){	
	function single_image_upload($image,$path){         
		$_FILES['image']['name']= $image['name'];
		$_FILES['image']['type']= $image['type'];
		$_FILES['image']['tmp_name']= $image['tmp_name'];
		$_FILES['image']['error']= $image['error'];
		$_FILES['image']['size']= $image['size']; 
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}
		$ci =& get_instance();
		$config['upload_path'] = ''.$path.'';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_width'] = '400000';
		$config['max_height'] = '400000';
		$ci->load->library('upload', $config);
		$ci->upload->initialize($config);
		if(!$ci->upload->do_upload('image')){ 
			return array('error' => $ci->upload->display_errors());
		}else{
			$file_detail = $ci->upload->data();				
			return	$file_detail['file_name'];			
		}
		return FALSE;
	}
}

if (!function_exists('check_slug'))
{
	function check_slug($table,$slug)
	{		
		$ci =& get_instance();	
		$records = $ci->general->all($table,'','',$table.'_slug','',$slug);
		if($records){	
			$slug_temp = ''.$table.'_slug';
			foreach($records as $record){
				$result = $record->$slug_temp;
			}			
			$last_char = check_last_char($result);	
			if($last_char){
				$last_char = (int)substr($result , -1);	
				$new_slug = substr_replace($result, "", -2);
				if($new_slug != $slug){					
					return $slug;
				}else{					
					$new_slug = substr_replace($result, "", -1);
					$result = $new_slug.++$last_char;			
					return $result;
				}				
			}else{				
				$result = ''.$slug.'-0';			
				return $result;
			}				
		}else{
			return  $slug;
		}

	}
}

if (!function_exists('check_slug_edit'))
{
	function check_slug_edit($table,$slug,$id)
	{		
		$ci =& get_instance();	
		$records = $ci->general->all($table,'','',$table.'_slug','',$slug);;
		if($records){	
			$slug_temp = ''.$table.'_slug';
			$id_temp = ''.$table.'_id';
			foreach($records as $record){
				$result = $record->$slug_temp;
				$id1 = $record->$id_temp;
			}		
			if($id1 == $id){
				return $slug;
			}else{
				$last_char = check_last_char($result);	
				if($last_char){
					$last_char = (int)substr($result , -1);	
					$new_slug = substr_replace($result, "", -2);
					if($new_slug != $slug){					
						return $slug;
					}else{					
						$new_slug = substr_replace($result, "", -1);
						$result = $new_slug.++$last_char;			
						return $result;
					}				
				}else{				
					$result = ''.$slug.'-0';			
					return $result;
				}
			}				
		}else{
			return  $slug;
		}

	}
}

if (!function_exists('check_last_char'))
{
	function check_last_char($result)
	{
		$r = preg_match_all("/.*?(\d+)$/", $result);
		if($r>0) {
			return 1;
		}else{
			return FALSE;
		}
	}	
}
if (!function_exists('name_id'))
{
	function name_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->general->all($table,$table.'_id='.$id);
		if($temp)
		{			
			$name = $table.'_name';
			foreach($temp as $tp){
				$result = $tp->$name;				
			}
			return $result;
		}
		else
		{
			return FALSE;
		} 
	}
}

