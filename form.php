<?php
session_start();
$users =  array('anton' => array('password' => '1224', 'name' => 'anton'),
                'grisha' => array('password' => '5678', 'name' => 'grisha'),
                'ivan' => array('password' => '5432', 'name' => 'ivan'),
                'izya' => array('password' => '1095', 'name' => 'izya'));


$logform = "
	<form action='form.php' method='post''>
		
			<input  type='text' name= 'name' placeholder='Your name '><p>
			<input  type='password' name ='password'placeholder='Password'><p>
			<input  type='submit' value='log in'> <input type='submit' value='Sign In' name='sin'>
		
	</form>		
";
//REGISTRATION

if (isset($_REQUEST['sin'])) {
    $rname = isset($_POST['rname']) ? $_POST['rname'] : '';
    $rsecondname = isset($_POST['rsecondname']) ? $_POST['rsecondname'] : '';
    $rmail = isset($_POST['rmail']) ? $_POST['rmail']:'';
    echo "
    <form action='form.php' method='post''>

			Input Your name : <input  type='text' name= 'rname'  value='$rname'><p>
			Input Your secondname : <input type='text' name='rsecondname' value='$rsecondname' ><p>
			Input Your email : <input type='email' name='rmail' value='$rmail'><p>
			Input Your sex  man: <input type='radio' name='rmsex' > woman : <input type='radio' name='rwsex' ><p>
			Input Password : <input  type='password' name ='rpassword'><p>

			<input  type='submit' value='Registration'>

	</form>
";
}

//LOGIN

elseif(isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $pass = $_REQUEST['password'];
    if (isset($users[$name]) && $pass == $users[$name]['password']) {
        $_SESSION['username'] = $name;
        header("location:$name.php");

    } else {
        echo "incorrect user name or password";
        echo $logform;
    }
}
else {	echo $logform;
}

//LOGOUT

if (isset($_REQUEST['out'])){
    unset($_SESSION['username']);
}
var_dump($_REQUEST);
var_dump($_POST);

//NEWUSERS



if (isset($_REQUEST['rname'])){
    $nusers = array($_REQUEST['rname']=> $_REQUEST['rpassword']);
    $users= array_merge($nusers,$users);
}
