
<!-- ----- début viewNbDosesCentre -->
<?php

require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCentreMenu.html';
      include $root . '/app/view/fragment/fragmentCentreJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nom du centre</th>
          <th scope = "col">Nombre de doses</th>
        </tr>
      </thead>
      <tbody>
          
          <?php
          // La liste des tatales de vaccins pour chaque centre est dans une variable $results et les noms des centres dans un tableau   
          $j=1;
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%d</td></tr>",$centre_label[$j], $element->getTot());
           $j++;
          }
          
      
          ?>
 
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewNbDosesCentre -->
