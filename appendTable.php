<?php 
session_start();
include_once "dbcon.php";

if ($_POST['Gallons']) {



    $user = $_SESSION["user_data"];

    $user_id = $user['id'];
    
    $Gallons = strip_tags($_POST["Gallons"]);
    $dDate = strip_tags($_POST["dDate"]);

    $total_price = $_POST["total_price"];


    // $user_id =  "SELECT id from users WHERE uname = '$uname'";
    $tbl = "INSERT INTO quotes(user_id, delivery_date, gallons_requested, suggested_price, total_price)";
    $tbl .= " VALUES($user_id, '$dDate','$Gallons', '1.82', $total_price)";
    
    // echo $tbl;
    if ($mysqli->query($tbl)) {
        header("Location: ./FuelQuoteForm.php");
    } else {
        echo "error!";
    }
}



?>
