<?php include_once("lib/header.php");

if(!isset($_SESSION["loggedIn"])){
    header("Location:dashboard.php");
}
?>
<h3> Dashboard </h3>

    LoggedIn User ID: <?php echo $_SESSION["loggedIn"] ?><br/>
    Welcome, <?php echo $_SESSION["fullname"] ?>. You are logged in as <?php echo $_SESSION["role"] ?><br/>
    Department: <?php echo $_SESSION["department"] ?><br/>
    


<?php include_once ("lib/footer.php"); ?>