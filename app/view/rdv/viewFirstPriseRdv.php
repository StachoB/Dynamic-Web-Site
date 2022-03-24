<!-- ----- début viewFirstPriseRdv -->
<?php
require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCentreMenu.html';
    include $root . '/app/view/fragment/fragmentCentreJumbotron.html';

    ?>

    <form role="form" method='get' action='router1.php'>
        <div class="form-group">

            <input type="hidden" name='action' value="RemoveOneFirstInj">

            <label for="id">Selectionnez un centre pour vous faire vacciner : </label> <select class="form-control" id='id' name='id_centre' style="width: 300px">
                <?php
                $j=1;
                
                foreach ($centre_ids as $element) {
                    printf("<option name='id_centre' value='{$element->getCentreId()}'>%s</option>", $centre_labels[$j]);
                    $j++;
                }
                ?>
            </select>
            <?php 
             echo ("<input type='hidden' name='id_patient' value='$id_patient'>");
            ?>

        </div>

        <button class="btn btn-basic" type="submit">Submit form</button>
    </form>
   

</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

<!-- ----- fin viewFirstPriseRdv -->