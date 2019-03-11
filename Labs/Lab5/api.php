<?php

    header('Content-type: application/json');
    $dataBase = array();
    session_start();
    
    $username = '';
    $passwords = '';
    $outputMessage = '';
    
    $getFIle = 'POST' === $_SERVER['REQUEST_METHOD'];
    
    // getting the message if Username and password are valid
    if($getFile){
        $outputMessage = checkUsernamePassword();
    }
    
    //function checker on Username and password
    function checkUsernamePassword(){
        //checking if password and username are valid 
        if($_POST['process'] == "validate"){
            global $username;
            global $passwords;
            
            //getting the username and password
            $username = (string)$_POST['username'];
            $passwords = $_POST['password'];
            $passwords[0] = (string)$posswords[0];
            $continue = true;
            
            //iteration though each username checking if its valid
            foreach($_SESSION as $pastUsername => $value){
                if($pastUsername == $username){
                    $continue = false;
                    $dataBase["output"] == "Username exists";
                }
            }
            //checking to make sure username is not in password
            if($continue){
                if(strpos($passwords[0], $username) !== false){
                    $continue = false;
                    $dataBase["output"] ="username found in password";
                }
            }
            //username and password are valid
            if($continue){
                $_SESSION[$username] = $passwords[0];
                $dataBase["output"] = "valid";
            }
            //return message
            echo json_encode($dataBase);
        }
        else if($_POST['process']== "generatepassword"){
            
            $gen_password = "";
            for($i= 0; $i<8; $i++){
                $character = rand(97,122);
                $number = rand(1,9);
                $changetochar = chr($character);
                $gen_password = $gen_password . (string)$changetochar . (string)$number;
            }
            $dataBase["randomPassword"] = $gen_password;
            echo json_encode($dataBase);
        }
    }

?>