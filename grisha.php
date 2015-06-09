<?php
session_start();

if ($_SESSION['username']=="grisha") {
	echo "Hello ".$_SESSION['username'];
    echo "<form action='form.php' method='post'>
            <input type='submit' value='Log out' name='out'>
          </form>
    ";
}
else {
    echo "You not Log In";
    include 'form.php';
}

