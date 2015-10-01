<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{
	 function index()
	{
		$this->login();
	}
	 function login()
	{
		$this->load->view("login");
	}
	 function members(){
		if($this->session->userdata['Email'] == 'ssadteam48@gmail.com' && $this->session->userdata['is_logged_in'])
		{
			if($this->session->userdata['is_admin'])
			{
				redirect('/index.php/upload', 'refresh');
			}
			else
			{
				$this->load->model('model_users');
				$email = $this->session->userdata['Email'];
				$username = $this->model_users->get_username($email);
				$this->load->library('table');
				$data2['username'] = $username;
				//echo $username;
				$this->load->view('members', $data2);
			}
		}
		elseif($this->session->userdata('is_logged_in'))
		{
			$this->load->model('model_users');
				$email = $this->session->userdata['Email'];
				$username = $this->model_users->get_username($email);
				$this->load->library('table');
				$data2['username'] = $username;
				//echo $username;
				$this->load->view('members', $data2);
			
		}		
		else
		{

			redirect('index.php/main/login');
		}
		
	}
        function redirect_admin(){
			$data=array('Email' => $this->session->userdata['Email'], 'is_logged_in' => 1, 'is_admin' => 0);
			//echo $data['Email'];
        	//$this->session->userdata['is_admin'] = 0;
        	$this->session->set_userdata($data);
			redirect('index.php/main/members');
	}
	function redirect_leader()
	{
		$data=array('Email' => $this->session->userdata['Email'], 'is_logged_in'=>1, 'is_admin' => 0);
        	//$this->session->userdata['is_admin'] = 0;
        	$this->session->set_userdata($data);
        	redirect('index.php/select/');
	}
	 function login_validation()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('Email','Email','required|trim|xss_clean|callback_validate_credentials');

		$this->form_validation->set_rules('Password','Password','required|trim|md5');


		if($this->form_validation->run()){
			if($this->input->post('Email') == "ssadteam48@gmail.com")
				$data=array('Email' => $this->input->post('Email'), 'is_logged_in'=>1, 'is_admin' => 1);
			else
				$data=array('Email' => $this->input->post('Email'), 'is_logged_in'=>1, 'is_admin' => 0);
			$this->session->set_userdata($data);
			redirect('index.php/main/members');
		}
		else
		{
			$this->load->view('login');
		}
	}


	 function signup_validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('Email','Email','required|trim|valid_email|is_unique[users.Email]');
		$this->form_validation->set_rules('Password','Password','required|trim');
		$this->form_validation->set_rules('CPassword','Confirm Password','required|trim|matches[Password]');
		$this->form_validation->set_rules('Username','Username','required|trim|is_unique[users.Username]');

		$this->form_validation->set_message('is_unique',"That email address/Username already exists");


		if($this->form_validation->run())
		{
			$key=md5(uniqid());
			$config = array(
				'protocol' => 'smtp',
        		'smtp_host' => 'ssl://smtp.googlemail.com',
        		'smtp_port' => 465,
        		'smtp_user' => 'ssadteam48@gmail.com',
    		    'smtp_pass' => 'ssad1234',
  		        'mailtype'  => 'html', 
        		'charset' => 'utf-8',
        		'wordwrap' => TRUE

    );
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->load->model('model_users');
			$this->email->from('ssadteam48@gmail.com','Admin');
			$this->email->to($this->input->post('Email'));
			$this->email->subject("Confirm Your Account");
			$message = "<p>Thank You for signing up!";
			$message.="<p><a href='".base_url()."index.php/main/register_user/$key'>Click here to Confirm your account</a></p>";
			$this->email->message($message);
			if($this->model_users->add_temp_user($key)){

			if($this->email->send())
			{
				$this->load->view("registered");
			}
			else
			{
				echo "Could not send the email";
			}
		}
		else{
				echo "Problem adding to DB";
		}
			//$this->model_users->add_temp_user($key);
			//echo "pass";
		}
		else
		{
			//echo "no pass";
			$this->load->view("signup");
		}
	}
	
	 function validate_credentials()
	{
		$this->load->model('model_users');
		if($this->model_users->can_log_in()){
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password');
			return false;
		}
	}

	 function restricted(){
		$this->load->view('restricted');
	}

	 function logout(){
		$this->session->sess_destroy();
		redirect('index.php/main/login','refresh');
	}


	 function signup(){
		$this->load->view("signup");
	}

	 function register_user($key){
		$this->load->model('model_users');
		if($this->model_users->is_key_valid($key)){
			if($username = $this->model_users->add_user($key))
			{
				if($username['Email'] == 'ssadteam48@gmail.com')
				{
				$data=array(
					'Email' => $username['Email'],
					'is_logged_in' => 1,
					'is_admin' => 1
					);
				}
				else
				{
					$data=array(
					'Email' => $username['Email'],
					'is_logged_in' => 1,
					'is_admin' => 0
					);
				}
				$this->session->set_userdata($data);
				$this->load->model('model_users');

				$this->model_users->create_profile_db($username['Username']);
				redirect("index.php/main/members");
			}
			else
			{
				echo "failed";
			}
			
		}
		else{
			echo "invalid";
		}
	}
}
