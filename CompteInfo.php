<?php
$bdds = new PDO('mysql:host=localhost;dbname=reservation;charset=utf8', 'root', '');
//$bdds = new PDO('mysql:host=localhost;dbname=sala_salav;charset=utf8', 'sala_salav', 'sala_salav');
session_start();
if(isset($_SESSION['loginstatus']))
   { 
if(isset($_GET['info'])){
 $id_utilisateur= $_SESSION['id_client'];
 $query = "SELECT *, '******' AS password FROM utilisateur where id_client=".$id_utilisateur;
 $query = $bdds->query($query);    
  $datases= $query->fetchAll(PDO::FETCH_ASSOC);
  $jsonse= json_encode($datases); 
  header('Content-Type: application/json');
  echo $jsonse;
}
if(isset($_GET['nom'])){
 $nom = $_REQUEST['nom'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET nom='$nom' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['prenom'])){
 $prenom = $_REQUEST['prenom'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET prenom='$prenom' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['dateNaissance'])){
 $dateNaissance = $_REQUEST['dateNaissance'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET date_de_naissance='$dateNaissance' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['adresse'])){
 $adresse = $_REQUEST['adresse'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET adresse='$adresse' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['ville'])){
 $ville = $_REQUEST['ville'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET ville='$ville' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['codePostal'])){
 $codePostal = $_REQUEST['codePostal'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET code_postal='$codePostal' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['telephone'])){
 $telephone = $_REQUEST['telephone'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET telephone='$telephone' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['adresseMail'])){
 $adresseMail = $_REQUEST['adresseMail'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET adresse_mail='$adresseMail' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['password'])){
 $password = $_REQUEST['password'];
 $id_utilisateur= $_SESSION['id_client'];
 $query = "UPDATE utilisateur SET password='$password' WHERE id_client=".$id_utilisateur;
 $query = $bdds->exec($query);
 header('Content-Type: application/json');
 echo $jsonse;
}
if(isset($_GET['mail'])){
 $mail = $_REQUEST['mail'];
 $nom = $_REQUEST['nom'];
 $id_utilisateur= $_SESSION['id_client'];
 
 header('Content-Type: application/json');
 echo $jsonse;
}
}
?>