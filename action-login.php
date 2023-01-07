<?php

include 'konedb.php';

$baca = mysqli_query($db, 'select * from admins');
$data= mysqli_fetch_array($baca);
   
$usernamelogin = $data['username'];
$passwordlogin = $data['pass'];


session_start();


$username = $_POST['username'];
$password = $_POST['password'];


if ($username == $usernamelogin && $password == $passwordlogin) {
    session_start();
    $_SESSION['username'] = $username;
    header('Location: admin.php');
} else {
    header('Location: login.php');
}
?>
