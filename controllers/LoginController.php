<?php
include_once ROOT . '/models/Login.php';
include_once(ROOT . '/controllers/Shablon.php');

class LoginController
{
    public function actionLog()
    {

        $log = Login::Log();

        $content = new Shablon();

        $data = [
            'page_title' => 'PHP/MySQL',
            'name' => 'Авторизация',
            'username' => 'Имя попльзователя',
            'password' => 'Пароль'

        ];

        $main = [
            'head' => $content->getContent('shablons/includes/header', $data, true),
            'body' => $content->getContent('shablons/login', $data, true),
            'footer' => $content->getContent('shablons/includes/footer', $data, true),
        ];

        $content->getContent('main', $main);


        return true;
    }

    public function actionReg()
    {
        $reg = Login::Reg();
        $content = new Shablon();


        $data = [
            'page_title' => 'PHP/MySQL',
            'name' => 'Регистрация'

        ];

        $main = [
            'head' => $content->getContent('shablons/includes/header', $data, true),
            'body' => $content->getContent('shablons/register', $data, true),
            'footer' => $content->getContent('shablons/includes/footer', $data, true),
        ];

        $content->getContent('main', $main);


        return true;
    }

    public function actionLogout()
    {

        session_start();
        unset($_SESSION['session_username']);
        session_destroy();
        header("location:/login");


        return true;
    }
}