<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 2</title>
</head>

<body>
    <form action="./get.php" method="GET">
        <label for="rows">Number of rows in your table</label>
        <input type="number" name="rownumbers">
        <input type="submit" value="Create a table">
    </form>

<?php
    if (!empty($_GET)) {
        drawTable($_GET["rownumbers"], 5);
    }
?>

</body>

</html>

<?php 
    function drawTable($rows, $cols){
        echo "<table border='1'>"; 
        for($tr=1;$tr<=$rows;$tr++){ 
            echo "<tr>"; 
            for($td=1;$td<=$cols;$td++){ 
                echo "<td align='center'>".$tr*$td."</td>"; 
            } 
        echo "</tr>"; 
        } 
        echo "</table>";
    }
?>
