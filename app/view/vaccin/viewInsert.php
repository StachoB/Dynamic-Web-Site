
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
        <input type="hidden" name='action' value='vaccinCreated'>        
        <label for="id">Label : </label><input type="text" name='label' size='75' value='New'>  
        <br>
        <label for="id">doses : </label><input type="number" name='doses' value='2'>            
      </div>
      <p/>
      <button class="btn btn-basic" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewInsert -->



