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
    <title>Личный кабинет | Фестиваль афиша</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff0000;
            --secondary-color: #333333;
            --dark-bg: #121212;
            --light-text: #ffffff;
            --card-bg: rgba(50, 50, 50, 0.8);
            --section-bg: rgba(30, 30, 30, 0.9);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--light-text);
            background-color: var(--dark-bg);
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('./images/background.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .account {
            background-color: var(--section-bg);
            border-radius: 10px;
            padding: 40px;
            margin: 40px auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .account_nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .account_nav a {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .account_nav a:hover {
            background-color: #cc0000;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .authentication {
            max-width: 600px;
            margin: 0 auto;
        }

        .authentication h2 {
            color: var(--primary-color);
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            position: relative;
        }

        .authentication h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .authentication ul {
            list-style: none;
            padding: 0;
        }

        .authentication li {
            margin-bottom: 20px;
        }

        .input_style {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            color: var(--light-text);
            font-family: 'Open Sans', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input_style:focus {
            outline: none;
            border-color: var(--primary-color);
            background: rgba(255, 255, 255, 0.15);
        }

        .button {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .submit_button {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .submit_button:hover {
            background-color: #cc0000;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Стили для билетов */
        .tickets-title {
            color: var(--primary-color);
            text-align: center;
            font-size: 2rem;
            margin-bottom: 40px;
            position: relative;
        }

        .tickets-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .cart_wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .ticket-card {
            background: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
        }

        .ticket-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .ticket-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .concert-name {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .ticket-count {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .ticket-details {
            padding: 20px;
        }

        .detail-item {
            display: flex;
            margin-bottom: 15px;
            font-family: 'Open Sans', sans-serif;
        }

        .detail-label {
            font-weight: 600;
            min-width: 100px;
            color: var(--primary-color);
        }

        .detail-value {
            flex: 1;
        }

        .status {
            font-weight: bold;
        }

        .ticket-actions {
            padding: 0 20px 20px;
        }

        .action-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .action-btn:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .empty {
            text-align: center;
            padding: 40px 0;
        }

        .empty h2 {
            color: var(--light-text);
            margin-bottom: 20px;
        }

        .empty a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .empty a:hover {
            color: #cc0000;
            text-decoration: underline;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .account_nav {
                flex-direction: column;
                align-items: center;
            }
            
            .button {
                flex-direction: column;
                gap: 15px;
            }
            
            .submit_button {
                width: 100%;
            }
            
            .ticket-card {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="account">
        <div class="container">
            <div class="account_nav">
                <a href="account.php?account=edit" class="<?= empty($_GET['account']) || $_GET['account'] == 'edit' ? 'active' : '' ?>">Профиль</a>
                <a href="account.php?account=ticket" class="<?= isset($_GET['account']) && $_GET['account'] == 'ticket' ? 'active' : '' ?>">Билеты</a>
            </div>
            <?php if (empty($_GET['account']) || $_GET['account'] == 'edit') { echo
            '<div class="authentication">
                <form action="edit_user.php?id='.$_SESSION['id_user'].'" method="post">
                    <h2>Личный кабинет</h2>
                <ul>
                    <li><input type="text" class="input_style" name="login" placeholder="Логин" value="'.$_SESSION['user']['login'].'"></li>
                    <li><input type="text" class="input_style" name="name" placeholder="Имя" value="'.$_SESSION['user']['name'].'"></li>
                    <li><input type="text" class="input_style" name="surname" placeholder="Фамилия" value="'.$_SESSION['user']['surname'].'"></li>
                    <li><input type="text" class="input_style" name="email" placeholder="Почта" value="'.$_SESSION['user']['email'].'"></li>
                    <li><input type="text" class="input_style" name="phone" placeholder="Номер телефона" value="'.$_SESSION['user']['phone'].'"></li>
                    <li><input type="text" class="input_style" name="password" placeholder="Пароль" value="'.$_SESSION['user']['password'].'"></li>
                    <li class="button">
                        <input type="submit" class="submit_button" value="Применить">
                        <a href="logout.php" class="submit_button">Выйти</a>
                    </li>
                </ul>
                </form>
            </div>';
            } else {
                $user_id = $_SESSION['id_user'];
                $stm = $pdo->query("
                SELECT 
                t.id,
                t.ticket_count,
                t.ticket_status,
                c.id AS concert_id,
                c.concert_name,
                c.concert_date,
                c.concert_place,
                c.concert_seats
            FROM 
                tickets t
            JOIN 
                concert c ON t.concert_id = c.id
            WHERE 
                t.user_id = $user_id"
                );

                $tickets = $stm->fetchAll();
                echo '<h2 class="tickets-title">Мои билеты</h2><div class="cart_wrapper">';
            if (empty($tickets)) 
            {   
                echo '<div class="empty"><h2>У вас нет билетов</h2><a href="concert.php">Забронировать?</a></div>';
            }
                foreach ($tickets as $ticket)
                {
                    switch ($ticket['ticket_status']) {
                        case 'ожидает подтверждение': 
                            $confirm = '#f39c12';
                            break;
                        case 'подтвержден':
                            $confirm = '#27ae60';
                            break;
                    }
                echo   
                '
                <div class="ticket-card">
                <div class="ticket-header">
                    <span class="concert-name">'.$ticket['concert_name'].'</span>
                    <span class="ticket-count">'.$ticket['ticket_count'].' билета</span>
                </div>
                
                <div class="ticket-details">
                    <div class="detail-item">
                        <span class="detail-label">Дата:</span>
                        <span class="detail-value">'.$ticket['concert_date'].'</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Место:</span>
                        <span class="detail-value">'.$ticket['concert_place'].'</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Статус:</span>
                        <span class="detail-value status" style="color:'.$confirm.'">'.$ticket['ticket_status'].'</span>
                    </div>
                </div>
                
                <div class="ticket-actions">
                    <a class="action-btn cancel-btn" href="cancel.php?ticket_id='.$ticket['id'].'">Отменить бронь</a>
                </div>
            </div>'
            ;}echo '</div>';}?>
        </div>   
    </div>
    <?php include "footer.php";?>
</body>
</html>