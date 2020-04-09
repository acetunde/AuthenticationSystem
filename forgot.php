<?php include_once ("lib/header.php"); ?>
    
    
<div class = "container">
    <div class = "row col-6">
        <h3> Forgot Password  <h3>
    </div>
    <?php if(isset($_SESSION["forgotalert"]) && !empty($_SESSION["forgotalert"])){
        echo "<span style='color:red'>".$_SESSION["forgotalert"]. "</span>";
        
        session_destroy();
        }
    ?>
    <div class = "row col-6">
    <form action="processforgot.php" method="POST">

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
        <button class="btn btn-sm btn-primary" type = "submit" >Send Reset code</button>
    </p>

    </form>
    </div>
    
</div>
<?php include_once ("lib/footer.php"); ?>