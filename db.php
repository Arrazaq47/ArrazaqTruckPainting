<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "truck_painting"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>