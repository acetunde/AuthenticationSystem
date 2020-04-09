<?php session_start();
    date_default_timezone_set("gmt");

    file_put_contents("lastlogin/".$_SESSION["email"].".json",date("Y-m-d H:i:s")." GMT");

    session_unset();
    session_destroy();

    header("Location: login.php");

?>
)