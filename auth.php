<?php
    require 'vendor/autoload.php';
	use Laminas\Ldap\Ldap;

	ini_set('display_errors', 0);
	if ($_POST['cts'] && $_POST['adm']){
	   $opcions = [
            'host' => 'zend-maolpa.fjeclot.net',
		    'username' => "cn=admin,dc=fjeclot,dc=net",
   		    'password' => 'fjeclot',
   		    'bindRequiresDn' => true,
		    'accountDomainName' => 'fjeclot.net',
   		    'baseDn' => 'dc=fjeclot,dc=net',
       ];	
	   $ldap = new Ldap($opcions);
	   $dn='cn='.$_POST['adm'].',dc=fjeclot,dc=net';
	   $ctsnya=$_POST['cts'];
	   try{
	       $ldap->bind($dn,$ctsnya);
	       header("location: menu.php");
	   } catch (Exception $e){
	       echo "<b>Contrasenya incorrecta</b><br><br>";	       
	   }
	}
?>
<html>
	<head>
		<title>
			AUTENTICACIÓ AMB LDAP 
		</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>
	<body>
	<h4>Nom d'usuari o contrasenya incorrecte</h4>
		<a href="http://zend-maolpa.fjeclot.net/autent/login.php"><button class="btn btn-primary">Torna a la pàgina inicial</button></a>
	</body>
</html>
