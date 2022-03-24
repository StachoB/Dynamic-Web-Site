
<!-- ----- début innovation3 -->
<?php

require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCentreMenu.html';
      include $root . '/app/view/fragment/fragmentCentreJumbotron.html';
      ?>
      <div class="infos">
      <h3>Documentation innovation 3</h3>
      <p>Le but de cette innovation était de donner des informations supplémentaires sur les vaccins enregistrés aux patients avant qu'ils reçoivent une dose. 
          On a ainsi accès à deux données supplémentaires sur chaque vaccin qui sont le nombre de doses disponible tous centres confondus et également le pourcentage d'injections réalisées avec ce vaccin. 
          Cette dernière donnnée est affichée avec une barre de progression circulaire à l'aide d'une animation Javascript (venant du site codeopen.io) pour rendre la page plus attrayante. Les données sont affichées dynamiquement en fonction des modifications apportées.
      </p>
      </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin innovation3 -->
  
  
  

