<?php

//Connect to database

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "root";

mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ("Couldn't connect to the database server");
//echo "<BR> Connection Successful!!! Woohoo!! <BR>";


//select the database 
$mysql_database = "myapp";
mysql_select_db($mysql_database) or die("Couldn't find the database");
//echo "<BR> Found the Database! <BR>";

// getting username and password from login page
$user_email = $_POST["email"];
$user_password = $_POST["password"];


$sql_ret = "SELECT * FROM users";
$ret_result = mysql_query($sql_ret);

$data_size = mysql_num_rows($ret_result);

if($user_email == "admin@admin.com" && $user_password == "12345"){
	echo "<BR> List of Users <BR>";
	$k = 0;
	while ($k <= $data_size) {
	$new_row = mysql_fetch_array($ret_result);
	$user_firstname = $new_row['firstname']; 
	$user_lastname = $new_row['lastname'];
	echo "<BR> $user_firstname $user_lastname <BR>";
	$k++;
}
}
else{

$sql_info = "SELECT * FROM users WHERE email = '$user_email'";
$ret_info = mysql_query($sql_info);
$info_size = mysql_num_rows($ret_info);

if($info_size == 1){
	$user_info = mysql_fetch_array($ret_info);
	$ret_password = $user_info['password'];
	if($user_password === $ret_password){
		$ret_firstname = $user_info['firstname'];
		$ret_lastname = $user_info['lastname'];
		echo "<BR> Welcome Back $ret_firstname $ret_lastname <BR>";
	}
	else{
		echo "<BR> Invalid Password <BR>";
	}
}
else{
	echo "<BR> EmailID does not exist <BR>";
}
}

?> 