<?php
session_start();
include 'users.php';

if ($_SESSION['username']=="anton") {
    $logeduser = $users[$_SESSION['username']];
    $dataSource = 'mysql:dbname=db_users;host=localhost';
    $user = 'root';
    $password = '123456';
    $db = new PDO($dataSource, $user, $password);
//$db->exec("INSERT INTO users (login, firstname, lastname, password, vk_url ) VALUES ('serg', 'Sergey', 'Ivashchenko', '$2y$10$1O6yO0jZ9zzNzzE0v.rlPeEeSthC7E1KEAE2.AM83xUwutz/RYYXi', 'http://vk.com/mantichoras')");
    $dblogin = 'grisha';
    $stmt = $db->prepare('SELECT name FROM users_table WHERE name=:name' );
    $stmt->execute(array(':name' => $dblogin,));
//$result = $db->query("SELECT * FROM users WHERE login=$dblogin");
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
