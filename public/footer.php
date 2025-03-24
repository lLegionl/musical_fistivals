<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .wrapper_footer {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
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

        /* Футер */
        .footer {
    background-color: #333333;
    color: #ffffff;
    padding-top: 50px;
    }

    .footer-logo {
    max-width: 75px;
    border-radius: 90px;
    }

    .footer-text {
    margin-top: 20px;
    line-height: 1.6;
    }

    .social-links {
    list-style: none;
    padding: 0;
    margin-top: 20px;
    }

    .social-links li {
    display: inline-block;
    margin-right: 10px;
    }

    .social-links a {
    color: #ffffff;
    text-decoration: none;
    font-size: 18px;
    }

    .footer-heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    }

    .footer-links {
    list-style: none;
    padding: 0;
    }

    .footer-links li {
    margin-bottom: 10px;
    }

    .footer-links a {
    color: #ffffff;
    text-decoration: none;
    }

    .footer-form {
    margin-top: 20px;
    }

    .footer-form input {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #f0f0f0;
    color: #333333;
    margin-bottom: 10px;
    }

    .footer-form button {
    background-color: #ff0000;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    .copyright {
    background-color: #222222;
    padding: 10px 0;
    text-align: center;
    }

    .copyright p {
    margin: 0;
    font-size: 14px;
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
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
            </div>
            <div class="col-md-4">
            <h4 class="footer-heading">Информация</h4>
            <ul class="footer-links">
                <li><a href="#">О фестивале</a></li>
                <li><a href="#">Билеты</a></li>
                <li><a href="#">Программа</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="copyright">
        <p>© 2025 [Название фестиваля]. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>