<?php
$bdds = new PDO('mysql:host=localhost;dbname=reservation;charset=utf8', 'root', '');
//$bdds = new PDO('mysql:host=localhost;dbname=sala_salav;charset=utf8', 'sala_salav', 'sala_salav');
session_start();
if(isset($_GET['aeroport'])){
    $query = $bdds->query("SELECT * FROM `aeroport`");
    $datases= $query->fetchAll(PDO::FETCH_ASSOC);
    $jsonse= json_encode($datases);
    header('Content-Type: application/json');
    echo $jsonse;
}

if(isset($_GET['affichageVolAller'])){
  $depart = $_REQUEST['depart'];
  $arrivee = $_REQUEST['arrivee'];
  $date_depart = $_REQUEST['dateDepart'];
  //$date_arrivee = $_REQUEST['dateArrive'];
  //print_r($_REQUEST);//date_depart   // date_arrivee
  
  $date_depart = str_replace('/', '-', $date_depart);
  $date_depart = date('Y-m-d', strtotime($date_depart));
  
   $query = "SELECT v.*,a.modele,c.nom_compagnies, c.image FROM `vol` v, avion a,compagnies c where v.Id_depart like '%$depart%'and v.Id_arrivee like '%$arrivee%' and v.date_depart like '%$date_depart%' and v.Id_avion=a.Id and a.Id_compagnies = c.Id";

   $query = $bdds->query($query);
   $datases= $query->fetchAll(PDO::FETCH_ASSOC);
   $jsonse= json_encode($datases); 
   header('Content-Type: application/json');
   echo $jsonse;
}

if(isset($_GET['affichageVolRetour'])){
  $depart = $_REQUEST['depart'];
  $arrivee = $_REQUEST['arrivee'];
  $date_arrivee = $_REQUEST['dateArrive'];
  //print_r($_REQUEST);

  $date_arrivee = str_replace('/', '-', $date_arrivee);
  $date_arrivee = date('Y-m-d', strtotime($date_arrivee));
  //$date_arrivee = strtotime($date_arrivee); 
  $query = "SELECT v.*,a.modele,c.nom_compagnies, c.image  FROM `vol` v, avion a,compagnies c where v.Id_depart like '%$arrivee%'and v.Id_arrivee like '%$depart%' and v.date_depart like '%$date_arrivee%' and v.Id_avion=a.Id and a.Id_compagnies = c.Id";
  //echo $query;
  //die;
  $query = $bdds->query($query);    
  $datases= $query->fetchAll(PDO::FETCH_ASSOC);
  $jsonse= json_encode($datases); 
  header('Content-Type: application/json');
  echo $jsonse;
}

if(isset($_GET['selection_depart'])){
	$id_vol = $_REQUEST['selection_depart'];
	$q = "SELECT v.*,a.modele,c.nom_compagnies,c.image FROM `vol`v, avion a,compagnies c where v.Id_avion=a.Id and a.Id_compagnies = c.Id and v.id_vol =".$id_vol;    
	//print($q);
	//die; 
    $query = $bdds->query($q);
    $datases= $query->fetchAll(PDO::FETCH_ASSOC);
    $jsonse= json_encode($datases); 
    header('Content-Type: application/json');
    echo $jsonse;
}

