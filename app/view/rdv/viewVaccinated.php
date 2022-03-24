<!-- ----- début viewVaccinated -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';

    ?>

    <?php echo ("<h3>Ce patient est déjà vacciné avec le vaccin $vaccin</h3>") ?>

</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewVaccinated -->