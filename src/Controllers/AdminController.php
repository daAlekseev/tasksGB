<?php


namespace MyApp\Controllers;


use MyApp\Models\Admin;
use MyApp\Models\User;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $this->history();
        $role = Admin::checkRole(User::getUserId($_SESSION['login'])['id']);
        if ($role == 1){
            if (isset($_GET['accept'])) {
                Admin::changeStatus($_GET['accept'], "2");
                $this->adminPage(Admin::getOrders());
            } elseif (isset($_GET['reject'])) {
                Admin::changeStatus($_GET['reject'], "0");
                $this->adminPage(Admin::getOrders());
            } else {
                $this->adminPage(Admin::getOrders());
            }
        } else{
            $this->redirect('\profile');
        }
    }
}