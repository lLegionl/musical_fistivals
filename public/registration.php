<?php 
    session_start();
    include "db.php";

if (!empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']))
{
    $quary = $pdo->prepare('INSERT INTO `users`(`id`, `login`, `name`, `surname`, `email`, `phone`, `password`, `role`) 
    VALUES (null,?,?,?,?,?,?,0)');

    $user = $quary->execute([
        $_POST['login'],
        $_POST['name'],
        $_POST['surname'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['password']
    ]);
    if ($user) {
        header('Location:login.php');
    } else {
        header('Location:authentication.php?message=error');
    }
}else header('Location:authentication.php?message=null');
?>