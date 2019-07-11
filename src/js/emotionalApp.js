/*
    ##############################################################################
    *-------------------------------------EMOTIONAL------------------------------
    ##############################################################################
*/


$(document).ready(function() {
    emotionalProductData = new Object();
    $("#addEmotionalProduct").submit(function() {
        event.preventDefault();

        $("#addEmotionalProduct input").each(function() {
            emotionalProductData[$(this).attr("name")] = $(this).val();
        });

        if (emotionalProductData['uniqueSizeEmotional'] !== "") {
            emotionalProductData['product_size'] = emotionalProductData['uniqueSizeEmotional'];
        } else {
            if (emotionalProductData['rangeMinSizeEmotional'] !== "") {
                emotionalProductData['product_size'] = emotionalProductData['rangeMinSizeEmotional'] + " au " + emotionalProductData['rangeMaxSizeEmotional'];
            } else if (emotionalProductData['minSizeEmotional'] !== "") {
                emotionalProductData['product_size'] = "de " + emotionalProductData['minSizeEmotional'] + " à " + emotionalProductData['maxSizeEmotional'];
            }

        }
        if (emotionalProductData['product_size'] == undefined) {
            emotionalProductData['product_size'] = "";
        }


        //condition gravure
        if (emotionalProductData['product_engraving'] == "0") {
            emotionalProductData['product_number_line_engraving'] = 0;
            emotionalProductData['product_number_characters'] = 0;
        }

        if ($(this).find("input[name=statueSub]").val() == undefined) {

            $.post("index.php", { 'addProductEmotional': emotionalProductData }, function(data) {
                alert(data);

            });
            $('#modalAddEmotionalProduct').modal('hide');
            $('#emotionalProductPage').trigger('click');
        } else {
            emotionalProductData['id_product'] = emotionalProductOldData['id_product'];

            $.post("index.php", {
                'updateEmotionalProduct': emotionalProductData
            }, function(data) {
                alert(data);
            });
            $('#modalAddEmotionalProduct').modal('hide');
            $('#emotionalProductPage').trigger('click');
        }
        return false;
    });


    $("#yesForEngravingProduct").click(function() {
            $(".engraving").empty();
            $(".engraving").append("<div class='form-group col-md-4'><label for='productNumberLigneEmotional'>Nombre de ligne :</label><input type='number' list='dataNumberLigneEmotional' class='form-control' name='product_number_line_engraving' id='productNumberLigneEmotional'  ><datalist id='dataNumberLigneEmotional'></datalist></div><div class='form-group col-md-5'><label for='productNumberOfCharactersEmotional'>Nombre de caractères :</label><input type='number' list='dataNumberLigneEmotional' class='form-control' name='product_number_characters' id='productNumberOfCharactersEmotional' ><datalist id='dataNumberLigneEmotional'></datalist></div>")
            emotionalProductData['product_engraving'] = "1";

        }) ///
        ////MYST2RE INPUT RADIO ->VALUE NE SWITCH PAS
        ////
    $('#noForEngravingProduct').click(function() {
            $(".engraving").empty();
            emotionalProductData['product_engraving'] = "0";

        })
        //Ajoute le contenu de body table 
    function appendContentTable(dataArrayBody) {
        countElement = $('#headerTableForEmotionalProduct').children().length;
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
                }).appendTo($('#tbodyEmotional'));

                for (i = 0; i < countElement; i++) {
                    td = document.createElement("td");
                    td.setAttribute("scope", "row");
                    if (i == 0) {
                        td.append(element["product_name"]);
                        $("." + element[0]).append(td);
                    } else if (i == 1) {
                        td.append(element["product_reference"]);
                        $("." + element[0]).append(td);
                    } else if (i == 2) {
                        td.append(element["product_ean"]);
                        $("." + element[0]).append(td);
                    } else if (i == 3) {
                        td.append(element["product_sku"]);
                        $("." + element[0]).append(td);
                    } else if (i == 4) {
                        td.append(element["product_size"]);
                        $("." + element[0]).append(td);
                    } else if (i == 5) {
                        if (element["product_engraving"] == 1) {
                            $("<i>", { class: 'far fa-thumbs-up' }).appendTo(td);
                        } else {
                            $("<i>", { class: 'fas fa-times-circle' }).appendTo(td);
                        }
                        $("." + element[0]).append(td);
                    } else if (i == 6) {

                        td.append(element["product_number_line_engraving"]);
                        $("." + element[0]).append(td);
                    } else if (i == 7) {
                        td.append(element["product_number_characters"]);
                        $("." + element[0]).append(td);
                    } else if (i == 8) {
                        td.append(element["product_date_added"]);
                        $("." + element[0]).append(td);
                    } else if (i == 9) {
                        $("<button>", { class: 'deleteBoutonForEmotionalProduct', type: 'button', "data-id_product": element["id_product"], }).appendTo(td);

                        $("<button>", {
                            class: 'editBoutonForEmotionalProduct',
                            type: 'button',
                            "data-id_product": element["id_product"],
                            "data-product_name": element["product_name"],
                            "data-product_reference": element["product_reference"],
                            "data-product_ean": element["product_ean"],
                            "data-product_sku": element["product_sku"],
                            "data-product_size": element["product_size"],
                            "data-product_engraving": element["product_engraving"],
                            "data-product_number_line_engraving": element["product_number_line_engraving"],
                            "data-product_number_characters": element["product_number_characters"],
                            "data-product_picture_url": element["product_picture_url"],
                        }).appendTo(td);

                        $("." + element[0]).append(td);
                    } else {
                        i++
                    }
                }
            }
        });
        $("<i>", { class: 'fas fa-edit' }).appendTo($(".editBoutonForEmotionalProduct"));
        $("<i>", { class: 'fas fa-trash-alt' }).appendTo($(".deleteBoutonForEmotionalProduct"));
    };


    //requete des donner pour remplir le tableau
    function contentOfEmotionalProductTable() {
        targetEmotional = document.getElementById("tbodyEmotional");
        $.post("index.php", { contentTableEmotional: "ok" },
            function(Json) {
                data = JSON.parse(Json);
                //alert(data);
                appendContentTable(data);
                //$('.myPopover').popover();
                $('#tableForEmotionalProduct').DataTable({
                    "scrollY": 200,
                    "scrollX": true,
                    "language": {
                        "url": "frenchLanguage.json"
                    }
                });
                //envoi des données a suprimer sur index.php
                $(".deleteBoutonForEmotionalProduct").click(function() {
                    productId = $(this).data('id_product');

                    $.post("index.php", { 'deleteEmotionalProduct': productId }, function(data) {
                        alert(data);
                        $('#emotionalProductPage').trigger('click');
                    });
                });
                //envoi des données a modifier sur index.php
                $(".editBoutonForEmotionalProduct").click(function() {
                    emotionalProductOldData = new Object();
                    emotionalProductOldData = $(this).data();

                    if (emotionalProductOldData['product_engraving'] == 1) {}
                    $("#addEmotionalProduct input").each(function() {
                        $('.multipleDivSize').css("display", 'none');
                        if (emotionalProductOldData[$(this).attr('name')] !== undefined) {
                            $(this).attr("value", emotionalProductOldData[$(this).attr('name')]);
                        } else if ($(this).attr('name') == 'product_engraving_bool') {
                            if (emotionalProductOldData['product_engraving'] == 1) {
                                $('#yesForEngravingProduct').trigger("click");
                                $("#productNumberLigneEmotional").attr("value", emotionalProductOldData['product_number_line_engraving']);
                                $("#productNumberOfCharactersEmotional").attr("value", emotionalProductOldData['product_number_characters'])
                            } else {
                                $('#noForEngravingProduct').trigger("click");
                            }
                        } else if ($(this).attr('name') == 'product_type_size') {
                            size = emotionalProductOldData['product_size'].toString();
                            if (size.includes("au")) {
                                $("#rangeSizeProduct").trigger("click");
                                $("#RangeMinSizeEmotional").attr("value", size[0] + size[1]);
                                $("#RangeMaxSizeEmotional").attr("value", size[6] + size[7]);
                            } else {
                                $("#uniqueSizeProduct").trigger("click");
                                $("#uniqueInputSizeEmotional").attr("value", size);
                            }
                        }
                    });
                    $("#modalEmotionalProduct").trigger('click');
                    $("<input>", { id: "status", value: "update", name: "statueSub" }).appendTo($('#addEmotionalProduct'))
                    emotionalProductOldData['id_product'] = $(this).data("id_product")

                })
            }
        )
    }
    $("#addEmotionalFont").submit(function() {
        event.preventDefault();
        fontEmotional = $(this).find("input[name=fontEmotional]").val();
        if (fontEmotional !== "") {
            $.post("index.php", { "fontEmotional": fontEmotional },
                function(data) {
                    alert(data);
                },
            );
        };
    });
    /*/*
    DISPLAY SIZE INPUT
        /**/

    $('.sizeTypeEmotional').click(function() {
        $(".uniqueInputSizeEmotional").attr("id", "");
        $(".RangeSizeEmotional").attr("id", "");
        $(".multipleSizeEmotional").attr("id", "");
        $("#uniqueInputSizeEmotional").prop("required", false);
        $("#RangeMinSizeEmotional").prop("required", false);
        $("#RangeMinSizeEmotional").prop("required", false);
        $("#multipleMinSizeEmotional").prop("required", false);
        $("#multipleMaxSizeEmotional").prop("required", false);

        if ($(this).val() == "unique") {
            $(".uniqueInputSizeEmotional").attr("id", "inputSize");
            $("#uniqueInputSizeEmotional").prop("required", true);

        } else if ($(this).val() == "Range") {
            $(".RangeSizeEmotional").attr("id", "inputSize");
            $("#RangeMinSizeEmotional").prop("required", true);
            $("#RangeMaxSizeEmotional").prop("required", true);

        } else if ($(this).val() == "multiple") {
            $(".multipleSizeEmotional").attr("id", "inputSize");
            $("#multipleMinSizeEmotional").prop("required", true);
            $("#multipleMaxSizeEmotional").prop("required", true);
        }
    })
    $('#cancel').click(function() {

        $('#emotionalProductPage').trigger("click");
    })
    contentOfEmotionalProductTable();
});