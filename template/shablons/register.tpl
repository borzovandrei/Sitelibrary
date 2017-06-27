
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{page_title}</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link href="/template/style/style.css" media="screen" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
</head>



<body>

<div class="container mregister">
    <div id="login">
        <h1>{name}</h1>
        <form action="register" id="registerform" method="post" name="registerform">
            <p><label for="user_login">Полное имя<br>
                    <input class="input" id="full_name" name="full_name" size="32" type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
            <p><label for="user_pass">Имя пользователя<br>
                    <input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password" size="32" type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name="register" type="submit"
                                     value="Зарегистрироваться"></p>
            <p class="regtext">Уже зарегистрированы? <a href="login">Введите имя пользователя</a>!</p>
        </form>
    </div>
</div>
<footer>
    <a>© 2017 </a>
    <a href="http://www.internet-technologies.ru/articles/article_2077.html"> Информация</a>
</footer>
</body>
</html>


</html>