<?php

$_SERVER["REQUEST_METHOD"] = "POST";
$_POST["register"]=true;
$_POST['uname']='tortuga';
$_POST["psw"]='swimming';
$_POST['fname']='tim';
$_POST['add1']='875 hopsfiel avenue';
$_POST['add2']='475 hoddock avenue';
$_POST['city']='burmont';
$_POST['state']='tx';
$_POST['zipcode']='65570';
echo "entered values: <br> Username: tortuga <br> password: swimming <br>";
echo "first name: tim <br> address1: 875 hopsfiel avenue <br> address2: 475 hoddock avenue <br>";
echo "city: burmont <br> state: texas <br> zipcode: 65570 <br>";
echo"expected result:  alert account created successfuly ";

require 'process.php';

?>
