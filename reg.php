<?php

    include "config.php";

    
    $login = $_POST['login'] ? strip_tags($_POST['login']) : " ";
    $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : " ";
    $pass = md5($pass);

    if(isset($_POST['registration'])){
        if(empty($_POST['login']) or empty($_POST['pass'])){
            header("Refresh: 4; url = registration.php");
            echo "Не все поля заполнены! Сейчас вы снова будете переведены на экран регистрации!";
        }
        else{
            $select = "select id from cookies where login = '$login'";
            $querySelect = mysqli_query($link, $select);
            $row = mysqli_fetch_assoc($querySelect);

            if(!empty($row['id'])){
                header("Refresh: 4; url = registration.php");
                echo "Введенный логин уже занят! Попробуйте еще раз!";
            }
            else{
                $sql = "insert into cookies (login, pass) values ('%s', '%s')";
                $sqlSprint = sprintf($sql, mysqli_real_escape_string($link, $login), mysqli_real_escape_string($link, $pass));
                $query = mysqli_query($link, $sqlSprint);
                if($query == true){
                    echo "Вы успешно зарегестрированы! Теперь вам необходимо войти на <a href = \"registration.php\">cайт<a/>";
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
            $select = "select id from cookies where login = '$login' and pass = '$pass' ";
            $querySelect = mysqli_query($link, $select);
            if(mysqli_num_rows($querySelect) > 0){
                setcookie("login", $login);
                setcookie("pass", $pass);
                header("Location: lk.php");
            }
            else{
                header("Location: registration.php");
            }
        }
    }