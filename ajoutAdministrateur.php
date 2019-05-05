<html>
<head> <title> Mangachat.fr </title>

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
<br>
<?php
$bdd1=connect();
$sql1="select * from utilisateur";
$stt1=$bdd1->prepare($sql1);
$stt1->execute();
?>
<div align='center'><table>
<tr><th>Email</th><th>Nom</th><th>Prenom</th><th>Administrateur</th></tr>
<?php
while ($unUtilisateur = $stt1->fetch(PDO::FETCH_OBJ))
{
	$id=$unUtilisateur->id;
	$email=$unUtilisateur->email;
	$nom=$unUtilisateur->nom;
	$prenom=$unUtilisateur->prenom;
	$administrateur=$unUtilisateur->administrateur;
	if($administrateur == 1)
	{
		$action="Est admin"; 
	} 
	else
	{
		$action="<font color='white' ><a href='ajoutAdmin2.php?id=$id '><button>Ajouter</button></a></font>"; 
	}
	echo"
	<tr><td>$email</td><td>$nom</td><td>$prenom</td><td>$action</td></tr>
	";
} ?>
</table></div>
</body>
</html>