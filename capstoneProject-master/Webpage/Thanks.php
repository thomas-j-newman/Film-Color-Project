<?php
session_start();
    
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}

$getTrack = $_SESSION["Tracker"];
$getTrack = $getTrack +1;

if($getTrack < 20){
    $_SESSION["Tracker"] =  $getTrack;
    header('location:../survey.php');
}
	
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
        <h1 class="thanks"> Thank you for taking the survey! </h1>
    </body>
</html>
