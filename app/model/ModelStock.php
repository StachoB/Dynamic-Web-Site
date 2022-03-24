<!-- ----- debut ModelStock -->

<?php
require_once 'Model.php';

class ModelStock {
 private $centre_id, $vaccin_id, $quantite;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL){
  if (!is_null($vaccin_id)) {
   $this->vaccin_id= $vaccin_id;
   $this->centre_id = $centre_id;
   $this->quantite = $quantite;
  }
 }

 function setVaccinId($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }

 function setCentreId($centre_id) {
  $this->centre_id = $centre_id;
 }

 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }
 

 function getVaccinId() {
  return $this->vaccin_id;
 }

 function getCentreId() {
  return $this->centre_id;
 }

 function getQuantite() {
  return $this->quantite;
 }
 
 function getTot() {
  return $this->tot;
 }
 
 //liste de tous les stocks
  public static function getAll() {
  try {
   $database = Model::getInstance();
   $query="select * from stock";
   $statement = $database->prepare($query);
   $statement->execute();
   
   
   $results = $statement;
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //liste de la somme des doses pour un centre
 public static function nbDosesCentre(){
     try{
         $database= Model::getInstance();
         $query="SELECT sum(quantite) as tot,centre_id,label FROM stock, centre WHERE stock.centre_id=centre.id GROUP by label order by tot desc";
        
         $statement=$database->prepare($query);
         $statement->execute();
        $results = $statement;
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
         return $results;

   
     } catch (Exception $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL;
     }
 }
 
 //liste de la somme des doses pour un vaccin
   public static function sumVaccin($id) {
  try {
   $database = Model::getInstance();
   $query = "select sum(quantite) from stock where vaccin_id='$id'";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $result = $tuple['0'];
   return $result;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //nombre de centres qui possède un vaccin avec son id
 public static function countNbCentre($vaccin_id){
     try{
        $database= Model::getInstance();
        $query="SELECT count(*) FROM stock WHERE vaccin_id='$vaccin_id' and quantite>0";
        $statement = $database->query($query);
        $tuple = $statement->fetch();
        $nbcentre = $tuple['0'];
        return $nbcentre;

     } catch (Exception $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL;
     }
 }
 
 //liste des centres qui possède un vaccin avec son id
  public static function getCentreIds($vaccin_id){
     try{
        $database= Model::getInstance();
        $query="SELECT centre_id FROM stock WHERE vaccin_id='$vaccin_id' and quantite>0";
        $statement=$database->prepare($query);
        $statement->execute();
        $results = $statement;
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
        return $results;

   
     } catch (Exception $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL;
     }
 }
 
 //liste des centres qui possède des vaccins sans doublons
  public static function getAllCentreIds(){
     try{
        $database= Model::getInstance();
        $query="SELECT DISTINCT centre_id FROM stock WHERE quantite>0";
        $statement=$database->prepare($query);
        $statement->execute();
        $results = $statement;
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
        return $results;

   
     } catch (Exception $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL;
     }
 }
 
 //retire à un centre avec son id une dose d'un vaccin spécifique avec son id
   public static function UpdateOne($vaccin_id, $centre_id){
     try{
        $database= Model::getInstance();
        $query="SELECT quantite FROM stock WHERE vaccin_id='$vaccin_id' and centre_id='$centre_id' ";
        $statement = $database->query($query);
        $tuple = $statement->fetch();
        $quantite = $tuple['0'];
        $quantite= $quantite-1;
        $query="update stock set quantite= :quantite where vaccin_id= :vaccin_id and centre_id= :centre_id ";
        $statement = $database->prepare($query);
        $statement->execute([
        'vaccin_id' => $vaccin_id,
        'centre_id' => $centre_id,
        'quantite' => $quantite
        ]);

   
     } catch (Exception $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL;
     }
 }
 
 //liste des vaccins d'un centre par ordre de quantité decroissante
  public static function getVaccinIdInjection($centre_id){
     try{
        $database= Model::getInstance();
        $query="SELECT vaccin_id FROM stock WHERE centre_id='$centre_id' order by quantite desc";
        $statement = $database->query($query);
        $tuple = $statement->fetch();
        $results= $tuple['0'];
        return $results;

   
     } catch (Exception $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL;
     }
 }
 
 
}
?>
<!-- ----- fin ModelStock -->