<?php
session_start();
require 'on_BD.php';

//проверка авторизации//


//логин и пароль которые ввел пользователь для входа
$login = $_POST['login'];
$password = md5($_POST['password']);
//вытаскиваем из бд эти же данные

if(!empty($login) && !empty($password)) {
    $check = "SELECT * FROM userss WHERE login = :login";
    $params = [':login' => $login];

    $check_user = $user->prepare($check);
    $check_user->execute($params);

    $polzovatel = $check_user->fetch(PDO::FETCH_OBJ);
    if ($polzovatel) {
        if ($password === $polzovatel->password) {
            $_SESSION['polzovatel'] = [
                "id" => $polzovatel->id,
                "name" => $polzovatel->name,
                "surname" => $polzovatel->surname,
                "login" => $polzovatel->login,
                "profile" => $polzovatel->profile,
                "email" => $polzovatel->email
            ];
            header('Location: ../index2.php');
        }
    }
}

