<?php


class Library
{
//добавить книгу

    public static function Addbook()
    {

        $db = Db::getConnection();
        $message='';

        if (isset($_POST["add_book"])) {
            if (!empty($_POST['name']) && !empty($_POST['autor']) && !empty($_POST['year'])) {
                $name = htmlspecialchars($_POST['name']);
                $autor = htmlspecialchars($_POST['autor']);
                $year = htmlspecialchars($_POST['year']);
                $about = htmlspecialchars($_POST['about']);

                $query=$db->query("SELECT * FROM books WHERE username='".$_POST['name']."'");


//                $query->setFetchMode(PDO::FETCH_ASSOC);
//                $res = $query->fetch();
//
//                $db->prepare('SELECT * FROM books WHERE name = ?' );
//                $db->exec($name);
//                $query = $db->fetch(PDO::FETCH_ASSOC);
//
//                $query = $db->exec(PDO::FETCH_ASSOC);
//                var_dump($query);
//
//
//                printf("query= \n", $query);
//                printf("numrows= \n", $numrows);
//                printf($_POST['autor']);


                $numrows = $query->rowCount();


                if ($numrows == 0) {
                    $sql = "INSERT INTO books (name, autor, year, about) VALUES('$name','$autor', '$year', '$about')";


                    $result = $db->query($sql);
                    if($result){
                        $message = "Книга добавлена";
                    } else {
                        $message = "Ошибка ввода данных!";
                    }
                } else {
                    $message = "Такая книга уже существует";
                }
            } else {
                $message = "Заполните все поля";
        }


        return $message;
        }
    }


    public static function AddComment($id)
    {

        $db = Db::getConnection();
        $message='';

        if(!empty($_POST['comment']) ) {


            $strSQL = "SELECT * FROM books WHERE id = '$id' ";
            $rb = $db->query($strSQL);
            $it = $rb->fetch();

            $book=htmlspecialchars($it['name']);


            $user= htmlspecialchars("session_username");
            $comment=htmlspecialchars($_POST['comment']);

            $sql="INSERT INTO comments (comment, user, book ) VALUES ('$comment','$user','$book')";
            $result=$db->query($sql);
            if($result){
                $message = "Комментарий добавлен";
            }

        } else {
            $message = "Напишите коментарий";
        }

        return $message;
    }

//возвращает одну новость по индетификатору(БД)
    public static function GetNewsItemById($id)
    {

        $id = intval($id);

        if ($id) {


            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM books WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $bookItem = $result->fetch();
            return $bookItem;
        }

    }


//возвразает список новостей (БД)
    public static function GetNewsList()
    {

        $db = Db::getConnection();

        $booklist = array();
        $result = $db->query('SELECT id, name, year, autor, about FROM books ORDER BY year /* LIMIT 3 */');

        $i = 0;

        while ($row = $result->fetch()) {
            $booklist[$i]['id'] = $row['id'];
            $booklist[$i]['name'] = $row['name'];
            $booklist[$i]['year'] = $row['year'];
            $booklist[$i]['autor'] = $row['autor'];
            $booklist[$i]['about'] = $row['about'];
            $i++;

        }
        return $booklist;

    }



    //вывод коментариев к выбранной книге
    public static function GetComments($id)
    {

        $db = Db::getConnection();


        $strSQL = "SELECT * FROM books WHERE id = :id  "; //запрос на книгу по id
        $prep = $db->prepare($strSQL);                    //Подготавливает запрос к выполнению и возвращает ассоциированный с этим запросом объект
        $prep->bindParam('id', $id, PDO::PARAM_INT);      //Привязывает параметр запроса к переменной
        $res = $prep->execute();                          // Запускает подготовленный запрос на выполнение
        $book = $prep->fetchObject();                      // Извлекает строку и возвращает ее в виде объекта


        $strSQL = "SELECT * FROM comments WHERE book = '".$book->name."'"." ORDER BY date ";
        $rs = $db->query($strSQL);

        while($row = $rs->fetch()){
            echo "Пользователь: " . $row['user']."</br>" ;
            echo "Дата: " . $row['date']."</br>" ;
            echo "Комментарий: " . $row['comment'] ."</br></br>";
        }
        return $res;

    }
}