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
    <title>Фестиваль афиша</title>
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
        justify-content: center;
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

    section {
        padding: 80px 0;
    }

    /* Геройский раздел */
    .hero {
        background-color: rgba(34, 34, 34, 0.8);
        padding: 150px 0;
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
        font-size: 3.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        animation: fadeInDown 1s ease;
    }

    .hero-text {
        font-size: 1.25rem;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        font-family: 'Open Sans', sans-serif;
        animation: fadeIn 1.5s ease;
    }

    .btn {
        background-color: var(--primary-color);
        color: var(--light-text);
        padding: 15px 40px;
        border: none;
        border-radius: 30px;
        text-decoration: none;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .btn:hover {
        background-color: #cc0000;
        transform: translateY(-3px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
    }

    .btn_action {
        animation: pulse 2s infinite;
    }

    /* Раздел "О фестивале" */
    .about {
        background-color: rgba(25, 25, 25, 0.9);
        position: relative;
    }

    .about::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
    }

    .section-heading {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: var(--primary-color);
        position: relative;
        display: inline-block;
    }

    .section-heading::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50%;
        height: 3px;
        background-color: var(--primary-color);
    }

    .section-text {
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 30px;
        font-family: 'Open Sans', sans-serif;
    }

    .about-img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .about-img:hover {
        transform: scale(1.02);
    }

    /* Раздел "О нас" */
    .about-us {
        background-color: rgba(40, 40, 40, 0.9);
        text-align: center;
    }

    .team {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        margin-top: 50px;
    }

    .team-member {
        background: rgba(50, 50, 50, 0.8);
        border-radius: 10px;
        padding: 20px;
        width: 250px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .team-member:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .team-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-color);
        margin-bottom: 15px;
    }

    .team-name {
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .team-position {
        color: var(--primary-color);
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    /* Раздел "Контакты" */
    .contact {
        background-color: rgba(30, 30, 30, 0.9);
    }

    .contact-info {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-top: 40px;
    }

    .contact-card {
        flex: 1;
        min-width: 250px;
        background: rgba(50, 50, 50, 0.8);
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .contact-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 20px;
    }

    .contact-title {
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .contact-text {
        font-family: 'Open Sans', sans-serif;
    }

    /* Анимации */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .col-md-6 {
            width: 100%;
        }
        
        section {
            padding: 60px 0;
        }
        
        .hero {
            padding: 100px 0;
        }
        
        .hero-heading {
            font-size: 2.5rem;
        }
        
        .section-heading {
            font-size: 2rem;
        }

        .team-member {
            width: 100%;
            max-width: 300px;
        }
    }
</style>
<body>
  <section class="hero">
    <div class="container">
      <div class="row center">
        <div class="col-md-12">
          <h1 class="hero-heading">Фестиваль афиша</h1>
          <p class="hero-text">
            Присоединяйтесь к нам на ежегодные фестивали - незабываемом событии, которое объединит любителей музыки со всего мира!
          </p>
          <a href="concert.php" class="btn btn_action">Купить билеты</a>
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
          <h2 class="section-heading">Фестиваль в Чили</h2>
          <p class="section-text">
            Masters of Rock Chile - это музыкальный фестиваль, который пройдет в 2025 году. В программе выступят легендарные группы, такие как Judas Priest, Scorpions, Europe, Opeth и Queensrÿche. Это событие обещает стать настоящим праздником для поклонников рок-музыки.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="section-heading">О нас</h2>
          <p class="section-text">
            Мы - команда энтузиастов, организующих музыкальные фестивали по всему миру уже более 15 лет. Наша миссия - создавать незабываемые впечатления для поклонников рок-музыки и поддерживать музыкальную культуру.
          </p>
          
          <div class="team">
            <div class="team-member">
              <img src="./images/photo_2023-09-08_13-28-39.jpg" alt="Алексей Петров" class="team-img">
              <h3 class="team-name">Никита Острецов</h3>
              <p class="team-position">Основатель</p>
              <p>Организатор фестивалей с 2010 года</p>
            </div>
            
            <div class="team-member">
              <img src="./images/photo_2024-12-30_14-12-03.jpg" alt="Мария Иванова" class="team-img">
              <h3 class="team-name">Мария Головач</h3>
              <p class="team-position">Директор по маркетингу</p>
              <p>Специалист по продвижению мероприятий</p>
            </div>
            
            <div class="team-member">
              <img src="./images/photo_2025-03-30_20-03-00.jpg" alt="Дмитрий Смирнов" class="team-img">
              <h3 class="team-name">Евгений Сироткин</h3>
              <p class="team-position">Музыкальный директор</p>
              <p>Куратор музыкальной программы</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="section-heading">Контакты</h2>
          <p class="section-text">
            Свяжитесь с нами для получения дополнительной информации о фестивале, сотрудничестве или аккредитации.
          </p>
          
          <div class="contact-info">
            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <h3 class="contact-title">Адрес</h3>
              <p class="contact-text">
                г. Москва, ул. Концертная, 15<br>
                Бизнес-центр "Музыка"
              </p>
            </div>
            
            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <h3 class="contact-title">Телефон</h3>
              <p class="contact-text">
                +7 (495) 123-45-67<br>
                (ежедневно с 10:00 до 20:00)
              </p>
            </div>
            
            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <h3 class="contact-title">Email</h3>
              <p class="contact-text">
                info@festival.ru<br>
                press@festival.ru
              </p>
            </div>
          </div>
                  </div>
      </div>
    </div>
  </section>

  <?php include "footer.php"; ?>
</body>
</html>