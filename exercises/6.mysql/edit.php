<?php
include "auth.php";
$link = $_GET["username"];
$sql = "SELECT * FROM hopper_2 WHERE username='$link'";
$result = $conn->query($sql);
$row = $result->fetch_array();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit your profile</title>
    <style>
        .edit-form {
            display: flex;
            flex-direction: column;
            width: 500px;
        }

        .edit-button {
            align-self: center;
            width: 200px;
        }
    </style>
</head>
<body>

<form action="" method="post" class="edit-form" >
        <label for="first_name">first name</label>
        <input type="text" name="first_name" placeholder="first name" value="<?php echo $row["first_name"] ?>"><br>
        <label for="last°name">last name</label>
        <input type="text" name="last_name" placeholder="last name" value="<?php echo $row["last_name"] ?>"><br>
        <label for="">linkedin</label>
        <input type="text" name="linkedin" placeholder="linkedin"value="<?php echo $row["linkedin"] ?>"><br>
        <label for="">github</label>
        <input type="text" name="github" placeholder="github" value="<?php echo $row["github"] ?>"><br>
        <label for="">email</label>
        <input type="text" name="email" placeholder="email" value="<?php echo $row["email"] ?>"><br>
        <label for="">preferred language</label>
        <input type="text" name="preferred_language" placeholder="language" value="<?php echo $row["preferred_language"] ?>"><br>
        <label for="">avatar</label>
        <input type="text" name="avatar" placeholder="avatar" value="<?php echo $row["avatar"] ?>"><br>
        <label for="">video</label>
        <input type="text" name="video" placeholder="video" value="<?php echo $row["video"] ?>"><br>
        <label for="">favourite quote</label>
        <input type="text" name="quote" placeholder="quote" value="<?php echo $row["quote"] ?>"><br>
        <label for="">quote author</label>
        <input type="text" name="quote_author" placeholder="quote author" value="<?php echo $row["quote_author"] ?>"><br>
        Enter your login credentials to edit
        <label for="">username</label>
        <input type="text" name="username" placeholder="username" required>
        <label for="">password</label>
        <input type="text" name="password" placeholder="password" required>
        <input type="submit" name="edit_confirm" value="edit this entry" class="edit-button">
    </form>

    <?php 
        if (isset($_POST["edit_confirm"])) {
            $username_login = $conn->real_escape_string($username_input);
            $password_login = $conn->real_escape_string($password_input);
            $password_login = md5($password_login);
            $sql_login = "SELECT * FROM hopper_2 WHERE username='$username_login' AND password='$password_login'";
            $result_login = $conn->query($sql_login);
            if (mysqli_num_rows($result_login) == 1 || $_SESSION["username"] == $row["username"]) {
                echo "you can edit";
                $sql_edit = "UPDATE hopper_2 SET first_name='$first_name_input', last_name='$last_name_input', linkedin='$linkedin_input', github='$github_input', email='$email_input', preferred_language='$preferred_language_input', avatar='$avatar_input', video='$video_input', quote='$quote_input', quote_author='$quote_author_input' WHERE username='$link'";
                $conn->query($sql_edit);
                header("location: ./index.php");
            } else {
                echo "your login information is incorrect";
            }
        }
    ?>

</body>
</html>