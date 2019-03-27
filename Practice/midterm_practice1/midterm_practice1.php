<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Practice</title>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css"/>
    </head>
    <body>
        <div>
            <h1> Vacation Planner</h1>
            
            <div id="monthSelections">
                Select Month : 
                <select id= "months">
                    <option value= "Select">Select</option>
                    <option value= "November">November</option>
                    <option value= "December">December</option>
                    <option value= "January">January</option>
                    <option value= "Feburary">Feburary</option>
                </select>
                <br>
            </div>
            <div id="locationSelection">
                Number of Loctions:
                    <input type="radio" name="number" value="three"> Three
                    <input type="radio" name="number" value="four"> Four
                    <input type="radio" name="number" value="five"> Five 
                <br>
            </div>
            <div id="countrySelection">
                Select Country:
                <select name = "location">
                    <option id = "place" value= "USA">USA</option>
                    <option id = "place" value= "November">Mexico</option>
                    <option id = "place" value= "December">France</option>
                </select>
                <br>
            </div>
            <div id= "orderSelection">
                Visit Locations in Alphabetical Order:
                    <input type="radio" name="order" value="A-Z"> A-Z
                    <input type="radio" name="order" value="Z-A"> Z-A
                <br>
            </div>
            
            <input id= "submitButton" type="submit" value="Creat Itinerary">
            <div id="errors">
                <h2 id = "monthError"></h2>
                <h2 id = "numLocationError"></h2>
            </div>
            <hr>
            <div id="calander">
                <h1 id="itineraryTitle"></h1>
                <div class="grid-container"></div>
                <h3 id = "monthItinerary"></h3>
                <div id ="history"></div>
            </div>
            

        </div>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $("#submitButton").on("click",function(){
             $("#monthError").html("");
             $("#numLocationError").html("");
            var bool = checkValid();
            if(bool == true){
                console.log("DO the rest");
                printCalander();
            }
            
        });
        function checkValid(){
            console.log();
            var chosenDay = $("#months option:selected").val();

            if(chosenDay== "Select" && $('input[name=number]:checked').length == 0){
                $("#monthError").html("You must select a Month!");
                $("#numLocationError").html("You must specify the number of locations!");
                return false;
            }
            if ($('input[name=number]:checked').length == 0) {
                $("#numLocationError").html("You must specify the number of locations!");
                return false;
            }
            if(chosenDay== "Select"){
                $("#monthError").html("You must select a Month!");
                return false
            }
            return true;
        }
        function printCalander(){
            var calMonth = $("#months option:selected").val();
            var numOfPlaces = $('input[name=number]:checked').val();
            var place = $("#countrySelection option:selected").val();
            var num;
            if(numOfPlaces == "three"){
                num = 3;
            }
            if(numOfPlaces == "four"){
                num = 4;
            }
            if(numOfPlaces == "five"){
                num = 5;
            }
            console.log(num);
            $("#itineraryTitle").html(calMonth + " Itinerary");
            creategrid(calMonth);
            $("#history").append("Month: "+calMonth+", visiting "+ num +" places in "+ place + "<br>");
            
            
        }
        
        function creategrid(calMonth){
            $(".grid-item" ).remove();
            if(calMonth == "November"){
                for(var i = 1 ; i<=30; i++){
                    $(".grid-container").append("<div class='grid-item'>"+ i+"</div>");
                }
            }
            else if(calMonth == "Feburary"){
                for(i = 1; i<=28; i++){
                    $(".grid-container").append("<div class='grid-item'>"+ i+"</div>");
                }
            }
            else if(calMonth == "December" || calMonth == "January"){
                for(i = 1 ; i<=31; i++){
                    $(".grid-container").append("<div class='grid-item'>"+ i+"</div>");
                }
            }
        }

                    
            
            
        </script>
</html>