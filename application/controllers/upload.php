<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{

		if($this->session->userdata['Email'] == 'ssadteam48@gmail.com' && $this->session->userdata('is_logged_in') && $this->session->userdata('is_admin'))
		{
			$data['error']="";
			$data['success']="";
			$this->load->view('upload_try', $data);
		}
		else
		{
			redirect('index.php/main/restricted');
		}
		//$this->load->view('upload', array('error' => ' ' ));
	}

	function do_upload()
	{
		$path_source1 = "";
		$path_source2 = "";
		$lang=$this->input->post("Language");
		$level=$this->input->post("Dif_level");
		if($lang=="2")
		{
			$config['upload_path'] = './uploads/python';
			$config['allowed_types'] = 'py|csv';
		}
		elseif($lang=="1")
		{
			$config['upload_path'] = './uploads/c';
			$config['allowed_types'] = 'c|csv';
		}
		else
		{
			$config['upload_path'] = './uploads/javascript';
			$config['allowed_types'] = 'csv|js|html';
		}
		if($level=="e")
		{
			$config['upload_path'].="/easy";
			
		}
		elseif($level=="m")
		{
			$config['upload_path'].="/medium";
		}
		else
		{
			$config['upload_path'].="/difficult";
		}
		$config['max_size']= '1000';
		$flag=0;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	        foreach($_FILES as $field => $file)
		{
		if ( ! $this->upload->do_upload($field))
		{
			$error["error"] = $this->upload->display_errors();
			$error["success"] = "";
			$flag=1;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			if($field=="file1")
			{
				$name=$data["upload_data"]["raw_name"];
				$path_source1=$data["upload_data"]["full_path"];
				//var_dump($data["upload_data"]);
				//echo $path_source;
				//echo $name;
			}
			if($field=="file2")
			{
				$path_source2=$data["upload_data"]["full_path"];
			}
		}
		}
		if($flag==1)
		{
			$this->load->helper('file');
			if(strcmp($path_source1,"")!=0)
				unlink($path_source1);
			if(strcmp($path_source2,"")!=0)
				unlink($path_source2);
			$this->load->view('upload_try', $error);
		}
		else
		{
			$path=$data["upload_data"]["full_path"];
			$this->create_table($name,$path,$path_source1,$path_source2);
		}
	}
	function create_table($name,$path,$path_source1,$path_source2)
		{
			$this->load->dbforge();
			$fields = array(
					'line_number' => array(
						'type' => 'INT',
						'constraint' => 5,
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
					'hint' => array(
						'type' => 'TEXT',
						'null' => TRUE,
						),
				       );
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table($name, TRUE);
			$this->fill_table($path,$name,$path_source1,$path_source2);
		}
	function fill_table($path,$name,$path_source1,$path_source2)
		{
			$this->load->dbforge();
			$this->load->helper('file');
			$this->load->database();
			$string=read_file($path);
			$arr=explode("\n",$string);
			$ctr=count($arr);
			$ctr--;
			$flag_csv=0;
			$flag_ind=0;
			foreach($arr as $item => $value)
			{
				if($ctr==0)
				{
					$flag_ind=1;
					break;
				}
				$ref=explode(" ",$value);
				$hint="";
				for($i=3;$i<count($ref);$i++)
				{
					$hint.=$ref[$i];
					$hint.=" ";
				}
				if(!(ctype_digit($ref['0']) && ctype_digit($ref['1'])) || (strcmp($hint,"")==0))
				{
					$flag_csv=1;
					$data_error["error"]="Format of .csv file wrong";
					$this->dbforge->drop_table($name);
					break;
				}
				else
				{
					$data_table=array(
					    'line_number' => $ref['0'],
					    'bug_type' => $ref['1'],
					    'priority' => $ref['2'],
					    'hint' => $hint,
						);
					$this->db->insert($name,$data_table);
				}
				$ctr--;
			}
			if($flag_csv==0)
			{
				$data["success"]="You have successfully uploaded both the files";
				$data["error"]="";
				unlink($path_source2);
				$this->load->view('upload_try', $data);
			}
			else
			{
				$data_error["success"]="";
				unlink($path_source1);
				unlink($path_source2);
				$this->dbforge->drop_table($name);
				$this->load->view('upload_try',$data_error);
			}
		
		}
		
	


	function delete_file()
	{
		$path = "./uploads/";
		$file = $this->input->post("file");
		$arr = explode("/",$file);
		$arr = $arr[2];
		$arr = explode(".",$arr);
		$arr=$arr[0];
		
		$path.=$file;
		if(!file_exists($path))
		{
			$data["error"] = "No such file exists";
			$data["success"]="";
			$this->load->view('upload_try',$data);		
		}
		else
		{
			unlink($path);
			$this->load->dbforge();
			$this->dbforge->drop_table($arr);
			$data["success"] = "Successfully deleted file";
			$data["error"] = "";
			$this->load->view('upload_try',$data);
		}	
		
	}

	function list_file()
	{
		$this->load->helper('file');
		$data["ce"] = get_filenames('./uploads/c/easy');
		$data["cm"] = get_filenames('./uploads/c/medium');
		$data["cd"] = get_filenames('./uploads/c/difficult');
		$data["pye"] = get_filenames('./uploads/python/easy');
		$data["pym"] = get_filenames('./uploads/python/medium');
		$data["pyd"] = get_filenames('./uploads/python/difficult');
		$data["jse"] = get_filenames('./uploads/javascript/easy');
		$data["jsm"] = get_filenames('./uploads/javascript/medium');
		$data["jsd"] =	get_filenames('./uploads/javascript/difficult');
		$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$data['username'] = $username;
		$this->load->view('list_file',$data);
		//echo count($data["jsd"]);	
	}

}

?>
