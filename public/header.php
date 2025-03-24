<?php session_start();?>
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
    .wrapper_header {
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


        /* Заголовок */
        .header {
    background-color: #333333;
    color: #ffffff;
    padding: 20px 0;
    }

    .header-logo {
    max-width: 75px;
    border-radius: 90px;
    }

    .header-nav {
    text-align: right;
    }

    .header-nav ul {
    list-style: none;
    padding: 0;
    }

    .header-nav li {
    display: inline-block;
    margin-left: 20px;
    }

    .header-nav a {
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    }

</style>
    <header class="header">
        <div class="container">
        <div class="wrapper_header">
            <div class="col-md-4">
            <img src="./images/logo.png" alt="Логотип фестиваля" class="header-logo">
            </div>
            <div class="col-md-8">
            <nav class="header-nav">
                <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="#">Билеты</a></li>
                <li><a href="#">Контакты</a></li>
                <?php if (!empty($_SESSION['auth']) && !empty($_SESSION['login'])) 
                {echo '<li><a href="account.php">Личный кабинет</a></li>';} else 
                {echo '<li><a href="authentication.php">войти</a></li>';}?>                </ul>
            </nav>
            </div>
        </div>
        </div>
    </header>
</html>
