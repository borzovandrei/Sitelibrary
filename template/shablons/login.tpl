{include=header.tpl}
<body>
<div class="container mlogin">
    <div id="login">
        <h1>{name}</h1>
        <form action="" id="loginform" method="post" name="loginform">
            <p><label for="user_login">{username}<br>
                    <input class="input" id="username" name="username" size="20"
                           type="text" value=""></label></p>
            <p><label for="user_pass">{password}<br>
                    <input class="input" id="password" name="password" size="20"
                           type="password" value=""></label></p>
            <p class="submit"><input class="button" name="login" type="submit" value="Log In"></p>
            <p class="regtext">Еще не зарегистрированы?<a href="register">Регистрация</a>!</p>
        </form>
    </div>
</div>
</body>
{include=footer.tpl}