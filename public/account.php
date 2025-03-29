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
    .account {
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
    .authentication .button {
        display: flex;
        justify-content: center;
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
    margin: 10px;
    }

    .submit_button:hover {
    background-color: #777; /* Slightly lighter on hover */
    }

    .account_nav {
        display: flex;
        justify-content: space-evenly;
        gap: 10px;

    }

    /* карточки билетов */


.tickets-title {
    color: #fff;
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
    border-bottom: 2px solid #3498db;
    padding-bottom: 10px;
}

.cart_wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.ticket-card {
    background: #333;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 25px;
    overflow: hidden;
    transition: transform 0.3s ease;
    
    width: 500px;
}

.ticket-card:hover {
    transform: translateY(-5px);
}

.ticket-header {
    background: #3498db;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.concert-name {
    font-size: 18px;
    font-weight: 600;
}

.ticket-count {
    background: rgba(255, 255, 255, 0.2);
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 14px;
}

.ticket-details {
    padding: 20px;
}

.detail-item {
    display: flex;
    margin-bottom: 12px;
    line-height: 1.5;
}

.detail-label {
    font-weight: 600;
    color: #fff;
    min-width: 80px;
}

.detail-value {
    color: #fff;
}

.status {
    color: #27ae60;
    font-weight: 600;
}
.ticket-actions {
    display: flex;
    padding: 0 20px 20px;
    gap: 10px;
}

.action-btn {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: cen;
}

.cancel-btn {
    background: #e74c3c;
    color: white;
}

.cancel-btn:hover {
    background: #c0392b;
}

.empty {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
.empty h2 {
    display: inline-block;
}
.empty a {
    color: #3498db;
}
</style>
<body>
    <div class="account">
        <div class="container">
            <div class="account_nav">
                <a href="account.php?account=edit" class="submit_button">Профиль</a>
                <a href="account.php?account=ticket" class="submit_button">Билеты</a>
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
                    <li class="button"><input type="submit" class="submit_button" value="применить">
                    <button class="submit_button"><a href="logout.php">выйти</a></button>
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
                echo '<div class="cart_wrapper">';
            if (empty($tickets)) 
            {   
                echo '<div class="empty"><h2>У вас нету билетов</h2><a href="concert.php">Забронировать ?</a></div>';
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
</body>
</html>
<?php include "footer.php";?>
