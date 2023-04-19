<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
ini_set('display_errors',0);
if ($_GET['usr'] && $_GET['ou']){
    $domini = 'dc=fjeclot,dc=net';
    $opcions = [
        'host' => 'zend-maolpa.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    $ldap = new Ldap($opcions);
    $ldap->bind();
    $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
    $usuari=$ldap->getEntry($entrada);
    echo "<b><u>".$usuari["dn"]."</b></u><br>";
    foreach ($usuari as $atribut => $dada) {
        if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
    }
}
?>
<html>

<head>
<title>
	Visualitzar
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    
.login{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10%;
}
</style>
<body>
<div class="login">
    
    <form action="http://zend-maolpa.fjeclot.net/autent/visualitzar.php" method="GET">
    	<h1>Visualitzar</h1>
        Unitat Organitzativa: <input type="text" name="ou"><br>
        Nom de l'usuari <input type="text" name="usr"><br>
        <input type="submit" class="btn btn-primary"value="Envia" />
        <input type="reset"  class="btn btn-info  "value="Neteja" />
        <a href="http://zend-maolpa.fjeclot.net/autent/menu.php">Torna a la pàgina inicial</a>
        
    </div>
    </form>
</body>
            
</html>

