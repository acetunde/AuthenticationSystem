<?php include_once("lib/header.php");

if(!isset($_SESSION["loggedIn"])){
    header("Location:".$_SESSION["roleId"].".php");
    }
?>

<div class="container">
  <div class="card-deck mb-1 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Team Leader (TL) Dashboard </h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">Welcome, <?php echo $_SESSION["fullname"] ?> <small class="text-muted">You are logged in as <?php echo $_SESSION["role"] ?></small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Department: <?php echo $_SESSION["department"] ?></li>
          <li>Date of Registration: <?php echo $_SESSION["date_of_registration"] ?></li>
          <li>Last Login: <?php if (file_exists("lastlogin/".$_SESSION["email"].".json")){
                            echo file_get_contents("lastlogin/".$_SESSION["email"].".json");
                        }
                        else{
                            echo "This is your first login";
                        }
               
             ?>
             </li>
        </ul>
        
      </div>
    </div>
  </div>
</div>

<?php include_once ("lib/footer.php"); ?>