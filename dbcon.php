<?php

//Database connection
$mysqli = new mysqli("localhost:8889", "root", "root", "proj_db");

//Check connection
if($mysqli->connect_errno) {
    echo "Failed to connect to mysql: " . $mysqli->connect_error;
    exit;
}