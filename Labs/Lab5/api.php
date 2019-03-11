<?php

    header('Content-type: application/json');
    $dataBase = array();
    
    //starts the session
    session_start();
    
    $username = '';
    $password = '';
    $outputinfo = '';
    
    //gets the file
    $getFile = 'POST' === $_SERVER['REQUEST_METHOD'];
    
    
    //if the file is valid then it calls the function and sets it to a value
    if ($getFile) {
        //sets the variable to the output of function
        $outputinfo = checkUsernamePassword();
    }
    
    //function to check the password and username
    function checkUsernamePassword()
    {
        //checks which functino section it will call
        if ($_POST['check'] == "validate") {
            global $username;
            global $password;
        
            //stores the user input
            $username = (string)$_POST['username'];
            $password = (string)$_POST['password'];

            $continue = true;
            
            //checks if the username already exists
            foreach ($_SESSION as $pastUsername => $arr) {
                //if the username is found then stop and return error
                if ($pastUsername == $username) {
                    $continue = false;
                    $dataBase["output"] = "userNameFound";
                    
                }
            }
            
            //checks to make sure the username is not in the password
            if ($continue) {
                //if password contains username stop then return error
                if (strpos($password, $username) !== false) {
                    $continue = false;
                    $dataBase["output"] = "userInPassword";
                }
            }
            
            //if passes all cases then store the username into the "api"
            if ($continue) {
                $_SESSION[$username] = $password;
                $dataBase["output"] = "valid";
            }
            
            echo json_encode($dataBase);
        }
        
        //we need to suggest password
        else if ($_POST['check'] == "passwordGenerate") {
            
            //creates random number with letters and numbers
            $random_pass_8 = "";
            for ($i = 0; $i < 8; $i++) {
                $character = rand(97,122);;
                $number = rand(1,9);;
                $changetochar = chr($character);
                $gen_password = $gen_password . (string)$changetochar . (string)$number;
            }
            
            //set the password to the input line
            $dataBase["randomPassword"] = $gen_password;
            
            //return json array
            echo json_encode($dataBase);
        }
    }
?>