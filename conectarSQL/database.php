<?php
$servername = "y6aj3qju8efqj0w1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "oa7wrq5e1ellsws1";
$password = "whwr5q1ob85q16mn";
$bd = "j72gu9u10tpyqllw";

$conn = new mysqli($servername, $username, $password, $bd);

if($conn -> connect_error){
    die("Fallo en internet: ". $conn -> connect_error);
}
?>