<html>

<head>
    <title>
        AUTENTICANT AMB LDAP DE L'USUARI admin
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>

.login{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20%;
}
</style>
<body>
<div class="login">

    <form action="http://zend-maolpa.fjeclot.net/autent/auth.php" method="POST">
        Usuari amb permisos d'administració LDAP: <input type="text" name="adm"><br>
        Contrasenya de l'usuari: <input type="password" name="cts"><br>
        <input type="submit" class="btn btn-primary"value="Envia" />
        <input type="reset"  class="btn btn-info  "value="Neteja" />
    </div>
    </form>
</body>

</html>