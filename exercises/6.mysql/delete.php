<?php
    include "auth.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Are you sure you want to delete entry: <?php echo $_SESSION["username"] ?>?
    <form action="" method="post"></form>
        <input type="submit" name="confirm_delete" value="delete this entry">
    </form>    
    <form action="index.php" method="post">
        <input type="submit" name="cancel_delete" value="cancel">
    </form>

</body>
</html>