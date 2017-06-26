<?php


class Router
{
    private $routes;


    public function __construct()
    {
        $routesPath= ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    //возвращает значение адрессной строки
    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }


    public function run()
    {

        //получить строку запроса
        $uri = $this->getURI();


        //проверка запроса в routres.php
        foreach ($this->routes as $uriPattern=>$path) {


            //сравниваем $uri $uriPattern
            if (preg_match("~$uriPattern~", $uri)) {


                //получаем внутренний поть по внешнему адресу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);


                //если есть то определяем контроллер
                // и action обрабатывает запрос
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . "Controller";
                $controllerName = ucfirst($controllerName);

                $actionName = "action" . ucfirst(array_shift($segments));



                //подключение файла ксласса-контроллера
                $controllerFile = ROOT . '/controllers/'.$controllerName . ".php";
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }


                //создать обьект, вызвать метод(actions)
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $segments) ;
                if ($result != null) {
                    break;
                }
            }
        }
    }
}