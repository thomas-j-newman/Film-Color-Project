<?php
session_start();
    
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}

$currentNumber = $_SESSION["Tracker"];
$currentNumber = $_SESSION["Page"][$_SESSION["Tracker"]];
?>

<!DOCTYPE html>
<html>
<head>
    <link href="launchpg.css" type="text/css" rel="stylesheet">
     <script src="color_input.js"></script>
</head>
<body id="Launch">

<div id="container" class="contain">
       <h1 id="FirstQ">Below is a frame from ("insert movie title"). Which color palette from the 3 choices below gives the best represents of the colors in the given image?</h1>
    
<!--            <div class="form"> -->
                <form action="survey2.php" method="post">
                    <div class="grid-container"> <!-- grid for the pictures -->
                    <figure class="Main-Frame">
                        <div id="Main-Frame"></div>
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementById('Main-Frame').innerHTML = '<img src="Color/' + num + '/a/Frame.tiff" id="Main-Frame"/>';
                        </script>
                        </figure>
                    <figure class="KMEANS">
                        <div id="KMeans"></div>
                        <a href="survey2.php"><img src="city-image.jpg" id="checkImg" class="grid_img" alt="Kmeans"></a>
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementById('KMeans').innerHTML = '<img src="Color/' + num + '/a/KMeans.png" id="Main-Frame"/>';
                        </script>
                        </figure>
                    <figure class="TT10">
                        <div id="TT10"></div>
                        <a href="survey2.php"><img src="city-image.jpg" id="checkImg" class="grid_img" alt="TT10_img"></a> 
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementById('TT10').innerHTML = '<img src="Color/' + num + '/a/TT10.png" id="Main-Frame"/>';
                        </script>
                        </figure>
                    <figure class="Avg">
                        <div id="Avg"></div>
                        <a href="survey2.php"><img src="city-image.jpg" id="checkImg" class="grid_img" alt="Avg_img"></a>
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementById('Avg').innerHTML = '<img src="Color/' + num + '/a/Avg.png" id="Main-Frame"/>';
                        </script>
                        </figure>
                    </div>
                    <label class="options"> <!-- buttons for choice A or B -->
                        <button id="checkBtn" class="optionA"> A </button>
<!--                        <span class="checked"></span>-->
                    </label>
                    <label class="options">
                        <button id="checkBtn" class="optionB"> B </button>
<!--                        <span class="checked"></span>-->
                    </label>
                </form>
<!--            </div>-->
            </div>
            
</body>
</html>
