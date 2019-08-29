<?php
    class Terminal {
        public $commandArray = ["cd", "ls"];
        public $responseArray = [
            "cd" => "change directory",
            "ls" => "show list of all files and directories", 
        ];
        public $info = "<span class='green'> gert@gert-HP-EliteBook-840-G1</span>:<span class='blue'>~</span>$ ";

        function executeCommand() {
            if (in_array($_POST["command"], $this->commandArray)) {
                $commandAndResponse = $this->info.$_POST["command"]."<br>".$this->responseArray[$_POST["command"]];
            } else if ($_POST["command"] == "help") {
                echo "<li>"."available commands: ";
                foreach($this->commandArray as $key => $value) {
                    echo $value." ";
                }
                echo "</li>";
            } else if ($_POST["command"] == "clear") {
                $this->clearTerminalHistory();
            } else {
                $commandAndResponse = $this->info.$_POST["command"].": command not found";
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
        
        function setHistoryCookie() {
        }

        function terminalHistory() {
            if ($_COOKIE["history"] != ""){ 
                foreach(unserialize($_COOKIE["history"]) as $key => $value) {
                    echo "<li>".$value."</li>";
                }
            }
        }

        function clearTerminalHistory() {
            if (isset($_COOKIE["history"])) {
                unset($_COOKIE["history"]);
                setcookie("history", '', time() - 3600, '/');
            }
            header("Refresh:0");
        }
    }
?>