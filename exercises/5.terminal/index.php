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
        <div id="history">
            <ul>
                <?php
                    if (isset($_POST["command"])) {
                        $terminal->terminalHistory();
                        $terminal->executeCommand();
                    }
                ?>
                <form action="" method="post">
                    <div class="command">
                        <div>
                            <?php
                                echo $terminal->infoComputer . $_SESSION["infoDirectory"];
                            ?>
                        </div>
                        <input type="text" name="command" id="command" autocomplete="off" autofocus>
                    </div>
                </form>
            </ul>
        </div>
    </div>

    <script>
        document.body.onload = function () {
            let history = document.getElementById('history');
            history.scrollTop = history.scrollHeight;
        };
        document.addEventListener("click", function () {
            document.getElementById("command").focus();
        });
    </script>
</body>

</html>