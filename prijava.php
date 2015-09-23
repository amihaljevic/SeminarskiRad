<?php include_once 'konfiguracija.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
    
		<?php include_once 'head.php'; ?>

		<link href="dist/css/signin.css" rel="stylesheet">

	</head>
	<body>

		<div class="container">

      <?php if(!isset($_SESSION["autoriziran"])): ?>

      <form class="form-signin" action="login.php" method="POST">
        <h2 class="form-signin-heading">Prijava</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="email@example.com" required autofocus>
        <label for="inputPassword" class="sr-only">Lozinka</label>
        <input type="password" id="inputPassword" name="lozinka" class="form-control" placeholder="Lozinka" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="prijava">Prijava</button>
      </form>

      <?php else: ?>

          Prijavljeni ste kao <?php echo $_SESSION["autoriziran"]->ime; ?>

          <?php  echo $_SESSION["autoriziran"]->prezime; ?> 

          <a href="<?php echo $putanjaApp ?>odjava.php">Odjava</a>

      <?php endif; ?>

   	</div> <!-- /container -->
	</body>
</html>