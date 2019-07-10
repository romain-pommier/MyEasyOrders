$(document).ready(function() {


    $("#searchButtonOrderWhyNote").click(function() {
        event.preventDefault();

        nameFilter = $("input[name=nameFilter").val();
        colorFilter = $("input[name=colorFilter").val();
        filterWhyNote = new Object();
        if (nameFilter !== "" && colorFilter !== "") {
            filterWhyNote['product_name'] = nameFilter;
            filterWhyNote['product_color'] = colorFilter;
        } else if (nameFilter !== "") {
            filterWhyNote['product_name'] = nameFilter;
        } else if (colorFilter !== "") {
            filterWhyNote['product_color'] = colorFilter;
        }

        $.post("index.php", { "filterWhyNote": filterWhyNote },
            function(data) {

                dataWhyNoteProduct = JSON.parse(data);
                if (dataWhyNoteProduct.length !== 0) {

                    $("#choicesProduct").empty();
                    $("#choicesProduct").append("<h3 class='titleProduct' style='width:100%'>Produits Trouver :</h3>")
                    for (i = 0; i < dataWhyNoteProduct.length; i++) {

                        $("#choicesProduct").append("<div class='divProduct'><figure class='figureProduct'><img src='" + dataWhyNoteProduct[i]['product_picture_url'] + "'class='pictureProduct'><figcaption class='description'>description:<br>Nom:<strong>" + dataWhyNoteProduct[i]['product_name'] + "</strong><br>option:<strong>" + dataWhyNoteProduct[i]['product_option'] + "</strong></figcaption></figure><input type='radio' value='" + dataWhyNoteProduct[i]['id_product'] + "' product_name='" + dataWhyNoteProduct[i]['product_name'] + "'  product_color='" + dataWhyNoteProduct[i]['product_color'] + "' product_option='" + dataWhyNoteProduct[i]['product_option'] + "' name='inputCheckProduct'></div>");
                    }

                } else {
                    alert("aucun produit ne correspon au information")
                }
                $(".divProduct").click(function() {
                    $("input:checked").parent().attr("select", "");
                    $(this).find("input").prop('checked', true);
                    $("input:checked").parent().attr("select", "select");
                })
            });
    });

    //Formulaire envoi ajax order
    $("#whynoteOrderForm").submit(function() {
        event.preventDefault();
        whyNoteOrderData = new Object();
        $("#whynoteOrderForm input").each(function() {
            whyNoteOrderData[$(this).attr("name")] = $(this).val();

        });
        whyNoteOrderData['shipping_name'] = "null";
        $.post("index.php", {
            "WhyNoteOrderData": whyNoteOrderData,
        }, function(data) {
            alert(data);

        });
        
        return false
    });
})

function displayDataList(data) {
    nameList = $("#dropDownOrderProductName");
    nameList.empty();

    colorList = $('#dropDownOrderProductColor');
    colorList.empty();
    data.forEach(index => {
        index.forEach(element => {
            nameList.append("<option value='" + element["product_name"] + "'>" + element["product_name"] + "</option>");
            colorList.append("<option value='" + element["product_color"] + "'>" + element["product_color"] + "</option>");
        });
    })
}

function displayDataList(data, target) {
    for (i = 0; i < data.length; i++) {
        target.append("<option value='" + data[i][0] + "'>" + data[i][0] + "</option>");
    }
}

function displayListFilter() {

    $.post("index.php", 'displayListFilterWhyNote',
        function(data) {
            dataResult = JSON.parse(data);
            displayDataList(dataResult[0], $("#dropDownOrderProductName"));
            displayDataList(dataResult[1], $("#dropDownOrderProductColor"));
        })
}
$('#refreshWhynoteOrder').click(function(){
    $('#whyNoteOrderPage').trigger('click');

})
displayListFilter();