<?php include_once 'konfiguracija.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include_once 'head.php'; ?>

    <link rel="stylesheet" type="text/css" href="dist/css/opsirno.css">
  </head>
  <body>

    <?php include_once 'navbar.php'; ?>  

    <div class="row">

    	<?php

    		$izraz = $veza -> prepare("select * from dogadaj where sifra=:sifra");
    		$izraz -> execute(array(":sifra" => $_GET['sifra']));
    		$dogadaj = $izraz -> fetch(PDO::FETCH_OBJ);

            $izraz = $veza -> prepare("select * from komentar where dogadaj=:sifra");
            $izraz -> execute(array(":sifra" => $_GET['sifra']));
            $komentari = $izraz -> fetchAll(PDO::FETCH_OBJ);


    	?>

    	<div class="col-md-12">
    		<h2><?php echo $dogadaj->naziv ?></h2>
    	</div>

    	<div class="col-md-12">
    		<h5><?php echo $dogadaj->datum ?></h5>
    	</div>

    	<div class="col-md-12">
    		<p><?php echo $dogadaj->opis ?></p>
    	</div>

    </div>  

    <a href="galerija.php?sifra=<?php echo $dogadaj->sifra ?>" >POGLEDAJ GALERIJU</a>

    <div class="row">
        <h3>KOMENTARI:</h3>

        <?php foreach($komentari as $komentar):
            echo $komentar->operater; ?>

        <div class="panel panel-default">
            <div class="panel-body">

                <?php echo $komentar->tekst; ?>

            </div>
        </div>
    
    <?php endforeach; ?>

    </div>

    <div class="col-md-12">

        <form name="dodaj_komentar" method="POST" action="dodaj_komentar.php">

            <div class="form-group">
                <label for="tekst">Dodaj komentar</label>
                <input type="hidden" name="dogadaj" value="<?php echo $dogadaj->sifra ?>">
                <input type="text" name="operater" maxlength="255" class="form-control" placeholder="Upiši svoj nadimak">
                <textarea name="tekst" cols="50" rows="3" maxlength="1000" class="form-control" placeholder="Upiši svoj komentar"></textarea>
                <input type="submit" class="button btn btn-default" value="Komentiraj">
            </div>
        </form>

    <?php if($dogadaj->vrsta == 3): ?>

    <h3>Prijavi se na kviz</h3>
        <form name="dogadaj_prijava" method="POST" action="dogadaj_prijava.php">
            <input type="hidden" name="dogadaj" value="<?php echo $dogadaj->sifra ?>">
            <input name="ime" maxlength="255" class="form-control" placeholder="Upiši svoje ime">
            <input name="prezime" maxlength="255" class="form-control" placeholder="Upiši svoje prezime">
            <input type="submit" class="button btn btn-default" value="Prijavi se">
        </form>
    </div>

    <?php endif;?>
    
    <?php include_once 'podnozje.php'; include_once 'skripte.php'; ?>

  </body>
</html>