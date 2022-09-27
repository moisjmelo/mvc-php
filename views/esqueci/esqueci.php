<html>

<head>
    <link rel="stylesheet" href="../../assets/css/login.css" />
    <title>Esqueci a Senha</title>
</head>

<body>
    <form method="POST">
        Email do aluo:<br />
        <input type="text" name="email" /><br /><br />
        Nova Senha do aluo:<br />
        <input type="password" name="passw" /><br /><br />
        <input type="submit" value="Salvar Nova Senha" /><br /><br />
        <?php if ($forgot == 0) {
            echo '<div style="color: red; text-align: center " >' . $forgot . '</di>';
        }; ?>
    </form>
</body>

</html>