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
       <script src="compteInfo.js?rev=<?php echo time();?>"type="text/javascript"></script>
     
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
    <button class="dropdown-item" type="button" onclick="window.location.href='monReservation.php'">Mes reservation</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='monCompte.php'">Compte</button>
    <button class="dropdown-item" id="logout" name="logout" type="button" style="color:red;">Se deconnecter </button>
  </div>
</div>
</nav>
<div class="d-flex justify-content-center">
<h2>Mon compte</h2>
</div>
<table class="table table-hover">
<tbody id="AffichageInfo">
   <!-- <tr>
      <th scope="row">Nom</th>
      <td>HADJI</td>
    </tr>
    <tr>
    <th scope="row">Prenom</th>
    <td>HADJI</td>
    </tr>-->
    </tbody>
    </table>
    
   <div class="d-flex flex-row-reverse bd-highlight">
  <div class="p-2 bd-highlight"><button type="button" id="modifier" class="btn btn-primary btn-lg" style="display:block;" >Modifier</button></div>
  <div class="p-2 bd-highlight"><p><span style="font-weight:bold;">Si vous voulez modifier les infos personnelles cliquer sur le bouton :</p></span></div>
    </div>
   <!-- <form>
     <input type="email"  id="mail3" class="form-control" placeholder="Entrer votre MAIL" required />
      <input type="text"  id="nom3" class="form-control" placeholder="Entrer votre nom" required />
       <button type="submit" id="VERIF" class="btn btn-primary">Enregistrer</button>
      </form>-->
<!--    modal pour modification des infos-->   

 <div class="modal fade" id="modalNom1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de Nom</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form role="form" class="form-horizontal">
     <div class="form-group">
        <label for="text">Nom :</label>
      <input type="text"  id="nom" class="form-control" placeholder="Entrer votre nom" required />
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="enregistrerNom" class="btn btn-primary">Enregistrer</button>
         </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="modalPrenom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de Prenom</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleFormControlInput1">Prenom:</label>
    <input type="text" class="form-control" id="prenom" placeholder="Prenom" required/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerPrenom" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalDateNaissance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de Date de Naissance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleFormControlInput1">Date de Naissance:</label>
    <input type="text" class="form-control" id="dateNaissance" placeholder="Date de Naissance">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerDateNaissance" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalAdresse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de Adresse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleFormControlInput1">Adresse:</label>
    <input type="text" class="form-control" id="adresse" placeholder="Adresse">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerAdresse" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalVille" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de la ville</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleFormControlInput1">Ville:</label>
    <input type="text" class="form-control" id="ville" placeholder="Votre Ville">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerVille" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalCodePostal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification du code Postal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleFormControlInput1">Code Postal:</label>
   <input type="text" id="codePostal" class="form-control" placeholder="Entrer votre code Postal" pattern="[0-9]{5}" required />    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerCodePostal" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTelephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification du Numero de telephone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleFormControlInput1">Numero de Telephone:</label>
    <input type="text" class="form-control" id="telephone" placeholder="Numero de telephone">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerTelephone" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de l'adresse Mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Adresse Mail</label>
    <input type="email" class="form-control" id="adresseMail" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="enregistrerMail" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification du Mot de Passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="enregistrerPassword" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

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