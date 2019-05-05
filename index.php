
<html>
<head> <title> Mangachat.fr </title>
<meta charset="UTF-8">
 <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>

<fieldset>
<br>
<center><a href="index.php" target="index.php" ><span class="baniere"><button ><H1> Bienvenue sur Mangachat.fr </H1></button></span> </a></center>
<br><br>

<?php

include "utilisateurFactory.php";
if(!empty($_SESSION['Auth']))
{
	echo "<div align='right'> Bienvenue ".$_SESSION['Auth']['nom'] ." ".$_SESSION['Auth']['prenom'].".<br>
<p><a class='button' href='logout.php'> Deconnexion </a> </p></div>" ; 
}
else
{
	echo "<br><div align='right'> <a href='connexion.php'>Connectez Vous</a></div>" ;
}

$bdd=connect();
$sql=$bdd->prepare("SELECT id,nom,realisateur,image FROM `manga` ") ;

$sql->execute();
?>	
	

<br><br>
<fieldset>

<div align='center' class="baniere" >


<a href="compte.php"  ><button>Votre Compte</button></a>

<?php
if(!empty($_SESSION['Auth']))
{
	echo "<a href='panier.php'  ><button>Panier </button></a>";
}
?>
<?php
if(!empty($_SESSION['Auth']) &&($_SESSION['Auth']['administrateur']==1))
{
	echo "<a href='administrateur.php'  ><button> Administrateur</button></a>";
}
?>

</div>

</fieldset></fieldset>
<br>
<h1> Nos mangas </h1>
<br>
<ul class="produits">
<?php
while ($manga = $sql->fetch(PDO::FETCH_OBJ)){
	


echo "<li> <span class='titre'>".$manga->nom."<span> 
		<span class='image'><img src=".$manga->image." /> </span>
		<br><br><br><br><br>
		<span class='prix'> ".$manga->realisateur." </span>
	
		<span class='baniere''> <a  href='inter.php?id=".$manga->id."'> <button >Voir le manga</button></a>  <span>
		 



</li>";
}

?>
</ul>
</body>
</html>