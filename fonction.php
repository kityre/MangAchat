<html>
<head>

</head>

<body>
<?php
require 'config.php';
function connect()
{
try{
		
$connect = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER, PW, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')) ;
return $connect ;
}
catch(PDOException $e)
{
	echo "problème de connexion". $e->getMessage();
	return false ;
}
}

?>



</body>

</html>