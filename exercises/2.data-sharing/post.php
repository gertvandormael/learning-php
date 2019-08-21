<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }
    </style>
</head>
<body>
    <form action="./transfer.php" method="post" enctype="multipart/form-data">
        <label for="input">username</label>
        <input type="text" name="username" placeholder="Enter your username">
        <label for="input">name</label>
        <input type="text" name="firstName" placeholder="Enter your name">
        <label for="input">family name</label>
        <input type="text" name="lastName" placeholder="Enter your family name">
        <label for="input">date of birth</label>
        <input type="date" name="birthDate" placeholder="Enter your date of birth">
        <label for="input">email</label>
        <input type="email" name="email" placeholder="Enter your email">
        <input type="file" name="fileToUpload" id="fileToUpload">  
        <input type="submit" name="upload" value="Submit!">
    </form>

    <br>
<?php
// if (!empty($_POST)) {
//      echo "<div>"."Welcome ".$_POST["username"]."!";
//      } 

?>
</body>
</html>
