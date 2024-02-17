<?php
//if any connection error trying chaninging localhost to localhost:8080
$conn = mysqli_connect("localhost","root", "", "demo2");

if (!$conn){
    echo "Connection failed";
}

