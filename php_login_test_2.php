<?php

$_SERVER["REQUEST_METHOD"] = "POST";
$_POST['uname']='abc';
$_POST["psw"]=1234;
echo "entered values: <br> Username: zimbo <br> password: 24869 <br>";
echo"expected result:login successful";

require 'login.php';

?>
