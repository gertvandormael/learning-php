<?php
    include "auth.php";    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register user</title>
</head>
<body>
<?php $link = $row["first_name"]; ?>

    <form action="" method="post">
        <input type="text" name="first_name" placeholder="first name" value="<?php echo $first_name_input ?>"><br>
        <input type="text" name="last_name" placeholder="last name" value="<?php echo $last_name_input ?>"><br>
        <input type="text" name="username" placeholder="username" value="<?php echo $username_input ?>" ><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="password" name="password_confirm" placeholder="confirm password"><br>
        <input type="text" name="linkedin" placeholder="linkedin"value="<?php echo $linkedin_input ?>"><br>
        <input type="text" name="github" placeholder="github" value="<?php echo $github_input ?>"><br>
        <input type="text" name="email" placeholder="email" value="<?php echo $email_input ?>"><br>
        <input type="text" name="preferred_language" placeholder="language" value="<?php echo $preferred_language_input ?>"><br>
        <input type="text" name="avatar" placeholder="avatar" vvalue="<?php $avatar_input ?>"><br>
        <input type="text" name="video" placeholder="video" value="<?php echo $video_input ?>"><br>
        <input type="text" name="quote" placeholder="quote" value="<?php echo $quote ?>"><br>
        <input type="text" name="quote_author" placeholder="quote author" value="<?php echo $quote_author_input ?>"><br>
        <input type="submit" name="submit" value="register">
        <p>Already registered? <a href="login.php">login here</a></p>
    </form>
</body>
</html>