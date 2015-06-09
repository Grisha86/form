<?php
session_start();
$rname = isset($_POST['rname']) ? $_POST['rname'] : '';
$rsecondname = isset($_POST['rsecondname']) ? $_POST['rsecondname'] : '';
$rmail = isset($_POST['rmail']) ? $_POST['rmail']:'';

echo "
    <form action='form.php' method='post''>

			Input Your name : <input  type='text' name= 'rname'  value='$rname'><p>
			Input Your secondname : <input type='text' name='rsecondname' value='$rsecondname' ><p>
			Input Your email : <input type='email' name='rmail' value='$rmail'><p>
			Input Your sex  man: <input type='radio' name='rsex' > woman : <input type='radio' name='rsex' ><p>
			Input Password : <input  type='password' name ='rpassword'><p>

			<input  type='submit' value='Registration'>

	</form>
";
var_dump($_POST);