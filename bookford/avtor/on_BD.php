<?php
session_start();
try {
    $user = new PDO('mysql:host=localhost;dbname=user;charset=UTF8', 'root', 'root');
}catch (PDOException $e){
    echo 'Подключение не удалось'.$e->getMessage();
    exit();
}
