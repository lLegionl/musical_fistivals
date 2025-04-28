<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фестиваль афиша</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #e74c3c;
            --secondary-color: #333333;
            --dark-bg: #121212;
            --light-text: #ffffff;
            --header-bg: rgba(34, 34, 34, 0.9);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--light-text);
            background-color: var(--dark-bg);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .wrapper_header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .col-md-4, .col-md-8 {
            padding: 0 15px;
        }

        .col-md-4 {
            width: 33.33%;
        }

        .col-md-8 {
            width: 66.66%;
        }

        /* Header Styles */
        .header {
            background-color: var(--header-bg);
            padding: 15px 0;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-logo {
            max-width: 80px;
            border-radius: 50%;
            border: 2px solid var(--primary-color);
            transition: transform 0.3s ease;
            filter: brightness(190%);     
        }

        .header-logo:hover {
            transform: scale(1.1);
        }

        .header-nav {
            text-align: right;
        }

        .header-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .header-nav li {
            margin-left: 25px;
        }

        .header-nav a {
            color: var(--light-text);
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 8px 0;
            transition: color 0.3s ease;

            box-sizing: border-box;
        }

        .header-nav a:hover {
            color: var(--primary-color);
        }

        .header-nav .active {
            color: var(--primary-color);
            font-weight: 700;
        }

        /* Auth button styles */
        .auth-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .auth-btn:hover {
            background-color: #cc0000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .col-md-4, .col-md-8 {
                width: 100%;
                text-align: center;
            }
            
            .header-nav {
                text-align: center;
                margin-top: 15px;
            }
            
            .header-nav ul {
                justify-content: center;
            }
            
            .header-nav li {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="wrapper_header">
                    <img src="./images/logo.png" alt="Логотип фестиваля" class="header-logo">
                <h1>DarkRage Fest</h1>
                <div class="col-md-8">
                    <nav class="header-nav">
                        <ul>
                            <li><a href="index.php" >Главная</a></li>
                            <?php if (empty($_SESSION['auth']) && empty($_SESSION['login']))
                            {$link = 'authentication.php?status=need_auth';} else {$link='concert.php';}?>
                            <li><a href="<?=$link?>" >Концерты</a></li>
                            <li><a href="index.php#contact" >Контакты</a></li>
                            <?php if (!empty($_SESSION['auth']) && !empty($_SESSION['login'])): ?>
                                <li><a href="account.php" >Личный кабинет</a></li>
                            <?php else: ?>
                                <li><a href="authentication.php" >
                                    <i class="fas fa-user"></i> Войти
                                </a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</html>
