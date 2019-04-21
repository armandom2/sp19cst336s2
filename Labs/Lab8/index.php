<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <div id="pictures">
            
        </div>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "pixa.php",
            dataType: "json",
            success: function(data,status){
                console.log(data);
                
                for(var i= 0; i<data.hits.length; i++){
                    $("#pictures").append("'<img id='theImg' src='"+data.hits[i]["largeImageURL"]+"'/>'");
                }
                
            },
            error: function(error){
                console.log(error);
            },
            complete: function(status){
                console.log(status);
            },
         
        });
        
        
    });
    
    </script>
</html>
                    