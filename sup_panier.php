<?php session_start() ?>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />

</head>


<body>
<?php
require 'fonction.php';
$bdd=connect();
$id = $_GET["id"] ; 

if ($_SESSION['panier'][$id]<=1  )
{
	unset($_SESSION['panier'][$id] );
}

else
{
	$_SESSION['panier'][$id]-- ; 
}


header('Location: panier.php');

?>



</body>



</html>