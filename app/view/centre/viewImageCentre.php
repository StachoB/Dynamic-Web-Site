<!-- ----- début viewAdresse -->
<?php

require ($root . '/app/view/fragment/fragmentCentreHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCentreMenu.html';
      include $root . '/app/view/fragment/fragmentCentreJumbotron.html';
      ?>
      <h1>Trouver un centre de vaccination parmis les plus importants</h1>
    
      <div class="infos">
            <h3>Centre de vaccination de l'UTT</h3>
            <figure>
                <!--UTT vaccination-->
                <div class="frame">
                <a href="https://www.google.com/maps/place/Universit%C3%A9+de+Technologie+de+Troyes/@48.2691655,4.0645874,17z/data=!3m1!4b1!4m5!3m4!1s0x47ee99a0cb4a3a57:0x42148ce859fa2d02!8m2!3d48.269162!4d4.0667761">
                    <img src='../../public/image/UTT.jpg' alt="UTT" align="center" height='300' width="300">
                </a>
                </div>
                <div class="frame">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10623.004865551848!2d4.0667761!3d48.269162!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x42148ce859fa2d02!2sUniversit%C3%A9%20de%20Technologie%20de%20Troyes!5e0!3m2!1sfr!2sfr!4v1624867842773!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>
            </figure>
        </div>
      <div class="infos">
            <h3>Centre de vaccination du stade de France</h3>
            <!--Stade de France-->
            <figure>
            <div class="frame">
            <a href="https://www.google.fr/maps/place/Centre+de+Vaccination+COVID+19-tr%C3%A8s+Grand+Centre+du+Stade+de+France/@48.9244035,2.3579513,17z/data=!3m1!4b1!4m5!3m4!1s0x47e66ebadcfe3e7f:0xe8bdfa96b9a3aa60!8m2!3d48.9244!4d2.36014">
                <img src="../../public/image/stade.jpg" alt="Stade de France" align="center" height='300' width="300">
            </a>
            </div>
            <div class="frame">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2621.5269936640375!2d2.3579513149024534!3d48.92440350401167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ebadcfe3e7f%3A0xe8bdfa96b9a3aa60!2sCentre%20de%20Vaccination%20COVID%2019-tr%C3%A8s%20Grand%20Centre%20du%20Stade%20de%20France!5e0!3m2!1sfr!2sfr!4v1624868119329!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            </figure>
            
      </div>
      <div class="infos">
            <h3>Centre de vaccination du Zénith de Dijon</h3>
            <figure>
            <div class="frame">
            <!--Zénith de Dijon-->
            <a href="https://www.google.fr/maps/place/Z%C3%A9nith+de+Dijon/@47.3557184,5.0559852,17z/data=!3m1!4b1!4m5!3m4!1s0x47ed621fa5844571:0xe27cc268ea41be8f!8m2!3d47.355706!4d5.0584021">
                <img src="../../public/image/dijon.jpg" alt="Zénith de Dijon" align="center" height='300' width="300">
            </a>
             </div>
            <div class="frame">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2702.881143773531!2d5.055985214832038!3d47.35571841326953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ed621fa5844571%3A0xe27cc268ea41be8f!2sZ%C3%A9nith%20de%20Dijon!5e0!3m2!1sfr!2sfr!4v1624868070242!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            </figure>
            
     </div>
      <div class="infos">
       
            <h3>Centre de Vaccination de Bar-sur-Aube</h3>
            <figure>
            <div class="frame">
            <!--Centre de Bar-sur-Aube-->
            <a href="https://www.google.fr/maps/place/Centre+de+Vaccination+de+Bar-sur-Aube,+Msp/@48.2354036,4.7000613,17z/data=!3m1!4b1!4m5!3m4!1s0x47ec439b78d365b7:0x87bfd37849a955f5!8m2!3d48.2354!4d4.70225">
                <img src="../../public/image/Bar.jpg" alt="Centre de vaccination de Bar-sur-Aube" align="center" height='300' width="300">
            </a>
            </div>
            <div class="frame">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2657.505099395904!2d4.700061314871305!3d48.23540355232264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ec439b78d365b7%3A0x87bfd37849a955f5!2sCentre%20de%20Vaccination%20de%20Bar-sur-Aube%2C%20Msp!5e0!3m2!1sfr!2sfr!4v1624868170611!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            </figure>
      </div>
  </div>
  <?php 
    include $root . '/app/view/fragment/fragmentCentreFooter.html'; 
  
    /*<li>
            <img src="images/logo_ut.png" alt="Logo UT"height="100"width="150" usemap="#UT" />
            <map name="UT">
                <area shape="rect" coords=0,0,50,100 href="https://www.utbm.fr/"target="_blank">
                <area shape="rect" coords=50,0,100,100 href="https://www.utc.fr/"target="_blank">
                <area shape="rect" coords=100,0,150,100 href="https://www.utt.fr/"target="_blank">
            </map>
        </li>*/
  ?>

  <!-- ----- fin viewAdresse -->
  
  
  

