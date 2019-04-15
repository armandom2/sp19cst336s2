<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Login</title>
        <style>
            #center{
                border-style:solid;
                border-color:black;
                width: 250px;
                height: 100px;
            }
            #username{
                margin-top: 20px;
            }
            #password{
                margin-top: 10px;
            }
        </style>
    </head>
    
    
    
    <body>
        <div>
            <div><h1>Welcome to the OtterMart Login</h1></div>
            <br>
            <div id = "center">
                <div id = "username">UserName: <input type = "text" name="username"/> </div>
                <div id = "password">Password: <input type = "text" name="password"/> </div>
            </div>
            <br>
            <div><button id="login">Login</button> <button id = "signup">Sign-Up</button></div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script> 
            $("#login").on("click", function(){
                window.location.href='index.php';
            });
            
            $("#signup").on("click", function(){
                window.location.href='signup.php';
            });
        </script>

    </body>
    
</html>