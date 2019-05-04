<?php
    include 'dbConnection.php';
    
//     $dbHost="us-cdbr-iron-east-03.cleardb.net";
//     $dbUsername="bce62f200bbfcd";
//     $dbPassword = "9eb9c2a7";
//     $dbName = "heroku_50bf8b70dd9c9ee";

    mysql_connect("us-cdbr-iron-east-03.cleardb.net", "bce62f200bbfcd","9eb9c2a7");
    mysql_select_db("heroku_50bf8b70dd9c9ee");
    
    if(isset($_POST['submit']))
    {
        $file = $_FILES['image'];
        $fileSize = $file['size'];
        
        //EMAIL ADDRESS
        if(!empty ($_POST['email_address']))
        {
            if(!empty($_POST['caption']))
            {
                if($fileSize < 1000000){
                    $imageName = mysql_real_escape_string($_FILES["image"]["name"]);
                    $imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
                    $imageType = mysql_real_escape_string($_FILES['image']['type']);
                    $emailadd = ($_POST['email_address']);
                    $cap = ($_POST['caption']);
                    $timestamp = date("Y-m-d H:i:s");
                    
                    if(substr($imageType,0,5) == "image"){
                        mysql_query("INSERT INTO image_upload(email_address, caption, media, timestamp) VALUES('$emailadd','$cap','$imageData','$timestamp')");
                        $statusMsg ="Images Uploaded Sucessfully!";
                    }
                    else{
                        $statusMsg ="only images are allowed";
                    }
                }
                else{
                   $statusMsg = "File Size to big";
                }
            }
            else{
                $statusMsg = "Caption is Empty";
            }
        }
        else{
        $statusMsg = "Email Address is Empty";
        }
    }
    echo $statusMsg
?>