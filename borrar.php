<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#
# Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
#
$uid = $_POST["uid"];
$unorg = $_POST["uo"];
$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
#
#Opcions de la connexió al servidor i base de dades LDAP
$opcions = [
    'host' => 'zend-maolpa.fjeclot.net',
    'username' => 'cn=admin,dc=fjeclot,dc=net',
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
#
# Esborrant l'entrada
#
$ldap = new Ldap($opcions);
$ldap->bind();
try{
    $ldap->delete($dn);
    echo "<b>Entrada esborrada</b><br>";
} catch (Exception $e){
    echo "<b>Aquesta entrada no existeix</b><br>";
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
    margin-top: 20%;
}
</style>
<body>
<div class="login">
    
    <form action="http://zend-maolpa.fjeclot.net/autent/borrar.php" method="POST">
    	<h1>Eliminar</h1>
        uID: <input type="text" name="uid"><br>
        Unitat Organitzativa: <input type="text" name="uo"><br>
        <input type="submit" class="btn btn-primary"value="Envia" />
        <input type="reset"  class="btn btn-info  "value="Neteja" />
        <a href="http://zend-maolpa.fjeclot.net/autent/menu.php">Torna a la pàgina inicial</a>
        
    </div>
    </form>
    
</body>
            
</html>

