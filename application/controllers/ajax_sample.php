<?php
/*
   * @author: Alysson Ajackson
   * @date: Wed Apr 10 22:10:15 BRT 2013
   * */
class Ajax_sample extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	/*
	   * show list as a table, get data from "test_model"
	   * */
	function update_db(){
		//$this->load->view('select');
		$this->load->model('model_users');
		$flag=$this->model_users->update_bug();
	}
	function delete_db(){
		$this->load->model('model_users');
		$this->model_users->delete_bug();
		return "done";
		//echo "problem";
	}
	function index(){
		if(!$this->session->userdata['is_logged_in'])
			redirect('index.php/main/restricted');
		$this->load->view('test_page');
	}
	function get_score()
	{
		$name = $this->session->userdata('filename');
		$path = $this->session->userdata('path');
		$this->load->helper('file');
		$string=read_file($path);
		$string = str_replace('<', '&lt;', $string);
		$code_lines = explode("\n", $string);
		//retriving name of table where users marked bugs are saved
		$this->load->model('model_users'); //loading model
		//fetching table's name where correct marks are stored
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$arr = explode("_",$name);
		$arr = $arr[1];
		//Fetching sore of username for this code
		$user = mysqli_connect("localhost", "root", "");
		mysqli_select_db($user,"CI");
		$result = mysqli_query($user,"SELECT Score FROM $username WHERE Codes_Reviewed = '$arr'") or die(mysqli_error($user));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$score = $row['Score'];
		$flag = 0;
		$this->db->cache_on();
		$result = mysqli_query($user,"SELECT * FROM $name") or die(mysqli_error($user));
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$temp = $row['line_number'];
			$this->db->cache_on();
			$result2 = mysqli_query($user,"SELECT * FROM $arr WHERE line_number = '$temp'") or die(mysqli_error($user));
				while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
				{
					if(($row['bug_type'] == $row2['bug_type']) && ($row['priority'] == $row2['priority']))
					{
						$score+=5;
						$flag = 1;
						break;
					}
				}
				if($flag==0)
					$score-=1;
				$flag=0;

		}
		if($score<0)
			$score=0;
		$result = mysqli_query($user,"UPDATE $username SET Score = $score WHERE Codes_Reviewed = '$arr'") or die(mysqli_error($user));
		redirect('index.php/ajax_sample/load_score','refresh');
	}
	function load_score()
	{
		
		$name = $this->session->userdata('filename');
		$arr = explode("_",$name);
		$arr = $arr[1];
		$this->load->model('model_users'); //loading model
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$user = mysqli_connect("localhost", "root", "");
		mysqli_select_db($user,"CI");
		$result = mysqli_query($user,"SELECT Score FROM $username WHERE Codes_Reviewed = '$arr'") or die(mysqli_error($user));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$score = $row['Score'];
		$data2['score'] = $score;
		$data2['file_name'] = $name;
		$this->load->model('model_score');
		$data = $this->model_score->get_correct_lines($name, $arr);
		$data3 = $this->model_score->get_wrong_lines($name, $arr);
		$data4 = $this->model_score->get_unanswered_lines($name, $arr);
		$data5 = array('correct' => $data, 'wrong' => $data3, 'unanswered' => $data4);
		$data2['correct'] = $data;
		$data2['wrong'] = $data3;
		$data2['unanswered'] = $data4;
		$data2['path'] = $this->session->userdata('path');
		$this->load->view('score', $data2);
	
	}
	function get_mark()
	{	
		$score = 0;
		$name = $this->session->userdata('filename');
		$arr = explode("_",$name);
		$arr = $arr[1];
		$user = mysqli_connect("localhost", "root", "");
		mysqli_select_db($user,"CI");
		$result = mysqli_query($user,"SELECT * FROM $name") or die(mysqli_error($user));
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$temp = $row['line_number'];
			$result2 = mysqli_query($user,"SELECT * FROM $arr WHERE line_number='$temp'") or die(mysqli_error($user));
			while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
			{
				if(($row['bug_type'] == $row2['bug_type']) && ($row['priority'] == $row2['priority']))
					$score+=1;
			}
		}
		header("Content-type: text/plain; charset=utf-8");
		echo $score;
	}
	function get_hint()
	{
		$hint = "";
		$this->load->model('model_users');
		$email = $this->session->userdata['Email'];
		$username = $this->model_users->get_username($email);
		$name = $this->session->userdata('filename');
		$arr = explode("_",$name);
		$arr = $arr[1];
		$user = mysqli_connect("localhost", "root", "");
		mysqli_select_db($user,"CI");
		$result = mysqli_query($user,"SELECT Score FROM $username WHERE Codes_Reviewed = '$arr'") or die(mysqli_error($user));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$score = $row['Score'];
		$score-=2;
		$result = mysqli_query($user,"UPDATE $username SET Score = $score WHERE Codes_Reviewed = '$arr'") or die(mysqli_error($user));
		$result = mysqli_query($user,"SELECT * FROM $arr") or die(mysqli_error($user));
		$flag=0;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$temp = $row['line_number'];
			$result2 = mysqli_query($user,"SELECT * FROM $name WHERE line_number='$temp'") or die(mysqli_error($user));
			if(mysqli_num_rows($result2)==0)
			{
				$hint=$row['hint'];
				break;
			}
			else
			{
				while($row1 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
				{
					if($row1['bug_type']!=$row['bug_type'])
					{
						$flag = 1;
						break;
					}
				}
				if($flag==1)
				{
					$hint=$row['hint'];
					break;
				}
				
			}
			$flag=0;
		}
		header("Content-type: text/plain; charset=utf-8");
		if(strcmp($hint,"")!=0)
				echo $hint;
		else
			echo "Congratulations,you have found all the bugs correctly";
	}
}
?>
