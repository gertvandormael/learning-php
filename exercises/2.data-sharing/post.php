<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1</title>
</head>
<body>
    <form action="./post.php" method="post">
        <label for="input">Username</label>
        <input type="text" name="username" placeholder="Enter your username">
        <input type="submit" value="Submit!">
    </form>
<?php
if (!empty($_POST)) {
     echo "<div>"."Welcome ".$_POST["username"]."!";
     } 
?>
</body>
</html>