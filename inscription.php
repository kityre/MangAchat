<?php include "utilisateurFactory.php" ?>
 <html>
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
</div>
</fieldset></fieldset>
<form name="inscription" method="post" action="inscription.php">
<?php 


$valid=true;
if(!empty($_POST))
{
	extract($_POST) ;
	$valid=true ;

	if(!empty($email) && utilisateurFactory::emailExiste($email))
	{
		$valid=false ;
		$erreuremailExiste=true ;
	}
	if(!empty($email) && !empty($email2) && $email!=$email2)
	{
		$valid=false ;
		$erreuremaildiff=true;
	}
	if(!empty($mdp) && !empty($mdp2) && $mdp!=$mdp2)
	{
		$valid=false ;
		$erreurpassdiff=true;
	}


	if($valid==true)
	{	
		$nom= mb_strtoupper($nom);
		$prenom=ucwords($prenom);
		$adresse=ucwords($adresse);
		$ville=ucwords($ville);
		
		utilisateurFactory::sauvegardeUtilisateur($email,$mdp,$nom, $prenom, $adresse , $cp , $ville , $jourNaissance , $moisNaissance, $anneeNaissance ) ; 
		$crea_valide=true ;
		
		
		if($crea_valide==true)
		{
			$bdd=connect() ;
			$sql=$bdd->prepare("Select id,email,nom,prenom,mdp administrateur from utilisateur where email='$email'");
			$sql->execute(array($email));
			$personne = $sql->fetch(PDO::FETCH_OBJ);	
			$_SESSION['Auth']=array(
				'id'=>$personne->id ,
				'email'=>$personne->email ,
				'nom'=>$personne->nom ,
				'prenom'=>$personne->prenom ,
				'mdp'=>$personne->mdp ,
				'administrateur'=>$personne->administrateur );
			header("location: index.php");
		}
	}
}
?>

<br>
<fieldset><legend><h2>Inscrivez vous</h2></legend>
<ul>
<span id='cadre1'>
<fieldset><legend><h4>Votre compte</h4></legend>
<p> Email :</p>
<input type="text" name="email" id="email" value="<?php if(isset($email)) {echo $email ;} ?>"/> 
<?php if(isset($erreuremailExiste) && $erreuremailExiste==true)   { ?>
 <div id="bulle"><font color="red">
 Cet Email existe deja </font></div>
<?php } ?>
<p>Confirmer Email :</p>
<input type="text" name="email2"  value="<?php if(isset($email2)) {echo $email2 ;} ?>">
<?php if(isset($erreuremaildiff) && $erreuremaildiff==true)   { ?>
 <div id="bulle"><font color="red">
 Email differents
</font></div>
 <?php } ?>
<p>Mot de passe :</p>
<input type="password" name="mdp" id="mdp" >
<p>Confirmer Mot de passe :</p>
<input type="password" name="mdp2">
<?php if(isset($erreurpassdiff) && $erreurpassdiff==true)   { ?>
 <div id="bulle" ><font color="red">
 mots de passe differents
</font></div>
 <?php } ?><br><br>
</fieldset>
</span>
<span id='cadre2'>
<fieldset><legend><h4>Information</h4></legend>
<p>Nom :</p>
<input type="text" name="nom" id="nom" value="<?php if(isset($nom)) {echo $nom ;} ?>" >
<p>Prenom :</p>
<input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) {echo $prenom ;} ?>" >
<p>Adresse :</p>
<input type="text" name="adresse" id="adresse" value="<?php if(isset($adresse)) {echo $adresse ;} ?>" >
<p>Ville :</p>
<input type="text" name="ville" id="ville" value="<?php if(isset($ville)) {echo $ville ;} ?>" >
<p>>Code Postal :</p>
<input type="text" name="cp" id="cp" value="<?php if(isset($cp)) {echo $cp ;} ?>" >
<p>Date de Naissance :</p>
<select name="jourNaissance" id="jourNaissance"> 
<option value="" >Jour</option>
<?php
$i=1;
while ($i<32)
{
	echo "<option value='$i'>$i</option>";
	$i++;
}
?>
</select>
<B>/</B>
<select name="moisNaissance" id="moisNaissance" >
	<option value="" > Mois </option>
	<option value="01">01 - Janvier</option>
	<option value="02">02 - Fevrier</option>
	<option value="03">03 - Mars</option>
	<option value="04">04 - Avril</option>
	<option value="05">05 - May</option>
	<option value="06">06 - Juin</option>
	<option value="07">07 - Juillet</option>
	<option value="08">08 - Aout</option>
	<option value="09">09 - Septembre</option>
	<option value="10">10 - Octobre</option>
	<option value="11">11 - Novembre</option>
	<option value="11">12 - Decembre</option>
</select>
<B>/</B>
<select name="anneeNaissance" id="anneeNaissance" >
<option value="" >Ann&eacute;e</option>
<?php
$i = date('Y');
while ($i>1900)
{
	echo "<option value='$i'>$i</option>";
	$i--;
}
?>
</select>
<br><br>
</fieldset>
</span></li>
<br>
<br>
<center><input type="submit" name="S'incrire" value="S'incrire"></input>
&nbsp;
<a href="inscription.php" ><button>Annuler</button></a> </center>
<br>


</fieldset>

</body>
</html>