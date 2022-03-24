<!-- ----- debut ModelRdv -->

<?php
require_once 'Model.php';
require_once 'ModelVaccin.php';

class ModelRdv{
    private $centre_id,$patient_id,$injection,$vaccin_id;
    
        // pas possible d'avoir 2 constructeurs
     public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id=NULL) {
      // valeurs nulles si pas de passage de parametres
      if (!is_null($patient_id)) {
       $this->centre_id = $centre_id;
       $this->patient_id = $patient_id;
       $this->injection = $injection;
       $this->vaccin_id = $vaccin_id;
      }
     }

     function setPatientId($patient_id) {
      $this->patient_id = $patient_id;
     }
     
     function setCentreId($centre_id) {
      $this->centre_id = $centre_id;
     }
     
     function setInjection($injection) {
      $this->injection = $injection;
     }
     
     function setVaccinId($vaccin_id) {
      $this->vaccin_id = $vaccin_id;
     }
     
     function getPatientId() {
        return $this->patient_id;
       } 
       
     function getCentreId() {
        return $this->centre_id;
       }
       
     function getInjection() {
        return $this->injection;
       }
       
     function getVaccinId() {
        return $this->vaccin_id;
       }
    
    //retourne un indicateur sur le nombre d'injection qu'à déja reçu le patient, retourne 2 si le patient a eu toutes ses injections pour un vaccin, 1 si il en a eu une et e necessite une autre et 0 si il n'en a jamais eu
    public static function injection($pat){
        try {
            $database = Model::getInstance();
            $query = "select count(*) from rendezvous where patient_id='$pat'";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $results = $tuple['0'];
            if ($results==0){
                $res=0;
            }
            else{
                $query = "select count(*) from rendezvous where patient_id='$pat'";
                $statement = $database->query($query);
                $tuple = $statement->fetch();
                $nb_rdv = $tuple['0'];
                if($nb_rdv==1){
                    $query = "select vaccin_id from rendezvous where patient_id='$pat'";
                    $statement = $database->query($query);
                    $tuple = $statement->fetch();
                    $vaccin_id = $tuple['0'];
                    $dose=ModelVaccin::getNbDose($vaccin_id);
                    if($dose==1){
                        $res=2;
                    }
                    else{
                        $res=1;
                    }
                }
                else{
                    $res=2;
                }
                    
            }
            return $res;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    //permet de compteur le nombre de ligne dans la table rendezvous
    public static function nbRendezvous(){
        try {
            $database = Model::getInstance();
            $query = "select count(*) from rendezvous";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $result = $tuple['0'];
            return $result;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    
    //permet de compter le nombre de personnes déjà vaccinés
    public static function compterVaccine(){
        try {
            $database = Model::getInstance();
            
            $query = "SELECT count(*) from rendezvous where injection=2 and vaccin_id=1 or injection=2 and vaccin_id=2 or injection=2 and vaccin_id=3 or injection=1 and vaccin_id=4";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $compt = $tuple['0'];
            return $compt;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    //permet de compter le nombre de rendez-vous qu'à déja eu un patient avec son id
    public static function sumPatient($id){
        try {
            $database = Model::getInstance();
            
            $query = "SELECT count(*) from rendezvous where vaccin_id='$id'";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $result = $tuple['0'];
            return $result;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    //permet de savoir quel vaccin a eu un patien avec son id
    public static function getVaccinRecu($id_patient){
        try {
            $database = Model::getInstance();
            $query = "SELECT vaccin_id from rendezvous where patient_id='$id_patient'";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $vaccin_id = $tuple['0'];
            $vaccin_label=ModelVaccin::getOneLabel($vaccin_id);
            return $vaccin_label;
               
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    //permet de savoir l'id du vaccin qu'a eu un patien avec son id
    public static function getOneVaccinId($id_patient){
        try {
            $database = Model::getInstance();
            $query = "SELECT vaccin_id from rendezvous where patient_id='$id_patient'";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $vaccin_id = $tuple['0'];
            return $vaccin_id;
               
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    //permet d'ajoter une ligne dans la table rendezvous pour une seconde injection
    public static function InsertOneSecondInj($vaccin_id, $centre_id, $patient_id) {
    try {
   $database = Model::getInstance();

   // ajout d'un nouveau tuple;
   $query = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'patient_id' => $patient_id,
     'injection' => 2,
     'vaccin_id' => $vaccin_id
   ]);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
  }
 }
 
 //permet d'ajoter une ligne dans la table rendezvous pour une première injection
 public static function InsertOneFirstInj($vaccin_id, $centre_id, $patient_id) {
    try {
   $database = Model::getInstance();
   // ajout d'un nouveau tuple;
   $query = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'patient_id' => $patient_id,
     'injection' => 1,
     'vaccin_id' => $vaccin_id
   ]);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
  }
 }
 
}
?>
<!-- ----- fin ModelRdv -->