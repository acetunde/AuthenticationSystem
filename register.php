<?php include_once ("lib/header.php");
if(isset($_SESSION["loggedIn"]) && !empty($_SESSION["loggedIn"])){
    header("Location:".$_SESSION["roleId"].".php");
}


?>
<div class = "container">
    <div class = "row col-6">
        <h3> Register </h3>
    </div>
    <div class = "row col-6"> 
        <p> <strong>Welcome. Please register <br/> </strong></p>
        </div>
    <p>All fields are required</p>
    <div class ="row col-6">

        <form method="POST" action="processregister.php">

            <?php
            if(isset($_SESSION["alert"]) && !empty($_SESSION["alert"])){
                echo "<span style='color:red'>".$_SESSION["alert"]. "</span>";

                session_destroy();
            }
            ?>
            <p>
                <label>First Name</label><br/>
                <input 
                <?php
                    if(isset($_SESSION["first_name"])){
                        echo "value=".$_SESSION["first_name"];
                    }
                ?>
                    type="text" class="form-control" name="first_name" placeholder="Enter your First name here" />
            </p>

            <p>
                <label>Last Name</label><br/>
                <input 
                <?php
                    if(isset($_SESSION["last_name"])){
                        echo "value=".$_SESSION["last_name"];
                    }
                ?>
                type="text" class="form-control" name="last_name" placeholder="Enter your Last name here" />
            </p>

            <p>
                <label>Gender</label><br/>
                <select class="form-control" name="gender">
                    <option></option>
                    <option
                    <?php
                    if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "Female"){
                        echo "selected";
                    }
                ?>
                > Female </option>
                    <option
                    <?php
                    if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "Male"){
                        echo "selected";
                    }
                ?>
                > Male </option>
                </select>
            </p>

            <p>
                <label>Email</label><br/>
                <input 
                <?php
                    if(isset($_SESSION["email"])){
                        echo "value=".$_SESSION["email"];
                    }
                ?>
                type="text" class="form-control" name="email" placeholder="Enter your Email here" />
            </p>

            <p>
                <label>Password</label><br/>
                <input type="password" class="form-control" name="password1"/>
            </p>

            <p>
                <label>Re-type Password</label><br/>
                <input type="password" class="form-control" name="password2"/>
            </p>

            <p>
                <label>Designation</label><br/>
                <select class="form-control" name="designation">
                    <option></option>
                    <option
                    <?php
                    if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Operations Manager (OM)"){
                        echo "selected";
                    }
                ?>
                > Operations Manager (OM)</option>
                    <option
                    <?php
                    if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Team Lead (TL)"){
                        echo "selected";
                    }
                ?>
                > Team Lead (TL) </option>
                    <option
                    <?php
                    if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Team Member (TM)"){
                        echo "selected";
                    }
                ?>
                > Team Member (TM) </option>
                </select>    
            </p>

            <p>
                <label>Department</label><br/>
                <select class="form-control" name="department">
                    <option></option>
                    <option
                    <?php
                    if(isset($_SESSION["department"]) && $_SESSION["department"] == "Receiving"){
                        echo "selected";
                    }
                ?>
                > Receiving</option>
                    <option
                    <?php
                    if(isset($_SESSION["department"]) && $_SESSION["department"] == "Shipping"){
                        echo "selected";
                    }
                ?>
                > Shipping </option>
                    <option
                    <?php
                    if(isset($_SESSION["department"]) && $_SESSION["department"] == "Packaging"){
                        echo "selected";
                    }
                ?>
                > Packaging </option>
                </select>    
            </p>
                
            <p>
                <button class = "btn btn-success" type="submit"> Register </button>
            </p>
            <p>
                    <a href="forgot.php"> Forgot Password</a><br/><br/>
                    <a href="login.php"> Already have an account? Login </a>
            
            </p>

        </form>
    </div>
</div>
    
<?php include_once ("lib/footer.php"); ?>