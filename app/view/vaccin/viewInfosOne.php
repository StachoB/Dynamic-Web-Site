<!-- ----- début viewInfosOne -->
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
      <h3>Informations sur le vaccins <?php echo ($vaccin_label) ?> </h1>
      
           
           <?php
           printf("<h4>Nombre de doses en stock :<h4><p>%d</p>", $nb_doses);?>
               <h4>Pourcentage des doses injectées qui ont été réalisées avec ce vaccin :</h4>
           <?php if($percent!='0')
           {?>
           <div id="donut" data-donut="<?php echo ($percent)?>">
           </div>
            
               
           <?php
           }else{printf("<h5>Aucune vaccination n'a été enregistrée avec ce vaccin<h5>");}
           
           ?>
            
           </div>
           
      

      
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="../../public/js/percentage.js"></script>

  </div>
  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin viewInfosOne -->