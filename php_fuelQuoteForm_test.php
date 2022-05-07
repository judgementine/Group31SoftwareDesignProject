<?php

$_SERVER["REQUEST_METHOD"] = "POST";
$_POST['Gallons']=1000;
$dbname = "purpleel_joom760";
$servername="localhost:3306";
$dusername = "purpleel_alexander";
$dpassword="Grethin1";
$name=abc;
$query = "SELECT username, id, password FROM josxa_users WHERE username='$name'";
$conn = new mysqli($servername,$dusername, $dpassword, $dbname); 
$result = $conn->query($query);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    $pass_inDB= $row["password"];
    $user_data=$row;
}


$_SESSION["user_data"]=$user_data;

include 'appendTable.php';
$state='tx';
$check_history= false;

onProcess($state, $check_history);

echo "entered values: <br> Username: abc <br> state: texas <br> check history: false";
echo"<br> number gallons: 1000 <br> expected result- total price: $1725   fuel rate: 1.725";
?>
