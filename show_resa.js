$(document).ready(function () {
    var a =15;
    $.ajax({
        url: "show_resa.php",
        method: "GET",
        data: "&reservation=" + a,
    }).done(function (data) {
        
        for (var a in data) {
            $("#tableResa").append('<tr><th>' + data[a].numero_reservation + '</th><td>' + data[a].date_depart + '</th><td>' + data[a].Id_depart + '</td><td>' + data[a].Id_arrivee + '</td><td>' + data[a].heure_depart + '</td><td>' + data[a].heure_arrivee + '</td><td>' + data[a].nom_compagnies + '</td><td>' + data[a].numero_vol + '</td><td>' + data[a].nombre_bagage + '</td><td> OUI </td><tr>');
           // 
        }
    });


});