<?php
include "connection.php";

$conn = openConnectionLocal();
// $conn = openConnectionServer();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["username"])) {
    echo "username: " . $_SESSION["username"];
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
<input type="submit" name="logout" value="logout">
<table>
<tr>
<th>first name</th>
<th>last name</th>
<th>email</th>
<th>preferred language</th>
<th>avatar</th>

<?php
$sql = "SELECT first_name, last_name, email, preferred_language, avatar  FROM hopper_2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

// output data of each row
while($row = $result->fetch_assoc()) {
    $link = $row["first_name"];
    echo "<tr><td>" . "<a href='profile.php?username=$link'>" . $row["first_name"] . "</a>" . "</td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["preferred_language"] . "</td><td>" . $row["avatar"] . "</td></tr>";
    $_SESSION["test"] = $row["first_name"];
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();


?>

</body>
</html>