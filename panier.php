<?php session_start() ?>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />

</head>

 <body>
<?php
require 'pdo.php';
$bdd=connect();
?>
 <?php 
if(isset($_SESSION['panier'])){	
 echo "<h2>Votre Panier </h2>
         <table>
        <thead>
          <tr>
            <th class='text' >Produit</th>
			
            <th>Prix Unit.</th>
            <th>Quantité</th>
            <th>Montant</th>
             <th colspan='2'>Actions </th>
			</tr>
        </thead>
        <tbody>";

          
		   
		   $TotalHT =0 ;
	   
			   foreach($_SESSION['panier'] as $id=>$quantite )
			{
				$sql=$bdd->prepare("select id, titre, prix from tome where id=?"); 
				$sql->execute(array($id));
				$bonbon = $sql->fetch(PDO::FETCH_OBJ) ;
				
				echo " <tr>
				<th>".$bonbon->titre."</th>  <th>".$bonbon->prix."</th> <th> $quantite </th> <th> ".$bonbon->prix * $quantite." </th>  
				<th><a href='ajout_Panier2.php?id=".$bonbon->id."'/> <img src='image/ajouterPanier.jpg' /> </a> <a href='sup_Panier.php?id=".$bonbon->id."'/> <img src='image/retirerPanier.jpg' /> </a> </th></tr>" ; 
				$TotalHT=($bonbon->prix * $quantite) + $TotalHT ;
			}
			$TVA = 0.196* $TotalHT ;
			$TVA = number_format($TVA,2) ;
			$TotalTTC = $TVA + $TotalHT + 5 ;
			
			

			
			
		echo "</table>
		<table >
		<tr> <th> Total HT </th> <th>  $TotalHT € </th> </tr>
		<tr> <th> TVA(19.6%) </th> <th> $TVA € </th> </tr>
		<tr> <th> Frais de port </th> <th> 5€ </th> </tr>
		<tr> <th> Total TTC </th> <th> $TotalTTC € </th> </tr>
		</table> 
		<br> <br>
		 <a  href='index.php'> <button > Continuer mes achats</button></a> 
		<button >  Payer</a> </button>
		</tbody>
		</body>";
}
if(!isset($_SESSION['panier']))
{
	echo " <h2 class='toptext'> Votre panier est vide</h2> 
	<br> <br>
	<button id='b'>  <a  href='index.php'> reprendre mes achats</a> </button>"; 
}
		?>

		

		
</html>
		