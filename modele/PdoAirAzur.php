<?php
class PdoAir{

      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=air_azur';
      	private static $user='root' ;
      	private static $mdp= '';
		private static $monPdo;
		private static $monPdoAir=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */
	private function __construct(){
   	PdoAir::$monPdo = new PDO(PdoAir::$serveur.';'.PdoAir::$bdd, PdoAir::$user, PdoAir::$mdp);
		PdoAir::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoAir::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe

 * Appel : $instancePdoGsb = PdoAir::getPdoAir();

 * @return l'unique objet de la classe PdoAir
 */
	public  static function getPdoAir(){

		if(PdoAir::$monPdoAir==null){

			PdoAir::$monPdoAir= new PdoAir();
		}
		return PdoAir::$monPdoAir;
	}

        public static function getLesVols(){

            $catalogueVols = PdoAir::$monPdo->prepare("SELECT * FROM vols ORDER BY numero");

            $catalogueVols->execute() ;

            $lesVols = $catalogueVols->fetchAll();

            return $lesVols ;
}
public function reserverVol(){
    
    $numeroVol = $_REQUEST['numero'];
    
    return $numeroVol ;
}
public function creerReservation(){
    
    $reservation = array(); 
    
    // récupération du numéro
    
$numero = $_REQUEST["numero"];
$reservation["numero"] =  $numero;
$nom = $_REQUEST['nom'];
$reservation['nom'] = $nom;

$prenom = $_REQUEST['prenom'];
$reservation['prenom'] = $prenom;

$adresse = $_REQUEST['adresse'];
$reservation['adresse'] = $adresse;

$email = $_REQUEST['email'];
$reservation['email'] = $email;

$nbrVoyageur = $_REQUEST['nbrVoyageur'];
$reservation['nbrVoyageur'] = $nbrVoyageur;


return $reservation ;
}

// fonction qui initialise le panier
// le panier est un tableau indexé mis en session avec la clé "reservations"
function initPanier() {
    
    if(!isset($_SESSION['reservations']))
        
	$_SESSION['reservations']= array();
}

// fonction qui ajoute une réservation au panier
function ajouterAuPanier($reservation) {   
    
    
    $_SESSION['reservations'][]= $reservation;
    
}
public function validerReservations($reservation){
    
    $numeroReservation = $reservation['numero'];
    $nom = $reservation['nom'];
    $prenom = $reservation['prenom'];
    $adresse = $reservation['adresse'];
    $email = $reservation['email'];
    $nbrVoyageur = $reservation['nbrVoyageur'];
    
    if (empty($nom)||empty($prenom)||empty($adresse)||empty($email)|| !is_numeric($nbrVoyageur)||!filter_var($email,FILTER_VALIDATE_EMAIL)){
        
        return false ;
    }
   
    
    $req = PdoAir::$monPdo->prepare("INSERT INTO reservation VALUES(null,:numero,:nom,:prenom,:adresse,:email,:nbrVoyageur)");
    
    $req->execute(array (
            'numero'=>$numeroReservation,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adresse'=>$adresse,
            'email'=>$email,
            'nbrVoyageur'=>$nbrVoyageur));
   
            return true;  
}
function getLesReservations() {
    
  return $_SESSION['reservations'];
  
}

}
?>