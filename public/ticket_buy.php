<?php 
session_start();
include "db.php";




if (!empty($_GET['concert']) && !empty($_SESSION['id_user']) && !empty($_POST['ticket_count']))
{

    $quary = $pdo->prepare('INSERT INTO `tickets`( `user_id`, `concert_id`, `ticket_count`) 
    VALUES (?,?,?)');


    $ticket = $quary->execute([
        $_SESSION['id_user'],
        $_GET['concert'],
        $_POST['ticket_count']
    ]);
    header('location:concert.php?status=ticket_buyed');
}
else {
    header('location:concert.php?status=ticket_nobuyed_error');
}

?>