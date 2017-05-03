<?php

$con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "be954dc6f4467b", "97f55988", "heroku_87b56baa66812bc");

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>