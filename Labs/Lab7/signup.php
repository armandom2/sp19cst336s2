<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <div>
            <h1>Welcome, Please Sign-Up</h1>
            <br>
            <div id = "center">
                <div id = "username">UserName: <input type = "text" name="username"/> </div>
                <div id = "password">Password: <input type = "text" name="password"/> </div>
                <div id = "reEnter">Confirm Password: <input type = "text" name= "reEnter"/></div>
                
            </div>
            <br>
            <div><button id = "signup">Sign-Up</button></div>
            
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
            
            $("#signup").on("click",function(){
                window.location.href='login.php';
            });
            
        </script>

    </body>
</html>