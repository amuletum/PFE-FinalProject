<HTML>

<HEAD>
	<TITLE> Impossible Beer Login </TITLE>
	<META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <LINK rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<LINK REL="stylesheet" TYPE="text/css" href="login.css"> 
</HEAD>

<BODY>
	<div id = "container">

<?php

//Connect to database

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "root";

mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ("Our Server is Stolen by Aliens. Please Try Again Later.");


//select the database 
$mysql_database = "myapp";
mysql_select_db($mysql_database) or die("Our Database is Stolen by Aliens, Please Try Again Later.");

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
		echo "<BR> Invalid Password. Please Try Again. <BR>";
	}
}
else{
	echo "<BR> The EmailID you entered does not exist. Please Try Again <BR>";
}
}

?> 
	</div>

<div class = "btmbanner">

<h5>For further assistance, please contact us at (467) 677-4253.</h5>

<a class="btn btn-primary" href="index.html" role="button">Return to Homepage</a>

</div>

<DIV id="footer">&copy; Impossible Beer 2018. All Rights Reserved</DIV>

</BODY>


</HTML>
