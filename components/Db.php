<?php

class Db
{
    //ToDo: single ton use!
    public static function getConnection(){
       $paramsPath=ROOT.'/config/params_db.php';
       $params=include ($paramsPath);


       try{
           $db=new PDO ("mysql:host={$params['host']}; dbname={$params['dbname']}" ,$params['user'],$params['password']);
       }
       catch (\Exception $e){
           var_dump($params,$e->getMessage());die('ex');
       }

       return $db;

    }

}