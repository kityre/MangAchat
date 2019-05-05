<?php include "utilisateurFactory.php" ?><html>
<head>
<title> Mangachat.fr </title>
 <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<form name="inscription" method="post" action="connexion.php">
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
<br>
<?php

extract($_POST) ;
if(!empty($_POST))
{
	extract($_POST) ;
	$valid=false ;
	$emailExiste=false ;
	if(!empty($email))
	{
		if(utilisateurFactory::emailExiste($email))
		{
			$emailExiste=true ;
			
		}
		else
		{
			$emailExiste=false ;
		}
	}
	if(!empty($email) && !empty($mdp) && $emailExiste==true)
	{
		if (utilisateurFactory::mdpValide($email,$mdp) )
		{
			$valid=true;
		}
		else 
		{
			$Erreur="Erreur de mot de passe";
		}
	}
	if ($valid==true)
	{
		$bdd=connect() ;
		$sql=$bdd->prepare("Select id,email,nom,prenom,mdp, administrateur from utilisateur where email='$email'");
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
?>

<br><br>
<div align='center'><table>

Email :<br>
<input type="text" name="email" id="email"   value="<?php if(isset($email)) {echo $email ;} ?>">
<?php if(isset($emailExiste) && $emailExiste==false)   { ?>
 <div id="bulle"><font color="red">
Email incorrecte </font></div>
<?php } ?>
<br/><br/>
Mot de passe :<br>
<input type="password" name="mdp" id="mdp">
<?php if(isset($Erreur) && $Erreur=="Erreur de mot de passe")   { ?>
 <div id="bulle"><font color="red">
Mauvais mot de passe </font></div>
<?php } ?>
<br><br>

<center><input type="submit" name="connection" value="Se Connecter"></input>
&nbsp;
<a href="connexion.php" ><button>Annuler</button></a> </center>
<br>
</table></div>
<br>
<center><p>Pas encore inscrit? <br>
 Cliquer 
 <a href="inscription.php" ><FONT color="white" >ici </font></a></p></center>
 


</body>
</html>