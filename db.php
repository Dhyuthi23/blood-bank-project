<?php
$conn = mysqli_connect("localhost", "root", "", "blood_bank");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>