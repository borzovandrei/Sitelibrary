<body>
<script src="/template/script/up.js"></script>

<div class="big_container mregister">
    <div id="login">

        <h1><?= $title ?></h1>
        <p><a href="/login">Назад</a></p>


        <?php
        foreach ($booklist as $bookItem) : ?>
        <p><label for="name"><?= $name ?> <?php echo $bookItem['name'] ?>

        <p><label for="autor"><?= $autor ?> <?php echo $bookItem['autor'] ?>

        <p><label for="year"><?= $year ?> <?php  echo $bookItem['year'] ?>


            <input  class="buttonabout"  type="button" value="Подробнее" onclick='location.href="/library/<?= $bookItem["id"]?>"'>

            <?php endforeach; ?>


    </div>
</div>

<?php if (!empty($addbook)) {
    echo "<p class=\"error\">" . "Внимание: " . $addbook . "</p>";
} ?>

<div class="container mregister">
    <div id="login">
        <h1><?= $newbook ?></h1>
        <form action="library" id="addbookform" method="post" name="addbookform">
            <p><label for="name"><?= $name ?><br>
                <input class="input" id="name" name="name" size="32" type="text" value=""></label></p>
            <p><label for="autor"><?= $autor ?><br>
                <input class="input" id="autor" name="autor" size="32" type="text" value=""></label></p>
            <p><label for="year"><?= $year ?><br>
                <input class="input" id="year" name="year" size="4" type="text" value=""></label></p>
            <p><label for="about"><?= $about ?><br>
                <input class="input" id="about" name="about" size="1000" type="text" value=""></label></p>
            <p class="submit">
                <input class="button" id="add_book" name="add_book" type="submit" value="Добавить"></p>

        </form>
        <a href="#top"><?= $up ?></a>

    </div>
</div>
