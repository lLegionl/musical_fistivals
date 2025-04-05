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
        --primary-color: #e74c3c;
        --secondary-color: #333333;
        --dark-bg: #121212;
        --light-text: #ffffff;
        --dark-text: #333333;
        --footer-bg: #1a1a1a;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        color: var(--light-text);
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Футер */
    .footer {
        background-color: var(--footer-bg);
        padding: 60px 0 0;
        position: relative;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
    }

    .wrapper_footer {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        padding-bottom: 40px;
    }

    .footer-logo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid var(--primary-color);
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .footer-logo:hover {
        transform: rotate(15deg);
    }

    .footer-text {
        font-family: 'Open Sans', sans-serif;
        line-height: 1.8;
        margin-bottom: 25px;
        opacity: 0.8;
    }

    .footer-heading {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 25px;
        position: relative;
        display: inline-block;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
        transition: transform 0.3s ease;
    }

    .footer-links li:hover {
        transform: translateX(5px);
    }

    .footer-links a {
        color: var(--light-text);
        text-decoration: none;
        font-family: 'Open Sans', sans-serif;
        opacity: 0.8;
        transition: all 0.3s ease;
        display: block;
    }

    .footer-links a:hover {
        color: var(--primary-color);
        opacity: 1;
    }
    .copyright {
        background-color: rgba(0, 0, 0, 0.2);
        padding: 20px 0;
        text-align: center;
        font-size: 0.9rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .copyright p {
        margin: 0;
        opacity: 0.7;
        font-family: 'Open Sans', sans-serif;
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .wrapper_footer {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .footer {
            padding: 50px 0 0;
        }
        
        .footer-heading {
            font-size: 1.3rem;
        }
    }
</style>
<body>
    <footer class="footer">
        <div class="container">
            <div class="wrapper_footer">
                <div class="col-md-4">
                    <img src="./images/logo.png" alt="Логотип фестиваля" class="footer-logo">
                    <p class="footer-text">
                        Мы - команда энтузиастов, которые любят музыку и хотят делиться этой любовью с вами!
                    </p>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-heading">Быстрые ссылки</h4>
                    <ul class="footer-links">
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="concert.php">Концерты</a></li>
                        <li><a href="index.php#contact">Контакты</a></li>
                        <li><a href="authentication.php">Вход/Регистрация</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-heading">Информация</h4>
                    <ul class="footer-links">
                        <li><a href="#">О фестивале</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Политика конфиденциальности</a></li>
                        <li><a href="#">Условия использования</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>© 2025 Фестиваль афиша. Все права защищены.</p>
            </div>
        </div>
    </footer>
</body>
</html>