<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
        body{
            text-align: center;
        }
        #column1{
            float: left;
            width: 50%;
        }
        #column2{
            float: left;
            width: 50%;
        }
        #buttons{
            content: "";
            display: table;
            clear: both;
        }
        #buttons{
            margin-left:575px;
        }

        </style>
    </head>
    <body>
        <div>
            <div id= "links">
                <a href="index.php">Match</a> 
                |
                <a href="history.php">History</a>
            </div>
            <h1 id="title">Match</h1>
            <div id ="center">
                <div id= "column1">
                    
                </div>
                <div id = "column2">
                    <p id="discription">Snoop dog</p>
                </div>
            </div>
            
            <div id = "buttons">
                <button id="dislike"><img src="img/dislike.png" alt="dislike" height="42" width="42">Dislike</button>
                <button id="question"><img src="img/question.jpg" alt="question" height="42" width="42"></button>
                <button id="like"><img src="img/like.png" alt="like" height="42" width="42">Like</button>
            </div>
        </div>
    	
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 1;
            $.ajax({
                type:"GET",
                url: "api/getUserInfo.php",
                dataType: "json",
                success: function(data,status){
                    $("#column1").html("<img src ='"+ data[i]["picture_url"]+ "'width= '300'/>");
                    $("#column2").html("<h2>About @"+data[i]["username"] +"</h2><br><p align='left'>"+ data[i]["about_me"]+"</p>");
                }
            });
            
            $("#dislike").on("click",function(){
                $.ajax({
                    type:"GET",
                    url: "api/getUserInfo.php",
                    dataType: "json",
                    success: function(data,status){
                        i++;
                        $("#column1").html("<img src ='"+ data[i]["picture_url"]+ "'width= '300'/>");
                        $("#column2").html("<h2>About @"+data[i]["username"] +"</h2><br><p align='left'>"+ data[i]["about_me"]+"</p>");
                    }
                });
            
            });
            $("#question").on("click",function(){
                $.ajax({
                    type:"GET",
                    url: "api/getUserInfo.php",
                    dataType: "json",
                    success: function(data,status){
                        i++;
                        $("#column1").html("<img src ='"+ data[i]["picture_url"]+ "'width= '300'/>");
                        $("#column2").html("<h2>About @"+data[i]["username"] +"</h2><br><p align='left'>"+ data[i]["about_me"]+"</p>");
                    }
                });
            });
            $("#like").on("click",function(){
                $.ajax({
                    type:"GET",
                    url: "api/getUserInfo.php",
                    dataType: "json",
                    success: function(data,status){
                        i++;
                        $("#column1").html("<img src ='"+ data[i]["picture_url"]+ "'width= '300'/>");
                        $("#column2").html("<h2>About @"+data[i]["username"] +"</h2><br><p align='left'>"+ data[i]["about_me"]+"</p>");
                    }
                });
            });
        });
        
        
        
    </script>
    </html>