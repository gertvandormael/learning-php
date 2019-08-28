<?php
    class Terminal {
        public $commandArray = ["cd", "ls"];
        public $responseArray = [
            "cd" => "change directory",
            "ls" => "show list of all files and directories", 
        ];
        public $commandAndResponse;

        function executeCommand() {
            if (in_array($_POST["command"], $this->commandArray)) {
                $commandAndResponse = "<li>".$_POST["command"].": ".$this->responseArray[$_POST["command"]]."</li>";
            } else if ($_POST["command"] == "help") {
                echo "<li>"."available commands: ";
                foreach($this->commandArray as $key => $value) {
                    echo $value." ";
                }
                echo "</li>";
            } else if ($_POST["command"] == "clear") {
                $this->clearTerminalHistory();
                $commandAndResponse = "";
            } else {
                $commandAndResponse = "<li>".$_POST["command"].": command not found"."</li>";
            }
            echo $commandAndResponse;
            $commandHistory[] = $commandAndResponse;
            // print_r($_SESSION["commandHistory"]);
            setcookie("history", $commandAndResponse);
        }
        
    
        function terminalHistory() {
            if (isset($_COOKIE["history"])){ 
                echo $_COOKIE["history"]; 
            }
        }

        function clearTerminalHistory() {
            unset($_COOKIE["history"]);
            unset($_SESSION["commandHistory"]);  
            header("Refresh:0");      
        }
    
    }
?>