<html>

<head>
    <link rel="stylesheet" href="../../assets/css/login.css" />
    <title>LOGIN</title>
</head>

<body>
    <form method="POST" action="">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="E-mail" /><br /><br />
        <input type="password" name="passw" placeholder="******" /><br /><br />
        <input type="submit" value="Entrar" /><br /><br />
        <div style="text-align: center; width: 100%;">
            <a href="<?php echo BASE_URL; ?>login/esqueci">Esqueci a Senha</a>
        </div>
    </form>
</body>

</html>