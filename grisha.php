<?php
session_start();
include 'users.php';

if ($_SESSION['username']=="grisha") {
    $logeduser = $users[$_SESSION['username']];
    echo "Hello ".$logeduser['name'];
    echo "<form action='form.php' method='post'>
            <input type='submit' value='Log out' name='out'>
          </form>
    ";
}
else {
    echo "You not Log In";
    include 'form.php';
}

