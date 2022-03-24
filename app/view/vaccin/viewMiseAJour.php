<!-- ----- début viewMiseAJour -->
 
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
        <input type="hidden" name='action' value='vaccinMisAJour'> 
         <label for="id">Id : </label><select class="form-control" id='id' name='id' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
         </br>
        <label for="doses">Doses : </label><input type="number" name='doses' value='2'>
        
      </div>
      <p/>
      <button class="btn btn-basic" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewMiseAJour -->

