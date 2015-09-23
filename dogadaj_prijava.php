<?php include_once 'konfiguracija.php'; 

	if($_POST) {
		$izraz = $veza -> prepare("INSERT INTO `prijava`(`ime`, `prezime`, `dogadaj`) VALUES (?,?,?)");
		$izraz -> execute(array(
							$_POST['ime'],
							htmlspecialchars($_POST['prezime']),
							$_POST['dogadaj'])
						);
		header("location: opsirno.php?sifra=" . $_POST['dogadaj']);
	}

?>