$(document).ready(function() {
    function appendTableWhyNoteHistoric(dataArrayBody, targetWhyNote) {
        countElementHeaderTable = $("#headerTableForwhyNoteProduct").children().length;
        for (i = 0; i < dataArrayBody.length; i++) {
            tr = document.createElement("tr");
            for (y = 0; y < countElementHeaderTable; y++) {
                td = document.createElement("td");
                if (y == 0) {
                    td.append(dataArrayBody[i]["client_firstname"] + '/' + dataArrayBody[i]["client_lastname"]);
                    tr.append(td);
                } else if (y == 1) {
                    td.append(dataArrayBody[i]["client_address"]);
                } else if (y == 2) {
                    td.append(dataArrayBody[i]["client_address2"]);
                } else if (y == 3) {
                    td.append(dataArrayBody[i]["client_city"] + " / " + dataArrayBody[i]["client_country"]);
                } else if (y == 4) {
                    td.append(dataArrayBody[i]["client_postal_code"]);
                } else if (y == 5) {
                    td.append(dataArrayBody[i]["client_phone_number"]);
                } else if (y == 6) {
                    td.append(dataArrayBody[i]["product_name"]);
                } else if (y == 7) {
                    td.append(dataArrayBody[i]["product_option"]);
                } else if (y == 8) {
                    td.append(dataArrayBody[i]["product_color"]);
                } else if (y == 9) {
                    td.append(dataArrayBody[i]["order_date"]);
                } else if (y == 10) {
                    $("<button>", { class: 'deleteBoutonForWhyNoteProduct', type: 'button', "id": dataArrayBody[i]["idorder"] }).appendTo(td);

                }
                tr.append(td);
            }
            targetWhyNote.append(tr);
        }
        $("<i>", { class: 'fas fa-trash-alt' }).appendTo($(".deleteBoutonForWhyNoteProduct"));
    }

    $.post("index.php", { contentTableHistoricWhyNote: "ok" },
        function(Json) {
            data = JSON.parse(Json);
            appendTableWhyNoteHistoric(data, $("#tbodyWhyNoteOrder"));
            $('#whyNoteOrderTable').DataTable({
                "scrollY": 200,
                "scrollX": true,
                "language": {
                    "url": "frenchLanguage.json"
                }
            });
            $(".deleteBoutonForWhyNoteProduct").click(function() {
                orderId = $(this).attr('id');
                $.post("index.php", { deleteOrder: orderId },
                    function(data) {
                        alert(data);

                    })
                $("#whyNoteHistoricPage").trigger("click");
            });
        }
    )
})