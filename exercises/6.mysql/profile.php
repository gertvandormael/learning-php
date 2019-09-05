<?php
include "connection.php";

// Create connection
$conn = openConnectionLocal();
// $conn = openConnectionServer();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile page</title>
</head>
<body>

<?php

$link=$_GET["username"];
$sql = "SELECT * FROM hopper_2 WHERE username='$link'";
$result = $conn->query($sql);

while($row = $result->fetch_array()) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $linkedin = $row["linkedin"];
    $github = $row["github"];
    $preferred_language = $row["preferred_language"];
    $avatar = $row["avatar"];
    $video = $row["video"];
    $password = $row["password"];
}
?>

<div class="profile">
    first name: <?php echo $first_name?> <br>
    last name: <?php echo $last_name?> <br>
    linkedin: <?php echo $linkedin?> <br>
    github: <?php echo $github?> <br>
    language: <?php echo $preferred_language?>
    <?php 
    $lang = strtolower($preferred_language);
        if ($lang == "nl") {
            echo "<img src='./$lang.svg' height='10px' width='10px'></img><br>";
        }
    ?>
    
    avatar: <img src="<?php echo $avatar ?>" height="50px" width="50px" alt="avatar"> <br>
    video: <?php echo $video ?>
    <img src="https://belikebill.ga/billgen-API.php?default=1&name=<?php echo $first_name ?>&sex=f" /> 

</div>

</body>
</html>