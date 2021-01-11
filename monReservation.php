<!DOCTYPE html>
<?php
// this is the assignation or initialiation of the session in the particular
//Lorsque session_start() est appelée ou lorsqu'une session démarre toute seule, PHP va appeler les gestionnaires d'ouverture et de lecture.
session_start();
//print_r($_SESSION);
?>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Air france</title>
	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> 
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="style1.css" />
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <!--<script  src="aeroport.js"> </script>-->
    
      <script src="login.js?rev=<?php echo time();?>"type="text/javascript"></script>
      <script src="show_resa.js?rev=<?php echo time();?>"type="text/javascript"></script>
 <!-- <script  src="login.js"> </script>-->

</head>

<body>
        <!--menu navigation-->
<nav class="navbar navbar-light" id="nav">
  <a class="navbar-brand" onclick="window.location.href='index.php'">Go Fly</a>
   <form class="form-inline my-4 my-lg-0">
   <?php
   if(isset($_SESSION['loginstatus']))
   { 
   ?>
   <div class="btn-group">
  <button class="btn btn-warning dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Bonjour <?php echo $_SESSION['nom'] ?> </button>
     <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="window.location.href='index.php'">Accueil</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='monReservation.php'">Mes Reservation</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='monCompte.php'">Compte</button>
    <button class="dropdown-item" id="logout" name="logout" type="button" style="color:red;">Se deconnecter </button>
  </div>
</div>
</nav>
<div class="d-flex justify-content-center">
<h2>Votre reservation</h2>
</div>
<div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Numero de reservation</th>
       <th scope="col">Date</th>
      <th scope="col">Depart</th>
      <th scope="col">Arrivee</th>
      <th scope="col">heure de depart</th>
      <th scope="col">heure d'arrivee</th>
      <th scope="col">Compagnies</th>
      <th scope="col">Numero de Vol</th>
      <th scope="col">bagages Enregistrer</th>
      <th scope="col">Payer</th>
    </tr>
  </thead>
  <tbody id="tableResa">
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>-->
  </tbody>
</table>


  <?php
   }
   else{
   header("Location: index.php");
   ?>
     
	<?php
   }
   ?>
 </body>
 </html>