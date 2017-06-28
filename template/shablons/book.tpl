
<body>

<div class="big_container mregister">
    <div id="login">

        <h1><?php echo $bookItem['name'] ?></h1>
        <p><a href="/library">Назад</a></p>


        <p><label for="name"><?php echo "Название: ".$bookItem['name'] ?>

        <p><label for="autor"><?php echo "Автор: ".$bookItem['autor'] ?>

        <p><label for="year"><?php echo "Год: ".$bookItem['year'] ?>

        <p><label for="about"><?php echo "Описание :".$bookItem['about'] ?><br><br>

                <input type="button" value="Назад" onclick='location.href="/library/"  '>

                <h1>Коментарии: </h1>

                <?php
                $comments = Library::GetComments($id);
               ?>


    </div>
</div>


<div class="container mregister">
    <div id="login">
        <h1>Добавить комментарий</h1>
        <h4>Вы можете оставить комментарий,
            <span>
				<?php
                if($_SESSION){
                    echo $_SESSION['session_username'];
                ?>
                <form action="/library/<?php echo $id ?>" id="addbookform" method="post"name="addbookform">
            <p><label for="comment">Коментарий<br>
                    <textarea class="input" id="comment" name="comment"size="1000" cols="20" rows="5" type="text" value=""></textarea></p>
            <p class="submit"><input class="button" id="add_comment" name= "add_comment" type="submit" value="Добавить"></p>

        </form>
                    <p><a href="/logout">Сменить пользователя</a></p>
                <?php

                }
                else {echo "Авторизируйтесь";
                ?> <p><a href="/logout">Выполнить вход</a></p> <?php
                }
                ?>
            </span>

        </h4>


    </div>
</div>