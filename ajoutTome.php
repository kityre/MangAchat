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
<head><form name="ajout" method="post" action="ajoutTome.php" ></head>

<?php
extract($_POST);
if(!empty($_POST))
{
	$erreurDescription=false;
	if(!empty($Contenue1))
	{

		if (strlen($Contenue1)>1000)
		{
			$erreurDescription=false;
			$erreurResume=false;
		}
		else
		{
			$resume1="";
			while($i<strlen($Contenue1))
				{
					$resume1=$resume1.$Contenue[$i];
					$i++;
				}
		}

	}
	$valid=false ;
	$erreurNumero=false;
	if	( (!empty($numero)) && (!empty($manga)) )
	{
		
		$bdd1=connect() ;
		$sql1="Select * from tome where id_Manga=$manga " ;
		$stt1=$bdd1->prepare($sql1) ;
		$stt1-> execute(array($manga));
		while ($unManga = $stt1->fetch(PDO::FETCH_OBJ))
		{
			if($unManga->numero==$numero)
			{
				$erreurNumero=true;
			}
		}
		if($erreurNumero!=true)
		{
			$valid = true;
			
		}
	}
	if(!empty($manga))
	{
		$bdd3=connect();
		$sql3="select * from manga where id=$manga ";
		$stt3=$bdd3->prepare($sql3);
		$stt3->execute(array($manga));
		$leManga = $stt3->fetch(PDO::FETCH_OBJ);
		$nom = $leManga->nom;
	}
	if(($valid == true) &&  ($erreurDescription == true) )
	{
		$bdd2=connect();
		$sql2="Insert into tome(numero,titre,resume1,resume2,prix,image,id_Manga) values($numero,'$titre','$resume1','$resume2',$prix,'./image/$nom/tome$numero.jpg',$manga)" ;
		$stt2=$bdd2->prepare($sql2) ;
		$stt2-> execute(array($numero,$titre,$resume1,$resume2,$prix,$manga));
		header("location: administrateur.php");
	}
}?>


<fieldset><legend>Tome a ajouter</legend>

<br>Manga : <br>
<select name="manga" id="manga"> 
<?php
$bdd=connect() ;
$sql="Select * from manga" ;
$stt=$bdd->prepare($sql) ;
$stt-> execute();
while($unManga = $stt->fetch(PDO::FETCH_OBJ))
{
	echo "<option value=".$unManga->id." >".$unManga->nom."</option>";
}
?>
</select>
<br><br>Numero : <br>
<input type="text" name="numero" id="numero" value="<?php if (!empty($numero)) {echo $numero;}?>">
<?php if(isset($erreurNumero) && $erreurNumero==true)   { ?>
 <div id="bulle"><font color="red">
Ce Numero existe deja </font></div>
<?php } ?>
<br><br>Titre : <br>
<input type="text" name="titre" id="titre" value="<?php if(isset($titre)) {echo $titre ;} ?>">
<br><br>Prix : <br>
<input type="text" name="prix" id="prix" value="<?php if(isset($prix)) {echo $prix ;} ?>">
<br><br>Resume : <br>
<?php if(isset($erreurResume) && $erreurResume==false)   { ?>
 <div id="bulle"><font color="red">
Le Resume a trop de caractere </font></div>
<?php } ?>
<script>
$(document).ready(function(e) {
 
  $('#Contenue1').keyup(function() {
 
    var nombreCaractere = $(this).val().length;
    var msg = '  ' + nombreCaractere + ' Caractere(s) / 610';
    $('#compteur').text(msg);
    if (nombreCaractere > 1000) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }
 
  })
});
</script>
<form><textarea id="Contenue1" name="Contenue1" cols="120" rows="10" placeholder="1000 caracteres maximun" value="<?php if(isset($Contenue1)) {echo $Contenue1 ;} ?>" ></textarea>
<p id="compteur">0 Caractere / 1000</p></form>



<center><input type="submit" name="ajouter" value="Ajouter"></input>
&nbsp;
<a href="ajoutTome.php" ><button>Annuler</button></a> </center>
<br>
</fieldset>
</body>
</html>