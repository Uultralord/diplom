<?php
//Стартуем сессию
session_start();
//Уничтожаем сессию
session_destroy();
//И перенаправляем на нужную страницу пользователя
header('Location: index.php');
exit();
?>