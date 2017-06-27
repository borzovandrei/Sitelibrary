<?php
include_once ROOT . '/models/Login.php';
include_once(ROOT . '/controllers/Shablon.php');

class LoginController
{
    public function actionLog()
    {

        $log = Login::Log();

        $content = new Shablon();

        $content->getContent('login', array(
            '{page_title}' => 'PHP/MySQL',
            '{name}' => 'Авторизация',
            '{username}'=>'Имя попльзователя',
            '{password}'=> 'Пароль',
        ));


        return true;
    }

    public function actionReg()
    {
        $reg = Login::Reg();
        $content = new Shablon();


        $content->getContent('register', array(
            '{page_title}' => 'PHP/MySQL',
            '{name}' => 'Регистрация'
        ));

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