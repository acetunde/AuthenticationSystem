<?php include_once ("lib/header.php");
#if(isset($_SESSION["loggedIn"]) && !empty($_SESSION["loggedIn"])){
    #header("Location:dashboard.php");
#}


?>
<div class = "container">
    <div class = "row col-6">
        <h3> Add a Member</h3>
    </div>
       <p>All fields are required</p>
    <div class ="row col-6">

        <form method="POST" action="processadduser.php">

            <?php
            if(isset($_SESSION["adduseralert"]) && !empty($_SESSION["adduseralert"])){
                echo "<span style='color:red'>".$_SESSION["adduseralert"]. "</span>";

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
                    type="text" class="form-control" name="first_name" placeholder="Enter Member's First name here" />
            </p>

            <p>
                <label>Last Name</label><br/>
                <input 
                <?php
                    if(isset($_SESSION["last_name"])){
                        echo "value=".$_SESSION["last_name"];
                    }
                ?>
                type="text" class="form-control" name="last_name" placeholder="Enter your Member's Last name here" />
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
                <label>Default Password</label><br/>
                <input type="password" class="form-control" name="password"/>
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
                <button class = "btn btn-success" type="submit"> Add Member </button>
            </p>
           
        </form>
    </div>
</div>
    
<?php include_once ("lib/footer.php"); ?>

