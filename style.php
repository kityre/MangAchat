a
{
	position: relative;
	margin:13px;
}

<?php
include "utilisateurFactory.php";
$left=450;
if(!empty($_SESSION['Auth']) &&($_SESSION['Auth']['administrateur']==1))
{
	$a=7;
}
else
{
	$a=6;
}
for($i=1; $i<7; $i++)
{
	echo "#lien".$i."{left:".$left."px; top: 238px; position: absolute;}";
	$left=$left+120;
}	
?>
<?php
$left=550;
for($i=1; $i<3; $i++)
{
	if ($i==1)
	{
		echo "#cadre".$i."{left:".$left."px; top: 350px; position: absolute;}";
		$left=$left+300;
	}
	else
	{
	echo "#cadre".$i."{left:".$left."px; top: 325px; position: absolute;}";
	}
}
?>