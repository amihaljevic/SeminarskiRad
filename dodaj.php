<?php 

	include_once 'konfiguracija.php';

	if(!isset($_SESSION["autoriziran"])) {
		header("location: " . $putanjaApp . "index.php");
	}

	if($_POST) {
		$imeSlike = $_FILES['slika']['name'];
		$lokacija = $_FILES['slika']['tmp_name'];
		$destinacija = "slike_dogadaja/" . $imeSlike;
		move_uploaded_file($lokacija, $destinacija);

		$izraz = $veza -> prepare("insert into dogadaj(vrsta, datum, naziv, opis, operater) values(?,?,?,?,?)");
		$izraz -> execute(array(
							$_POST['vrsta'],
							$_POST['datum'],
							htmlspecialchars($_POST['naziv']),
							$_POST['opis'],
							$_POST['operater'])
						);
		$sifra = $veza -> lastInsertId();
		$izraz = $veza -> prepare("INSERT INTO slika(`putanja`, `dogadaj`) values(?,?)");
		$izraz -> execute(array($destinacija,$sifra));

		header("location: opsirno.php?sifra=".$sifra);

	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>

    <?php include_once 'navbar.php'; ?>  

 	<div class="col-md-12">

 		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">

 			<div class="form-group">
 				<label for="vrsta">Vrsta događaja</label>
 				<select id="vrsta" name="vrsta" class="form-control">

 					<?php 

 						$izraz = $veza -> prepare("select * from vrsta");
 						$izraz -> execute();
 						$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);

 						foreach($rezultati as $r):

 					?>

 					<option <?php if($r->sifra==$r->naziv) {
 							echo "selected=\"selected\"";
 						} ?> value="<?php echo $r->sifra ?>"><?php echo $r->naziv ?>
 					</option>

 					<?php endforeach; ?>

 				</select>
 			</div>

 			<div class="form-group">
	 			<label for="datum">Datum</label>
	 			<input type="date" id="datum" name="datum" class="form-control">
 			</div>

 			<div class="form-group">
	 			<label for="naziv">Naziv događaja</label>
	 			<input type="text" id="naziv" name="naziv" class="form-control">
 			</div>

 			<div class="form-group">
	 			<label for="opis">Opis</label>
	  			<textarea name="opis" cols="50" rows="7" maxlength="1000" class="form-control"></textarea>
  			</div>

  			<div class="form-group">
 				<label for="operater">Operater</label>
 				<select id="operater" name="operater" class="form-control">

 					<?php 

 						$izraz = $veza -> prepare("select * from operater");
 						$izraz -> execute();
 						$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);

 						foreach($rezultati as $r):

 					?>

 					<option <?php if($r->sifra==$r->ime and $r->sifra==$r->prezime) {
 								echo "selected=\"selected\"";
 							} ?> value="<?php echo $r->sifra ?>"><?php echo $r->ime . " " . $r->prezime ?>
 					</option>

 					<?php endforeach; ?>

 				</select>
 			</div>

  			<div class="form-group">
				<label for="slika">Dodaj Sliku</label>
 				<input type="file" name="slika">
 			</div>

  			<input type="submit" class="button btn btn-primary" value="Dodaj">

 		</form>

 	</div>   