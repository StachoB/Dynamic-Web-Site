<!-- ----- début viewCompteur -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';
    ?>
    <div class="counter my-auto">
        <img src="../../public/image/vaccination.png" alt="vaccination"/>
      <h2 class="timer count-title count-number" data-to="<?php echo ($results) ?>" data-speed="1500"></h2>
       <h1>Compteur De Personnes Vaccinées</h1>
    </div>
     
</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>
<!-- ----- fin viewCompteur -->


