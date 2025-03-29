<?php
session_start();
include "db.php";
include "header.php";
$concert = $_GET['concert'];   
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
    /* форма */
    .form_block {
    background-color: #222; /* Dark background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Subtle shadow */
    margin: 50px 0;
    }

    .container {
    max-width: 400px; /* Adjust as needed */
    margin: 0 auto;
    }

    .form {
    text-align: center; /* Center the form */
    }


    .form ul {
    list-style: none; /* Remove bullet points */
    padding: 0;
    }

    .form li {
    margin-bottom: 15px; /* Space between form elements */
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-content: center;

    gap: 5px;
    }

    .input_style {
    width: 20%; /* Adjust width to account for padding */
    padding: 10px 15px;
    box-sizing: border-box;
    border: 1px solid #555;
    border-radius: 5px;
    background-color: #333; /* Slightly lighter dark gray */
    color: #eee;
    font-size: 16px;
    transition: border-color 0.3s ease;
    text-align: center;
    }

    .input_style:focus {
    border-color: #888; /* Darker gray border on focus */
    outline: none;
    }

    .input_style::placeholder {
    color: #888;
    }

    .submit_button {
    background-color: rgb(207, 141, 42); /* Dark gray button */
    color: #eee;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    }

    .submit_button:hover {
    background-color: rgb(222, 180, 117); /* Slightly lighter on hover */
    color: black;
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

  <section class="ticket_buy">
    <div class="container">
        <div class="form_block">
        <form action="ticket_buy.php?concert=<?=$concert?>" class="form" method="post">
            <?php       
                    $stm = $pdo->query("SELECT * FROM concert WHERE id=$concert");
                    $concert = $stm->fetch();
            ?>
                <h2>Билет на концерт <?=$concert['concert_name']?></h2>
                <ul>
                    <li><label for="">дата</label><input type="text" class="input_style" value="<?=$concert['concert_date']?>" readonly></li>
                    <li><label for="">адрес</label><input type="text" class="input_style" value="<?=$concert['concert_place']?>" readonly></li>
                    <li><label for="">кол-во мест</label><input type="text" class="input_style" value="<?=$concert['concert_seats']?>" readonly></li>
                    <li><label for="">мест к покупке</label><input name="ticket_count" type="number" min="1" max="<?=$concert['concert_seats']?>" class="input_style"></li>
                    <li><input type="submit" class="submit_button" value="Купить"></li>
                </ul>
        </form>
        </div>
    </div>
  </section>

  <?php include "footer.php"; ?>
</body>
</html>