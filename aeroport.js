$(document).ready(function () {
    //alert("hiii");
    var a = 15;
    $.ajax({
        url: "Vol.php",
        method: "GET",
        data: "&aeroport=" + a
    }).done(function (data) {
        console.log(data);
        for (var a in data) {
            $("#encodings").append('<option selected="selected">' + data[a].nom + '</option>');
            $("#encodingse").append('<option selected="selected">' + data[a].nom + '</option>');
        }
    });

  
    $('#dateDepart').datepicker(
        {
            dateFormat: 'dd/mm/yy',
            minDate: 0,
            beforeShow: function () {
                $(this).datepicker('option', 'maxDate', $('#dateArrive').val());
            }
        });
    $('#dateArrive').datepicker(
        {
            dateFormat: 'dd/mm/yy',
            defaultDate: "+1w",
            beforeShow: function () {
                $(this).datepicker('option', 'minDate', $('#dateDepart').val());
                if ($('#dateDepart').val() === '') $(this).datepicker('option', 'minDate', 0);
            }
        });

    $("#dateNaissance").datepicker({
        dateFormat: 'yy/mm/dd',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: '1920:2010',

    });

    $("#search").click(function () {
       
        $("#departuremsg").html("");
        $("#departuremsg").hide();
        $("#arrivalmsg").html("");
        $("#arrivalmsg").hide();
        $("#total_price").html("");
        $("#total_price").hide();
        $("#recapVol").hide();
       
        var depart = $("#depart").val();
        var arrivee = $("#arrivee").val();
        var dateDepart = document.getElementById("dateDepart").value;
        var dateArrive = document.getElementById("dateArrive").value;

        //alert(depart+"----"+arrivee+dateDepart+dateArrive); //verification
       
            if (depart == '' || arrivee == '') {
                $('#error_message').html("Merci de vérifier les informations que vous avez saisies.");
            }

            else if (dateDepart == '' || dateArrive == '') {
                $('#error_message').html("Entrez une date");
            }
            else if (depart == arrivee) {
                $('#error_message').html("Les villes d'origine et de destination ne peuvent pas être identiques.");
            }


            else {
                var a = 15;
                $('#error_message').hide();
                // alert(arrivee);
                $.ajax({
                    url: "Vol.php",
                    method: "GET",
                    cache: false,
                    data: "&affichageVolAller=" + a + "&depart=" + depart + "&arrivee=" + arrivee + "&dateDepart=" + dateDepart
                }).done(function (data) {
                    // $(".tabing").remove();
                    $("#page").show();
                    console.log(data);
                    $("#shwmsgtable1").hide();
                    $("#affichageTable1").html("");
                    //alert(data[0]);
                    //a.modele,c.nom_compagnies 
                    if (data.length == 0) {
                        $("#table1").hide();
                        $("#shwmsgtable1").html("On trouve pas de vol disponible");
                        $("#shwmsgtable1").show();
                        $('.error_selection').css('display', 'none');
                    }
                    else {
                        for (var a in data) {
                            // alert(data[a]);
                            $("#affichageTable1").append('<tr id="idvol"><td class="tdval"><input type="radio" value="reserve1" name="reserve1" onClick="saveRow(\'reserver_' + data[a].Id_vol + '\')" id="reserver_' + data[a].Id_vol + '"/></td><td class="tdval">' + data[a].numero_vol + '</td><td  class="tdval">' + '<img style="height:40px;width:55px;padding-right:5px;"src="' + data[a].image + '"/>' + data[a].nom_compagnies + '</td><td  class="tdval">' + data[a].date_depart + '</td><td  class="tdval">' + data[a].Id_depart + '</td><td  class="tdval">' + data[a].heure_depart + '</td><td  class="tdval">' + data[a].Id_arrivee + '</td><td  class="tdval">' + data[a].heure_arrivee + '</td><td  class="tdval">' + data[a].duree_vol + ' H</td><td>' + data[a].prix + ' &#8364</td></tr>');


                        }
                    }
                });

                $.ajax({
                    url: "Vol.php",
                    method: "GET",
                    cache: false,
                    data: "&affichageVolRetour=15&depart=" + depart + "&arrivee=" + arrivee + "&dateArrive=" + dateArrive
                }).done(function (data) {
                    $("#page").show();
                    $("#shwmsgtable2").hide();
                    $("#titreRetour").show();
                    $("#affichageTable2").html("");
                    if (data.length == 0) {
                        $("#table2").hide();
                        $("#shwmsgtable2").html("On trouve pas de vol disponible");
                        $("#shwmsgtable2").show();
                        $('.error_selection').css('display', 'none');
                    }
                    else {
                        for (var a in data) {
                            $("#affichageTable2").append('<tr><td><input type="radio" value="Reserve2" name="reserve2" id="reserver_' + data[a].Id_vol + '" onClick="saveRow1(\'reserver1_' + data[a].Id_vol + '\')"/></td><td>' + data[a].numero_vol + '</td><td>' + '<img style="height:40px;width:55px;padding-right:5px;"src="' + data[a].image + '"/>' + data[a].nom_compagnies + '</td><td>' + data[a].date_depart + '</td><td>' + data[a].Id_depart + '</td><td>' + data[a].heure_depart + '</td><td>' + data[a].Id_arrivee + '</td><td>' + data[a].heure_arrivee + '</td><td>' + data[a].duree_vol + '</td><td>' + data[a].prix + ' &#8364</td></tr>');

                        }
                    }

                });

            }

    });

});

    //Selection Depart
