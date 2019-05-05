<html>
<head> <title> Mangachat.fr </title>
<form name="ajout" method="post" action="ajoutCategorie.php" >

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
	echo "<div align='right'> Bienvenue ".$_SESSION['Auth']['nom'] ." ".$_SESSION['Auth']['prenom'].".<br><p><a class='button' href='logout.php'> Deconnexion </a> </p></div>" ; 
}
else
{
	echo "<br><br><br><div align='right'> <a href='connexion.php'>Connectez Vous</a></div>" ;
}

?>	
	

<br>
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
	echo "<a href='administrateur.php'  ><button>Administrateur</button></a>";
}
?>
</div>

</fieldset></fieldset>
<head><form name="ajout" method="post" action="ajoutCategorie.php" ></head>

<?php
extract($_POST);
if(!empty($nomCategorie))
{
	$valid=false ;
	$erreur=false;
	$bdd1=connect() ;
	$sql1="Select * from categorie" ;
	$stt1=$bdd1->prepare($sql1) ;
	$stt1-> execute();
	while ($uneCategorie = $stt1->fetch(PDO::FETCH_OBJ))
	{
		if($uneCategorie->nom==$nomCategorie)
		{
			$erreur=true;
		}
	}
	if($erreur==true)
	{
		$erreur="Cette categorie existe deja";
	}
	if($erreur!=true)
	{
		$valid = true;
	}
	if($valid == true)
	{
		$bdd2=connect() ;
		$sql2="Insert into categorie(nom) values ('$nomCategorie') " ;
		$stt2=$bdd2->prepare($sql2) ;
		$stt2-> execute( array($nomCategorie));
		$continue=true;
		if ($continue==true)
		{
			header("location: administrateur.php");
		}
	}
}?>
<fieldset><legend>Ajout d'une categorie</legend>
Categorie a ajouter :
<input type="text" name="nomCategorie" id="nomCategorie">
<?php if(isset($erreur) && $erreur==true)   { ?>
 <div id="bulle"><font color="red">
Cette categorie existe deja </font></div>
<?php } ?>
</fieldset>
<br><br>

<center><input type="submit" name="Ajouter" value="Ajouter"></input>
&nbsp;
<a href="ajoutCategorie.php" ><button>Annuler</button></a> </center>


</body>
</html>