if(isset($_GET['selection_retour'])){
	$id_vol = $_REQUEST['selection_retour'];
	$q = "SELECT v.*,a.modele,c.nom_compagnies,c.image FROM `vol`v, avion a, compagnies c, aeroport b where v.Id_avion = a.Id and a.Id_compagnies = c.Id and v.id_vol =".$id_vol;
	//print($q);
	//die;
    $query = $bdds->query($q);
    $datases= $query->fetchAll(PDO::FETCH_ASSOC);
    $jsonse= json_encode($datases);
    header('Content-Type: application/json');
    echo $jsonse;
}

 if(isset($_SESSION['loginstatus']))
   { 
if(isset($_GET['ajoutBagageAller'])){
	$nombre_bagageAller = $_REQUEST['ajoutBagageAller'];
    $id_vol = $_REQUEST['Idvol'];
    $id_utilisateur= $_SESSION['id_client'];
    $query ="insert into bagage_soute (nombre_bagage,Id_vol,Id_utilisateur) VALUES ('".$nombre_bagageAller."','".$id_vol."','".$id_utilisateur."')";
	//print($q);
	//die;
    $query = $bdds->exec($query);
    $numero_reservation = uniqid("R");
    $query2 ="insert into reservation_vol (Id_utilisateur,Id_vol,Id_bagage_soute,numero_reservation) VALUES ('".$id_utilisateur."','".$id_vol."',LAST_INSERT_ID(),'".$numero_reservation."')";
    $query2 = $bdds->exec($query2);
  
   
    //header('Content-Type: application/json');
    //echo $jsonse;
}
if(isset($_GET['ajoutBagageRetour'])){
	$nombre_bagageRetour = $_REQUEST['ajoutBagageRetour'];
    $id_vol = $_REQUEST['Idvol'];
    $id_utilisateur= $_SESSION['id_client'];
    $query ="insert into bagage_soute (nombre_bagage,Id_vol,Id_utilisateur) VALUES ('".$nombre_bagageRetour."','".$id_vol."','".$id_utilisateur."')";
    $query = $bdds->exec($query);
    $numero_reservation = uniqid("R");
    $query2 ="insert into reservation_vol (Id_utilisateur,Id_vol,Id_bagage_soute,numero_reservation) VALUES ('".$id_utilisateur."','".$id_vol."',LAST_INSERT_ID(),'".$numero_reservation."')";
    $query2 = $bdds->exec($query2);
}
if(isset($_GET['utilisateurs'])){
    $id_utilisateur= $_SESSION['id_client'];
    $query = $bdds->query("SELECT * FROM utilisateur WHERE id_client =".$id_utilisateur );
    $datases= $query->fetchAll(PDO::FETCH_ASSOC);
    $jsonse= json_encode($datases);
    header('Content-Type: application/json');
    echo $jsonse;
}
if(isset($_GET['paiementAller'])){
    $id_vol = $_REQUEST['Idvol'];
    $id_utilisateur= $_SESSION['id_client'];
    $query ="insert into paiement (Id_vol,Id_utilisateur,paiement_effectuer) VALUES ('".$id_vol."','".$id_utilisateur."','OUI')";
     $query = $bdds->exec($query);
}
if(isset($_GET['paiementRetour'])){
    $id_vol = $_REQUEST['Idvol'];
    $id_utilisateur= $_SESSION['id_client'];
    $query ="insert into paiement (Id_vol,Id_utilisateur,paiement_effectuer) VALUES ('".$id_vol."','".$id_utilisateur."','OUI')";
     $query = $bdds->exec($query);
}
if(isset($_GET['numeroReservationAller'])){
    $id_vol = $_REQUEST['Idvol'];
    $id_utilisateur= $_SESSION['id_client'];
    $query = $bdds->query("SELECT numero_reservation FROM reservation_vol WHERE Id_vol =".$id_vol );
    $datases= $query->fetchAll(PDO::FETCH_ASSOC);
    $jsonse= json_encode($datases);
    header('Content-Type: application/json');
    echo $jsonse;
}
if(isset($_GET['numeroReservationRetour'])){
    $id_vol = $_REQUEST['Idvol'];
    $id_utilisateur= $_SESSION['id_client'];
    $query = $bdds->query("SELECT numero_reservation FROM reservation_vol WHERE Id_vol =".$id_vol );
    $datases= $query->fetchAll(PDO::FETCH_ASSOC);
    $jsonse= json_encode($datases);
    header('Content-Type: application/json');
    echo $jsonse;
}
}
?>