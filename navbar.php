<?php include_once 'konfiguracija.php' ?>

<!-- NAVBAR ================================================== -->
<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
                  
      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav">
          <li><a href="index.php">POČETNA</a></li>
          <li><a href="index.php#about">O NAMA</a></li>
          <li><a href="index.php#dogadaji">VIJESTI</a></li>
          <li><a href="index.php#contact">PRONAĐI NAS</a></li>
          <li><a href="era.php">ERA</a></li>

          <?php if(!isset($_SESSION["autoriziran"])): ?>

          <li><a href="prijava.php">PRIJAVA</a></li>

          <?php else: ?>

          <li><a href="<?php echo $putanjaApp ?>odjava.php">ODJAVA</a></li>
              
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
</div>