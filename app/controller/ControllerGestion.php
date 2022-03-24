
<!-- ----- debut ControllerCave -->
<?php

class ControllerGestion {
 // --- page d'acceuil
 public static function centreAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCentreAccueil.php';
  if (DEBUG)
   echo ("ControllerGestion : centreAccueil : vue = $vue");
  require ($vue);
 }
 
 //Accès à la page documentation de l'innovation 1
public static function innovation1() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/innovation1.php';
  if (DEBUG)
   echo ("ControllerGestion : centreAccueil : vue = $vue");
  require ($vue);
 }
 
 //Accès à la page documentation de l'innovation 2
 public static function innovation2() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/innovation2.php';
  if (DEBUG)
   echo ("ControllerGestion : centreAccueil : vue = $vue");
  require ($vue);
 }
 
 //Accès à la page documentation de l'innovation 3
 public static function innovation3() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/innovation3.php';
  if (DEBUG)
   echo ("ControllerGestion : centreAccueil : vue = $vue");
  require ($vue);
 }
 
 //Accès à la page dodumentation du projet en général
 public static function vueGlobal() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/vueGlobal.php';
  if (DEBUG)
   echo ("ControllerGestion : centreAccueil : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerCave -->


