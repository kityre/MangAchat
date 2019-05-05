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
if(!isset($_SESSION['panier']))
{
	$_SESSION['panier']=array() ; 
}
if(isset($_SESSION['panier'] [$id])){
	$_SESSION['panier'][$id]++ ;
	
}
else{
	$_SESSION['panier'][$id]=1 ; 
}
$_SESSION['succes']=" le produit a été ajouté au panier !";
header('Location: panier.php');

?>



</body>



</html>