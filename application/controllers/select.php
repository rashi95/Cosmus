<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Select extends CI_Controller{
     
	function index()
	{
		if(!$this->session->userdata['is_logged_in'])
			redirect('index.php/main/restricted');
		$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$data["username"]=$username;
		$data["success"]="";
		$this->load->view("select_try",$data);
	}
	function change_diff($file_name)
	{

		$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		if($this->model_users->delete_file($file_name, $username))
		{
			$temp = $username."_";
			$name = $temp.$file_name;
			$this->load->dbforge();
			$this->dbforge->drop_table($name);
			$data["username"]=$username;
			$data["success"]="";
			$this->load->view("select_try",$data);
		}

		//$this->db->delete('mytable', array('id' => $id)); 
	}
	function log_out($file_name)
	{

		$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		if($this->model_users->delete_file($file_name, $username))
		{
			$temp = $username."_";
			$name = $temp.$file_name;
			$this->load->dbforge();
			$this->dbforge->drop_table($name);
			//$this->load->view("select");
			redirect('index.php/main/logout');
		}

		//$this->db->delete('mytable', array('id' => $id)); 
	}
	function choice_made()
	{
		$lang=$this->input->post("ChoiceLang");
		if($lang=="c")
		{
			$path='./uploads/c';
			$language = 'C';
		}
		elseif($lang=="python")
		{
			$path='./uploads/python';
			$language = 'Python';
		}
		else
		{
			$path='./uploads/javascript';
			$language = 'Javascript';
		}
		$level=$this->input->post("choice_lang");
		if($level==1)
		{
			$path.='/easy/';
			$difficulty = 'Easy';
		}
		elseif($level==2)
		{
			$path.='/medium/';
			$difficulty = 'Medium';
		}
		else
		{
			$path.='/difficult/';
			$difficulty = 'Difficult';
		}
		$this->select_file($path,$language,$difficulty,$lang);
	}
	function select_file($path,$language,$difficulty,$lang)
	{
		$this->load->database();	
		$this->load->helper('file');
		$files=get_filenames($path);
		$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		if($files)
		{
			$random = rand(0,count($files)-1);
			$flag = 0;
			$filexplode = explode(".",$files[$random]);
			$cnt = 0;
			$first = 1;
			while($filexplode[1] == "csv" || $flag == 0 && $cnt < count($files))
			{
				$file_name = $filexplode[0];
				if($first == 1)
				{
					$cnt++;
				}
				$first = 0;
				if($this->db->table_exists($username) && $filexplode[1] != "csv")
				{
	
					$this->db->where('Codes_Reviewed', $file_name);
					$query = $this->db->get($username);
					if($query->num_rows()!=1)
					{
						$flag = 1;
						break;
					}
					
				}
				$random = rand(0,count($files)-1);
				if($cnt >= count($files))
					break;
				$filexplode = explode(".",$files[$random]);
				$file_name = $filexplode[0];
				if($this->db->table_exists($username) && $filexplode[1] != "csv")
				{
					$this->db->where('Codes_Reviewed', $file_name);
					$query = $this->db->get($username);
					if($query->num_rows()!=1)
					{
						$flag = 1;
					}
				}
				$cnt++;
				if($cnt >= count($files))
					break;
								
			}
			$cnt2 = count($files);
			if($cnt == $cnt2 && $flag == 0)
			{
				goto exception;
				
			}
			$path.=$files[$random];
			$this->create_db($path,$username,$language,$difficulty,$lang);
		}
		else
		{
exception:	$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$data["username"]=$username;
		$data["success"]="1";
		$this->load->view('select_try',$data);
			
		}
	}

		function create_db($path,$username,$language,$difficulty,$lang)
		{
			/*DB will be created. Need the file name first. */
			$filename = get_file_info($path,'name');
			$break=explode(".",$filename["name"]);
			$filename=$break[0];
			$temp = $username."_";
			$name = $temp.$filename;
			$this->session->set_userdata('filename',$name);
			$this->session->set_userdata('path',$path);
			if(!$this->db->table_exists($name))
			{
				$this->model_users->create_response_db($name);
			}
			$this->load->model('model_users');
			$prof = array(
								'Codes_Reviewed' => $filename,
			 					'Language' => $language,
			  					'Difficulty' => $difficulty,
			  					'Score' => 0);
			if($this->model_users->add_in_profile($username, $prof))
			{
				$string=read_file($path);
				$this->session->set_userdata('path', $path);
				$string = str_replace('<', '&lt;', $string);
				$code_lines = explode("\n", $string);
				$data['lang']=$lang;
				//Processing code lines, testing.
		                for($i=0;$i<count($code_lines);++$i) {
		                    if ($code_lines[$i] == '')
					$code_lines[$i] = ' ';
		                }
				$data['code_lines'] = $code_lines;
				$data['file_name'] = $filename;
				$data['username'] = $username;
				$data['no_of_bugs'] = $this->get_no_of_bugs($filename);
				$this->load->view('code_review',$data);
			}
			else
			{
				echo "could no";
			}
		
	}
	function get_no_of_bugs($filename)
	{
		$this->load->database();
		return $this->db->count_all($filename);
	}

			
}
