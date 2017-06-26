<?php
include_once ROOT . '/models/Login.php';

class LoginController
{
    public function actionLog()
    {


        $log = Login::Log();
        echo $log;


        require_once(ROOT . '/views/includes/header.php');
        require_once(ROOT . '/views/login/login.php');
        require_once(ROOT . '/views/includes/footer.php');


        return true;
    }

    public function actionReg()
    {
        $reg = Login::Reg();

        require_once(ROOT . '/views/includes/header.php');
        require_once(ROOT . '/views/login/register.php');
        require_once(ROOT . '/views/includes/footer.php');


        return true;
    }
}