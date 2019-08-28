<?php
include "terminal.php";
$terminal = new Terminal();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./main.css">
    <title>Terminal</title>
</head>

<body>
    <div class="terminal">
        <div class="history">
            <ul>
                <?php
                    if (isset($_POST["command"])) {
                        $terminal->terminalHistory();
                        $terminal->executeCommand();

                    }
                ?>
            </ul>
        </div>
        <div class="command">
            <form action="" method="post">
                <input type="text" name="command" autocomplete="off">
            </form>
        </div>
    </div>
</body>

</html>