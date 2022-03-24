
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerGestion.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRdv.php');


// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinReadOne" :
 case "vaccinReadId" :
 case "vaccinCreate" :
 case "vaccinCreated" :
 case "vaccinMiseAJour" :
 case "vaccinMisAJour":
 case "vaccinInfos":
 case "vaccinInfosOne":
  ControllerVaccin::$action(); break;

 case "centreReadAll" :
 case "centreReadOne" :
 case "centreReadId" :
 case "centreCreate" :
 case "centreCreated" :
  case "centreLien":
  ControllerCentre::$action();
  break;

 case "patientReadAll" :
 case "patientReadOne" :
 case "patientReadId" :
 case "patientCreate" :
 case "patientCreated" :
  ControllerPatient::$action();
  break;

 case "stockReadAll":
 case "nbDosesCentre":
 case "stockInsert";
 case "stockInserted";
 case "RemoveOne";
 case "RemoveOneFirstInj";
     ControllerStock::$action();
     break;
 
 case "patientReadId":
 case "situationVaccinale":
 case "personneVaccinee":
     ControllerRdv::$action();
     break;
 
 case "innovation1":
 case "innovation2":
 case "innovation3":
 case "vueGlobal":
     ControllerGestion::$action();
     break;

 // Tache par défaut
 default:
  $action = "centreAccueil";
  ControllerGestion::$action();
}

?>
<!-- ----- Fin Router1 -->

