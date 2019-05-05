<html>
<head> <title> Mangachat.fr </title>
<script src="jquery-3.3.1.js"></script>
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
<head><form name="ajout" method="post" action="ajoutManga.php" ></head>

<?php
extract($_POST);
if(!empty($_POST))
{
	$erreurDescription=false;
	if(!empty($Contenue1))
	{
		$description1="";
		if (strlen($Contenue1)>1000)
		{
			$erreurDescription=false;
			$erreurContenue=false;
		}
		else
		{
				$Contenue=str_split($Contenue1);
				$i=0;
				while ($i<strlen($Contenue1))
				{
					$description1=$description1.$Contenue[$i];
					$i++;
				}
			
		}
	}
	$valid=false ;
	$erreur=false;
	if(!empty($nom))
	{
		$bdd1=connect() ;
		$sql1="Select * from manga" ;
		$stt1=$bdd1->prepare($sql1) ;
		$stt1-> execute();
		while ($unManga = $stt1->fetch(PDO::FETCH_OBJ))
		{
			if($unManga->nom==$nom)
			{
				$erreur=true;
			}
		}
		if($erreur!=true)
		{
			$valid = true;
		}
	}
	if(($valid == true) && ( $erreurDescription == true ))
	{
		$bdd2=connect() ;
		$sql2="Insert into manga(nom,description1,description2,realisateur,maisonEdition,anneeDebut,anneeFin,id_Categorie) values ('$nom','$description1','$description2','$realisateur','$maisonEdition',$anneeDebut,$anneeFin,$Categorie)" ;
		$stt2=$bdd1->prepare($sql2) ;
		$stt2-> execute(array($nom,$description1,$description2,$realisateur,$maisonEdition,$anneeDebut,$anneeFin,$Categorie));
		header("location: administrateur.php");
	}
}?>

<fieldset><legend>Manga a ajouter</legend>

<p>Categorie : </p>
<select name="Categorie" id="Categorie"> 
<option value="0" ></option>
<?php
$bdd=connect() ;
$sql="Select * from categorie" ;
$stt=$bdd->prepare($sql) ;
$stt-> execute();
while($uneCategorie = $stt->fetch(PDO::FETCH_OBJ))
{
	echo "<option value=".$uneCategorie->id." >".$uneCategorie->nom."</option>";
}
?>
</select>
<p>Nom : </p>
<input type="text" name="nom" id="nom">
<?php if(isset($erreur) && $erreur==true)   { ?>
 <div id="bulle"><font color="red">
Ce Manga existe deja </font></div>
<?php } ?>
<p>Realisateur : </p>
<input type="text" name="realisateur" id="realisateur" value="<?php if(isset($realisateur)) {echo $realisateur ;} ?>">

<p>Maison d'Edition : </p>
<input type="text" name="maisonEdition" id="maisonEdition" value="<?php if(isset($maisonEdition)) {echo $maisonEdition ;} ?>">

<p>Annee de Debut : </p>
<select name="anneeDebut" id="anneeDebut" value="<?php if(isset($anneeDebut)) {echo $anneeDebut ;} ?>">>
<?php
$i = date('Y');
while ($i>1900)
{
	echo "<option value='$i'>$i</option>";
	$i--;
}
?>
</select>
<p>Annee de Fin : </p>
<select name="anneeFin" id="anneeFin" value="<?php if(isset($anneeFin)) {echo $anneeFin ;} ?>">>
<?php
$i = date('Y');
while ($i>1900)
{
	echo "<option value='$i'>$i</option>";
	$i--;
}
?>
</select>

<p>Description : </p>
<?php if(isset($erreurContenue) && $erreurContenue==false)   { ?>
 <div id="bulle"><font color="red">
La description a trop de caractere </font></div>
<?php } ?>
<script>
$(document).ready(function(e) {
 
  $('#Contenue1').keyup(function() {
 
    var nombreCaractere = $(this).val().length;
    var msg = '  ' + nombreCaractere + ' Caractere(s) / 1000';
    $('#compteur').text(msg);
    if (nombreCaractere > 1000) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }
 
  })
});
</script>
<form><textarea id="Contenue1" name="Contenue1" cols="120" rows="10" placeholder="1000 caracteres maximun" value="<?php if(isset($Contenue1)) {echo $Contenue1 ;} ?>" ></textarea>
<p id="compteur">0 Caractere / 1000</p></form>



<center><input type="submit" name="ajouter" value="Ajouter"></input>
&nbsp;
<a href="ajoutManga.php" ><button>Annuler</button></a> </center>
<br>
</fieldset>
</body>
</html>