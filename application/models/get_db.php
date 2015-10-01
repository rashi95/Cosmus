<?php

class Get_db extends CI_Model{
	function getAll(){
		$query=$this->db->query("SELECT * FROM test");
		return $query->result();
	}
	function insert($data){
		$this->db->insert("test",$data);
	}

	function insert2($data){
		$this->db->insert_batch("test",$data);
	}
	function update($data){
		$this->db->update("test",$data,"ID = 2");
	}
	function delete($data)
	{
		$this->db->delete("test",$data);
	}
	function empty2($tab){
		$this->db->empty($tab);
	}
}
