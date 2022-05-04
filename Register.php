<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div>
    <h2 class="form_title">Create A New Account</h2> <b></b>
   
<form id="RegForm"  action="./completeRegistration.php" method="post">
<div class="Box">
<label for="uname"><b>Enter Username</b></label>
<input type="text" placeholder="Enter Username" name="uname" id="uname" required>
<small id="uname_error"></small>

<br><br>

<label for="psw"><b>Enter Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" id="psw" required>
<small id="psw_error"></small>
<br>
<button class="but"  type="submit"> Register</button>
<label>
</label>
</div>
</div>

</form>
<script src="main.js"> 
</script>
</body>
</html>