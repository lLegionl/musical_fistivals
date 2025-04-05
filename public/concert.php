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
    <title>Концерты | Фестиваль афиша</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    :root {
        --primary-color: #ff0000;
        --secondary-color: #333333;
        --dark-bg: #121212;
        --light-text: #ffffff;
        --dark-text: #333333;
        --accent-color: #cf8d2a;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        color: var(--light-text);
        background-color: var(--dark-bg);
        margin: 0;
        padding: 0;
        line-height: 1.6;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('./images/background.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
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

    /* Геройский раздел */
    .hero {
        background-color: rgba(34, 34, 34, 0.9);
        padding: 120px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle, rgba(255,0,0,0.3) 0%, rgba(34,34,34,0) 70%);
        z-index: 0;
    }

    .hero .container {
        position: relative;
        z-index: 1;
    }

    .hero-heading {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-text {
        font-size: 1.25rem;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        font-family: 'Open Sans', sans-serif;
    }

    /* Список концертов */
    .concert_list {
        padding: 80px 0;
        background-color: rgba(25, 25, 25, 0.9);
    }

    .concert_wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .block {
        background-color: rgb(50, 50, 50);
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .block:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
    }

    .block ul {
        list-style: none;
        padding: 20px;
        margin: 0;
    }

    .block h3 {
        font-size: 1.5rem;
        color: var(--light-text);
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--primary-color);
        position: relative;
    }

    .block h3::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background-color: var(--primary-color);
    }

    .block p {
        margin: 15px 0;
        font-family: 'Open Sans', sans-serif;
        line-height: 1.6;
        color: #aaaf;
    }
    .block i {
        color: var(--primary-color);
    }

    .concert_image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .ticket_btn {
        display: block;
        text-align: center;
        background-color: var(--accent-color);
        color: var(--light-text);
        padding: 12px 20px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 20px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .ticket_btn:hover {
        background-color: #deae5e;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(207, 141, 42, 0.4);
    }


    /* Адаптивность */
    @media (max-width: 768px) {
        .hero {
            padding: 80px 0;
        }
        
        .hero-heading {
            font-size: 2rem;
        }
        
        .concert_wrapper {
            grid-template-columns: 1fr;
        }
        
        .concert_list {
            padding: 50px 0;
        }
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
                                <img class="concert_image" src="./images/concert_img/'.$concert['concert_image'].'" alt="'.$concert['concert_name'].'">
                                <li><p>'.$concert['concert_description'].'</p></li>
                                <li><p><i class="fas fa-calendar-alt"></i> Начало: '.$concert['concert_date'].'</p></li>
                                <li><p><i class="fas fa-map-marker-alt"></i> Адрес: '.$concert['concert_place'].'</p></li>
                                <li><p><i class="fas fa-chair"></i> Количество мест: '.$concert['concert_seats'].'</p></li>
                                <li><a class="ticket_btn" href="ticket.php?concert='.$concert['id'].'">Купить билет</a></li>
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