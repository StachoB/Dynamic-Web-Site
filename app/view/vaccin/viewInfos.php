
<!-- ----- début viewInfos -->
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

            <input type="hidden" name='action' value="vaccinInfosOne">

            <label for="id">Selectionnez un vaccin pour avoir plus d'informations sur celui-ci : </label> <select class="form-control" id='id' name='vaccin_id' style="width: 300px">
                <?php
                foreach ($results as $element) {
                    printf("<option name='vaccin_id' value='{$element->getId()}'>%s</option>", $element->getLabel());
                }
                ?>
            </select>
        </div>

        <button class="btn btn-basic" type="submit">Chercher</button>
    </form>


  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin viewInfos -->
