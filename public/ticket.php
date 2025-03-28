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


  <?php include "footer.php"; ?>
</body>
</html>