function saveRow(id) {
    //La méthode split() permet de diviser une chaîne de caractères à partir d'un séparateur pour fournir un tableau de sous-chaînes.
    $("#departuremsg").hide();
    $("#departuremsg").html("");
    //split() recherche des underscores dans une chaîne et retourne tout les sous - chaînes qui correspondent.
    rowid = id.split("_");
    //alert(rowid[0]);
    //alert("loke0--"+rowid[1]);
    var msgdata = "";
    //alert(id);
    $.ajax({
        type: "GET",
        url: "Vol.php",
        method: "GET",
        data: "&selection_depart=" + rowid[1],
        success: function (data) {

            for (var a in data) {
                msgdata = '<div class="d-flex flex-row bd-highlight mb-3 border" style="height:70px;"><div class="p-2 flex-shrink-1 bd-highlight border" style="background-color:#FFA07A;width:130px;"><strong>Vol aller :</strong> <div class="d-flex flex-nowrap">' + data[a].date_depart + '</div></div> <div class="p-2 bd-highlight"><img style="height:50px;width:55px;padding-right:5px;"src="' + data[a].image + '"/></div> <div class="d-flex align-content-center flex-wrap" style="padding-right:40px">' + data[a].nom_compagnies + '</div> <div class="p-2 bd-highlight"><strong>' + data[a].Id_depart + '</strong><div class="d-flex align-content-center flex-wrap">' + data[a].heure_depart + '</div></div><div class="align-self-center"><img style="height:45px;width:110px;padding-right:5px;"src="fleche.png"></div> <div class="p-2 bd-highlight" ><strong>' + data[a].Id_arrivee + '</strong > <div class="d-flex align-content-center flex-wrap" >' + data[a].heure_arrivee + '</div></div> <div class="d-flex align-content-center flex-wrap" style="margin-left:5px">Prix: ' + data[a].prix +' &#8364</div></div></div>';
               
                $("#departureprice").val(data[a].prix); 
                AffichageBagageAller = '<h3>Vol Aller : </h3><div style="margin-left:50px;">Pour ce vol chez ' + '<span style = "font-weight:bold;">' + data[a].nom_compagnies + '</span> l&#039ajout de bagage co&ucirc;te environ ' + '<span style="font-weight:bold;">' + data[a].prix_bagage + ' &#8364 par bagage</span></div><div style="margin-left:50px;"> <div class="col-auto my-1"><label class="mr-sm-2" for="inlineFormCustomSelect">Combien de bagage voulez-vous enregistrer : </label><select style="width:200px;"class="custom-select mr-sm-2" id="nombreBagageAller"><option value="0">Aucun Bagage</option><option value="1">1</option><option value="2">2</option></select> </div> </div>';
                $("#bagagePrixAller").val(data[a].prix_bagage);}
            //alert(msgdata);
            $("#departuremsg").html(msgdata);
            $("#AffichageBagageAller").html(AffichageBagageAller);
            // alert(data);

        }

    });
}

    //selection arrivée
