<?php

class Model_score extends CI_Model
{

	function get_correct_lines($name, $filename)
	{
		$ci = mysqli_connect("localhost", "root", "");
		mysqli_select_db($ci,"CI");
		$result = mysqli_query($ci,"SELECT * FROM $name");
		$cnt = 0;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			if($res = mysqli_query($ci,"SELECT * FROM $filename WHERE line_number = ".$row['line_number'])){
				while($row2 = mysqli_fetch_array($res,MYSQLI_ASSOC))
				{
					if(($row['bug_type'] == $row2['bug_type']) && ($row['priority'] == $row2['priority']))
					{
						$data[$cnt] =  array('line_number'=> $row['line_number'],
						    'bug_type'=>$row['bug_type'],
						    'priority'=>$row['priority']);;
						$cnt++;
					}
				}
			}

		}
		if($cnt == 0)
			return false;
		else
			return $data;
	}
	function get_wrong_lines($name ,$filename)
	{
		$ci = mysqli_connect("localhost", "root", "");
		mysqli_select_db($ci, "CI");
		$sql = "SELECT * FROM $filename";
		$result = mysqli_query($ci, $sql);
		$cnt = 0;
		/*$query = $this->db->get($filename);
		foreach ($query->result() as $row)
		{*/
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$sql2 = "SELECT * FROM $name WHERE line_number = ".$row['line_number'];
			$result2 = mysqli_query($ci,$sql2) or die(mysql_error($ci));
			$flag = 0;
			$cnt2 = 0;
			while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) //use mysql_num_rows(), itll work then. check number of rows and then fetch array. include answers that they have given but we dont have.
			{
				$cnt2 = 1;
				if(($row['bug_type'] == $row2['bug_type']) && ($row['priority'] == $row2['priority']))
				{
					$flag = 1;
					
				}
			}
			if($flag == 0 && $cnt2 == 1)
			{
				$data[$cnt] = array('line_number'=> $row2['line_number'],
						    'bug_type'=>$row2['bug_type'],
						    'priority'=>$row2['priority']);
				$cnt++;
			}
		}
		if($cnt == 0)
			return false;
		else
			return $data;
	}
	function get_unanswered_lines($name ,$filename)
	{
		$ci = mysqli_connect("localhost", "root", "");
		mysqli_select_db($ci, "CI");
		$sql = "SELECT * FROM $filename";
		$result = mysqli_query($ci, $sql);
		$cnt = 0;
		/*$query = $this->db->get($filename);
		foreach ($query->result() as $row)
		{*/
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$sql2 = "SELECT * FROM $name WHERE line_number = ".$row['line_number'];
			$result2 = mysqli_query($ci,$sql2);
			$flag = 0;
			$cnt2 = 0;
			while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
			{

				if(($row['bug_type'] == $row2['bug_type']) && ($row['priority'] == $row2['priority']))
				{
					$flag = 1;
					
				}
			}
			if($flag == 0)
			{
				$data[$cnt] =  array('line_number'=> $row['line_number'],
						    'bug_type'=>$row['bug_type'],
						    'priority'=>$row['priority']);;
				$cnt++;
			}
		}
		if($cnt == 0)
			return false;
		else
			return $data;
	}
	

}

?>
