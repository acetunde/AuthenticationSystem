<?php session_start();

    $email = null;
    $alertmessage = null;
  
    if ($_POST["email"] == "") {
         $alertmessage = "Email cannot be blank <br/>";
    }
    else{$email = $_POST["email"];
    }

    $_SESSION["email"] = $email; 
    
   if ($alertmessage !=""){
        $_SESSION["forgotalert"] = $alertmessage;
        header("Location:forgot.php");
    }
    else{
        $designation = array("OM" , "TL" , "TM");
        for ($x = 0; $x<3; $x++){
            $allMembers = scandir("db/".$designation[$x]."/");
            $countAllMemmbers = count($allMembers);
            
            for ($counter = 0; $counter < $countAllMemmbers; $counter++){
                $currentUser = $allMembers[$counter];
                if ($currentUser == $email.".json"){
                    echo "A RESET LINK WOULD BE SENT TO YOUR EMAIL IN THE NEXT TASK";
                    //redirect to reset password page
                    die();
                }
            }
        } 
        
        $_SESSION["forgotalert"] = "Unregistered email provided - '".$email."'";
        header("Location:forgot.php");
        
    }  
       
   

?>               
    
