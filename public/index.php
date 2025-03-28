<?php
session_start();
include "db.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
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
</style>
<body>
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="hero-heading">Фестиваль афиша</h1>
          <p class="hero-text">
            Присоединяйтесь к нам на ежегодные фестивали - незабываемом событии, которое объединит любителей музыки со всего мира!
          </p>
          <a href="concert.php" class="btn_action">Купить билеты</a>
        </div>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="./images/scene.png" alt="Фото фестиваля" class="about-img">
        </div>
        <div class="col-md-6">
          <h2 class="about-heading">Фестиваль в Чили</h2>
          <p class="about-text">
            Masters of Rock Chile - это музыкальный фестиваль, который пройдет в 2025 году. В программе выступят легендарные группы, такие как Judas Priest, Scorpions, Europe, Opeth и Queensrÿche. Это событие обещает стать настоящим праздником для поклонников рок-музыки.
          </p>
        </div>
      </div>
    </div>
  </section>

  <?php include "footer.php"; ?>
</body>
</html>