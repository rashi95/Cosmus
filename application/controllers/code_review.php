<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code_review extends CI_Controller{
     
	function index()
	{
		if(!$this->session->userdata['is_logged_in'])
			redirect('index.php/main/restricted');
		$this->load->view("code_review");
	}
	
}
