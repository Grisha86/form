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
    $dsn = "mysql:dbname = db_users; host = localhost ";
    //$opt = array(
    //    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    //    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    //);
    $pdo = new PDO($dsn,  $userdb, $pasuserdb);
    $dblogin = 'grisha';
    $stmt = $pdo->prepare('SELECT * FROM users_table WHERE name=:name' );
    $stmt->execute(array(':name' => $dblogin,));
    $row = $stmt->fetch();
    var_dump($row);
    echo "<form action='form.php' method='post'>
            <input type='submit' value='Log out' name='out'>
          </form>
    ";
}
else {
    echo "You not Log In";
    include 'form.php';
}

