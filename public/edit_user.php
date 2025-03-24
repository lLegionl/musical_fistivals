<?php 
include "db.php";
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['phone']))
{   
    session_start();
    $id=$_GET['id'];
    var_dump($_SESSION);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nameUser = $_POST['name'];
    $surname = $_POST['surname'];

    $stm = $pdo->query(
    "UPDATE
    users
    SET
    login = '$login',
    name = '$nameUser',
    surname = '$surname',
    phone = '$phone',
    email = '$email',
    password = '$password'
    WHERE
    id='$id'"
    );
    $result = $stm->fetch();

    $stm = $pdo->query("SELECT * FROM users WHERE login='$login'");

    $user = $stm->fetch();
    $_SESSION['user']=$user;
    
    header('location:login.php?message=edit_ok');
    
}
else {header('location:account.php?message=error');}

?> 