function saveRow1(id) {
    $("#arrivalmsg").hide();
    $("#arrivalmsg").html("");

    //La méthode split() permet de diviser une chaîne de caractères à partir d'un séparateur pour fournir un tableau de sous-chaînes.
    rowid1 = id.split("_");
    //alert(rowid[0]);
    //alert("loke0--"+rowid[1]);
    var msgdata = "";

    //alert(id);
    $.ajax({
        type: "GET",
        url: "Vol.php",
        method: "GET",
        data: "&selection_retour=" + rowid1[1],
        success: function (data) {

            for (var a in data) {
                msgdata = '<div class="d-flex flex-row bd-highlight mb-3 border" style="height:70px;"><div class="p-2 flex-shrink-1 bd-highlight border" style="background-color:#FFA07A;width:130px;"><strong>Vol Retour :</strong> <div class="d-flex flex-nowrap">' + data[a].date_depart + '</div></div> <div class="p-2 bd-highlight"><img style="height:50px;width:55px;padding-right:5px;"src="' + data[a].image + '"/></div> <div class="d-flex align-content-center flex-wrap" style="padding-right:40px">' + data[a].nom_compagnies + '</div> <div class="p-2 bd-highlight"><strong>' + data[a].Id_depart + '</strong><div class="d-flex align-content-center flex-wrap">' + data[a].heure_depart + '</div></div><div class="align-self-center"><img style="height:45px;width:110px;padding-right:5px;"src="fleche.png"></div> <div class="p-2 bd-highlight" ><strong>' + data[a].Id_arrivee + '</strong > <div class="d-flex align-content-center flex-wrap" >' + data[a].heure_arrivee + '</div></div> <div class="d-flex align-content-center flex-wrap" style="margin-left:5px">Prix: ' + data[a].prix + ' &#8364</div></div></div>';
                $("#arrivalprice").val(data[a].prix);
                AffichageBagageRetour = '<h3>Vol Retour : </h3><div style="margin-left:50px;">Pour ce vol chez ' + '<span style = "font-weight:bold;">' + data[a].nom_compagnies + '</span> l&#039ajout de bagage co&ucirc;te environ ' + '<span style="font-weight:bold;">' + data[a].prix_bagage + ' &#8364 par bagage</span></div><div style="margin-left:50px;"> <div class="col-auto my-1"><label class="mr-sm-2" for="inlineFormCustomSelect">Combien de bagage voulez-vous enregistrer : </label><select style="width:200px;"class="custom-select mr-sm-2" id="nombreBagageRetour"><option value="0">Aucun Bagage</option><option value="1">1</option><option value="2">2</option></select> </div> </div>';
                $("#bagagePrixRetour").val(data[a].prix_bagage);
            }

            //alert(msgdata);
            $("#arrivalmsg").html(msgdata);
            $("#AffichageBagageRetour").html(AffichageBagageRetour);

            // alert(data);
        }


    });
  
}

