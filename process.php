<?php
session_start();
include_once "dbcon.php";

if(isset($_POST["get_info"])) {

    $state = '';
    $checkHistory = false;
    $user_data = $_SESSION["user_data"];
    $id = $user_data["id"];
    $sql = "SELECT `state` from `users` WHERE id = $id LIMIT 1";

    $result = $mysqli->query($sql);
    $result  = $result->fetch_assoc();

    if ($result) {
        $state = $result['state'];
    }

    // check history
    $sql = "SELECT * FROM quotes WHERE user_id = $id";



    if($result = $mysqli->query($sql)) {
        if($result->fetch_row()){
            $checkHistory = true;
        }
    }

    $result = [
        'state' => $state,
        'checkHistory' => $checkHistory
    ];

    echo json_encode($result);
    exit;
}

if(isset($_POST["register"]))
{
    //Register user
    $uname = strip_tags($_POST["uname"]);
    $psw = strip_tags($_POST["psw"]);
    $fname = strip_tags($_POST["fname"]);
    $add1 = strip_tags($_POST["add1"]);
    $add2 = strip_tags($_POST["add2"]);
    $city = strip_tags($_POST["city"]);
    $state = strip_tags($_POST["state"]);
    $zipcode = strip_tags($_POST["zipcode"]);


    //Avoid duplicated users
    $sql = "SELECT uname from users WHERE uname = '$uname'";
    if($result = $mysqli->query($sql)) {
        if($result->fetch_row()){
            ?>
                <script>
                    alert("Username already exists");
                    window.location.href="./Register.php";
                </script>
            <?php
            exit;
        }
    }

    //Insert data to database
    $psw = md5($psw);
    $sql  = "INSERT INTO users(uname, psw, fname, add1, add2, city, state, zipcode) VALUES('$uname', '$psw', '$fname', '$add1', '$add2', '$city', '$state', '$zipcode')";
    if($mysqli->query($sql) === TRUE) {
        ?>
        <script>
            alert("Account created successfully, you can now proceed to login.");
            window.location.href="./index.html";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Account created successfully, you can now proceed to login.");
            window.location.href="./index.html";
        </script>
        <?php
    }

}

if(isset($_POST["login"])) {
    $uname = strip_tags($_POST["uname"]);
    $psw = strip_tags($_POST["psw"]);
    $sql = "SELECT * from users WHERE uname = '$uname'";
    $result = $mysqli->query($sql);
    $result  = $result->fetch_assoc();
    if(!empty($result)) {
        
        if(md5($psw) == $result["psw"]) {
            $_SESSION["user_data"] = $result;
            ?>
            <script>
                alert("Loggedin successfully, proceed to get quote");
                window.location.href="./FuelQuoteForm.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Your password is incorrect");
                window.location.href="./index.html";
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert("Your login details are incorrect");
            window.location.href="./index.html";
        </script>
        <?php
    }
}