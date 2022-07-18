<?php
@ob_start();
session_start();   // запуск сессионного механизма
include('config.php');
if (isset($_POST['login'])) { //Если переменная login передана, то
    $username = $_POST['username']; //получаем переменные $_POST
    $_SESSION['username'] = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM user WHERE username=:username");//Подключение к БД и и проверка на совпадение имени
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>alert('Неверные пароль или имя пользователя!')</script>";
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user'] = $result['username'];//Пользователю присваивается вписанное им имя
            echo "<script>alert('Поздравляем, вы прошли авторизацию!')</script>";
        } else {
            echo "<script>alert('Неверные пароль или имя пользователя!')</script>";
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
        <title>Войти</title>
    </head>
    <body class="body_index is-grid"> 
        <div class="wrapper"> 
            <div class="nav"> <!-- Меню навигации -->
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<a class='welcome_text'>Добро пожаловать, ".$_SESSION['username']."</a>";
                    echo "<a class='nav_menu' href='out.php'>Выход</a>";
                } else { 
                    echo "<a class='nav_menu' href='registration.php'>Регистрация</a>";
                }
                ?>
                <a class="nav_menu" href="index.php">На главную</a>
                <p class="nav_menu_1">Контурное изображение из фотографии</p>
            </div>
            <div class="user-form">
                <div class="top-head">
                    <h3>Вход в учетную запись</h3>
                </div>
                <form method="post" action="" name="reg_form" class="reg_form">
                    <input type="text" name="username" id="username" placeholder="Имя пользователя" required />
                    <input type="password" name="password" id="password" placeholder="Пароль" required />
                    <input type="submit" name="login" value="Войти">
                </form>
            </div>
        </div>
    </body>
</html>