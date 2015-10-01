<?php

$conn = mysql_connect('localhost', 'root', '');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql1 = "CREATE DATABASE CI";
if (mysql_query($sql1, $conn))
{
	$flag = 0;
	$flag2 = 0;
	$flag3 = 0;
	$flag4 = 0;
	mysql_select_db( 'CI' );
    //echo "Database my_db created successfully\n";
    $sql2 = "CREATE TABLE users (
    ID int NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL UNIQUE,
    First_Name VARCHAR(255) NOT NULL,
    Last_Name VARCHAR(255) NOT NULL,
    Age INT(255),
    PRIMARY KEY (ID)
     )";

	$sql3 = "CREATE TABLE temp_users (
    ID int NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL UNIQUE,
    First_Name VARCHAR(255) NOT NULL,
    Last_Name VARCHAR(255) NOT NULL,
    Age INT(255),
    `Key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (ID)
     )";
	
	$sql4 = "INSERT INTO `users` (`Email`, `Password`, `Username`, `First_Name`, `Last_Name`, `Age`) VALUES
('ssadteam48@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 'Admin', 'admin', 'admin', 0)";
	$sql5 = "CREATE TABLE IF NOT EXISTS `Admin` (
  `Codes_Reviewed` varchar(100) NOT NULL,
  `Language` varchar(100) NOT NULL DEFAULT 'C',
  `Difficulty` varchar(100) NOT NULL DEFAULT 'medium',
  `Score` int(200) NOT NULL
)";
	if (mysql_query($sql2, $conn))
	{
		$flag = 1;
		//echo "Everything Created!";
	}
	else
		echo 'Error creating database: ' . mysql_error() . "\n";
	
	if (mysql_query($sql3, $conn))
	{
		$flag2 = 1;
		//echo "Everything Created!";
	}
	else
		echo 'Error creating database: ' . mysql_error() . "\n";
	if (mysql_query($sql4, $conn))
	{
		$flag3 = 1;
		//echo "Everything Created!";
	}
	else
		echo 'Error creating database: ' . mysql_error() . "\n";
	if (mysql_query($sql5, $conn))
	{
		$flag4 = 1;
		//echo "Everything Created!";
	}
	else
		echo 'Error creating database: ' . mysql_error() . "\n";
	if($flag2 == 1 && $flag == 1 && $flag3 == 1 && $flag4 == 1)
	{
		echo "Your Database and tables have been created.";
	}

	
}
else
{
    echo 'Error creating database: ' . mysql_error() . "\n";
}


?>
