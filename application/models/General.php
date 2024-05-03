<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Model 
{

	function single($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="",$join_tabel="",$join="")
	{
		$this->db->select('*');
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){ $this->db->where($where); }	
		if($limit){ $this->db->limit($limit); }
		if($order_by){ $this->db->order_by($order_col, $order_by); }
		if($join){ $this->db->join($join_tabel,$join,'left');}	
		if($like){ $this->db->like($order_col,$like); }	
		$query = $this->db->get();
		$result = $query->row();
		return $result; 		
	}
	public function all($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="",$group_by="",$join_tabel="",$join="",$offset="")
	{
		$this->db->select('*');
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		if($order_by){
			$this->db->order_by($order_col, $order_by);
		}	
		if($like){
			$this->db->like($order_col,$like);
		}
		if($group_by){
			$this->db->group_by($group_by);
		}
		if($join){
			$this->db->join($join_tabel,$join,'left');		
		}
		if($offset){				
			$this->db->offset($offset);
		}	
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}
	public function one($tabel="",$where="",$field="")		
	{
		$this->db->select('*');
		$this->db->from($tabel);	
		if(!$where){
			$where = $tabel.'_id > 0';
		}	
		$this->db->where($where);	
		$this->db->where(''.$tabel.'_status',0);
		$query = $this->db->get();
		$result = $query->row();
		if($result){
			$output = $result->$field;			
			return $output;  
		}else{
			return;
		}  
	}
	public function all_select($select="",$tabel="",$where="",$limit="")
	{
		if($select)
		{
			$this->db->select($select);
		}
		else
		{
			$this->db->select('*');
		}
		
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}
	public function gupdate($tabel,$where,$data)
	{
		$this->db->where(''.$tabel.'_status',0);			
		$this->db->where($where);			
		$result = $this->db->update($tabel, $data);
		return $result; 
	}
	function get_enum_values( $table, $field )
	{
		$type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
		preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
		$enum = explode("','", $matches[1]);
		return $enum;
	}

	public function gadd($tabel,$data)
	{
		$this->db->insert($tabel,$data);
		return $this->db->insert_id();
	}

	public function get_fields_with_comments($database="",$table="")
	{
		$query = "SELECT COLUMN_NAME,COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE
		TABLE_SCHEMA = '{$database}' AND TABLE_NAME = '{$table}'";
		$querys = $this->db->query($query);
		$result = $querys->result();
		return $result;
	}
}
