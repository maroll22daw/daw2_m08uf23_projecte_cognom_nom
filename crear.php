
<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#Dades de la nova entrada
#
$uid= $_POST["uid"];
$unorg= $_POST["uo"];
$num_id= $_POST["uidn"];
$grup=$_POST["gidn"]; 
$dir_pers= $_POST["dp"];
$sh= $_POST["shell"];
$cn=$_POST["cn"];
$sn= $_POST["sn"];
$nom=$_POST["gn"];
$mobil=$_POST["mobile"];
$adressa=$_POST["pa"];
$telefon=$_POST["tn"];
$titol=$_POST["title"];
$descripcio=$_POST["description"];

$objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
#
#Afegint la nova entrada
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
$nova_entrada = [];
if ($_POST["uid"]){
    Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
    Attribute::setAttribute($nova_entrada, 'uid', $uid);
    Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
    Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
    Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
    Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
    Attribute::setAttribute($nova_entrada, 'cn', $cn);
    Attribute::setAttribute($nova_entrada, 'sn', $sn);
    Attribute::setAttribute($nova_entrada, 'givenName', $nom);
    Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
    Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
    Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
    Attribute::setAttribute($nova_entrada, 'title', $titol);
    Attribute::setAttribute($nova_entrada, 'description', $descripcio);
    $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
    if($ldap->add($dn, $nova_entrada)) echo "<h1>Usuari creat</h1>";
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
    
    <form action="http://zend-maolpa.fjeclot.net/autent/crear.php" method="POST">
    	<h1>Crear</h1>
        UID: <input type="text" name="uid"><br>
        unitat organitzativa: <input type="text" name="uo"><br>
        UID Number: <input type="text" name="uidn"><br>
        GID Number : <input type="text" name="gidn"><br>
        Directori Personal: <input type="text" name="dp"><br>
        Shell: <input type="text" name="shell"><br>
        CN: <input type="text" name="cn"><br>
        SN: <input type="text" name="sn"><br>
        GivenName: <input type="text" name="gn"><br>
        PostalAdress: <input type="text" name="pa"><br>
        Mobile: <input type="text" name="mobile"><br>
        TelephoneNumber: <input type="text" name="tn"><br>
        Titile: <input type="text" name="title"><br>
        Description <input type="text" name="description"><br>
        <input type="submit" class="btn btn-primary"value="Envia" />
        <input type="reset"  class="btn btn-info  "value="Neteja" />
        <a href="http://zend-maolpa.fjeclot.net/autent/menu.php">Torna a la pàgina inicial</a>
        
    </div>
    </form>
    
</body>
            
</html>

