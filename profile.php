<?php
$fnameErr = $add1Err = $add2Err = $cityErr = $stateErr = $zipErr = "";

$fName = "ex: john";
$add1 = "ex: 1342 blank str.";
$add2 = "optional";
$city = "ex: Montgommery";
$state = "AL";
$zipcode = "ex: 99999";

$dbname = "purpleel_joom760";
$servername="localhost:3306";
$dusername = "purpleel_alexander";
$dpassword="Grethin1";

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

$username = "";
if(empty($_SESSION["username"]))
{
header(Location:"login");
}
else
{
$username = $_SESSION["username"];
}

$conn = new mysqli($servername,$dusername, $dpassword, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$id=0;
$entry=false;
$query = "SELECT id FROM josxa_users WHERE username = '$username'";
$result = $conn->query($query);
if($result->num_rows > 0)
{
$row = $result->fetch_assoc();
$id= $row["id"];
$entry= true;
}
$query = "SELECT * FROM user_profiles WHERE user_id = '$id'";
$result = $conn->query($query);
if($result->num_rows > 0)
{
$row = $result->fetch_assoc();
$fName=$row["full_name"];
$add1 = $row["address1"];
$add2 = $row["address2"];
$city = $row["city"];
$state = $row["state"];
$zipcode = $row["zipcode"];

}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$check=1;

if (empty($_POST["fname"]))
{
$fnameErr = "Name is required";
$check=0;
}
else
{
$name = test_input($_POST["fname"]);
// check if name has too many characters
if (strlen($name)>50)
{
$fnameErr = "too many characters";
$check=0;
}
else if($name!=$fName)
{
if($entry)
{

$query = "Update user_profiles SET full_name = '$name'";
}
else
{
$query = "INSERT INTO user_profiles (user_id, full_name) VALUES ('$id', '$name')";
$entry=true;

}
$conn->query($query);
$userFnames[$uIndex]=$name;
}

$nadd1 = test_input($_POST["add1"]);
if (empty($_POST["add1"]))
{
$add1Err = "Address 1 is required";
$check=0;
}
else
{
if (strlen($nadd1)>100)
{
 $add1Err = "too many characters";
 $check=0;
}
else if($nadd1!=$add1)
{
$query = "Update user_profiles SET address1 = '$nadd1'";
$conn->query($query);
}
}


$nadd2 = test_input($_POST["add2"]);
if (strlen($nadd2)>100)
{
 $add2Err = "too many characters";
$check=0;
}
else if($nadd2!=$add2)
{
$query = "Update user_profiles SET address2 = '$nadd2'";
$conn->query($query);
}
}

$ncity = test_input($_POST["city"]);
if (empty($_POST["city"]))
{
$cityErr = "city is required";
$check=0;
}
else
{
if (strlen($ncity)>100)
{
 $cityErr = "too many characters";
$check=0;
}
else if($ncity!=$city)
{
 $query = "Update user_profiles SET city='$ncity'";
 $conn->query($query);
}
}


$nstate = test_input($_POST["states"]);
if (empty($_POST["states"]))
{
$stateErr = "state is required";
$check=0;
}
else
{
if (strlen($nstate)>2)
{
 $stateErr = "Invalid State Code";
$check=0;
}
else if($nstate!=$state)
{
$query = "Update user_profiles SET state = '$nstate'";
$conn->query($query);
}
}


$nzip = test_input($_POST["zip"]);
if (empty($_POST["zip"]))
{
$stateErr = "zipcode is required";
$check=0;
}
else if (!preg_match("/^\d*$/",$nzip))
{
$zipErr = "numbers only";
$check=0;
}
else
{
if (strlen($nzip)>9||strlen($nzip)<5)
{
 $zipErr = "Invalid Zipcode";
$check=0;
}
else if($nzip!=$zipcode)
{
$query = "Update user_profiles SET $nzip = '$zipcode'";
$conn->query($query);
}
}
if($check==1)
{
header("Location:fuelquoteform" );
}
}

?>


<body>

<h2>complete Profile</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="container">
<label for="fname"><b>Enter Your Full name</b></label>
<input type="text" value="<?php echo $fName ?>" name="fname" required maxlength="50">
<span class="error">* <?php echo $fnameErr;?></span>
<br> <br>

<label for="add1"><b>Address1:</b></label>
<input type="text" value="<?php echo $add1 ?>" name="add1" required maxlength="100">
<span class="error">* <?php echo $add1Err;?></span>
<br> <br>
<label for="add2"><b>Address2:</b></label>
<input type="text" value="<?php echo $add2 ?>" name="add2" maxlength="100">
<?php if($add2Err!="") echo "<span class='error'>* "+$add2Err+"></span>";?>
<br> <br>
<label for="city"><b>City:</b></label>
<input type="text" value="<?php echo $city ?>" name="city" required maxlength="100">
<span class="error">* <?php echo $cityErr;?></span>
 <label for="States">State:</label>
