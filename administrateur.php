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


<fieldset>
<div align='center'><table>
    <tr><th>Ajouter:	</th></tr>
	
	<tr><td><a href="ajoutCategorie.php" >Une Categorie</a></td></tr>
	<tr><td><a href="ajoutManga.php">Un Manga</a></td></tr>
	<tr><td><a href="ajoutTome.php">Un Tome</a></td></tr>
	<tr><td><a href="ajoutAdministrateur.php">Un Administrateur</a></td></tr>
</table></div>
</fieldset>
</body></html>