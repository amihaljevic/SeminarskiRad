<?php include_once 'konfiguracija.php'; 

	if($_POST) {
		$izraz = $veza -> prepare("INSERT INTO `komentar`(`operater`, `tekst`, `dogadaj`) VALUES (?,?,?)");
		$izraz -> execute(array(
							$_POST['operater'],
							htmlspecialchars($_POST['tekst']),
							$_POST['dogadaj'])
						);
		header("location: opsirno.php?sifra=" . $_POST['dogadaj']);
	}

?>