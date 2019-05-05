
<?php session_start() ?> 
<?php

require "fonction.php";

$id = $_SESSION['id'];
$bdd=connect();
$req = $bdd->prepare("select * from manga where id =?");
$req->execute(array($id));
?>
<html>
<head>
<head> <title> Mangachat.fr </title>
<meta charset="UTF-8">
 <link type="text/css" rel="stylesheet" href="style.css" />


</head>


<body>
<fieldset>
<br>
<center><a href="index.php" target="index.php" ><span class="baniere"><button ><H1> Bienvenue sur Mangachat.fr </H1></button></span> </a></center>
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
<?php
$manga = $req->fetch(PDO::FETCH_OBJ);

echo "
		<h1>".$manga->nom."</h1> <br> <br>
		<fieldset> 
		<div class='baniere'>
		<img src=".$manga->image." />
		<p>RESUME: ".$manga->description1."</p>
		</div>
		<p> AUTEUR: ".$manga->realisateur." </p>
		<p> SORTIE: ".$manga->anneeDebut."</p>
		<p> MAISON D'EDITION: ".$manga->maisonEdition."</p>
		
		</fieldset>
		

		";
$sql=$bdd->prepare("select * from tome where id_manga =?");
$sql->execute(array($id));
?>
<ul class="produits clearfix">
<?php
while ($manga = $sql->fetch(PDO::FETCH_OBJ)){
	


echo "<li> <span class='titre'>".$manga->titre."<span> 
		<span class='image'><img src=".$manga->image." /> </span>
		<br><br><br><br><br>
		<span class='prix'> ".$manga->prix." €</span>
		<span class='toptext''> <a  href='ajout_panier.php?id=".$manga->id."'> <button>Ajouter au panier</button></a>  <span>

		 



</li>";
}

?>
</ul>
?>
</body>

</html>


















