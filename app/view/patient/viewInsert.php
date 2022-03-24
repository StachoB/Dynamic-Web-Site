
<!-- ----- début viewInsert -->
 
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
        <input type="hidden" name='action' value='patientCreated'>        
        <label for="id">Nom : </label><input type="text" name='nom' size='75' value='Kenobi'>  
        <br>
        <label for="id">Prénom : </label><input type="text" name='prenom' value='Obi-Wan'>    
        <br>
        <label for="id">Adresse : </label><input type="text" name='adresse' value='Stewjon'>         
      </div>
      <p/>
      <button class="btn btn-basic" type="submit"> Ajouter </button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewInsert -->



