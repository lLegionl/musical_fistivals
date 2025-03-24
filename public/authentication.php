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
    <title>Document</title>
</head>
<style>
    body {
    font-family: sans-serif;
    color: #ffffff;
    background-color: #333333;
    }
    a {
        text-decoration: none;
        color: #ffffff;
    }
    .account_auth {
    background-color: #222; /* Dark background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Subtle shadow */
    }

    .container {
    max-width: 400px; /* Adjust as needed */
    margin: 0 auto;
    }

    .authentication {
    text-align: center; /* Center the form */
    }

    .authentication ul {
    list-style: none; /* Remove bullet points */
    padding: 0;
    }

    .authentication li {
    margin-bottom: 15px; /* Space between form elements */
    }

    .input_style {
    width: calc(45% - 30px); /* Adjust width to account for padding */
    padding: 10px 15px;
    box-sizing: border-box;
    border: 1px solid #555;
    border-radius: 5px;
    background-color: #333; /* Slightly lighter dark gray */
    color: #eee;
    font-size: 16px;
    transition: border-color 0.3s ease;
    }

    .input_style:focus {
    border-color: #888; /* Darker gray border on focus */
    outline: none;
    }

    .input_style::placeholder {
    color: #888;
    }

    .submit_button {
    background-color: #555; /* Dark gray button */
    color: #eee;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    }

    .submit_button:hover {
    background-color: #777; /* Slightly lighter on hover */
    }
</style>
<body>
    <div class="account_auth">
        <div class="container">
            <div class="authentication">
                <form action="login.php" method="post">
                <h2>Войти</h2>
                <ul>
                    <li><input type="text" class="input_style" name="login" placeholder="Логин"></li>
                    <li><input type="text" class="input_style" name="password" placeholder="Пароль"></li>
                    <li><input type="submit" class="submit_button" value="Войти"></li>
                </ul>
                </form>
                <form action="registration.php" method="post">
                    <h2>Регистрация</h2>
                <ul>
                    <li><input type="text" class="input_style" name="login" placeholder="Логин"></li>
                    <li><input type="text" class="input_style" name="name" placeholder="Имя"></li>
                    <li><input type="text" class="input_style" name="surname" placeholder="Фамилия"></li>
                    <li><input type="text" class="input_style" name="email" placeholder="Почта"></li>
                    <li><input type="text" class="input_style" name="phone" placeholder="Номер телефона"></li>
                    <li><input type="text" class="input_style" name="password" placeholder="Пароль"></li>
                    <li><input type="submit" class="submit_button" value="Зарегистрироваться"></li>
                </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php include "footer.php"; ?>
