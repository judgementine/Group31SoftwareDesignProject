
<?php
$unameErr = $pswErr = "";
$name = "enter a username"; 
$password = "enter a password";
$dbname = "purpleel_joom760";
$servername="localhost:3306";
$dusername = "purpleel_alexander";
$dpassword="Grethin1";
$valid_users= array("error", "steve", "jim", "ducktape", "travelIan", "admin");
$valid_password = array("bad password", "12345", "jump2", "13Wrap!", "Troute43!", "Group31Password");
$user_index = "";

$conn = new mysqli($servername,$dusername, $dpassword, $dbname);
/*
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	

	$pass_inDB=false;
	if (empty($_POST["uname"]))
	{
		$unameErr = "Name is required";
	}
	else
	{
		$name = test_input($_POST["uname"]);
		$query = "SELECT password FROM josxa_users WHERE username='$name'"; 
		$result = $conn->query($query);
		// check if name contains whitespace 
		if (!preg_match("/^\S*$/",$name))
		{ 
		 $unameErr = "no white space allowed";
		}
		else if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$pass_inDB= $row["password"];
			echo $pass_inDB;
		}
		else
		{
		 $unameErr = "Invalid Username";
		}
	}


	if (empty($_POST["psw"]))
	{
		$pswErr = "Password is required";
	}
	else
	{
		$password = test_input($_POST["psw"]);
		
		// check if e-mail address is well-formed
		if (!preg_match("/^\S*$/",$password))
		{
		 $pswErr = "No White space allowed";
		}
		if($pass_inDB==false)
		{
			$pswErr= "";
		}
		else if(password_verify($password, $pass_inDB))
		{
			 $_SESSION["username"]=$name;
			$_SESSION["password"]=$password;

		 header( "Location:profile" );
		}
		else
		{
			$pswErr = "invalid password";
		}
	}

}


?>

<body> 
<h2>Login Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<div class="container">
	<label for="uname"><b>Username</b></label>
	<input type="text" placeholder="Enter Username" name="uname" required>
	 <span class="error">* <?php echo $unameErr;?></span>

		<br>
	<label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="psw" required>
	<span class="error">* <?php echo $pswErr;?></span>
		
		<br>
	<button type="submit">Login</button>
	<label>
		<input type="checkbox" checked="checked" name="remember"> Remember me
	</label>
	</div>

	<div class="container" style="background-color:#f1f1f1">
	<span class="psw">Forgot <a href="#">password?</a></span>
	</div>
</form>

<form action="registration" method="post">
	<button type="submit">Register</button>
</form>
</body>
<?php
?>