<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .table{
                flex:display;
                flex-direction:row;
            }
            #column1{
                float: left;
                /*width: 50%;*/
                margin-left: 200px;
            }
            #column2{
                float: left;
                /*width: 50%;*/
                margin-left: 300px;
            }
            #column3{
                float: left;
                /*width: 50%;*/
                margin-left: 300px;
            }
            body{
                text-align:center;
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
        
            <div>
                <h1>History</h1>
                <div class = "table">
                    <div id= "column1">Username</div>
                    <div id= "column2">Status</div>
                    <div id="column3">when</div><br>
                </div>
                <hr>
            </div>
            
            <div id= "info">
                
            </div>
        </div>

        
        
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var i= 1;
            $.ajax({
                type:"GET",
                url: "api/getMatches.php",
                dataType: "json",
                success: function(data,status){
                    console.log(data[i]["match_user_id"]);
                    
                    if(data[i]["answer_type_id"] == '1'){
                        $("info").append(data[i]["match_user_id"]+"     "+data[i]['answer_timestamp']+"     "+data[i]["answer_type_id"] + "<br>");
                        i++;
                    }
                    else{
                        i++;
                    }
                    
                    
                }
            });
        });
    
    </script>
    
    
</html>