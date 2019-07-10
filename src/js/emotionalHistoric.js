$(document).ready(function() {


    function appendTableEmotionalHistoric(dataArrayBody, targetEmotional) {
        countElementHeaderTable = $("#headerTableForEmotionalProduct").children().length;
        for (i = 0; i < dataArrayBody.length; i++) {
            tr = document.createElement("tr");
            for (y = 0; y < countElementHeaderTable; y++) {
                td = document.createElement("td");
                if (y == 0) {
                    td.append(dataArrayBody[i]["id_order_followed"]);
                    tr.append(td);
                } else if (y == 1) {
                    td.append(dataArrayBody[i]["idorder"]);
                } else if (y == 2) {
                    td.append(dataArrayBody[i]["client_lastname"] + " / " + dataArrayBody[i]["client_firstname"]);
                } else if (y == 3) {
                    td.append(dataArrayBody[i]["client_phone_number"]);
                } else if (y == 4) {
                    td.append(dataArrayBody[i]["client_address"]);
                } else if (y == 5) {
                    td.append(dataArrayBody[i]["client_address2"]);
                } else if (y == 6) {
                    td.append(dataArrayBody[i]["client_postal_code"]);
                } else if (y == 7) {
                    td.append(dataArrayBody[i]["client_city"] + " / " + dataArrayBody[i]["client_country"]);
                } else if (y == 8) {
                    td.append(dataArrayBody[i]["product_ean"]);
                } else if (y == 9) {
                    td.append(dataArrayBody[i]["product_reference"]);
                } else if (y == 10) {
                    td.append(dataArrayBody[i]["product_name"]);
                } else if (y == 11) {
                    td.append(dataArrayBody[i]["product_quantity"]);
                } else if (y == 12) {
                    td.append(dataArrayBody[i]["product_date_added"]);
                } else if (y == 13) {
                    $("<button>", { class: 'deleteBoutonForEmotionalProduct', type: 'button', "id": dataArrayBody[i]["idorder"] }).appendTo(td);

                }
                td.setAttribute("scope", "row");
                tr.append(td);
            }
            targetEmotional.append(tr);


        }
        $("<i>", { class: 'fas fa-trash-alt' }).appendTo($(".deleteBoutonForEmotionalProduct"));
    }
    $.post("index.php", { "contentTableHistoricEmotional": "ok" },
        function(Json) {
            data = JSON.parse(Json);

            appendTableEmotionalHistoric(data, $("#tbodyEmotionalOrder"));
            $('#emotionalOrderTable').DataTable({
                fixedHeader: true,
                "scrollY": 200,
                "scrollX": true,
                "language": {
                    "url": "frenchLanguage.json"
                }
            });
            //$("thead").sticky({topSpacing:0});
            
  
            
            $(".deleteBoutonForEmotionalProduct").click(function() {
                orderId = $(this).attr('id');
                $.post("index.php", { deleteOrderEmotional: orderId },
                    function(data) {
                        alert(data);

                    })
                $('#emotionalHistoricPage').trigger("click");
            });
        }
    )
})