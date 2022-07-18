<?php
@ob_start();
session_start(); // запуск сессионного механизма
include('config.php');
if (isset($_POST['register'])) { //Если переменная register передана, то
    $username = $_POST['username'];//получаем переменные $_POST
    $_SESSION['username'] = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT); //Функция, осуществляющая преобразование массива входных данных в выходную битовую строку установленной длины
    $query = $connection->prepare("SELECT * FROM user WHERE email=:email"); //Подключение к БД и и проверка на совпадение почты
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "<script>alert('Этот адрес уже зарегистрирован!')</script>";
    }
    if ($query->rowCount() == 0) { //Вставляем данные, подставляя их в запрос
        $query = $connection->prepare("INSERT INTO user(username,password,email) VALUES (:username,:password_hash,:email)");  
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();//Внесение днных в БД
        if ($result) {//Если вставка прошла успешно
            $_SESSION['user'] = $_SESSION['username']; //Пользователю присваивается вписанное им имя
            echo "<script>alert('Регистрация прошла успешно!')</script>";
        } else {
            echo "<script>alert('Неверные данные!')</script>";
        }
    }
} 
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Philosopher&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        </style>   
        <link rel="stylesheet" href="other/css/style.css">
        <title>Регистрация</title>
    </head>
    <body class="body_index is-grid"> 
        <div class="wrapper">
            <div class="nav"> <!-- Меню навигации -->
                <?php
                    if (isset($_SESSION['user'])) {
                        echo "<a class='welcome_text'>Добро пожаловать, ".$_POST['username']."</a>";
                        echo "<a class='nav_menu' href='out.php'>Выход</a>";
                    } else { 
                        echo "<a class='nav_menu' href='login.php'>Вход</a>";
                    }
                ?>
                <a class="nav_menu" href="index.php">На главную</a>
                <p class="nav_menu_1">Контурное изображение из фотографии</p>
            </div>
            <div class="user-form">
                <div class="top-head">
                    <h3>Регистрация</h3>
                </div>
                <form method="post" action="" name="reg_form" class="reg_form">
                    <input type="text" name="username" id="username" placeholder="Имя пользователя" required />
                    <input type="email" name="email" id="email" required placeholder="Электронная почта"/>
                    <input type="password" name="password" id="password" required placeholder="Пароль"/>
                    <input type="submit" name="register" value="Зарегистрироваться">
                </form>
            </div>
        </div>
    </body>
</html>