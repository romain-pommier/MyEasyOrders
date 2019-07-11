/*
    ##############################################################################
    *-------------------------------------whyNote------------------------------
    ##############################################################################
    
*/

$(document).ready(function() {
    whyNoteProductData = new Object();
    //Formulaire envoi ajax WhyNote Produits
    $("#addProductWhyNote").submit(function() {
        event.preventDefault();

        $("#addProductWhyNote input").each(function() {
            whyNoteProductData[$(this).attr("name")] = $(this).val();
        });
        whyNoteProductData['product_option'] = "";
        //verifie le contenu de l'option choisie par l'utilisateur
        if (whyNoteProductData['productOptionWhyNote'] !== "" && whyNoteProductData['addProductOptionWhyNote'] == "") {
            whyNoteProductData['product_option'] = whyNoteProductData['productOptionWhyNote'];

        } else if (whyNoteProductData['addProductOptionWhyNote'] !== "" && whyNoteProductData['productOptionWhyNote'] == "") {
            whyNoteProductData['product_option'] = whyNoteProductData['addProductOptionWhyNote'];

        } else if (whyNoteProductData['productOptionWhyNote'] !== "" && whyNoteProductData['addProductOptionWhyNote'] !== "") {
            alert("Vous ne pouvez pas Ajouter une option et en sélectionner une");

        } else if (whyNoteProductData['productOptionWhyNote'] == "" && whyNoteProductData['addProductOptionWhyNote'] == "") {
            whyNoteProductData['product_option'] = "";
        }

        
            // Renseigne sur le type d'action voulue   (ajouter/modifier)
            //si l'utilisateur veux ajouter un produit on post les valeur contenu dans l'input
            if ($(this).find("input[name=statueSub]").val() == undefined) {
                $.post("index.php", { 'addProductWhyNote': whyNoteProductData },
                    function(data) {
                        alert(data);


                    });
                $('#modalAddWhyNoteProduct').modal('hide');
                $('#whyNoteProductPage').trigger('click');
            }
            //si l'utilisateur veux modifier on post les ancienne valeur du produit plus les nouvelles 
            else {
                whyNoteProductData['id_product'] = whyNoteProductOldData['id_product'];
                $.post("index.php", {
                        'updateWhyNoteProduct': whyNoteProductData
                    },
                    function(data) {
                        alert(data);
                    });
                $('#modalAddWhyNoteProduct').modal('hide');
                $('#whyNoteProductPage').trigger('click');
            };
            //après l'envoi on cache la modal et
            // on simule un click sur la barre de navigation pour rafraichir la page
        

        return false;
    });

    //Evenemnt click sur le bouton formulaire whynote (Option)
    $("#modalWhyNoteProduct").click(function() {
        dropDownForOptionProduct = $("#dataOptionWhyNote");
        $.post("index.php", { optionWhyNote: "ok" },
            function(Json) {
                //traitement
                data = JSON.parse(Json);
                appendDataListOption(data, dropDownForOptionProduct);
            });
    });
    //ajout les option dans la datalistWhyNote
    function appendDataListOption(data, target) {
        target.empty();
        for (i = 0; i < data.length; i++) {
            option = document.createElement("option");
            option.setAttribute("value", data[i][0]);
            target.append(option);
        }
    }

    //Ajoute le contenu de body table 
    function appendContentTable(dataArrayBody) {
        countElement = $('#headerTableForWhyNoteProduct').children().length;
        dataArrayBody.forEach(element => {
            if (element['product_visility'] == 0) {

            } else {
                $("<tr>", {
                    class: element[0] + " myPopover",
                    "data-toggle": "popover",
                    "data-placement": "bottom",
                    "data-trigger": "hover",
                    "data-html": "true",
                    "data-content": "<img src='" + element["product_picture_url"] + "' width='200' />"
                }).appendTo($('#tbodyWhyNote'));
                for (i = 0; i < countElement; i++) {
                    td = document.createElement("td");
                    td.setAttribute("scope", "row");
                    if (i == 0) {
                        td.append(element["product_name"]);
                        $("." + element[0]).append(td);
                    } else if (i == 1) {
                        td.append(element["product_color"]);
                        $("." + element[0]).append(td);
                    } else if (i == 2) {
                        td.append(element["product_option"]);
                        $("." + element[0]).append(td);
                    } else if (i == 3) {
                        td.append(element["product_date_added"]);
                        $("." + element[0]).append(td);
                    } else if (i == 4) {
                        $("<button>", { class: 'deleteBoutonForWhyNoteProduct', type: 'button', "id": element["id_product"] }).appendTo(td);

                        $("<button>", {
                            class: 'editBoutonForWhyNoteProduct',
                            type: 'button',
                            'data-id_product': element["id_product"],
                            'data-product_name': element['product_name'],
                            'data-product_color': element["product_color"],
                            'data-product_option': element["product_option"],
                            'data-product_picture_url': element["product_picture_url"]
                        }).appendTo(td);
                        $("." + element[0]).append(td);
                    } else {
                        i++
                    }
                }
            }
        });
        $("<i>", { class: 'fas fa-edit' }).appendTo($(".editBoutonForWhyNoteProduct"));
        $("<i>", { class: 'fas fa-trash-alt' }).appendTo($(".deleteBoutonForWhyNoteProduct"));

    };

    //requete des donner pour remplir le tableau
    function contentOfWhyNoteProductTable() {
        $.post("index.php", { contentTableWhyNote: "ok" },
            function(Json) {
                dataWhyNote = JSON.parse(Json);
                appendContentTable(dataWhyNote);
                // $('.myPopover').popover({

                //   });
                $('#tableForWhyNoteProduct').DataTable({
                        
                        "scrollY": 200,
                        "scrollX": true,
                        "language": {
                            "url": "frenchLanguage.json"
                        }
                    })
                    $("thead").sticky({topSpacing:0});
                    //envoi des données a suprimer sur index.php
                $(".deleteBoutonForWhyNoteProduct").click(function() {
                        productId = $(this).attr('id');


                        $.post("index.php", { 'deleteWhyNoteProduct': productId }, function(data) {
                            alert(data);
                            $('#whyNoteProductPage').trigger('click');
                        });
                    })
                    //envoi des données a modifier sur index.php
                $(".editBoutonForWhyNoteProduct").click(function() {
                    whyNoteProductOldData = new Object();
                    whyNoteProductOldData = $(this).data();
                    $("#addProductWhyNote input").each(function() {

                        if (whyNoteProductOldData[$(this).attr('name')] !== undefined) {
                            $(this).attr("value", whyNoteProductOldData[$(this).attr('name')]);
                        } else if ($(this).attr('name') == "productOptionWhyNote") {
                            $(this).attr('value', whyNoteProductOldData['product_option'])
                        }
                    })
                    $("#modalWhyNoteProduct").trigger('click');
                    $('#addProductWhyNote').append(" <input id='status' value='update' name='statueSub'></input>");

                })

            },

        );
    }
    contentOfWhyNoteProductTable();


})