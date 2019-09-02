<?php
session_start();
    class Terminal {
        public $commandArray = ["cd", "ls", "touch", ""];
        public $responseArray = [
            "cd" => "change directory",
            "ls" => "show list of all files and directories",
            "touch" => "make a new file",
            "" => "",
        ];
        
        public $infoComputer = "<span class='green'> gert@gert-HP-EliteBook-840-G1</span>:";
        
        function executeCommand() {
            // $_SESSION["infoDirectory"] = "<span class='blue'>~</span>$ ";
            if ($_POST["command"] === "help") {
                echo "<li>"."available commands: ";
                foreach ($this->commandArray as $key => $value) {
                    echo $value." ";
                }
                echo "</li>";
            } else if ($_POST["command"] === "clear") {
                $this->clearTerminalHistory();
                $_SESSION["infoDirectory"] = "<span class='blue'>~</span>$ ";
                $commandAndResponse = $this->infoComputer.$_SESSION["infoDirectory"];
            } else if (substr($_POST["command"], 0, 5) === "cd ./") {
                $_SESSION["infoDirectory"] = "<span class='blue'>~" . substr($_POST["command"], 4, strlen($_POST["command"])) . " </span>$";
            } else if (substr($_POST["command"], 0, 5) === "touch") {
                $_SESSION["lsArray"][] = substr($_POST["command"], 5, strlen($_POST["command"]));
                $commandAndResponse = $this->infoComputer.$_SESSION["infoDirectory"].$_POST["command"];
            } else if ($_POST["command"] === "ls") {
                foreach ($_SESSION["lsArray"] as $key => $value) {
                    echo $value;
                }
                $commandAndResponse = $this->infoComputer.$_SESSION["infoDirectory"].$_POST["command"];
            } else if ($_POST["command"] === "cd ..") {
                $_SESSION["infoDirectory"] = "<span class='blue'>~</span>$ ";
                $commandAndResponse = $this->infoComputer.$_SESSION["infoDirectory"];
            } else if (in_array($_POST["command"], $this->commandArray)) {
                $commandAndResponse = $this->infoComputer.$_SESSION["infoDirectory"].$_POST["command"]."<br>".$this->responseArray[$_POST["command"]];
            } else {
                $commandAndResponse = $this->infoComputer.$_SESSION["infoDirectory"].$_POST["command"].": command not found";
            }

            echo "<li>".$commandAndResponse."</li>";
            
            // if the cookie exists, read it and unserialize it
            if(array_key_exists("history", $_COOKIE)) {
                $cookie = $_COOKIE["history"];
                $cookie = unserialize($cookie);
            }
            
            // add the value to the array and serialize
            $cookie[] = $commandAndResponse;
            $cookie = serialize($cookie);
            // save the cookie
            setcookie("history", $cookie, time()+3600);  
        }
        
        function terminalHistory() {
            if ($_COOKIE["history"] != ""){ 
                foreach(unserialize($_COOKIE["history"]) as $key => $value) {
                    echo "<li>".$value."</li>";
                }
            }
        }

        function clearTerminalHistory() {
            header("Refresh:0");
            if (isset($_COOKIE["history"])) {
                unset($_COOKIE["history"]);
                setcookie("history", '', time() - 3600, '/');
            }
        }
    }
?>