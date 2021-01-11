$(document).ready(function () {
$("#register").click(function () {
    var civilite = $("#civilite").val();
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var email2 = $("#email2").val();
    var password = $("#pwd2").val();
    var adresse = $("#adresse").val();
    var ville = $("#ville").val();
    var code_postal = $("#code_postal").val();
    var telephone = $("#telephone").val();
    var dateNaissance = $("#dateNaissance").val();

    if (nom == '' || prenom == '') {
        $('#resgistererror1').html("Saisissez votre nom");
        $('#resgistererror2').html("Saisissez votre prenom");
    }
    else if (dateNaissance == '' || adresse == '') {
        $('#resgistererror3').html("Saisissez votre Date de Naissance");
        $('#resgistererror4').html("Saisissez votre Adresse");
    }
    else if (code_postal == '' || ville == '') {
        $('#resgistererror6').html("Entrez votre code Postal");
        $('#resgistererror5').html("Saisissez votre Adresse");
    }
    else if (telephone == '' || email2 == '') {
        $('#resgistererror7').html("Entrez votre numéro de Téléphone");
        $('#resgistererror8').html("Saisissez votre Adresse Mail");
    }
    else if (password == '' || password.length < 6) {
        $('#resgistererror9').html("Le mot de passe doit contenir au moins 6 caractères");

    }
    else {

        //alert(nom+prenom+email2+password);
        $.ajax({
            url: "account.php",
            method: "GET",
            data: "&email=" + email2 + "&civilite=" + civilite + "&nom=" + nom + "&prenom=" + prenom + "&dateNaissance=" + dateNaissance + "&adresse=" + adresse + "&ville=" + ville + "&code_postal=" + code_postal + "&telephone=" + telephone + "&password=" + password + "&action=register"
        }).done(function (data) {


            if (data == 1) {
                event.preventDefault();
                alert("Vous etes bien enregistrer Aller sur mon compte connecter vous");
                // recharger la page
                location.reload(true);

                // u may have to check the condition

                // show alert message
                // refresh the page
                //location.reload(true);
                // alert("L'adresse mail et le mot de passe sont correct"); 
            }
        });
    }
});

$("#logout").click(function () {
    $.ajax({
        url: "account.php",
        method: "GET",
        data: "action=logout"
    }).done(function (data) {
        if (data == 1) {
            // show alert message
            // refresh the page
            location.reload(true);
            // alert("L'adresse mail et le mot de passe sont correct"); 
        }
    });


});
$("#loginSubmit").click(function () {
    //alert("entrer");	
    var email = $("#mail1").val();
    var password = $("#pwd1").val();
    //alert(email+password);

    if (email == '' || password == '') {
        $('#errorSubmit').html("Merci de verifier votre adresse mail ou votre mot de passe");
    }

    else {
        $.ajax({
            url: "account.php",
            method: "GET",
            data: "&email=" + email + "&password=" + password + "&action=login"
        }).done(function (data) {

            if (data == 1) {
                // show alert message
                // MESSAGE DIV BIENVENUE qui dois disparaitre apres 5 sesonds voir apres important
                $('#loginmsg').html("Bienvenue");
                //location.reload(true);
                window.location.href = 'index.php';

            }
           
            else  {
                // Message erreur mail et mdp incorrecte
                $('#errorSubmit').html("Verifier votre adresse mail ou mot de passe");
                alert("Adresse mail ou mot de passe est incorrect reessayer");
                    // $('#myModal').modal('show');
                    $("#myModal").modal('show');
                    // alert("fonctonne pas");
            }
           
            //alert(data);  
        });
    }

    });
});