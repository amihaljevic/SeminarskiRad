<?php

	include_once 'konfiguracija.php';

	if(!isset($_SESSION["autoriziran"])) {
		header("location: " . $putanjaApp . "index.php");
	}

	if(isset($_GET["sifra"])) {
		$izraz = $veza -> prepare("SELECT * from dogadaj where sifra=:sifra");	
		$izraz->bindParam(":sifra",$_GET["sifra"]);
		$izraz -> execute();
		$dogadaj = $izraz -> fetch(PDO::FETCH_OBJ);
	}

	if($_POST) {
		$izraz = $veza -> prepare("UPDATE dogadaj set vrsta=:vrsta, datum=:datum, naziv=:naziv, opis=:opis, operater=:operater where sifra=:sifra");	
		$_POST['naziv'] = htmlspecialchars($_POST['naziv']);
		$izraz -> execute($_POST);
		header("location: index.php");
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
 		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
			<input type="hidden" name="sifra" value="<?php echo $_GET['sifra'];?>">

 			<div class="form-group">
 				<label for="vrsta">Vrsta događaja</label>
 				<select id="vrsta" name="vrsta" class="form-control">

 					<?php 

 						$izraz = $veza -> prepare("select * from vrsta");
 						$izraz -> execute();
 						$vrste = $izraz -> fetchAll(PDO::FETCH_OBJ);

 						foreach($vrste as $vrsta):

 					?>

 					<option <?php if($vrsta->sifra==$dogadaj->vrsta) {
 								echo 'selected="selected"';
 							} ?> value="<?php echo $vrsta->sifra ?>"><?php echo $vrsta->naziv; ?>
 					</option>

 					<?php endforeach; ?>

 				</select>
 			</div>

	 		<div class="form-group">
		 		<label for="datum">Datum</label>
		 		<input type="date" id="datum" name="datum" class="form-control" value="<?php echo $dogadaj->datum ?>">
	 		</div>

	 		<div class="form-group">
		 		<label for="naziv">Naziv događaja</label>
		 		<input type="text" id="naziv" name="naziv" class="form-control" value="<?php echo $dogadaj->naziv ?>">
	 		</div>

	 		<div class="form-group">
		 		<label for="opis">Opis</label>
		  		<textarea name="opis" cols="50" rows="7" maxlength="1000" class="form-control" value="<?php echo $dogadaj->opis ?>"><?php echo $dogadaj->opis ?></textarea>
	  		</div>

  			<div class="form-group">
 				<label for="operater">Operater</label>
 				<select id="operater" name="operater" class="form-control">

 					<?php 

 						$izraz = $veza -> prepare("select * from operater");
 						$izraz -> execute();
 						$operateri = $izraz -> fetchAll(PDO::FETCH_OBJ);

 						foreach($operateri as $operater):

 					?>

 					<option <?php if($operater->sifra == $dogadaj->operater) {
 								echo "selected=\"selected\"";
 							} ?> value="<?php echo $operater->sifra ?>"><?php echo $operater->ime . " " . $operater->prezime ?>
 					</option>

 					<?php endforeach; ?>

 				</select>
 			</div>

  			<button type="submit" class="btn btn-primary">Promijeni</button>

 		</form>
 	</div>   