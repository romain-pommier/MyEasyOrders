$(document).ready(function() {
    
    content = $('#contentAjax');
    $.ajax({
        url: "src/Views/home.php",
        cache: false,
        success: function(html) {
            displayContent(html, content)
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    })
    
    
    
    //Redirection page 
    $("#onglets a").click(function() {
        
        $.ajax({
            url: "src/Views/" + $(this).attr("href"),
            cache: false,
            success: function(html) {
                displayContent(html, content)
                
               
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
            }
        })
        
        return false;
    });

    function displayContent(data, content) {
        content.fadeOut(300, function() {
            content.empty();
            content.append(data);
            content.fadeIn(300);
        });
    }
})