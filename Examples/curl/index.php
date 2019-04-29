<!DOCTYPE html>
<html>
    <head>
        <title>Lab 8</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id ="head">
            <form action="/action_page.php">
                Search: <input type="text" name="searchBox" id="userSearch"> 
                <button id="searchButton" type="button">Search</button>
            </form>
            <button id="favoriteButton" type="button" onclick="location.href = 'favorites.php';">Favorites</button>
        </div>
        
        <center><table id = "pictures"></table></center>
        
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>

    $(document).ready(function(){
        $.ajax({
            type:"GET",
            url:"fortnite.php",
            dataType:"json",
            success:function(data,status){
                console.log(data);
            }
        });
    });
    
    </script>
</html>