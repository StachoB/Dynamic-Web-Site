
<!-- ----- début vueGlobal -->
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
      <h3>Point de vue global sur le projet</h3>
      </br>
          <h4>Proposition d'amélioration du site</h4>
          <p>
              Inclure les dates d'injections et des rendez-vous.
              Pouvoir modifier le rendez-vous qui a été pris.
              Pouvoir choisir son rendez-vous en fonction du centre de vaccination le plus proche de son domicile
              Choisir son rendez-vous en fonction de la première date disponible 
          </p>
          </br>
          <h4>Compétences développées</h4>
          <p>
              Ce projet nous a permis de renforcer les compétences développées tout au long du semestre avec l'UE LO07.
              Ce sont des compétences techniques.
              Mais nous avons aussi développé des compétences humaines.
              Il nous a fallu travailler en binôme et utiliser des notions de gestions de projet pour finir à temps.
              
          </p>
          </br>
          <h4>Travail en équipe à distance</h4>
          <p>
              Pour ce qui est du travail en équipe, nous nous sommes dans un premier temps répartis des fonctions que nous implémentions chacune de notre côté.
              Pour les dernières questions, qui étaient plus compliquées, nous avons travaillé ensemble grâce à un zoom.
              Cela nous a permis de réfléchir à deux sur le moyen de réussir à implémenter la fonction qui nous était demandé.
              Et surtout, nous avons pu avancé plus vite car nous compensions l'une et l'autre les erreurs que nous faisions. 
              Nous faisions donc moins d'erreurs, et réussisions à les trouver plus rapidement.
              
          </p>
          </br>
          <h4>Difficultés rencontrées</h4>
          <p>
              Nous avons rencontré un certain nombre de difficulté lors de la réalisation de ce projet.
              La principale a été l'utilisation des bases de données. Etant toute les deux étudiantes en TC04 nous n'avions jamais manipulé de base de données auparvant et il a été en particulier difficile pour nous de maitriser l'utilisation de celles comportant des clées étrangères.
              De plus le modèle MVC étant un concept nouveau pour nous, nous avons du nous montrer très attentives pour ne pas nous perdre entre les fichiers.
              
          </p>
      
      </div>
      </div>

  <?php include $root . '/app/view/fragment/fragmentCentreFooter.html'; ?>

  <!-- ----- fin vueGlobale -->
  
  
  

