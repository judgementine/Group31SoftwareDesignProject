<?php
session_start();
include_once "dbcon.php";

if(!isset($_SESSION["user_data"])) {
    ?>
    <script>
        alert("You must be logged in to access this page");
        window.location.href="index.html";
    </script>
    <?php
    exit;
}else{
    $user = $_SESSION["user_data"];
    $data = [];
    $user_id = $user['id'];
    $sql = "SELECT quotes.*, users.add1 as add1, users.add2 as add2 from quotes LEFT JOIN users ON users.id = quotes.user_id WHERE quotes.user_id = $user_id";

    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        
        }
    }
}
    
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
     <h1 class="form_title">Fuel Qoute Form</h1>
     <div class="Box">
        <form action="appendTable.php" method="post">
            <div>
                <label > Gallons Requested: </label> <b>
                <input type="number" name="Gallons" id="Gallons" onchange="onChangeNumber(event)" required>
                *required 
            </div> 
            <div>
                Delivery Address: <label id="dispAdd" > </label> <?= $user["add1"].", ".$user["add2"].", ".$user["zipcode"] ?> <b>
            </div>
            <div>
                <label >Delivery Date: </label><b></b>
                <input type="date" name="dDate" id="dDate" required>
            </div>
            <div>
                <label >Suggested Price: $1.82/Gal </label><b></b>
            </div>
            <button class="but" id ="entry" type="submit" >Get Quote</button>
            <div>
                Total Amount: <label id="tot"> </label><b></b>
                <input type="hidden" name="total_price" id="total_price" value="0"/>
            </div>
           
        </form>
        
    </div>
    <div class="bottom_results">
        <h2 class="sub_title">Fuel Quote History</h2><b>
        <table class="table" id="table">
            <thead>
            <tr>
                <th> Gallons </th>
                <th> Address </th>
                <th> Delivery Date </th>
                <th> Price </th>
                <th> Total Amount </th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($data as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['gallons_requested']; ?></td>
                            <td>
                                <?php echo $row['add1']; 
                                if ($row['add2']) {
                                    echo " " . $row['add2'];
                                }
                             ?>
                            </td>
                            <td><?php echo $row['delivery_date']; ?></td>
                            <td>$<?php echo $row['suggested_price']; ?></td>
                            <td>$<?php echo $row['total_price']; ?></td>
                        </tr>
                    <?php

                }
            ?>
            </tbody>
            
        </table>
        
    </div>
</div>
<script src="main.js"></script>
<script> 
    document.getElementById("dispAdd").innerHTML = User.add1;

    function onChangeNumber(event) {
        let target = event.target;

        let value = target.value;
        let real_val = 1.82 * parseInt(value);
        document.getElementById("tot").innerHTML = real_val;
        document.getElementById("total_price").value = real_val;
    }
</script>
</body>
</html>