<!-- debut ControllerStock -->
<?php
require_once '../model/Model.php';
require_once '../model/ModelStock.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelRdv.php';

class ControllerStock {
    
    //Liste des centres avec le nombre de doses de chaque vaccin
    public static function stockReadAll(){
    $results = ModelStock::getAll();
    $i=1;
    foreach($results as $element)
    {
      $id_centre=$element->getCentreId();
      $centre_label[$i]= ModelCentre::getOnelabel($id_centre);
      $id_vaccin=$element->getVaccinId();
      $vaccin_label[$i]= ModelVaccin::getOnelabel($id_vaccin);
      $i++;
     }
        //Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
        echo("On est dans le debug de stockReadAll");
        echo ("ControllerStock : stockReadAll : vue = $vue");
        require ($vue);
    }
    
    //Nombre de doses par centre
    public static function nbDosesCentre(){
     $results = ModelStock::nbDosesCentre();
     $i=1;
    foreach($results as $element)
    {
      $id_centre=$element->getCentreId();
      $centre_label[$i]= ModelCentre::getOnelabel($id_centre);
      $i++;
     }
     //Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewNbDosesCentre.php';
        if (DEBUG)
        echo ("ControllerStock : nbDosesCentre : vue = $vue");
        require ($vue);
    }
 
 // Affiche un formulaire pour ajouter des doses de vaccin à des centres
 public static function stockInsert() {
  $resultscentre = ModelCentre::getAllLabel();
  $resultsvaccin = ModelVaccin::getAllLabel();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/formulaireAjout.php';
  
  if (DEBUG)
        echo ("ControllerStock : stockInsert : vue = $vue");
        require ($vue);
 
}
 
 //Pemet d'ajouter des doses aux stocks
 public static function stockInserted() {
  
   $database = Model::getInstance();
   $query = "select max(id) from vaccin";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $nbvaccin = $tuple['0'];
   $centre=htmlspecialchars($_GET['centre']);
   $query = "select id from centre where label='$centre'";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $idcentre = $tuple['0'];
   for ($i = 1; $i <= $nbvaccin; $i++) {
    $nomvaccin=htmlspecialchars($_GET["name$i"]);
    $query = "select id from vaccin where label='$nomvaccin'";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $idvaccin = $tuple['0'];
    $query="select * from stock where vaccin_id='$idvaccin' and centre_id='$idcentre'";
    $stock=$database->query($query);
    if($stock != NULL)
    {
        $query="select quantite from stock where vaccin_id='$idvaccin' and centre_id='$idcentre'";
        $statement = $database->query($query);
        $tuple = $statement->fetch();
        $quantit = $tuple['0'];
        $quantit= $quantit + ($_GET["vaccin$i"]);
        $query="update stock set quantite= :quantite where vaccin_id= :vaccin_id and centre_id= :centre_id ";
        $statement = $database->prepare($query);
        $statement->execute([
        'vaccin_id' => $idvaccin,
        'centre_id' => $idcentre,
        'quantite' => $quantit
        ]);
    }
    else{

   // ajout d'un nouveau tuple;
   $res=1;
   $quantit=($_GET["vaccin$i"]);
   $query = "insert into stock value (:vaccin_id, :centre_id, :quantite)";
   $statement = $database->prepare($query);
   $statement->execute([
     'vaccin_id' => $idvaccin,
     'centre_id' => $idcentre,
     'quantite' => $quantit
   ]);
   
    }
    
    }
    include 'config.php';
    $vue = $root . '/app/view/stock/viewUpdated.php';
  
    if (DEBUG)
        echo ("ControllerStock : stockInsert : vue = $vue");
        require ($vue);
    } 

 //Pemet de mettre à jour la table rendezvous en ajoutant une seconde injection à un patient et retire une dose à un centre
 public static function RemoveOne(){
    $vaccin_id=$_GET['id_vaccin'];
    $centre_id=$_GET['id_centre'];
    $patient_id=$_GET['id_patient'];
    ModelRdv::InsertOneSecondInj($vaccin_id, $centre_id, $patient_id);
    ModelStock::UpdateOne($vaccin_id, $centre_id);
    
     //Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewRemovedOne.php';
        if (DEBUG)
        echo ("ControllerStock : RemoveOne : vue = $vue");
        require ($vue);
 }

 //Pemet de mettre à jour la table rendezvous en ajoutant une première injection à un patient et retire une dose à un centre
 public static function RemoveOneFirstInj(){
    $centre_id=$_GET['id_centre'];
    $patient_id=$_GET['id_patient'];
    $vaccin_id=ModelStock::getVaccinIdInjection($centre_id);
    ModelRdv::InsertOneFirstInj($vaccin_id, $centre_id, $patient_id);
    ModelStock::UpdateOne($vaccin_id, $centre_id);
    $vaccin_label=ModelVaccin::getOneLabel($vaccin_id);
     //Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewRemovedOneFirstInj.php';
        if (DEBUG)
        echo ("ControllerStock : RemoveOneFirstInj : vue = $vue");
        require ($vue);
 }



 
}
?>
<!-- fin ControllerStock -->