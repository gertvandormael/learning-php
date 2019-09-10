<?php
include "connection.php";

$conn = openConnection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["username"])) {
    echo "username: " . $_SESSION["username"];
} else {
    header("location: ./login.php");
    // $_SESSION["error_index"] = "Please login before viewing index";
}

if (isset($_POST["logout"])) {
    unset($_SESSION["username"]);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <a href=""></a>
</head>
<body>
    <form action="">
        <input type="submit" name="logout" value="logout">
    </form>
    <table>
        <tr>
            <th>username</th>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>preferred language</th>
            <th>avatar</th>
            <?php
            $sql = "SELECT * FROM hopper_2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $link = $row["username"];
                    echo "<tr><td>" . "<a href='profile.php?username=$link'>" . $row["username"] . "</a></td>".
                    "<td>" . $row["first_name"] . "</td>".
                    "<td>" . $row["last_name"] . "</td>".
                    "<td>" . $row["email"] . "</td>".
                    "<td>" . $row["preferred_language"] . "</td>".
                    "<td>" . $row["avatar"] . "</td></tr>";
                }
                echo "</table>";
            } else { echo "0 results"; }
            $conn->close();
            ?>
</body>
</html>