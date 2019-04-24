<!DOCTYPE html>
<html>
    <head>
        <title>Lab 8</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id ="head">
            <form action="/action_page.php">
                <button id="backButton" type="button" onclick="location.href = 'index.php';">Search Images</button>
            </form>
        </div>
        <div id="words"></div>
        
        <center><table id = "pictures"></table></center>
        
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        //load in photos
        $.ajax({
            type: "GET",
            url: "api/getkey.php",
            dataType: "json",
            success: function(data, status) {
                // console.log(data);
                        
                //clear old keys
                $('#words').html("");
                var str = "";
                for (var i = 0; i < data.length; i++) str += "<button class='keywordResultButton' value='" + data[i]['imgkey'] + "'>" + data[i]['imgkey'] + "</button><br>";
                //display keywords
                $('#words').html(str);
            },
            error: function (error) {
                console.log(error);
                $('#error').html("");
                $('#error').html(error['responseText']);
            },
            complete: function() {
                //console.log(arguments);
            },
        });
    });
    
    //click button to reveal search results
    $(document).on('click', '.keywordResultButton', function() {
        var key = $(this).val();
    
        // load in photos
        $.ajax({
            type: "GET",
            url: "api/getlikes.php",
            dataType: "json",
            data: {
                'imgkey' : key,
            },
            success: function(data, status) {
                // console.log(data);
                
                //clear old search
                $('#pictures').html("");
                //display pics
                
                for (var i = 0; i <  data.length; i) {
                    var str = "<tr>";
                    for (var j = 0; j < 3 && i <  data.length; j++, i++) {
                        str += "<td><img id='picNum" + i +"' src='" + data[i]['url'] +"' width=250px></img></td>";
                    }
                    str += "</tr>";
                    $('#pictures').append(str);
                };
                        
            },
            error: function (error) {
                console.log(error);
                console.log(error['responseText']);
                $('#error').html("");
                $('#error').html(error['responseText']);
            },
            complete: function() {
                //console.log(arguments);
            },
        });
    });

        
    </script>
    
</html>
                    