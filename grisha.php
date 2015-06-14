<?php
session_start();
include 'users.php';

if ($_SESSION['username'] == "grisha") {
    $logeduser = $users[$_SESSION['username']];
    echo "Hello ".$logeduser['name'];
    //$host = 'localhost';
    //$db = 'db_users';
    $userdb = 'root';
    $pasuserdb = '123456';
    //$charset=??
    $dsn = "mysql:host = localhost; dbname = db_users";
    $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    $pdo = new PDO($dsn,  $userdb, $pasuserdb, $opt);
    $stmt = $pdo->prepare('SELECT name FROM db_users WHERE name = ?');
    $stmt->execute([$_GET['email']]);
    foreach ($stmt as $row)
    {
        echo $row['name'] . "\n";
    }
    echo "<form action='form.php' method='post'>
            <input type='submit' value='Log out' name='out'>
          </form>
    ";
}
else {
    echo "You not Log In";
    include 'form.php';
}

