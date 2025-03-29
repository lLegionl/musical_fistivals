<?php
include "db.php";

$ticket_id = $_GET['ticket_id'];

$stm = $pdo->query("DELETE FROM `tickets` WHERE id=$ticket_id");

$result = $stm->fetch();

header('Location:account.php?account=ticket+status=ticket_canceled');

?>