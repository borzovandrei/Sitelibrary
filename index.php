<?php
    //FRONT CONTROLLER

    //общие настройки

        ini_set('display_errors', 1);
        error_reporting(E_ALL);

    //подключение файлов системы
        define('ROOT',dirname(__FILE__));
        require_once (ROOT.'/components/Router.php');
        require_once (ROOT.'/components/Db.php');


    //composer
     //   require ROOT.'/vendor/autoload.php';

    //вызов router
        $router=new Router();
        $router->run();