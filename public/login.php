<?php 
include "db.php";

session_start();

if (!empty($_POST['login']) && !empty($_POST['password']))
{
    $login = $_POST['login'];

    $password = $_POST['password'];

    $stm = $pdo->query("SELECT * FROM users WHERE login='$login'");

    $result = $stm->fetch();

    if ($result['password']==$password)
    {
    $_SESSION['id_user']=$result['id'];

    $_SESSION['role']=$result['role'];

    $_SESSION['auth']=true;
    $_SESSION['login']=$result['login'];

    $_SESSION['user']=$result;
    }
    else {header('Location:authentication.php?message=error');}
}
header('location:account.php?message=success');
?> 