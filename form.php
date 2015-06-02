<?php
session_start();
$users =  array('anton' => '1224', 'grisha' => '5678', 'ivan' => '5432', 'izya' => '1095');
$logform = "
	<form action='form.php' method='post''>
		
			<input  type='text' name= 'name' placeholder='Your name '><br />
			<input  type='password' name ='password'placeholder='Password'><br />
			<input  type='submit' value='log in'>
		
	</form>		
";
if (isset($_REQUEST['name'])) {
	$name= $_REQUEST['name'];
	$pass= $_REQUEST['password'];
	if (isset($users[$name]) && $pass == $users[$name]) {
		$_SESSION['username']=$name;
       header("location:$name.php");

	}
	else {
		echo "incorrect user name or password";
		echo $logform;
	}
}
else {	echo $logform;
        echo "<a href='regform.php'>Registration</a> ";
}
if (isset($_REQUEST['out'])){
    unset($_SESSION['username']);
}
var_dump($_SESSION['username']);


