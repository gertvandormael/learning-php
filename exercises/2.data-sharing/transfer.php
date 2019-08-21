<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = explode("@", $_POST["email"]);
$birthDate = date_create($_POST["birthDate"]);
$tenYearsOlder = date_modify($birthDate, "-10 year");

$picture = $_POST["picture"];

echo $_FILES[0];


$uploaddir = './uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User info</title>
</head>
<body>
    <div class="info">
        <?php
            echo "<div>".$firstName.
            "</div>"."<div>".$lastName.
            "</div>".date_format($tenYearsOlder, "d-m-Y")."</div>".
            "<div>".$email[0]."</div>";
        ?>
        
    </div>
    <img src=<?php $_POST["picture"] ?> alt="">
    
</body>
</html>
