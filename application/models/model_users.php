<?php

class Model_users extends CI_Model{
	function can_log_in(){

		$this->db->where('Email',$this->input->post('Email'));
		$this->db->where('Password',md5($this->input->post('Password')));
		$query=$this->db->get('users');

		if($query->num_rows()==1){
			return true;
		}
		else{
			return false;
		}

	}
	function add_temp_user($key){
		$data=array('Email'=>$this->input->post('Email'),
					'Password'=>md5($this->input->post('Password')),
					'Username'=>$this->input->post('Username'),
					'First_Name'=>$this->input->post('First_Name'),
					'Last_Name'=>$this->input->post('Last_Name'),
					'Age'=>$this->input->post('Age'),
					'key'=>$key);
		$query=$this->db->insert('temp_users',$data);
		if($query){
			return true;
		}
		else{
			return false;
		}

	}
	function is_key_valid($key){
		$this->db->where('key',$key);
		$query=$this->db->get('temp_users');
		if($query->num_rows()==1){
			return true;
		}
		else{
			return false;
		}

	}
	function get_username($email)
	{
		$this->db->where('Email',$email);
		$user = $this->db->get('users');
		if($user)
		{
			$row = $user->row();
			$username = $row->Username;
			return $username;
		}
		else
		{
			return false;
		}
	}
	function add_user($key){
		$this->db->where('key',$key);
		$temp_user=$this->db->get('temp_users');
		if($temp_user){
			$row=$temp_user->row();
			$data=array(
				'Email'=>$row->Email,
				'Password'=>$row->Password,
				'Username'=>$row->Username,
				'First_Name'=>$row->First_Name,
				'Last_Name'=>$row->Last_Name,
				'Age'=>$row->Age,
				);
			$did_add_user=$this->db->insert('users',$data);
		}
		if($did_add_user)
		{
			$this->db->where('key',$key);
			$this->db->delete('temp_users');
			return $data;
		}
		else{
			return false;
		}
	}
	function create_profile_db($newusername){
		$this->load->dbforge();
		$fields = array(
                        'Codes_Reviewed' => array(
                        						'type' => 'VARCHAR',
                        					    'constraint' => '100',
                        					    ),
                        'Language' =>  array(
                        						'type' => 'VARCHAR',
                        						'constraint' => '100',
                        						'default' => 'C',
                        						 ),
                        'Difficulty' => array(
                        						'type' => 'VARCHAR',
                        						'constraint' => '100',
                        						'default' => 'Medium',
                        						),
                        'Score' => array(
                        						'type' => 'INT',
                        						'constraint' => '200',
                        						),
   );
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('Codes_Reviewed', TRUE);

		$this->dbforge->create_table($newusername);
	}
	function create_response_db($name)
	{
		$this->load->dbforge();
		$fields = array(
                    'line_number' => array(
						'type' => 'INT',
						'constraint' => '100',
						'unsigned' => TRUE,
						),
					'bug_type' => array(
						'type' => 'INT',
						'constraint' => '100',
						),
					'priority' => array(
						'type' => 'VARCHAR',
						'constraint' => '100',
						'default' => 'medium',
						),
   );
		$this->dbforge->add_field($fields);
		$this->dbforge->create_table($name);
	}
	function add_leader($user, $score)
	{
		$data=array(
				'Username'=>$user,
				'Score'=>$score,
				);
		$did_add_leader=$this->db->insert('leader_board',$data);
		if($did_add_user)
		{
			return true;
		}
		else{
			return false;
		}
	}
	function add_in_profile($username, $prof)
	{
		$did_add_entry=$this->db->insert($username, $prof);
		if($did_add_entry)
			return true;
		else
			return false;
	}

	function update_bug()
	{
		$line_number= $this->input->post('line_number');
		$flag=0;
		$bug_type = $this->input->post('bug_type');
		$priority_level = $this->input->post('priority_level');
		$this->load->dbforge();
		$data_table = array(
				'line_number' => $line_number,
				'bug_type' => $bug_type,
				'priority' => $priority_level,
				);
		$this->db->insert($this->session->userdata('filename'),$data_table);
	}
	function delete_bug()
	{
		$line_number=$this->input->post('line_number');
		$bug_type = $this->input->post('bug_type');
		$priority_level = $this->input->post('priority_level');
		$this->load->dbforge();
		$this->db->delete($this->session->userdata('filename'),array('line_number'=>$line_number,'bug_type'=>$bug_type,'priority'=>$priority_level));

	}
	function delete_file($file_name, $username)
	{
		if($this->db->delete($username, array('Codes_Reviewed' => $file_name)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}



?>
