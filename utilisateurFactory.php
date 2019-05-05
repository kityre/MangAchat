<?php session_start() ?>
<?php
require 'pdo.php';

extract($_POST) ;
Class utilisateurFactory
{
	static function sauvegardeUtilisateur($email,$mdp,$nom, $prenom, $adresse , $cp , $ville , $jourNaissance , $moisNaissance, $anneeNaissance ) 
	{
		$bdd=connect() ;
		$sql1="insert into utilisateur(administrateur, email, mdp, nom, prenom, adresse, cp, ville, jour_naissance, mois_naissance, annee_naissance) values(0,'$email', '$mdp', '$nom', '$prenom', '$adresse' ,'$cp', '$ville'   , '$jourNaissance' , '$moisNaissance', '$anneeNaissance' )" ;
		$stt1=$bdd->prepare($sql1) ;
		$stt1-> execute( array($email,$mdp,$nom, $prenom, $adresse , $cp , $ville , $jourNaissance , $moisNaissance, $anneeNaissance ) );
	}

	static function emailExiste($email)
	{
		$bdd=connect() ;
		$sql2="select id from utilisateur where email=?" ;
		$stt2=$bdd->prepare($sql2) ;
		$stt2->execute( array($email) );
		$nb=0;
		$nb=$stt2->rowcount() ;
		if($nb!=0)
		{
			return true ;
		}
		else
		{
			return false ;
		}
		$stt2-> close() ;
		$bdd->close() ;
	}

	static function logUtilisateur($email, $mdp)
	{
		$bdd=connect() ;
		$sql3="select * from utilisateur where email='$email' " ;
		$stt3=$bdd->prepare($sql3) ;
		$stt3->execute( array($email, $mdp) );
		$nb=0;
		$nb=$stt3->rowcount() ;
		if($nb!=0)
		{
			$personne=$stt3->fetch(PDO::FETCH_OBJ);
			if($personne->mdp==sha1($mdp))
			{
				$_SESSION['Auth']=array(
				'id'=>$personne->id ,
				'email'=>$personne->email ,
				'nom'=>$personne->nom ,
				'prenom'=>$personne->prenom ,
				'mdp'=>$personne->mdp ,
				'administrateur'=>$personne->administrateur );
				return true ;
			}
			else
			{
				return $result="Erreur mot de passe" ;
			}
		
		}
		else 
		{
			return $result="Erreur d'email" ;
		}
		$stt3-> close() ;
		$bdd->close() ;
	}
	
		static function mdpValide($email,$mdp)
	{
		$bdd=connect() ;
		$sql5="select * from utilisateur where email='$email' " ;
		$stt5=$bdd->prepare($sql5) ;
		$stt5->execute( array($email,$mdp) );
		$personne=$stt5->fetch(PDO::FETCH_OBJ);
		if($personne->mdp==$mdp)
		{
			return true ;
		}
		else
		{
			return false ;
		}
		$stt5->close() ;
		$bdd->close() ;
	}
	
	static function estLog($email)
	{
		if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['email']) && isset($_SESSION['Auth']['mdp']))
		{
			$bdd=connect() ;
			$sql4='select email, mdp from utilisateur where email=?' ;
			$stt4=$bdd->prepare($sql4) ;
			$stt4->bindParam(':email', $_SESSION['Auth']['email'], PDO::PARAM_STR) ;
			$stt4->execute() ;
			$nb=$stt4->rowcount() ;
			if($nb!=0)
			{
				while($ligne=$stt4->fetch(PDO::FETCH_OBJ))
				{
					if($ligne->mdp==$_SESSION['Auth']['mdp'])
					{
						return true ;
					}
					else
					{
						return false ;
					}
				}
			}
			else
			{
				return false ;
			}
		}
		$stt4-> close() ;
		$bdd->close() ;
	}

}
?>

