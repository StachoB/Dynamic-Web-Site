<!-- ----- début viewPriseRDv -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';

    if($nbcentres==0){
        printf("<h3>Aucun centre ne dispose du vaccin %s pour l'instant, veullez réessayer à un autre moment</h3>",$vaccin_label);
    }
    else{
    ?>
    <form role="form" method='get' action='router1.php'>
        <div class="form-group">

            <input type="hidden" name='action' value="RemoveOne">

            <label for="id">Selectionnez un centre qui dispose du vaccin <?php echo $vaccin_label?> dont vous avez besoin : </label> <select class="form-control" id='id' name='id_centre' style="width: 300px">
                <?php
                $j=1;
                
                foreach ($centre_ids as $element) {
                    printf("<option name='id_centre' value='{$element->getCentreId()}'>%s</option>", $centre_labels[$j]);
                    $j++;
                }
               
                ?>
            </select>
            <?php 
             echo ("<input type='hidden' name='id_vaccin' value='$vaccin_id'>");
             echo ("<input type='hidden' name='id_patient' value='$id_patient'>");
            ?>

        </div>

        <button class="btn btn-basic" type="submit">Envoyer</button>
    </form>
    <?php } ?>
   
</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewPriseRDv -->