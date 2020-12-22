<?php


namespace MyApp\Controllers;


class ProfileController extends Controller
{
    public function actionIndex()
    {
        if (isset($_SESSION['login'])){
            $this->render('profile.twig', [
                'login' => $_SESSION['login'],
                'first' => $_SESSION['history'],
                'second' => array_slice($_SESSION['history'], -5),
            ]);
            $this->history();
        } else{
            $this->redirect('\auth');
        }
    }

    public function actionLogout()
    {
        session_unset();
        $this->redirect('\auth');
    }
}
