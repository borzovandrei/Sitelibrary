<body>

<div class="big_container mregister">
    <div id="login">

        <h1>Имеющиеся книги</h1>
        <p><a href="/library">Назад</a></p>


        <p><label for="name">Название <?php echo $bookItem['name'] ?>

        <p><label for="autor">Автор <?php echo $bookItem['autor'] ?>

        <p><label for="year">Год <?php echo $bookItem['year'] ?>

        <p><label for="about">Описание<br> <?php echo $bookItem['about'] ?><br><br>

                <input type="button" value="Назад" onclick='location.href="/library/"  '>

                <h1>Коментарии: </h1>

                <?php
                $comments = Library::GetComments($id);
               ?>


    </div>
</div>

<?php if (!empty($addcomment)) {echo "<p class=\"error\">" . "Внимание: ". $addcomment . "</p>";} ?>

<div class="container mregister">
    <div id="login">
        <h1>Добавить комментарий</h1>
        <h4>Вы можете оставить комментарий,
            <span>
				ИМЯ пользователя
            </span>
        </h4>

        <form action="/library/<?php echo $id ?>" id="addbookform" method="post"name="addbookform">
            <p><label for="comment">Коментарий<br>
                    <textarea class="input" id="comment" name="comment"size="1000" cols="20" rows="5" type="text" value=""></textarea></p>
            <p class="submit"><input class="button" id="add_comment" name= "add_comment" type="submit" value="Добавить"></p>

        </form>
    </div>
</div>
