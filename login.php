<?php include_once ("lib/header.php"); 
    if(isset($_SESSION["loggedIn"]) && !empty($_SESSION["loggedIn"])){
        header("Location:".$_SESSION["roleId"].".php");
    }   

    ?>

<div class = "container">
    <div class = "row col-6">
        <h3> Login </h3>
    </div>
        <?php
            if(isset($_SESSION["loginalert"]) && !empty($_SESSION["loginalert"])){
            echo "<span style='color:red'>".$_SESSION["loginalert"]. "</span>";

            session_destroy();
            }
        ?>
    </p>
    <div class = "row col-6">
        <form method="POST" action="processlogin.php">

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
                <input class="form-control" type="password" name="password"/>
            </p>

            <p>
                <button class="btn btn-sm btn-primary" type = "submit" >Login</button>
            </p>

            <p>
                    <a href="forgot.php"> Forgot Password</a><br/><br/>
                    <a href="register.php"> Don't have an account? Register</a>
                
            
            </p>


        </form>
    </div>
</div>
<?php include_once ("lib/footer.php"); ?>