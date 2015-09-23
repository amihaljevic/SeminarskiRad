<?php include_once 'konfiguracija.php';

	$galerija = $veza->prepare("SELECT * FROM slika WHERE dogadaj=:sifra");
	$galerija->execute(array(":sifra" => $_GET['sifra']));
	$slike = $galerija->fetchAll(PDO::FETCH_OBJ);

	foreach($slike as $slika): ?>

	<img width="100" height="100" src="<?php echo $slika->putanja; ?>">

<?php endforeach; ?>