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

//connect to database

$mysql_hostname="localhost";
$mysql_user="root";
$mysql_password="root";

mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Our Server is Stolen by Aliens. Please Try Again Later.");

// select the database

$mysql_database = "myapp";

mysql_select_db($mysql_database) or die("Our Database is Stolen by Aliens, Please Try Again Later.");

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
				<br> Account Email: $signup_email <br>
				<br> If you have any question, please contact us at (467) 677-4253. <br>";
	}
	else{
		echo "<br> Couldn't Create User!! <br>
			  <br> Please contact us at (467) 677-4253 for further assistance. <br>";
	}	
}

?>
</div>
<div class = "btmbanner">
<a class="btn btn-primary" href="index.html" role="button">Return to Homepage</a>
</div>

<DIV id="footer">&copy; Impossible Beer 2018. All Rights Reserved</DIV>

</BODY>


</HTML>