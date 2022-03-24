<!-- ----- début viewRemovedOne -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';

    ?>

    <?php echo("<h1>Votre rendez-vous a été pris et les stock ont été mis à jour.</h1>") ?>
   

</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewRemovedOne -->