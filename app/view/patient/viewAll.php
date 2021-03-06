
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
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des patients est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr> <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getAdresse());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  