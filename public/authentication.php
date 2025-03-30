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
    <title>Аутентификация | Фестиваль афиша</title>
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

    .account_auth {
        background-color: rgba(34, 34, 34, 0.9);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        width: 100%;
        max-width: 800px;
        margin: 40px auto;
    }

    .container {
        max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
    }

    .authentication {
        flex: 1;
        min-width: 300px;
    }

    .authentication h2 {
        font-size: 1.8rem;
        color: var(--primary-color);
        margin-bottom: 25px;
        text-align: center;
        position: relative;
        padding-bottom: 10px;
    }

    .authentication h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }

    .authentication ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .authentication li {
        margin-bottom: 20px;
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
    }

    .input_style:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 0, 0, 0.2);
    }

    .input_style::placeholder {
        color: #888;
    }

    .submit_button {
        background-color: var(--primary-color);
        color: var(--light-text);
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .submit_button:hover {
        background-color: #cc0000;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .form-divider {
        text-align: center;
        margin: 30px 0;
        position: relative;
        color: #777;
        font-size: 14px;
    }
    @media (max-width: 768px) {
        .account_auth {
            padding: 30px 20px;
            margin: 20px;
        }
        
        .container {
            flex-direction: column;
            gap: 30px;
        }
        
        .authentication {
            min-width: 100%;
        }
    }
</style>
<body>
    <div class="account_auth">
        <div class="container">
            <div class="authentication">
                <form action="login.php" method="post">
                    <h2>Войти</h2>
                    <ul>
                        <li><input type="text" class="input_style" name="login" placeholder="Логин" required></li>
                        <li><input type="password" class="input_style" name="password" placeholder="Пароль" required></li>
                        <li><input type="submit" class="submit_button" value="Войти"></li>
                    </ul>
                </form>
                
                <div class="form-divider">или</div>
                
                <form action="registration.php" method="post">
                    <h2>Регистрация</h2>
                    <ul>
                        <li><input type="text" class="input_style" name="login" placeholder="Логин" required></li>
                        <li><input type="text" class="input_style" name="name" placeholder="Имя" required></li>
                        <li><input type="text" class="input_style" name="surname" placeholder="Фамилия" required></li>
                        <li><input type="email" class="input_style" name="email" placeholder="Почта" required></li>
                        <li><input type="tel" class="input_style" name="phone" placeholder="Номер телефона" required></li>
                        <li><input type="password" class="input_style" name="password" placeholder="Пароль" required></li>
                        <li><input type="submit" class="submit_button" value="Зарегистрироваться"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php include "footer.php"; ?>