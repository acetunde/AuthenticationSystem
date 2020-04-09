<?php
date_default_timezone_set("gmt");

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $first_name = null ;);
    $last_name =null; 
    $email =null;
    $password = null;
    $gender =null;
    $designation = null;
    $department = null; 
    $alertmessage = null;
    
    if (test_input($_POST["first_name"]) == "") {
        $alertmessage .= "First name cannot be blank <br/>";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",test_input($_POST["first_name"]))) {
        $alertmessage .= "Only letters allowed in First Name <br/>";
    }
    elseif (strlen(test_input($_POST["first_name"])) < 2) {
        $alertmessage .= "First name cannot be less than 2 characters <br/>";
    }
    else {$first_name = ($_POST["first_name"]);}


    if (test_input($_POST["last_name"]) == "") {
        $alertmessage .= "Last name cannot be blank <br/>";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",test_input($_POST["last_name"]))) {
        $alertmessage .= "Only letters allowed in Last Name <br/>";
    } 
    elseif (strlen(test_input($_POST["last_name"])) < 2) {
        $alertmessage .= "Last name cannot be less than 2 characters <br/>";
    }
    else {$last_name = test_input($_POST["last_name"]);}


    if ($_POST["gender"] == "") {
       $alertmessage .= "Please select a gender <br/>";
    }
    else{$gender = $_POST["gender"];}

    
    if (test_input($_POST["email"]) == "") {
        $alertmessage .= "Email cannot be blank <br/>";
    }
    elseif (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $alertmessage .= "Invalid email format <br/>";
    }
    elseif (strlen(test_input($_POST["email"])) < 5) {
        $alertmessage .= "Please enter a valid email <br/>";
    }
    else{$email = test_input($_POST["email"]);
    }


    if ($_POST["password"] == "") {
       $alertmessage .= "Password cannot be blank <br/>";
    }
    elseif (strlen($_POST["password"]) < 7){
        $alertmessage .= "Password should be more 7 or more characters <br/>";
    }
    else {$password = $_POST["password"];
    }


    if ($_POST["designation"] == "") {
        $alertmessage .= "Please select a designation <br/>";
    }
    else{$designation = $_POST["designation"];}

        
    if ($_POST["department"] == "") {
        $alertmessage .= "Please select a department <br/>";
    }
    else{$department = $_POST["department"];}

    if ($designation == "Operations Manager (OM)"){
        $designationCode ="OM";
    }

    if ($designation == "Team Lead (TL)"){
        $designationCode ="TL";
        }

    if ($designation == "Team Member (TM)"){
        $designationCode ="TM";
    }
    $dateOfRegistration = date('Y-m-d H:i:s');

    #$_SESSION["first_name"] = $first_name;
    #$_SESSION["last_name"] = $last_name;
    #$_SESSION["email"] = $email;
    #$_SESSION["gender"] = $gender;
    #$_SESSION["designation"] = $designation;
    #$_SESSION["department"] = $department;

    
   if ($alertmessage !=""){
        
        echo $alertmessage;
        echo "Use the browser Back arrow to continue";
    }
    else {

        $allMembers = scandir("db/".$designationCode."/");

        $countAllMemmbers = count($allMembers);

        $newUserId = $countAllMemmbers++;

        
        $user_details = [
            "id" => $designationCode."-".$newUserId,
            "first_name"=> $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "gender" => $gender,
            "designation" => $designation,
            "department" => $department,
            "date_of_registration" => $dateOfRegistration." GMT (Added by Super Admin)"
        ];
        //check if user already exists during add
        for ($counter = 0; $counter < $countAllMemmbers; $counter++){
            $currentUser = $allMembers[$counter];
            if ($currentUser == $email.".json"){
                echo "Member add failed, Member already exists ||";
                echo "Use the browser Back arrow to continue";
                die();
            }
        }
        
        //save user details in JSON file
        file_put_contents("db/".$designationCode."/".$email.".json", json_encode($user_details));
        echo $first_name." ".$last_name." has been added sucessfully ||";
        echo "Use the browser Back arrow to continue";
        
        /*echo $alertmessage ;
        echo $first_name . "<br/>";
        echo $last_name. "<br/>" ;
        echo $email. "<br/>" ;
        echo $password. "<br/>" ;
        echo $gender . "<br/>";
        echo $designation. "<br/>" ;
        echo $department . "<br/>";*/
                
    }

   
?>