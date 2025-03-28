<?php
session_start();
include "db.php";
include "header.php";

if (!empty($_SESSION['auth']) && !empty($_SESSION['login'])) 
{}
else 
{echo header('location:authentication.php?status=need_auth');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert</title>
</head>
<style>
        body {
    font-family: sans-serif;
    color: #ffffff;
    background-color: #333333;
    }

    .container {
    max-width: 1200px;
    margin: 0 auto;
    }

    .row {
    display: flex;
    flex-wrap: wrap;
    margin-left: -15px;
    margin-right: -15px;
    }

    .col-md-12 {
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
    }

    .col-md-6 {
    width: 50%;
    padding-left: 15px;
    padding-right: 15px;
    }

    .col-md-4 {
    width: 33.33%;
    padding-left: 15px;
    padding-right: 15px;
    }


    /* Геройский раздел */
    .hero {
    background-color: #222222;
    padding: 100px 0;
    text-align: center;
    }

    .hero-heading {
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 20px;
    }

    .hero-text {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
    }

    .btn_action {
    background-color: #ff0000;
    color: #ffffff;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    }

    /* Раздел "О фестивале" */
    .about {
    padding: 50px 0;
    }

    .about-heading {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    }

    .about-text {
    font-size: 16px;
    line-height: 1.6;
    }

    .about-img {
    width: 100%;
    height: auto;
    }
        /* Список фестивалей */
    .concert_list {

    }

    .concert_wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
        margin: 50px 0;
    }

    .block {
        background-color: #222222;
        max-width: 500px;
        padding: 5px;

        border-radius: 15px;
    }

    .block ul {
        list-style: none;
        padding: 0;

        padding:  0 50px;
        
    }

    .block li {
        
    }

    .block h3 {
        margin: 0;
        display: flex;
        justify-content: center;
        padding: 10px 0 ;

        font-size: 24px;
    }
    .block p {
        gap: 15px;
        
        letter-spacing: 1px;
        line-height: 0,5;
    }

    .ticket_btn {
        text-decoration: none;
        color: #fff;
        padding: 10px 5px;
        background-color:rgb(207, 141, 42);
        border-radius: 40px;

        display: flex;
        justify-content: center;
    }

    .ticket_btn:hover {
        background-color:rgb(222, 180, 117);
        color: black;
    }

    .concert_image {
        width: 400px;
        
        display: flex;
        justify-content: center;

        margin: auto;
    }
</style>
<body>

<section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="hero-heading">Список концертов</h1>
          <p class="hero-text">
          Музыкальные фестивали — это не просто концерты, это целые вселенные эмоций, открытий и незабываемых впечатлений. Здесь встречаются меломаны, артисты и мечты. Наш сайт — ваш гид по самым громким, атмосферным и уникальным фестивалям мира.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="concert_list">
    <div class="container">
        <div class="concert_wrapper">
            <?php 
                    $stm = $pdo->query("SELECT * FROM concert");
                    $result = $stm->fetchAll();

                    foreach ($result as $concert)
                    {   echo
                        '<div class="block">
                            <ul>
                                <h3>'.$concert['concert_name'].'</h3>
                                <img class="concert_image" src="./images/concert_img/'.$concert['concert_image'].'">
                                <li><p>'.$concert['concert_description'].'</p></li>
                                <li><p>Начало - '.$concert['concert_date'].'</p></li>
                                <li><p>Адрес - '.$concert['concert_place'].'</p></li>
                                <li><p>Кол-во мест - '.$concert['concert_seats'].'</p></li>
                                <p><a class="ticket_btn" href="ticket.php?concert='.$concert['id'].'">Купить билет</a></p>
                            </ul>
                        </div>';
                    }
            ?>  
        </div>  
    </div>
  </section>

  <?php include "footer.php"; ?>
</body>
</html>