<?php

	include_once 'konfiguracija.php';

	if(!isset($_SESSION["autoriziran"])) {
		header("location: " . $putanjaApp . "index.php");
	}

	$izraz1 = $veza -> prepare("delete from komentar where dogadaj=:sifra");
	$izraz1 -> execute(array(":sifra" => $_GET['sifra']));

	$izraz2 = $veza -> prepare("delete from slika where dogadaj=:sifra");
	$izraz2 -> execute(array(":sifra" => $_GET['sifra']));

	$izraz = $veza -> prepare("delete from dogadaj where sifra=:sifra");
		
	if($izraz -> execute(array(":sifra" => $_GET['sifra']))){
		header("location: index.php#dogadaji");
	}

	else {
		header("location: nemogubrisati.php");
	}

?>