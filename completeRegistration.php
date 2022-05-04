<?php
echo 'dddddd';
if(isset($_POST))
{
    $uname = strip_tags($_POST["uname"]);
    $psw = strip_tags($_POST["psw"]);
?>
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
    <h1 class="form_title">Complete Profile</h1>
    <form class="Box" id="compForm" action="process.php" method="post">
        <input type="hidden" name="register" value="true" />
    <div>
    <label for="fname"><b>Full name</b></label>
    <input type="text" placeholder="John Green" name="fname" id="fname" required maxlength="50">
        <small id="fname_error"></small>
    <br> <br>

    <input type="hidden" value="<?= $uname ?>" name="uname" />
    <input type="hidden" value="<?= $psw ?>" name="psw" />
    
    <label for="add1"><b>Address1:</b></label>
    <input type="text" placeholder="1342 blank st." name="add1" id="add1" required maxlength="100">
        <small id="add1_error"></small>
    <br> <br>
    <label for="add2"><b>Address2:</b></label>
    <input type="text" placeholder="1342 blank st." name="add2" id="add2" maxlength="100">
        <small id="add2_error"></small>
    <br> <br>
    <label for="city"><b>City:</b></label>
    <input type="text" placeholder="Montgommery" name="city" id="city" required maxlength="100">
        <small id="city_error"></small>
     <label for="States">State:</label>
    <select name="state" id="state">
        <small id="state_error"></small>
    <option value="Al">AL</option>
    <option value="Ak">AK</option>
    <option value="AZ">AZ</option>
    <option value="AR">AS</option>
    <option value="CA">CA</option>
    <option value="CO">CO</option>
    <option value="CT">CT</option>
    <option value="DE">DE</option>
    <option value="FL">FL</option>
    <option value="GA">GA</option>
    <option value="HI">HI</option>
    <option value="ID">ID</option>
    <option value="IL">IL</option>
    <option value="IN">IN</option>
    <option value="IA">IA</option>
    <option value="KS">KS</option>
    <option value="KY">KY</option>
    <option value="LA">LA</option>
    <option value="ME">ME</option>
    <option value="MD">MD</option>
    <option value="MA">MA</option>
    <option value="MI">MI</option>
    <option value="MN">MN</option>
    <option value="MS">MS</option>
    <option value="MO">MO</option>
    <option value="MT">MT</option>
    <option value="NE">NE</option>
    <option value="NV">NV</option>
    <option value="NH">NH</option>
    <option value="NJ">NJ</option>
    <option value="NM">NM</option>
    <option value="NY">NY</option>
    <option value="NC">NC</option>
    <option value="ND">ND</option>
    <option value="OH">OH</option>
    <option value="OK">OK</option>
    <option value="OR">OR</option>
    <option value="PA">PA</option>
    <option value="RI">RI</option>
    <option value="SC">SC</option>
    <option value="SD">SD</option>
    <option value="TN">TN</option>
    <option value="TX">TX</option>
    <option value="UT">UT</option>
    <option value="VT">VT</option>
    <option value="VA">VA</option>
    <option value="WA">WA</option>
    <option value="WV">WV</option>
    <option value="WI">WI</option>
    <option value="WY">WY</option>
    </select>
    
    <br> <br>
    <label for="zipcode"><b>Zipcode:</b></label>
    <input type="text" placeholder="12345" name="zipcode" id="zipcode" required maxlength=9 minlength=5>
    <small id="zipcode_error"></small>
    
    <br> <br>
    <button class="but" type="submit" id="comp"> Complete Profile </button>
    </div>
    
    </form>
</div>
<script>
// const compF = document.getElementById('compForm')
// compF.addEventListener('submit', (e) => {
//     e.preventDefault();
//     compp();
// })
</script>
    <script src="main.js"> 
    </script>
</body>
</html>

    <?php
}else{
    ?>
    <script>
        alert("You can't access this page without filling the registration form");
        window.location.href="./Register.php";
    </script>
    <?php
}