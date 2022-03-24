
<!-- ----- début viewMisAJour -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le vaccin a été modifié </h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET['id'] . "</li>");
     echo ("<li>doses = " . $_GET['doses'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de modification d'un vaccin</h3>");
     echo ("id = " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCentreFooter.html';
    ?>
    <!-- ----- fin viewMisAJour -->    

    
    
