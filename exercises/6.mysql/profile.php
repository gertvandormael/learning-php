<?php
include "connection.php";
$conn = openConnectionLocal();
$link=$_GET["username"];
$sql = "SELECT * FROM hopper_2 WHERE username='$link'";
$result = $conn->query($sql);

while($row = $result->fetch_array()) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $username = $row["username"];
    $linkedin = $row["linkedin"];
    $github = $row["github"];
    $preferred_language = $row["preferred_language"];
    $avatar = $row["avatar"];
    $video = $row["video"];
    $password = $row["password"];
}

if ($_SESSION["username"] == $username) {
    echo "you can edit";
    echo "<form action='' method='post'>";
    echo "<input type='submit' name='delete' value='delete'>";
    echo "<input type='submit' name='edit' value='edit'>";
    echo "</form>";
    
} else {
    echo "you can't edit";
}

if (isset($_POST["delete"])) {
    echo "delete";
    $sql_delete = "DELETE FROM hopper_2 WHERE username='$username'";
    $conn->query($sql_delete);
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
        <img src="https://belikebill.ga/billgen-API.php?default=1&name=<?php echo $first_name ?>&sex=f">
    </div>
</body>
</html>