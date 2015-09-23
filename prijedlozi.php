<?php 

	include_once 'konfiguracija.php'; 
	include_once 'head.php'; 
	include_once 'navbar.php'; 

	if($_POST) {
		print_r($_POST);
		$izraz = $veza -> prepare("insert into prijedlozi(osoba, mail, tekst) values(:osoba, :mail, :tekst)");
		$izraz -> execute($_POST);
		header("location: index.php");
	}

?>

<div class="col-md-12">
 	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

 		<div class="form-group">
	 		<label for="osoba">Ime i prezime</label>
	 		<input type="text" id="osoba" name="osoba" class="form-control">
 		</div>

 		<div class="form-group">
	 		<label for="mail">Email</label>
	  		<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="email@example.com" required autofocus>
  		</div>

  		<div class="form-group">
	 		<label for="tekst">Prijedlog</label>
	  		<textarea name="tekst" cols="50" rows="7" maxlength="1000" class="form-control"></textarea>
  		</div>

  		<button type="submit" class="btn btn-primary">Predloži</button>

 	</form>
 </div>   