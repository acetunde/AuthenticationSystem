<?php session_start(); ?>
<!Doctype html>
<htmml lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAX Logistics: Shipping and Warehousing</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <scripts src="scripts.js"></scripts>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal" ><a href="index.php">MAX Logistics</a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="index.php"> Home</a> |
                <?php if(!isset($_SESSION["loggedIn"]) && empty($_SESSION["loggedIn"])){ ?>
            
                    <a class="p-2 text-dark" href="login.php">Login</a> |
                    <a class="btn btn-primary" href="register.php">Register</a> |
                    <!--<a class="p-2 text-dark" href="forgot.php">Forgot Password</a> | -->
            
                <?php }else{ ?>
                    <a class="p-2 text-dark" href="<?php echo $_SESSION["roleId"];?>.php">My Dashboard</a> |
                    <a class="p-2 text-dark" href="logout.php">Logout</a> |
                    <a class="p-2 text-dark" href="changepassword.php">Change Password</a> |
                <?php } ?>
                
            
            </nav>
            
        </div>