<select name="states" id="state">
<option <?php if ($state == "AL" ) echo ' selected ' ?> value="AL">Alabama</option>
<option <?php if ($state == "AK" ) echo 'selected' ?> value="AK">Alaska</option>
<option <?php if ($state == "AZ" ) echo 'selected' ?> value="AZ">Arizona</option>
<option <?php if ($state == "AR" ) echo 'selected' ?> value="AR">Arkansas</option>
<option <?php if ($state == "CA" ) echo 'selected' ?> value="CA">California</option>
<option <?php if ($state == "CO" ) echo 'selected' ?> value="CO">Colorado</option>
<option <?php if ($state == "CT" ) echo 'selected' ?> value="CT">Connecticut</option>
<option <?php if ($state == "DE" ) echo 'selected' ?> value="DE">Delaware</option>
<option <?php if ($state == "FL" ) echo 'selected' ?> value="FL">Florida</option>
<option <?php if ($state == "GA" ) echo 'selected' ?> value="GA">Georgia</option>
<option <?php if ($state == "HI" ) echo 'selected' ?> value="HI">Hawaii</option>
<option <?php if ($state == "ID" ) echo 'selected' ?> value="ID">Idaho</option>
<option <?php if ($state == "IL" ) echo 'selected' ?> value="IL">Illinois</option>
<option <?php if ($state == "IN" ) echo 'selected' ?> value="IN">Indiana</option>
<option <?php if ($state == "IA" ) echo 'selected' ?> value="IA">Iowa</option>
<option <?php if ($state == "KS" ) echo 'selected' ?> value="KS">Kansas</option>
<option <?php if ($state == "KY" ) echo 'selected' ?> value="KY">Kentucky</option>
<option <?php if ($state == "LA" ) echo 'selected' ?> value="LA">Louisiana</option>
<option <?php if ($state == "ME" ) echo 'selected' ?> value="ME">Maine</option>
<option <?php if ($state == "MD" ) echo 'selected' ?> value="MD">Maryland</option>
<option <?php if ($state == "MA" ) echo 'selected' ?> value="MA">Massachusetts</option>
<option <?php if ($state == "MI" ) echo 'selected' ?> value="MI">Michigan</option>
<option <?php if ($state == "MN" ) echo 'selected' ?> value="MN">Minnesota</option>
<option <?php if ($state == "MS" ) echo 'selected' ?> value="MS">Mississippi</option>
<option <?php if ($state == "MO" ) echo 'selected' ?> value="MO">Missouri</option>
<option <?php if ($state == "MT" ) echo 'selected' ?> value="MT">Montana</option>
<option <?php if ($state == "NE" ) echo 'selected' ?> value="NE">Nebraska</option>
<option <?php if ($state == "NV" ) echo 'selected' ?> value="NV">Nevada</option>
<option <?php if ($state == "NH" ) echo 'selected' ?> value="NH">New Hampshire</option>
<option <?php if ($state == "NJ" ) echo 'selected' ?> value="NJ">New Jersey</option>
<option <?php if ($state == "NM" ) echo 'selected' ?> value="NM">New Mexico</option>
<option <?php if ($state == "NY" ) echo 'selected' ?> value="NY">New York</option>
<option <?php if ($state == "NC" ) echo 'selected' ?> value="NC">North Carolina</option>
<option <?php if ($state == "ND" ) echo 'selected' ?> value="ND">North Dakota</option>
<option <?php if ($state == "OH" ) echo 'selected' ?> value="OH">Ohio</option>
<option <?php if ($state == "OK" ) echo 'selected' ?> value="OK">Oklahoma</option>
<option <?php if ($state == "OR" ) echo 'selected' ?> value="OR">Oregon</option>
<option <?php if ($state == "PA" ) echo 'selected' ?> value="PA">Pennsylvania</option>
<option <?php if ($state == "RI" ) echo 'selected' ?> value="RI">Rhode Island</option>
<option <?php if ($state == "SC" ) echo 'selected' ?> value="SC">South Carolina</option>
<option <?php if ($state == "SD" ) echo 'selected' ?> value="SD">South Dakota</option>
<option <?php if ($state == "TN" ) echo 'selected' ?> value="TN">Tennessee</option>
<option <?php if ($state == "TX" ) echo 'selected' ?> value="TX">Texas</option>
<option <?php if ($state == "UT" ) echo 'selected' ?> value="UT">Utah</option>
<option <?php if ($state == "VT" ) echo 'selected' ?> value="VT">Vermont</option>
<option <?php if ($state == "VA" ) echo 'selected' ?> value="VA">Virginia</option>
<option <?php if ($state == "WA" ) echo 'selected' ?> value="WA">Washington</option>
<option <?php if ($state == "WV" ) echo 'selected' ?> value="WV">West Virginia</option>
<option <?php if ($state == "WI" ) echo 'selected' ?> value="WI">Wisconsin</option>
<option <?php if ($state == "WY" ) echo 'selected' ?> value="WY">Wyoming</option>
</select>
<span class="error">* <?php echo $stateErr;?></span>

<br> <br>
<label for="zip"><b>Zipcode</b></label>
<input type="text" value="<?php echo $zipcode ?>" name="zip" required maxlength=9 minlength=5>
<span class="error">* <?php echo $zipErr;?></span>

<br> <br>
<button type="submit">Complete Profile</button>
</div>

</form><body>