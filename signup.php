<?php

//connect to database

echo '<link rel="stylesheet" type="text/css" href="final.css">';

$mysql_hostname="localhost";
$mysql_user="root";
$mysql_password="root";

mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Our Server is Stolen by Aliens. Please Try Again Later.");

// select the database

$mysql_database = "myapp";

mysql_select_db($mysql_database) or die("Our Database is Stolen by Aliens, Please Try Again Later");

//data variables

$signup_firstname = $_POST["signup-firstname"];
$signup_lastname = $_POST["signup-lastname"];
$signup_email = $_POST["signup-email"];
$signup_password = $_POST["signup-password"];
$signup_repassword = $_POST["signup-repassword"];

//check email

$sql_ret = "SELECT * from users WHERE email = '$signup_email'";
$ret_result = mysql_query ($sql_ret);
$data_size=mysql_num_rows($ret_result);

//check password and input data

if ($signup_password != $signup_repassword) {
	echo "<br> Password Does Not Match!! <br>";
}
elseif ($data_size != 0) {
	echo "<br> Email Already Existed!! <br>";
}
else {
	$sql_ret2 = "INSERT INTO users (firstname, lastname, email, password, repassword) VALUES ('$signup_firstname', '$signup_lastname', '$signup_email', '$signup_password', '$signup_repassword')";
	$ret_result2 = mysql_query($sql_ret2);

	if ($ret_result2) {
		echo "<br> $signup_firstname, Your Account Has Been Created Successfully!! <br>
				<br> Your Accounts Details are the Following:<br>
				<br> First Name: $signup_firstname <br>
				<br> Last Name: $signup_lastname <br>
				<br> Account Email: $signup_password <br>
				<br> If you have any question, please contact us at (467) 677-4253. <br>";
	}
	else{
		echo "<br> Couldn't Create User!! <br>
			  <br> Please contact us at (467) 677-4253 for further assistance. <br>";
	}	
}

?>