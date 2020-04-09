<?php include_once ("lib/header.php"); ?>

<p>
    <?php
        if(isset($_SESSION["loggedIn"]) && !empty($_SESSION["loggedIn"])){
        //header("Location:dashboard.php");
        }
    ?>
</p>

 <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4"> Welcome to MAX Logistics</h1>
  <p class="lead">This is your one stop solution to Shipping and Warehousing</p>
  <p>
        <a class="btn btn-bg btn-outline-secondary" href="login.php">Login</a> <br/><br/>
        <a class="btn btn-bg btn-outline-primary" href="register.php">Register</a>
  </p>
</div>

<?php include_once ("lib/footer.php"); ?>

    