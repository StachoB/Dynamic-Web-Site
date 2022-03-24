<!-- debut ControllerRdv -->
<?php
require_once '../model/ModelRdv.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';

class ControllerRdv {
    
     // Affiche un formulaire pour sélectionner un id qui existe
    public static function patientReadId() {
     $results = ModelPatient::getAll();

     // ----- Construction chemin de la vue
     include 'config.php';
     $vue = $root . '/app/view/rdv/viewId.php';
     require ($vue);
    }
 
 
    //Récupérer la situation vaccinale d'un patient
    public static function situationVaccinale(){
        $id_patient = $_GET['patient'];
        $results = ModelRdv::injection($id_patient);
        //la variable résult définit si le patient est déja vacciné (2) nécessite une seconde vaccination (1) ou n'a jamais été vacciné (0)
        //en foncion de résult on accède à une vue différente
        if($results==2)
        {
            $vaccin=ModelRdv::getVaccinRecu($id_patient);
            //Vue
            include 'config.php';
            $vue = $root . '/app/view/rdv/viewVaccinated.php';
            require ($vue);
        }
        elseif($results==1){ 
            $vaccin_id=ModelRdv::getOneVaccinId($id_patient);
            $vaccin_label=ModelVaccin::getOnelabel($vaccin_id);
            $nbcentres=ModelStock::countNbCentre($vaccin_id);
            $centre_ids=ModelStock::getCentreIds($vaccin_id);
            $i=1;
            foreach ($centre_ids as $element)
            {
                $centre_labels[$i]=ModelCentre::getOnelabel($element->getCentreId());
                $i++;
            }
            
        //Vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewPriseRdv.php';
        require ($vue);
        }
        else{
            $centre_ids=ModelStock::getAllCentreIds();
            $i=1;
            foreach ($centre_ids as $element)
            {
                $centre_labels[$i]=ModelCentre::getOnelabel($element->getCentreId());
                $i++;
            }
            
        //Vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewFirstPriseRdv.php';
        require ($vue);
        }
    
        }
        
    //Affiche un compteur des personnes vaccinés    
    public static function personneVaccinee(){
        $results = ModelRdv::compterVaccine();

    // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewCompteur.php';
        require ($vue);
    }
    
    
}
?>
<!-- Fin ControllerRdv -->