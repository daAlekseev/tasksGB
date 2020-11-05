<?php
    include "../config/config.php";
    include "../models/model.php";
    
    $login = strip_tags($_POST['login']);
    $pass = strip_tags($_POST['pass']);
    $pass = md5($pass);

    if(isset($_POST['registration'])){
        if(empty($login) or empty($pass)){
            header("Refresh: 4; url = registration.php");
            echo "Не все поля заполнены! Сейчас вы снова будете переведены на экран регистрации!";
        }
        else{
            $row = loginCheck($link, "cookies", $login);
            if(!empty($row['id'])){
                header("Refresh: 4; url = ../public/registration.php");
                echo "Введенный логин уже занят! Попробуйте еще раз!";
            }
            else{
                $save = saveData($link, "cookies", $login, $pass);
                if($save){
                    echo "Вы успешно зарегестрированы! Теперь вам необходимо войти на <a href = \"../public/registration.php\">cайт<a/>";
                }
                else{
                    echo "Что-то пошло не так!";
                }
            }
        }
    }
    elseif(isset($_POST['auth'])){
        if(empty($login) or empty($pass)){
            header("Refresh: 4; url = registration.php");
            echo "Не все поля заполнены! Сейчас вы снова будете переведены на экран регистрации!";
        }
        else{
            $check = checkLoginAndPass($link, "cookies", $login, $pass);
            if($check > 0){
                setcookie("login", $login, time()+3600, '/');
                setcookie("pass", $pass, time()+3600, '/');
                header("Location: ../public/lk.php");
            }
            else{
                header("Location: ../public/registration.php");
            }
        }
    }