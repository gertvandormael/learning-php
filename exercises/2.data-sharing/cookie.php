<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 3</title>
</head>
<body>
    <form action="" method="GET" onsubmit="setCookieJoke()">
        <textarea name="joke" id="joke" cols="30" rows="2"></textarea>
        <input type="submit" value="Tell your joke"> 
    </form>
    <?php
    if (!empty($_COOKIE["joke"])) {
        echo "<p>".$_COOKIE["joke"]."</p>";
    }
    ?>
</body>
<script>
    function setCookieJoke() {
        document.cookie = "joke=" + document.getElementById("joke").value;
    }
</script>
</html>