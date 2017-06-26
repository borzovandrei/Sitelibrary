<?php


class Login
{


public static function Log()
{

    $db = Db::getConnection();
    $message = '';

    if (isset($_SESSION["session_username"])) {
        header("Location: library");
    }

    if (isset($_POST["login"])) {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];


            $strSQL = "SELECT * FROM usertbl WHERE username=:us AND password=:pw";  //запрос на книгу по id
            $prep = $db->prepare($strSQL);                                          //Подготавливает запрос к выполнению и возвращает ассоциированный с этим запросом объект
            $prep->bindParam('us', $username, PDO::PARAM_STR);                      //Привязывает параметр запроса к переменной
            $prep->bindParam('pw', $password, PDO::PARAM_STR);                      //Привязывает параметр запроса к переменной

            $res = $prep->execute();                                                // Запускает подготовленный запрос на выполнение
            $user = $prep->fetchObject();


            if ($user) {

//
                session_start();
                $_SESSION['session_username'] = $username;
                header("Location: library");
                die;
            }

        } else {

            $message = "Введите имя или пароль.";
        }

    } else {
        $message = "Все поля должны быть заполнены!";
    }
    return $message;
}




public static function Reg()
{

    $db = Db::getConnection();
    $message = '';

    if (isset($_POST["register"])) {
        if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $full_name = htmlspecialchars($_POST['full_name']);
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = $db->query("SELECT * FROM usertbl WHERE username='" . $username . "'");
            $numrows = mysql_num_rows($query);


            if ($numrows == 0) {
                $sql = "INSERT INTO usertbl (full_name, email, username, password) VALUES('$full_name','$email', '$username', '$password')";
                $result = $db->query($sql);


                if ($result) {
                    $message = "Регистрация прошла успешно";
                    header("location: login");
                } else {
                    $message = "Ошибка ввода данных!";
                }
            } else {
                $message = "Имя уже используется, придумайте другое!";
            }
        } else {
            $message = "Все поля должны быть заполнены!";
        }
    }



return $message;
}


}

