<head>
<title> Mangachat.fr </title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<fieldset>
<br>
<center><a href="index.php" target="index.php" ><span class="baniere"><button ><H1> Bienvenue sur Mangachat.fr </H1></button></span> </a></center>

<br><br><br><br><br><br><br>
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
	echo "<li id='lien6'><span  class='titre' ><a href='administrateur.php'  ><button>Administrateur</button></a></span><li>";
}
?>
</div>
</fieldset></fieldset>
<?php
include "utilisateurFactory.php";
if(!empty($_SESSION['Auth']))
{ ?>
<fieldset>
<?php
$id=$_SESSION['Auth']['id'];
$bdd=connect();
$sql=$bdd->prepare("SELECT * FROM utilisateur WHERE id=$id");
$sql->execute(array($id));
$personne = $sql->fetch(PDO::FETCH_OBJ);
$nom=$personne->nom;
$prenom=$personne->prenom;
$adresse=$personne->adresse;
$cp=$personne->cp;
$ville=$personne->ville;
$jour_naissance=$personne->jour_naissance;
$mois_naissance=$personne->mois_naissance;
$annee_naissance=$personne->annee_naissance;
echo "<div align='center' ><table>";
echo "<tr><td>Nom</td><td> $nom </td></tr>" ;
echo "<tr><td>Prenom</td><td> $prenom </td></tr>";
echo "<tr><td>Adresse</td><td> $adresse </td></tr>";
echo "<tr><td>Code Postal</td><td> $cp </td></tr>";
echo "<tr><td>Ville</td><td> $ville </td></td></tr>";
echo "<tr><td>Date de Naissance</td><td> $jour_naissance / $mois_naissance / $annee_naissance </td></tr>";
echo "</table></div>";
}
else
{
	header('location: connexion.php');
}
?>



</fieldset>
</body>
</html>