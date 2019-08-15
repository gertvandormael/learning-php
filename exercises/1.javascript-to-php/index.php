<?php
// Variables
$strings = [
    "Kirito",
    "Erza",
    "Akatsuki",
    "Shiro",
    "Leo",
    "Rundel-Haus-Code",
    "Ken Kaneki",
    "Glenn Radars",
    "Momonga-Sama",
];

$pictures = [
    "https://www.pixelstalk.net/wp-content/uploads/2016/08/HD-PC-Wallpaper-2016.jpg",
    "https://wallpaperaccess.com/full/190815.jpg",
    "https://images7.alphacoders.com/528/528418.jpg",
    "https://wallpaperaccess.com/full/300068.jpg",
    "https://www.hdwallpaper.nu/wp-content/uploads/2016/02/golden-gate_wallpaper_030.jpg"
];

$randIndex = array_rand($pictures);    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Javascript to PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>

    </style>
</head>

<body class="bg-light">
    <header id="header" style="background:url(<?php echo $pictures[$randIndex];
 ?>) center center/cover no-repeat">
        <div class="overlay"></div>
        <div class="overlay-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Welcome to the Javascript - PHP exercise</h1>
                        <p>Read the code of this page, understand it, then convert it to the same functionality in PHP!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="exercises">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="loop-while" class="my-4 p-4 bg-white shadow-sm border">
                        <ul>

                            <?php 
                        // $trackerArray = array_slice($strings, 1);
                        // print_r($trackerArray);
                        // echo count(($strings));
                        // while (count($strings) > 0) {
                        //     $randString = $strings[$randIndex];
                        //     echo "<li>", $randString, "</li>";

                        //     if (array_diff(array $strings, array $trackerArray) == true){
                        //     unset($pictures[$randString]);
                        //     }
                        // }
                        
                        ?>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div id="username-generator" class="my-4 p-4 bg-white shadow-sm border">
<?php 
    function addRandomColorSpan() {
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);
        return "<span style='color: rgb($r,$g,$b)'>";
    }
    
    $nameTest = "Selene Nijst - Rafael Lambelin";
    $nameColor = str_split($nameTest);

    for ($i = 0; $i < count($nameColor); $i++) {
        if (rand(0,100) > 50) {
            echo addRandomColorSpan() . strtoupper($nameColor[$i] . "</span>");
        } else {
            echo "<span>" . $nameColor[$i];
        }
    };


?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>