$(document).ready(function () {
    var a = 15;
    $("#boutonBagage").click(function () {
        $.ajax({
            type: "GET",
            url: "Vol.php",
            method: "GET",
            data: "&utilisateurs=" + a,
        }).done(function (data) {
            $("#infoUtilisateur").html("");
            for (var a in data) {
                $("#infoUtilisateur").append('<div> Nom: ' + data[a].nom + '</div><div> Prenom: ' + data[a].prenom + '</div><div> Adresse Mail: ' + data[a].adresse_mail + '</div><div> Telephone : ' + data[a].telephone + '</div>');
            }
            });
        var nombreBagageAller = $("#nombreBagageAller").val();
        var nombreBagageRetour = $("#nombreBagageRetour").val();
        var bagagePrixAller = $("#bagagePrixAller").val();
        var bagagePrixRetour = $("#bagagePrixRetour").val();
        var departureprice = $("#departureprice").val();
        var arrivalprice = $("#arrivalprice").val();
        //alert(departureprice + arrivalprice );
        var total = parseInt(arrivalprice) + parseInt(departureprice);
        //alert(nombreBagageAller + rowid[1]);
        var totalBagage = 0;
        //alert(bagagePrixAller);
        totalBagageAller = parseInt(nombreBagageAller) * parseInt(bagagePrixAller);
        totalBagageRetour = parseInt(nombreBagageRetour) * parseInt(bagagePrixRetour);
        //alert("aller" + totalBagageAller + "retour" + totalBagageRetour);
        allTotal = totalBagageAller + totalBagageRetour + total;
        //alert("Total =" + allTotal);
        
        $("#allTotal").html("<a>Total: </a><strong>" + allTotal + "</strong><a> &#8364</a>");
        $("#allTotal").show();
        $("#paiement").show();

});
    $("#confirmer").click(function () {
        var nombreBagageAller = $("#nombreBagageAller").val();
        var nombreBagageRetour = $("#nombreBagageRetour").val();
        if (!$('input[type="checkbox"]').is(':checked')) {
            $('.error_check').html("cocher la case");
            $('.error_check').show();
        }

        else {
            $("#annuler").hide();
            $("#confirmer").hide();
            $("#payer").show();
            $.ajax({
                type: "GET",
                url: "Vol.php",
                method: "GET",
                data: "&ajoutBagageAller=" + nombreBagageAller + "&Idvol=" + rowid[1],
            }).done(function (data) {

                });
            
        }

        $('input[type="checkbox"]').click(function () {
            $('.error_check').hide();

        });
       
    });
    $("#payer").click(function () {
        var nombreBagageAller = $("#nombreBagageAller").val();
        var nombreBagageRetour = $("#nombreBagageRetour").val();
        

        $.ajax({
            type: "GET",
            url: "Vol.php",
            method: "GET",
            data: "&paiementAller=" + a + "&Idvol=" + rowid[1],

        }).done(function (data) {

            });
        $.ajax({
            type: "GET",
            url: "Vol.php",
            method: "GET",
            data: "&paiementRetour=" + a + "&Idvol=" + rowid1[1],

        }).done(function (data) {

        });

    $.ajax({
        type: "GET",
        url: "Vol.php",
        method: "GET",
        data: "&ajoutBagageRetour=" + nombreBagageRetour + "&Idvol=" + rowid1[1],
        
    }).done(function (data) {
        $("#payer").hide();
        $("#confirmation").show();
        var delay = 6000; 
        //setTimeout(function () { window.location = 'reservation.php'; }, delay);
        setTimeout(function () { window.location.replace('monReservation.php'); }, delay);
          
            });

        $.ajax({
            type: "GET",
            url: "Vol.php",
            method: "GET",
            data: "&numeroReservationAller=" + a + "&Idvol=" + rowid[1],
        }).done(function (data) {
            for (var a in data) {
                $("#AffichageReservationAller").html('Votre numero de reservation de l aller est <span style="font-weight:bold">' + data[a].numero_reservation + '</span>');
            }
            });

        $.ajax({
            type: "GET",
            url: "Vol.php",
            method: "GET",
            data: "&numeroReservationRetour=" + a + "&Idvol=" + rowid1[1],
        }).done(function (data) {
            for (var a in data) {
                $("#AffichageReservationRetour").html('Votre numero de reservation de retour est <span style="font-weight:bold">' + data[a].numero_reservation +'</span>');
            }
        });
    });

         $("#annuler").click(function () {
            location.reload(true);
         });

});