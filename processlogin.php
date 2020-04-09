<?php session_start();
    date_default_timezone_set("gmt");

    $loginalert = "";

    if ($_POST["email"] == "") {
        $loginalert .= "Please enter your email <br/>";
       }
    else{$email = $_POST["email"];
    }

    if ($_POST["password"] == "") {
        $loginalert .= "Please enter your passowrd <br/>";
       }
    else{$password = $_POST["password"];

        }

    $_SESSION["email"] = $email;

    if ($loginalert !=""){
        $_SESSION["loginalert"] = $loginalert;
        header("Location: login.php");
    }
    else {
        $designation = array("OM" , "TL" , "TM");
        for ($x = 0; $x<3; $x++){
            $allMembers = scandir("db/".$designation[$x]."/");
            $countAllMemmbers = count($allMembers);
            
            for ($counter = 0; $counter < $countAllMemmbers; $counter++){
                $currentUser = $allMembers[$counter];
                if ($currentUser == $email.".json"){
                    $userstring = file_get_contents("db/".$designation[$x]."/".$currentUser);
                    $userObject = json_decode($userstring);
                    $passwordFromDB = $userObject->password;
                    $passwordFromUser = password_verify($password, $passwordFromDB);
                
                    if($passwordFromDB == $passwordFromUser) {
                        $_SESSION["loggedIn"] = $userObject->id;
                        $_SESSION["fullname"] = $userObject->first_name." ".$userObject->last_name;
                        $_SESSION["role"] = $userObject->designation;
                        $_SESSION["date_of_registration"] = $userObject->date_of_registration;
                        $_SESSION["department"] = $userObject->department;
                        $_SESSION["email"] = $userObject->email;

                        
                        $logfile = fopen("log/loginlog.txt", "a");
                        $data = "Time of login: ". date("Y-m-d H:i:s")." GMT \nID: ".$userObject->id."\nName: ".$_SESSION["fullname"]."\nDesignation: ".$_SESSION["role"]."\nDepartment: ".$_SESSION["department"]."\nEmail: ". $userObject->email."\n".str_repeat("=", 30)."\n";
                        fwrite($logfile,$data);
                        fclose($logfile);

                       

                        if ($userObject->designation == "Operations Manager (OM)"){
                            $_SESSION["roleId"] = "om";
                            header("Location:om.php");
                            #file_put_contents("lastlogin/".$email.".json",date("Y-m-d H:i:s"));
                            die();
                        }
                
                        if ($userObject->designation == "Team Lead (TL)"){
                            $_SESSION["roleId"] = "tl";
                            header("Location:tl.php");
                            #file_put_contents("lastlogin/".$email.".json",date("Y-m-d H:i:s"));
                            die();
                        }
                
                        if ($userObject->designation == "Team Member (TM)"){
                            $_SESSION["roleId"] = "tm";
                            header("Location:tm.php");
                            #file_put_contents("lastlogin/".$email.".json",date("Y-m-d H:i:s"));
                            die();
                        }
                    }

                    
                
                
                }
            
            }
            
        }$_SESSION["loginalert"] = "Invalid Email or Password";
        header("Location:login.php");
    }
   
    
?> 