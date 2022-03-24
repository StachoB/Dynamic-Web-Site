
<!-- ----- début viewAll -->
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
          <th scope = "col">Nom du vaccin</th>
          <th scope = "col">Nombre de doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $j=1;
          // La liste des quantitées est dans une variable $results et les noms des centres et vaccins dans des tableaux             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>", $centre_label[$j],
                   $vaccin_label[$j], $element->getQuantite());
           $j++;
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin viewAll -->
 
 
  
