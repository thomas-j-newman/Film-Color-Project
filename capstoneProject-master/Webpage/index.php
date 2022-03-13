<?php
session_start();
//start the session	
$numbers = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
//$numbers = range(1, 10);
shuffle($numbers);
$_SESSION['Page']=$numbers;
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["Tracker"]= 0;
//echo "Session variables are set.";
	
?>

<!DOCTYPE html>
<html>
<head>
    <title>LaunchPage</title>
    <link href="launchpg.css" rel="stylesheet" type="text/css"> <!-- css stylesheet --> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="color_input.js"></script>
</head>
    <body id="Launch">
        <form action="survey.php" method="post">
            <div class="takeQuiz">
            </div>
            <div class="submit">
                <button id="mainBtn" class="takeBtn">Take Survey</button>
            </div>
            </form>

    </body>
</html>
