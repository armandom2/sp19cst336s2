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
    var x =0;
    
    $("#searchButton").on("click",function(){
        $.ajax({
            type:"GET",
            url:"pixa.php",
            dataType:"json",
            data:{
                "image": $("#userSearch").val()
            },
            success:function(data,status){
                $('#pictures td').html('');
                for(var i= 0; i<data.hits.length; i++){
                    var links = [];
                    links.push(data.hits[i]["largeImageURL"]);
                    if(i%3 === 0){
                        $("#pictures").append("<tr>");
                    }
                    $("#pictures").append("<td> <img style=width:350px; height:350px; id=theImg src="+data.hits[i]["largeImageURL"]+"/><br><center><button id='button"+i+"' type='button' onClick=clicked('"+i+"','"+links+"','"+ $("#userSearch").val()+"')><img id='img"+i+"'src='img/favorite.png' width=25px; height=25px;></button></center></td>");
                    if(i%3 === 0){
                        $("#pictures").append("</tr>");
                    }
                }
                
            }
        });
    });
    
    function clicked(num, piclinks, name){
        console.log(piclinks);
        console.log(num);
        var imglink = piclinks
        var keys = name;

        var unOrlike= $("#img"+num).attr("src");
        console.log(unOrlike);
        
        if(unOrlike == "img/favorite.png"){
            $("#img"+num).attr("src", "img/favorite-on.png");
            $.ajax({
                type:"POST",
                url:"api/likeUnlike.php",
                dataType: "json",
                data:{
                    'searchKey': keys,
                    'task': 'like',
                    'link': piclinks,
                },
                success:function(data,status){
                    console.log(data);
                },
            });
        }
        else if(unOrlike == "img/favorite-on.png"){
            $("#img"+num).attr("src", "img/favorite.png");
            $.ajax({
                type:'POST',
                url:'api/likeUnlike.php',
                dataType:'json',
                data:{
                    'searchKey': keys,
                    'task': 'unlike',
                    'link': piclinks,
                },
                success:function(data,status){
                    console.log(data);
                }
                
            });
        }
    }
        
    
    </script>
</html>
                    