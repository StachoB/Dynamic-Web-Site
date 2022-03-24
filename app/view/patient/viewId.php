<!-- ----- début viewId -->
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

            <input type="hidden" name='action' value="patientReadOne">

            <label for="id">Selectionnez un patient : </label> <select class="form-control" id='id' name='patient' style="width: 300px">
                <?php
                foreach ($results as $element) {
                    printf("<option name='id' value='{$element->getId()}'>%d : %s : %s</option>", $element->getId(), $element->getNom(), $element->getPrenom());
                }
                ?>
            </select>

        </div>

        <button class="btn btn-basic" type="submit">Envoyer</button>
    </form>

</div>

<?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>
<!-- ----- fin viewId -->

