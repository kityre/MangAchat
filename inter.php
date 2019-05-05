<?php session_start() ?>
<?php

$_SESSION['id']= $_GET['id'];
header('Location: manga.php');
?>