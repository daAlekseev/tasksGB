<?php


namespace MyApp\Controllers;

use MyApp\Models\Auth;

class AuthController extends Controller
{
    public function actionIndex()
    {
        if (!isset($_SESSION['login'])){
            $this->render('auth.twig', [
                'name' => 'reg',
            ]);
            $this->history();
        } else{
            $this->redirect('\profile');
        }
    }

    public function actionSign()
    {
        $num = Auth::sign($_POST['login'], $_POST['pwd']);
        if ($num > 0){
            $_SESSION['login'] = $_POST['login'];
            $this->redirect("\profile");
        } else{
            echo "Неверный логин или пароль!";
        }
    }
}
