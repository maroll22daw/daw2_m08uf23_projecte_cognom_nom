<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#
# Atribut a modificar --> Número d'idenficador d'usuari
#
if ($_POST['atribut'] && $_POST['nouValor'] && $_POST['uid'] && $_POST['uo']){
    $atribut=$_POST['atribut']; # El número identificador d'usuar té el nom d'atribut uidNumber
    $nou_contingut=$_POST['nouValor'];
    #
    # Entrada a modificar
    #
    $uid = $_POST['uid'];
    $unorg = $_POST['uo'];
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
    # Modificant l'entrada
    #
    $ldap = new Ldap($opcions);
    $ldap->bind();
    $entrada = $ldap->getEntry($dn);
    if ($entrada){
        Attribute::setAttribute($entrada,$atribut,$nou_contingut);
        $ldap->update($dn, $entrada);
        echo "Atribut modificat";
    } else echo "<b>Aquesta entrada no existeix</b><br><br>";
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
    
    <form action="http://zend-maolpa.fjeclot.net/autent/modificar.php" method="POST">
    	<h1>Modificar</h1>
        UID: <input type="text" name="uid"><br>
        unitat organitzativa: <input type="text" name="uo"><br>
        UID Number: <input type="radio"  name="atribut" value="uidNumber"><br>
        GID Number : <input type="radio"  name="atribut" value="gidNumber"><br>
        Directori Personal: <input type="radio"  name="atribut" value="homeDirectory"><br>
        Shell: <input type="radio"  name="atribut" value="loginShell"><br>
        CN: <input type="radio"  name="atribut" value="cn"><br>
        SN: <input type="radio"  name="atribut" value="sn"><br>
        GivenName: <input type="radio"  name="atribut" value="givenName"><br>
        PostalAdress: <input type="radio"   name="atribut" value="postalAdress"><br>
        Mobile: <input type="radio"  name="atribut" value="mobile"><br>
        TelephoneNumber: <input type="radio"  name="atribut" value="telephoneNumber"><br>
        Titile: <input type="radio"  name="atribut" value="Title"><br>
        Description <input type="radio"  name="atribut" value="description"><br>
        Nou valor: <input type="text" name="nouValor" ><br>
        <input type="submit" class="btn btn-primary"value="Envia" />
        <input type="reset"  class="btn btn-info  "value="Neteja" />
        <a href="http://zend-maolpa.fjeclot.net/autent/menu.php">Torna a la pàgina inicial</a>
        
    </div>
    </form>
    
</body>
            
</html>

