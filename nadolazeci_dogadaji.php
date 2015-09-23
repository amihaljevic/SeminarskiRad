<?php

	include_once 'konfiguracija.php';
	include_once 'head.php';

?>

<head>
	<link href="dist/css/nadolazeci_dogadaji.css" rel="stylesheet" type="text/css">
</head>
<body>

	<a name="dogadaji"></a>

	<?php 

   		$izraz = $veza -> prepare("select * from dogadaj order by naziv asc");
   		$izraz -> execute();
   		$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);

	?>


	<div class="col-md-12">
    	<h2 class="featurette-heading">Nadolazeći događaji</h2>

  		<?php foreach($rezultati as $r): ?>

    	<div class="row">
    		<ul>
    			<li>
					<h3>

						<?php echo $r->naziv ?>

						<?php if(isset($_SESSION["autoriziran"])): ?>

						<a href="obrisi.php?sifra=<?php echo $r->sifra ?>"> Obriši</a>
						<a href="promjena.php?sifra=<?php echo $r->sifra ?>">Promjena</a>						

						<?php endif; ?>

						<a href="opsirno.php?sifra=<?php echo $r->sifra ?>" class="button btn btn-default">Opširnije</a>

					</h3>
				</li>
			</ul>		
		</div>

		<?php endforeach; ?>

		<?php if(isset($_SESSION["autoriziran"])): ?>

		<a href="dodaj.php" class="button btn btn-primary">Dodaj novi događaj</a>

		<?php endif; ?>

	</div>
</body>