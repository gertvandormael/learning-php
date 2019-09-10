<?php
include "connection.php";
$conn = openConnection();
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
    echo "<form action='' method='post'>".
    "<input type='submit' name='delete' value='delete'>".
    "</form>".
    "<form action='edit.php?username=$username' method='post'>".
    "<input type='submit' name='edit' value='edit'>".
    "</form>";
} else {
    echo "you can't edit";
}

if (isset($_POST["delete"])) {
    echo "<form action='' method='post'>".
    "<div>Enter your login credentials to delete</div>".
    "<label for=''>username</label>".
    "<input type='text' name='username' placeholder='username' required><br>".
    "<label for=''>password</label>".
    "<input type='text' name='password' placeholder='password' required><br>".
    "<input type='submit' name='confirm_delete' value='delete'>".
    "</form>";
}

if (isset($_POST["confirm_delete"])) {
    $username_login = $conn->real_escape_string($_POST["username"]);
    $password_login = $conn->real_escape_string($_POST["password"]);
    $password_login = md5($password_login);
    $sql_login = "SELECT * FROM hopper_2 WHERE username='$username_login' AND password='$password_login'";
    $result_login = $conn->query($sql_login);
    if (mysqli_num_rows($result_login) == 1) {
        $sql_delete = "DELETE FROM hopper_2 WHERE username='$username'";
        $conn->query($sql_delete);
        header("location: ./register.php");
    } else {
        echo "your login information is incorrect, try again";
    }
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