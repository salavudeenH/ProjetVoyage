<?php
session_start();
$bdds = new PDO('mysql:host=localhost;dbname=reservation;charset=utf8', 'root', '');
//$bdds = new PDO('mysql:host=localhost;dbname=sala_salav;charset=utf8', 'sala_salav', 'sala_salav');


//print_r($_REQUEST);

//die;



if(isset($_REQUEST['action'])){

	

	if($_REQUEST['action'] == 'register'){

		//print_r($_REQUEST);

		//die;

		$civilite = $_REQUEST['civilite'];

		$nom = $_REQUEST['nom'];

		$prenom = $_REQUEST['prenom'];

		$email2 = $_REQUEST['email'];

        $password = $_REQUEST['password'];

		$adresse = $_REQUEST['adresse'];

        $ville = $_REQUEST['ville'];

        $telephone = $_REQUEST['telephone'];

        $code_postal = $_REQUEST['code_postal'];

        $dateNaissance = $_REQUEST['dateNaissance'];
        
		$query = "insert into utilisateur (nom,prenom,adresse_mail,password,sexe,adresse,ville,code_postal,telephone,date_de_naissance) values ('".$nom."','".$prenom."','".$email2."','".$password."','".$civilite."','".$adresse."','".$ville."','".$code_postal."','".$telephone."','".$dateNaissance."')";

		$query = $bdds->exec($query);

		// Verifier la requete sur sql phpmyadmin si il fonctionne pas 

		echo 1;
       
		//$dataset= $query->fetch(PDO::FETCH_ASSOC);

		//echo $query;

		//die;
	}

	if($_REQUEST['action'] == 'logout')

	{

		// kill the session 

		session_destroy();

		echo 1; // 1 here meanse that session have been cleared

	}

	if($_REQUEST['action'] == 'login')

	{

		$email  = $_REQUEST['email'];

		$password  = $_REQUEST['password'];

		//$email  = "sala@gmail.com";

		//$password  = "123456";

		$q = "SELECT * FROM `utilisateur` where adresse_mail = '$email' and password = '$password'";

		//echo $q;

		//die;

		$query = $bdds->query($q);

		$dataset= $query->fetch(PDO::FETCH_ASSOC);

		//print_r($dataset);

		//print($dataset['id_client']);

		 

		

		if($dataset){  //si le résultat de la requête est 1 et quand le résultat est 1, cela signifie que notre e-mail / mot de passe tel qu'il a été envoyé à db est correct.

				//print("the count of the result --");

				//echo($dataset->id_client); 	

				$jsonse= json_encode($dataset);

				// this is for assiging the variable of choice to the session array

				// session array is $_SESSION

				$_SESSION['loginstatus'] = 1;

				$_SESSION['id_client'] = $dataset['id_client'];

				$_SESSION['nom'] = $dataset['nom'];

				echo "1";  // user login is success

		}

		else{   // we will come to this clause only if either the email or the password as entered by user is not as per in the database

			echo "0"; // echo "Username or the password is not correct. Kindly check or register";

		}

		

		

		//$jsonse= json_encode($datases);

		//header('Content-Type: application/json');

		//echo $jsonse;

	

		/*

		 (

            [id_client] => 1

            [nom] => jean

            [prenom] => monnet

            [sexe] => M

            [date_de_naissance] => 1997-03-12

            [adresse_mail] => sala@gmail.com

            [adresse] => place victor hugo 89500

            [telephone] => 06111111111

            [password] => 123456

        )

		*/

	

	}

}

?>