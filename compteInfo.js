$(document).ready(function () {
    var a = 15;
    $.ajax({
        url: "compteInfo.php",
        method: "GET",
        data: "&info=" + a,
    }).done(function (data) {

        for (var a in data) {
            $("#AffichageInfo").append('<tr><th scope="row"> Nom : </th><td>' + data[a].nom + '</td><td><button type="button" id="editNom" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalNom1">Modifier</button></td></tr>' + '<tr><th scope="row"> Prenom : </th><td>' + data[a].prenom + '</td><td><button type="button" id="editPrenom" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalPrenom">Modifier</button></td></tr>' + '<tr><th scope="row"> Date de Naissance : </th><td>' + data[a].date_de_naissance + '</td><td><button type="button" id="editDateNaissance" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalDateNaissance">Modifier</button></td></tr>' + '<tr><th scope="row"> Adresse : </th><td>' + data[a].adresse + '</td><td><button type="button" id="editAdresse" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalAdresse">Modifier</button></td></tr>' + '<tr><th scope="row"> Ville : </th><td>' + data[a].ville + '</td><td><button type="button" id="editVille" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalVille">Modifier</button></td></tr>' + '<tr><th scope="row"> Code Postal : </th><td>' + data[a].code_postal + '</td><td><button type="button" id="editCodePostal" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalCodePostal">Modifier</button></td></tr>' + '<tr><th scope="row"> Numero de Telephone : </th><td>' + data[a].telephone + '</td><td><button type="button" id="editTelephone" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalTelephone">Modifier</button></td></tr>' + '<tr><th scope="row"> Adresse Mail : </th><td>' + data[a].adresse_mail + '</td><td><button type="button" id="editMail" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalMail">Modifier</button></td></tr><th>Mot de passe : </th><td>' + data[a].password +'</td><td><button type="button" id="editPassword" class="btn btn-primary btn-sm" style="display:block;display:none" data-toggle="modal" data-target="#modalPassword">Modifier</button></td></tr>');
            }

        });
    $("#enregistrerNom").click(function () {
        var nom = $("#nom").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&nom=" + nom,
        }).done(function (data) {
           
            });
        window.location.href = 'monCompte.php'; 
    });
    $("#enregistrerPrenom").click(function () {
        var prenom = $("#prenom").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&prenom=" + prenom,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });
    $("#enregistrerDateNaissance").click(function () {
        var dateNaissance = $("#dateNaissance").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&dateNaissance=" + dateNaissance,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });

    $("#enregistrerAdresse").click(function () {
        var adresse = $("#adresse").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&adresse=" + adresse,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });
    $("#enregistrerVille").click(function () {
        var ville = $("#ville").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&ville=" + ville,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });
    $("#enregistrerTelephone").click(function () {
        var telephone = $("#telephone").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&telephone=" + telephone,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });

    $("#enregistrerCodePostal").click(function () {
        var codePostal = $("#codePostal").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&codePostal=" + codePostal,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });

    $("#enregistrerMail").click(function () {
        var adresseMail = $("#adresseMail").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&adresseMail=" + adresseMail,
        }).done(function (data) {

        });
        window.location.href = 'monCompte.php';
    });
    $("#enregistrerPassword").click(function () {
        var password = $("#password").val();
        $.ajax({
            url: "compteInfo.php",
            method: "GET",
            data: "&password=" + password,
        }).done(function (data) {

            });
        alert("mot de passe changer avec succes");
        window.location.href = 'monCompte.php';
    });

    $("#modifier").click(function () {
        $("#editNom").show();
        $("#editPrenom").show();
        $("#editDateNaissance").show();
        $("#editAdresse").show();
        $("#editVille").show();
        $("#editCodePostal").show();
        $("#editTelephone").show();
        $("#editMail").show();
        $("#editPassword").show();
    });
    $("#verif").click(function () {
        var mail3 = $("#mail3").val();
        var nom3 = $("#nom3").val();
        $.ajax({
            url: "mail.php",
            method: "GET",
            data: "&mail=" + mail3 + "&nom=" + nom3,
        }).done(function (data) {

        });
    });
});