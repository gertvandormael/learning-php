<?php
include "connection.php";
$conn = openConnectionLocal();
$sql = $sql = "SELECT * FROM hopper_2";
$result = $conn->query($sql);

while($row = $result->fetch_array()) {
    $username = $row["username"];
    $password = $row["password"];
    $email = $row["email"];
}

$first_name_input = $_POST["first_name"];
$last_name_input = $_POST["last_name"];
$username_input = $_POST["username"];
$password_input = $_POST["password"];
$password_confirm_input = $_POST["password_confirm"];
$password_encrypt = md5($password_input);
$linkedin_input = $_POST["linkedin"];
$github_input = $_POST["github"];
$email_input = $_POST["email"];
$preferred_language_input = $_POST["preferred_language"];
$avatar_input = $_POST["avatar"];
$video_input = $_POST["video"];
$quote_input = $_POST["quote"];
$quote_author_input = $_POST["quote_author"];

// Registration checks
if (isset($_POST["submit"])) {
    $username_reg = $conn->real_escape_string($username_input);
    // $password_reg = $conn->real_escape_string($password_input);

    if ($password_input !== $password_confirm_input) {
        $error_reg [] = "password doesn't match";
    } 

    if (empty($password_input)) {
        $error_reg [] = "password is required";
    }

    if (empty($username_input)) {
        $error_reg [] = "username is required";
    } 

    if (!filter_var($email_input, FILTER_VALIDATE_EMAIL)) {
        $error_reg [] = "invalid email";
    }

    $sqlUser = "SELECT * FROM hopper_2 WHERE username='$username_reg'";
    $resultUser = $conn->query($sqlUser);
    $user_reg = mysqli_fetch_assoc($resultUser);

    if ($user) {
        if ($resultUser["username"] == $username_input) {
            $error_reg [] = "user already exists";
        }    
    }

    if (count($error_reg) == 0) {
        $sql = "INSERT INTO hopper_2 (first_name, last_name, username, password, linkedin, github, email, preferred_language, avatar, video, quote, quote_author) 
        VALUES ('$first_name_input', '$last_name_input', '$username_input', '$password_encrypt', '$linkedin_input', '$github_input', '$email_input', '$preferred_language_input', '$avatar_input', '$video_input', '$quote_input', '$quote_author_input')";
        if (mysqli_query($conn, $sql)) {
            // echo "New record created successfully";
            header("Location: ./profile.php?username=".$username_input);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
     } else {
         print_r($error_reg);
    }
}

// Login checks
if (isset($_POST["login"])) {
    $username_login = $conn->real_escape_string($username_input);
    $password_login = $conn->real_escape_string($password_input);
    if (empty($username_input)) {
        $error_login [] = "username is required";
    }

    if (empty($password_input)) {
        $error_login [] = "password is required";
    }

    if (count($error_login) == 0) {
        $password_login = md5($password_login);
        $sql_login = "SELECT * FROM hopper_2 WHERE username='$username_login' AND password='$password_login'";
        $result_login = $conn->query($sql_login);
        print_r($result_login);
        if (mysqli_num_rows($result_login) == 1) {
            echo "you exist";
            $_SESSION["username"] = $username_login;
            $_SESSION["success"] = "You are now logged in";
            header("Location: index.php");
        } else {
            echo "you don't exist";
        }
    } else {
        print_r($error_login);
    }
}


?>