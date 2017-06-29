<?php

include_once ROOT . '/models/Library.php';
include_once(ROOT . '/controllers/Shablon.php');

class LibraryController
{
    public function actionIndex()
    {
        session_start();

        //добавляет в базу данных и делает сообщение
        $addbook = Library::Addbook();
        $booklist = Library::GetNewsList();

        $content = new Shablon();


        $data = [
            'addbook'=>$addbook,
            'booklist'=>$booklist,
            'title'=>'Имеющиеся книги',
            'newbook'=>'Добавить книгу',
            'name'=>'Название',
            'autor'=>'Автор',
            'year'=>'Год',
            'about'=>'Описание',
            'up'=>'Наверх',
        ];

        $main = [
            'head' => $content->getContent('shablons/includes/header', $data, true),
            'body' => $content->getContent('shablons/library', $data, true),
            'footer' => $content->getContent('shablons/includes/footer', $data, true),
        ];

        $content->getContent('main', $main);
        return true;

    }

    public function actionView($id)
    {
        if ($id) {
            session_start();
            //получает список книг
            $bookItem = Library::GetNewsItemById($id);
            $addcomment = Library::AddComment($id);

            $content = new Shablon();
            $data = [
                'addcomment'=> $addcomment,
                'bookItem'=>$bookItem,
                'id'=>$id
            ];

        $main = [
            'head' => $content->getContent('shablons/includes/header', $data, true),
            'body' => $content->getContent('shablons/book', $data, true),
            'footer' => $content->getContent('shablons/includes/footer', $data, true),
        ];


        }

        $content->getContent('main', $main);
        return true;

    }
}