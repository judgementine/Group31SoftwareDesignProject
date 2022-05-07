
<?php

$_SERVER["REQUEST_METHOD"] = "POST";
$_POST['uname']='zimbo';
$_POST["psw"]=24869;
echo "entered values: <br> Username: zimbo <br> password: 24869 <br>";
echo"expected result:login failure";

include 'login.php';

?>
