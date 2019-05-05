<?php
require "pdo.php";
$id=$_GET["id"];
$bdd=connect();
$sql="UPDATE utilisateur SET administrateur=1 WHERE id=$id";
$stt=$bdd->prepare($sql);
$stt->execute(array($id));
header("location: ajoutAdministrateur.php");
?>