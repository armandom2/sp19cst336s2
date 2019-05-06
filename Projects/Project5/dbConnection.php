<?php
// // Database configuration
// $dbHost="us-cdbr-iron-east-03.cleardb.net";
// $dbUsername="bce62f200bbfcd";
// $dbPassword = "9eb9c2a7";
// $dbName = "heroku_50bf8b70dd9c9ee";

function getDataBaseConnection($dbname = "heroku_50bf8b70dd9c9ee"){
        $host = "us-cdbr-iron-east-03.cleardb.net";
        $username = "bce62f200bbfcd";
        $password = '9eb9c2a7';
        
        if(strpos($_SERVER['HTTP_HOST'],'herokuapp')!==false){
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        }

        //creates DB connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        
        //display errors when accessing tables
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
?>