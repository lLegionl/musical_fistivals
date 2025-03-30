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
    <title>Купить билет | Фестиваль афиша</title>
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
        font-size: 2.5rem;
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

    /* Форма покупки билетов */
    .ticket_buy {
        padding: 80px 0;
        background-color: rgba(25, 25, 25, 0.9);
    }

    .form_block {
        background-color: rgba(40, 40, 40, 0.9);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        max-width: 600px;
        margin: 0 auto;
    }

    .form {
        text-align: center;
    }

    .form h2 {
        font-size: 2rem;
        color: var(--accent-color);
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }

    .form h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background-color: var(--primary-color);
    }

    .form ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .form li {
        margin-bottom: 25px;
        text-align: left;
    }

    .form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: var(--accent-color);
    }

    .input_style {
        width: 100%;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #444;
        border-radius: 5px;
        background-color: rgba(50, 50, 50, 0.8);
        color: var(--light-text);
        font-size: 16px;
        font-family: 'Open Sans', sans-serif;
        transition: all 0.3s ease;
        text-align: center;
    }

    .input_style:focus {
        border-color: var(--accent-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(207, 141, 42, 0.2);
    }

    .input_style[readonly] {
        background-color: rgba(70, 70, 70, 0.6);
        color: #aaa;
    }

    .submit_button {
        background-color: var(--accent-color);
        color: var(--light-text);
        padding: 15px 30px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: bold;
        transition: all 0.3s ease;
        width: 100%;
        max-width: 200px;
        margin-top: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .submit_button:hover {
        background-color: #deae5e;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(207, 141, 42, 0.4);
    }

    /* Анимации */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .hero {
            padding: 80px 0;
        }
        
        .hero-heading {
            font-size: 2rem;
        }
        
        .form_block {
            padding: 30px 20px;
        }
        
        .form h2 {
            font-size: 1.5rem;
        }
    }
</style>
<body>

<section class="hero">
    <div class="container">
        <h1 class="hero-heading">Покупка билетов</h1>
        <p class="hero-text">
            Оформите заказ на билеты для участия в фестивале. После оплаты билеты будут доступны в вашем личном кабинете.
        </p>
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
                <h2>Билет на <?=$concert['concert_name']?></h2>
                <ul>
                    <li>
                        <label for="date"><i class="fas fa-calendar-alt"></i> Дата</label>
                        <input type="text" class="input_style" value="<?=$concert['concert_date']?>" readonly>
                    </li>
                    <li>
                        <label for="place"><i class="fas fa-map-marker-alt"></i> Адрес</label>
                        <input type="text" class="input_style" value="<?=$concert['concert_place']?>" readonly>
                    </li>
                    <li>
                        <label for="seats"><i class="fas fa-chair"></i> Доступно мест</label>
                        <input type="text" class="input_style" value="<?=$concert['concert_seats']?>" readonly>
                    </li>
                    <li>
                        <label for="ticket_count"><i class="fas fa-ticket-alt"></i> Количество билетов</label>
                        <input name="ticket_count" type="number" min="1" max="<?=$concert['concert_seats']?>" class="input_style" required>
                    </li>
                    <li style="text-align: center;">
                        <input type="submit" class="submit_button" value="Купить билеты">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>
</body>
</html>