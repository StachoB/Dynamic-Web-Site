
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';
require_once '../model/ModelStock.php';
require_once '../model/ModelRdv.php';

class ControllerVaccin {

 // --- Liste des vaccin
 public static function vaccinReadAll() {
  $results = ModelVaccin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function vaccinReadId() {
  $results = ModelVaccin::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewId.php';
  require ($vue);
 }

 // Affiche un vaccin particulier (id)
 public static function vaccinReadOne() {
  $vaccin_id = $_GET['id'];
  $results = ModelVaccin::getOne($vaccin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vaccin
 public static function vaccinCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vaccin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function vaccinCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelVaccin::insert(
      htmlspecialchars($_GET['label']), ($_GET['doses'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInserted.php';
  require ($vue);
 }
 
 public static function vaccinMiseAJour(){
     $results = ModelVaccin::getAllId();
     
     // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/vaccin/viewMiseAJour.php';
    require ($vue);
 }
 //Affiche un formulaire pour changer juste le nombre de doses d'un vaccin déjà dans la base de données
 public static function vaccinMisAJour(){
     $results = ModelVaccin::modif(htmlspecialchars($_GET['id']), ($_GET['doses']));
     
 //Construction chemin de la vue
 include 'config.php';
 $vue = $root . '/app/view/vaccin/viewMisAJour.php';
 require ($vue);
 }
 
  // --- Formulaire de selectionner de vaccin pour avoir plus d'information sur celui-ci
 public static function vaccinInfos() {
  $results = ModelVaccin::getAll();
  
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInfos.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
  require ($vue);
 }
 
 //Informations sur un vaccin : nombre de doses au total tous centres confondus et pourcentages de doses injectés avec le vaccin
  public static function vaccinInfosOne() {
  $vaccin_id=$_GET['vaccin_id'];
  $vaccin_label=ModelVaccin::getOneLabel($vaccin_id);
  $nb_injections=ModelRdv::nbRendezvous();
  $nb_doses= ModelStock::sumVaccin($vaccin_id);
  $nb_dosesinjectees=ModelRdv::sumPatient($vaccin_id);
  $percent=($nb_dosesinjectees/$nb_injections)*100;
  
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInfosOne.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


