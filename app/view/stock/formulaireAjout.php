<!-- ----- début formulaireAjout -->
<?php

require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCentreMenu.html';
      include $root . '/app/view/fragment/fragmentCentreJumbotron.html';
      ?>

      <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <div class="form-group">
        <input type="hidden" name='action' value='stockInserted'>
        <label for="centre">Centre : </label> <select class="form-control" id='centre' name='centre' style="width: 200px">
            <?php
            foreach ($resultscentre as $name) {
             echo ("<option>$name</option>");
            }
            ?>
        </select>
        <br>
            <?php
            $idvaccin=1;
            foreach ($resultsvaccin as $name) {
             echo("<input type='hidden' name='name$idvaccin' value='$name'>");
             echo ("<label for='nbvaccin'> $name </label><input type='number' name='vaccin$idvaccin' size='2' value='0'> <br><br> ");
             $idvaccin=$idvaccin+1;
            }
            ?>
        
      </div>            
      </div>
      <p/>
      <button class="btn btn-basic" type="submit">Ajouter</button>
    </form>
 </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin formulaireAjout -->

