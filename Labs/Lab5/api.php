<?php

    //return type (json object)
    header('Content-type: application/json');
    $dataBase = array();
    
    //start session
    session_start();
    
    // Used to display an error output below the form
    $username = '';
    $passwords = '';
    $outputoutput = '';
    
    $getFile = 'POST' === $_SERVER['REQUEST_METHOD'];
    
    if ($getFile) {
        $outputoutput = processForm();
    }
    
    function processForm()
    {
        //we need to check username
        if ($_POST['check'] == "validate") {
            global $username;
            global $passwords;
        
            //get username and passwords
            $username = (string)$_POST['username'];
            $password = (string)$_POST['password'];

            // Validate the form
            $continue = true;
            
            //check if names are already used
            foreach ($_SESSION as $pastUsername => $arr) {
                if ($pastUsername == $username) {
                    $continue = false;
                    $dataBase["output"] = "userNameFound";
                    
                }
            }
            
            //check if username is in password
            if ($continue) {
                if (strpos($passwords, $username) !== false) {
                    $continue = false;
                    $dataBase["output"] = "userInPassword";
                }
            }
            
            // TODO: process the registration
            if ($continue) {
                $_SESSION[$username] = $passwords;
                $dataBase["output"] = "valid";
            }
            
            //return json array
            echo json_encode($dataBase);
        }
        
        //we need to suggest password
        else if ($_POST['check'] == "passwordGenerate") {
            
            //create random password
            $random_pass_8 = "";
            for ($i = 0; $i < 8; $i++) {
                $character = rand(97,122);;
                $number = rand(1,9);;
                $changetochar = chr($character);
                $gen_password = $gen_password . (string)$changetochar . (string)$number;
                
            }
            
            //set random password
            $dataBase["randomPassword"] = $gen_password;
            
            //return json array
            echo json_encode($dataBase);
        }
    }
?>