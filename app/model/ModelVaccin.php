
<!-- ----- debut ModelVaccin -->

<?php
require_once 'Model.php';

class ModelVaccin {
 private $id, $label, $doses;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $doses = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->doses = $doses;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLabel($label) {
  $this->label = $label;
 }

 function setDose($doses) {
  $this->doses = $doses;
 }

 function getId() {
  return $this->id;
 }

 function getLabel() {
  return $this->label;
 }

 function getDoses() {
  return $this->doses;
 }

 
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from vaccin order by id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //retourne une liste des labels
  public static function getAllLabel() {
  try {
   $database = Model::getInstance();
   $query = "select label from vaccin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 //retourne toutes les lignes de la table vaccin
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 //retourne un vaccin avec son id 
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 //insert un vaccin dans la table vaccin
 public static function insert($label, $doses) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from vaccin";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into vaccin value (:id, :label, :doses)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'doses' => $doses
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 //permet de modifier l'attribut dose d'un vaccin
 public static function modif($id,$doses){
    try{
        $database = Model::getInstance();
     
     //Update d'un vaccin avec son id
   $query = "update vaccin set doses=:doses where id=:id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'doses' => $doses,
   ]);
   return $doses;
    } catch (Exception $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return -1;
    }
     
 }

 public static function update() {
  echo ("ModelVaccin : update() TODO ....");
  return null;
 }

 public static function delete() {
  echo ("ModelVaccin : delete() TODO ....");
  return null;
 }
 
  //Renvoi le label d'un vaccin avec son id
 public static function getOnelabel($id_vaccin){
  try {
   $database = Model::getInstance();
   $query = "select label from vaccin where id='$id_vaccin'";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $result = $tuple['0'];
   return $result;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //renvoi le nombre de dose pour un vaccin avec son id
 public static function getNbDose($id_vaccin){
  try {
   $database = Model::getInstance();
   $query = "select dose from vaccin where id='$id_vaccin'";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $result = $tuple['0'];
   return $result;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

}
?>
<!-- ----- fin ModelVaccin -->
