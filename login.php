<?php include_once 'konfiguracija.php'; ?>

<?php 

	if(!isset($_POST["email"]) && !isset($_POST["lozinka"])) {
		header("location: index.php");
	}

	//autorizacija na bazu
	$izraz = $veza -> prepare("select * from operater where email=:email and lozinka=md5(:lozinka)");
	$izraz -> execute($_POST);
	$operater = $izraz -> fetch(PDO::FETCH_OBJ);

	if($operater!=null) {
		session_start();
		$_SESSION["autoriziran"]=$operater;

		header("location: index.php");
	}

	else {
		header("location: prijava.php");
	}

?>