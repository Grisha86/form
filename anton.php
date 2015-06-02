<?php
session_start();
if ($_SESSION['username']=="anton") {
	echo "Hello ".$_SESSION['username'];
    echo "<form action='form.php' method='post'>
            <input type='submit' value='Log out' name='out'>
          </form>
    ";
}
else {
	echo "LOL :)";
}

var_dump($_POST);
