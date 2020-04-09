<?php session_start();
date_default_timezone_set("gmt");

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $first_name = null ;#test_input($_POST["first_name"]);
    $last_name =null; #test_input($_POST["last_name"]);
    $email =null;# test_input($_POST["email"]);
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $gender =null;# $_POST["gender"];
    $designation = null;# $_POST["designation"];
    $department = null; $_POST["department"];
    $alertmessage = null;
    $password = null;

    if (test_input($_POST["first_name"]) == "") {
        #echo '<script>alert("First name cannot be blank")</script>';
        $alertmessage .= "First name cannot be blank <br/>";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",test_input($_POST["first_name"]))) {
        $alertmessage .= "Only letters allowed in First Name <br/>";
    }
    elseif (strlen(test_input($_POST["first_name"])) < 2) {
        #echo '<script>alert("First name cannot be blank")</script>';
        $alertmessage .= "First name cannot be less than 2 characters <br/>";
    }
    else {$first_name = ($_POST["first_name"]);}


    if (test_input($_POST["last_name"]) == "") {
        #echo '<script>alert("Last name cannot be blank")</script>';
        $alertmessage .= "Last name cannot be blank <br/>";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",test_input($_POST["last_name"]))) {
        $alertmessage .= "Only letters allowed in Last Name <br/>";
    } 
    elseif (strlen(test_input($_POST["last_name"])) < 2) {
        #echo '<script>alert("First name cannot be blank")</script>';
        $alertmessage .= "Last name cannot be less than 2 characters <br/>";
    }
    else {$last_name = test_input($_POST["last_name"]);}


    if ($_POST["gender"] == "") {
       #echo '<script>alert("Please select a gender")</script>';
        $alertmessage .= "Please select a gender <br/>";
    }
    else{$gender = $_POST["gender"];}

    
    if (test_input($_POST["email"]) == "") {
        #echo '<script>alert("Email cannot be blank")</script>';
        $alertmessage .= "Email cannot be blank <br/>";
    }
    elseif (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $alertmessage .= "Invalid email format <br/>";
    }
    elseif (strlen(test_input($_POST["email"])) < 5) {
        #echo '<script>alert("First name cannot be blank")</script>';
        $alertmessage .= "Please enter a valid email <br/>";
    }
    else{$email = test_input($_POST["email"]);
    }


    if ($password1 == "") {
       # echo '<script>alert("password cannot be blank")</script>';
        $alertmessage .= "Password cannot be blank <br/>";
    }
    elseif ($password2 == "") {
        #echo '<script>alert("Please retype the password")</script>';
        $alertmessage .= "Please retype the password <br/>";
    }
    elseif ($password1 != $password2){
        $alertmessage .= "Passwords don't match. Please retype thesame password <br/>";
    }
    elseif (strlen($password1) < 7){
        $alertmessage .= "Password should be more 7 or more characters <br/>";
    }
    else {$password = $password1;}


    if ($_POST["designation"] == "") {
        #echo '<script>alert("Please select a designation")</script>';
        $alertmessage .= "Please select a designation <br/>";
    }
    else{$designation = $_POST["designation"];}

        
    if ($_POST["department"] == "") {
        #echo '<script>alert("Please select a department")</script>';
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

    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["email"] = $email;
    $_SESSION["gender"] = $gender;
    $_SESSION["designation"] = $designation;
    $_SESSION["department"] = $department;

    
   if ($alertmessage !=""){
        $_SESSION["alert"] = $alertmessage;
        header("Location: register.php");
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
            "date_of_registration" => $dateOfRegistration." GMT"
        ];
        //check if user already exista during registration
        for ($counter = 0; $counter <= $countAllMemmbers; $counter++){
            $currentUser = $allMembers[$counter];
            if ($currentUser == $email.".json"){
                $_SESSION["alert"] = "Registration failed, user already exists";
                header("Location:register.php");
                die();
            }
        }
        
        //save user details in JSON file
        file_put_contents("db/".$designationCode."/".$email.".json", json_encode($user_details));
        $_SESSION["message"] = "Registration sucessful, you can now log in, ". $first_name;
        header("Location: login.php");
                
    }

    


    
   /* echo $alertmessage ;
    echo $first_name . "<br/>";
    echo $last_name. "<br/>" ;
    echo $email. "<br/>" ;
    echo $password. "<br/>" ;
    echo $gender . "<br/>";
    echo $designation. "<br/>" ;
    echo $department . "<br/>";*/
    
?>