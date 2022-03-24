<!-- ----- début viewRemovedOneFirstInj -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';

    ?>

    <?php printf("<h3>Vous serez vacciné avec le vaccin %s. Les stocks et les rendez vous ont été mis à jour.</h3>", $vaccin_label)?>
   

</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

    <!-- ----- fin viewRemovedOneFirstInj -->