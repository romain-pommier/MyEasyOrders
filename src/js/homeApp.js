$(document).ready(function() {
    $("#btnCreateExcel").click(function() {
        event.preventDefault();
        dateExcel = $("#date").val();
        partnerName = $("#partnerChoice").val();
        statuForm = $("#subInput").val();
        downloadLink = "excel_" + partnerName + "_order_" + dateExcel + ".xlsx";
        if (dateExcel !== "" || partnerName !== "") {
            $.post("index.php", { "dateExcel": dateExcel, "partnerName": partnerName, },
                function(data) {
                    console.log(data);
                    $(".downloadLink").empty();
                    $(".downloadLink").append("<hr></hr>");
                    $(".downloadLink").append("<a style='margin-right:10%' href='excel/" + downloadLink + "'><button type='button' class='btn btn-primary'>Télecharger</button></a>");
                    $(".downloadLink").append("<button type='submit'   class='btn btn-primary'>Envoyer</button>");
                })
        } else {
            alert("Merci de remplire les champs");
        }
    })


    $("#sendMail").submit(function() {
        event.preventDefault();
        dateExcel = $("#date").val();
        partnerName = $("#partnerChoice").val();
        statuForm = $("#subInput").val();
        message = $("#message").val();

        if (dateExcel !== "" || partnerName !== "") {
            $.post("index.php", { "dateExcel": dateExcel, "partnerName": partnerName, "statuForm": statuForm, "message": message },
                function(data) {

                    alert(data);
                })

        } else {
            alert("Merci de remplire les champs");
        }

    })
})