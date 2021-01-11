<?php
$bdds = new PDO('mysql:host=localhost;dbname=reservation;charset=utf8', 'root', '');
//$bdds = new PDO('mysql:host=localhost;dbname=sala_salav;charset=utf8', 'sala_salav', 'sala_salav');
session_start();
if(isset($_SESSION['loginstatus']))
   { 
if(isset($_GET['reservation'])){
 $id_utilisateur= $_SESSION['id_client'];
  //$query = "SELECT v.*, r.*,b.nombre_bagage from vol v, reservation_vol r, bagage_soute b where r.Id_utilisateur=b.Id_utilisateur and v.Id_vol=r.Id_vol and v.Id_vol=b.Id_vol and b.Id_utilisateur=".$id_utilisateur;
  //$query2 = "SELECT v.*, r.*,b.nombre_bagage,c.nom_compagnies,a.modele,p.paiement_effectuer from vol v, reservation_vol r, bagage_soute b, compagnies c,avion a,paiement p  where r.Id_utilisateur=b.Id_utilisateur and p.Id_utilisateur=b.Id_utilisateur and p.Id_utilisateur=r.Id_utilisateur and p.Id_vol=b.Id_vol and p.Id_vol=r.Id_vol and   v.Id_vol=r.Id_vol and v.Id_vol=b.Id_vol and v.Id_avion = a.Id and a.Id_compagnies = c.Id and b.Id_utilisateur=".$id_utilisateur;
 // $query = "SELECT v.*, r.*,b.nombre_bagage,p.paiement_effectuer,c.nom_compagnies,a.modele from vol v, reservation_vol r, bagage_soute b,paiement p, compagnies c,avion a where p.Id_utilisateur=r.Id_utilisateur and r.Id_utilisateur=b.Id_utilisateur and p.Id_utilisateur=b.Id_utilisateur and v.Id_vol=r.Id_vol and v.Id_vol=p.Id_vol and v.Id_vol=b.Id_vol and v.Id_avion = a.Id and a.Id_compagnies = c.Id and b.Id_utilisateur=".$id_utilisateur;
  $query="SELECT v.*,r.numero_reservation,b.nombre_bagage,c.nom_compagnies,a.modele from vol v,reservation_vol r,bagage_soute b, compagnies c,avion a where v.Id_vol=r.Id_vol and v.Id_avion = a.Id and a.Id_compagnies = c.Id and v.Id_vol=b.Id_vol and r.Id_vol=b.Id_vol and r.Id_bagage_soute=b.Id and r.Id_utilisateur&b.Id_utilisateur=".$id_utilisateur;
  $query = $bdds->query($query);    
  $datases= $query->fetchAll(PDO::FETCH_ASSOC);
  $jsonse= json_encode($datases); 
  header('Content-Type: application/json');
  echo $jsonse;
}
}
?>