<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaderboard extends CI_Controller
{
	function index()
	{
		if(!$this->session->userdata['is_logged_in'])
			redirect('index.php/main/restricted');
			//$this->load->view('restricted');
		$this->load->database();
                $this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$data['username']=$username;
		if(!$this->db->table_exists('leader_board'))
		{
			$fields = array(
     	                   'Username' => array(
    	                                            'type' => 'VARCHAR',
      	                                            'constraint' => '255',             
      	         	                           ),
                 	       'Score' => array(
                     	                            'type' => 'INT',
                     	                            'constraint' => 255,
                      	                    ),                        
              	  );
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table('leader_board');
		}
		$this->load->view("leaderboard",$data);
	}
	

}
