<?php
session_start();
function openConnection() {
    
    $dbhost    = "localhost";
    $dbuser    = "gert";
    $dbpass    = "becode";
    $db        = "becode_genk";

    // $dbhost    = "136.144.221.129";
    // $dbuser    = "genk";
    // $dbpass    = "{)+O^O@iw!].zmjT";
    // $db        = "becode_genk";


    // Try to understand what happens here
    // Config for setting up a new connection 
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn->error);

    // Why we do this here 
    // To open the connection with the database
    return $conn;
}

   // And why would we do this here ? 
   // Closing the connection with the database
function closeConnection($conn) {
    $conn->close();
}
?>