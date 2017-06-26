<?php

include_once ROOT . '/models/Library.php';

class LibraryController
{
    public function actionIndex()
    {
        session_start();
        //добавляет в базу данных и делает сообщение
        $addbook = Library::Addbook();

        $booklist = Library::GetNewsList();

        require_once(ROOT . '/views/includes/header.php');
        require_once(ROOT . '/views/news/books.php');
        require_once(ROOT . '/views/includes/footer.php');



        return true;

    }

    public function actionView($id)
    {
        if ($id) {
            session_start();
            //получает список книг
            $bookItem = Library::GetNewsItemById($id);
            $addcomment = Library::AddComment($id);


            require_once(ROOT . '/views/includes/header.php');
            require_once(ROOT . '/views/news/book.php');
            require_once(ROOT . '/views/includes/footer.php');


        }
        return true;

    }
}