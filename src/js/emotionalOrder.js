$(document).ready(function() {


    //refaire une font avec import de fonction!!!!!!!!!!!!!!!!!!---*****


    $("#searchButtonOrderEmotional").click(function() {
        event.preventDefault();
        skuFilter = $("input[name=skuFilter").val();
        sizeFilter = $("input[name=sizeFilter").val();
        filterEmotional = new Object();
        if (skuFilter !== "" && sizeFilter !== "") {
            filterEmotional['product_sku'] = skuFilter;
            filterEmotional['product_size'] = sizeFilter;
        } else if (skuFilter !== "") {
            filterEmotional['product_sku'] = skuFilter;
        } else if (sizeFilter !== "") {
            filterEmotional['product_size'] = sizeFilter;
        }
        $.post("index.php", { "filterEmotional": filterEmotional },
            function(data) {
                dataEmotionalProduct = JSON.parse(data);
                if (dataEmotionalProduct.length !== 0) {

                    $("#choicesProduct").empty();
                    $("#choicesProduct").append("<h3 class='titleProduct' style='width:100%'>Produits Trouver :</h3>")
                    for (i = 0; i < dataEmotionalProduct.length; i++) {
                        $("#choicesProduct").append("<div class='divProduct'><figure class='figureProduct'><img src='" + dataEmotionalProduct[i]["product_picture_url"] + "' class='pictureProduct'><figcaption class='description'>description:<br>skuProduct:<strong>" + dataEmotionalProduct[i]["product_sku"] + "</strong><br>sizeProduct:<strong>" + dataEmotionalProduct[i]["product_size"] + "</strong></figcaption></figure><input type='radio' data-id_product='" + dataEmotionalProduct[i]["id_product"] + "' data-product_name='" + dataEmotionalProduct[i]["product_name"] + "' data-product_reference='" + dataEmotionalProduct[i]["product_reference"] + "' data-product_ean='" + dataEmotionalProduct[i]["product_ean"] + "' data-product_size='" + dataEmotionalProduct[i]["product_size"] + "' data-product_engraving='" + dataEmotionalProduct[i]["product_engraving"] + "' data-product_number_line_engraving='" + dataEmotionalProduct[i]["product_number_line_engraving"] + "' name='inputCheckProduct'></div>")
                    }
                } else {
                    alert("aucun produit ne correspond au information")
                }
                $(".divProduct").click(function() {
                    $("input:checked").parent().attr("select", "");
                    $(this).find("input").prop('checked', true);
                    $("input:checked").parent().attr("select", "select");
                    numberLineProduct = ($(this).find("input[name=inputCheckProduct]").data("product_number_line_engraving"));
                    if (numberLineProduct !== 0) {
                        divEngraving = $("#engraving");
                        divEngraving.empty();
                        divEngraving.append("<div class='form-row'><h3 class='titleProduct'>Personnalisation :</h3></div><h3>Gravure</h3>")
                        for (i = 1; i <= numberLineProduct; i++) {
                            divEngraving.append("<div class='customLigne'><h5 class='ligne'>Text Ligne " + i + ":</h5><div class='form-row'><div class='form-group col-md-4'><label for='productFontligne" + i + "ClientEmotional'>Police:</label><input list='dropDownOrderProductFont" + i + "'type='text' class='form-control' name='fontFilter" + i + "' id='productFontligne" + i + "ClientEmotional'><datalist id='dropDownOrderProductFont" + i + "'></datalist></div><div class='form-group col-md-4'><label for='productText" + i + "Emotional'>Text:</label><input type='text' class='form-control' name='textProduct" + i + "' id='productText" + i + "Emotional'></div></div></div>");
                        }
                        $.post("index.php", "datalistOrderEmotional",
                            function(data) {
                                dataResult = JSON.parse(data);

                                for (i = 0; i < dataResult.length; i++) {
                                    for (y = 1; y <= numberLineProduct; y++) {
                                        $('#dropDownOrderProductFont' + y).append("<option value='" + dataResult[i][1] + "'>" + dataResult[i][1] + "</option>");
                                    };
                                }
                            }
                        )

                    }

                })
            });

    });

    $('#EmotionalOrderForm').submit(function() {
        event.preventDefault();
        emotionalOrderData = new Object();
        $("#EmotionalOrderForm input").each(function() {
            emotionalOrderData[$(this).attr("name")] = $(this).val();
        });

        if (emotionalOrderData['client_country'] == "France (Métropole)") {
            emotionalOrderData['shipping_name'] = "La poste";

        } else {
            emotionalOrderData['shipping_name'] = "Colissimo";

        }

        emotionalOrderData['id_product'] = $(this).find("input[name=inputCheckProduct]").data("id_product");
        emotionalOrderData['order_comment'] = $('#productCommentClientEmotional').val();
        //traitement  custom 
        dataFirstLine = '{"Police":"' + emotionalOrderData['fontText'] + '","Texte":"' + emotionalOrderData['textProduct'] + '"}';
        dataSecondLine = ',{"Police":"' + emotionalOrderData['fontText2'] + '","Texte":"' + emotionalOrderData['textProduct2'] + '"}';
        dataThirdLine = ',{"Police":"' + emotionalOrderData['fontText3'] + '","Texte":"' + emotionalOrderData['textProduct3'] + '"}';

        if (emotionalOrderData['textProduct3']) {
            emotionalOrderData['product_custom'] = '{"customization":[{"Face":"recto","Textes":[' + dataFirstLine + dataSecondLine + dataThirdLine + ']}]}';
        } else if (emotionalOrderData['textProduct2']) {
            emotionalOrderData['product_custom'] = '{"customization":[{"Face":"recto","Textes":[' + dataFirstLine + dataSecondLine + ']}]}';
        } else if (emotionalOrderData['textProduct']) {
            emotionalOrderData['product_custom'] = '{"customization":[{"Face":"recto","Textes":[' + dataFirstLine + ']}]}';
        } else {
            emotionalOrderData['product_custom'] = "";
        }

        $.post("index.php", {
            "dataEmotionalClient": emotionalOrderData,

        }, function(data) {
            alert(data);

        });
        
        return false
    })

})


function displayDataList(data, target) {
    for (i = 0; i < data.length; i++) {
        target.append("<option value='" + data[i][0] + "'>" + data[i][0] + "</option>");
    }
}

function displayListFilter() {

    $.post("index.php", 'displayListFilterEmotional',
        function(data) {
            dataResult = JSON.parse(data);

            displayDataList(dataResult[0], $('#dropDownOrderProductSku'));
            displayDataList(dataResult[1], $('#dropDownOrderProductSize'));

        })

}
$('#refreshEmotionalOrder').click(function(){
    $('#emotionalOrderPage').trigger("click");
})
displayListFilter();