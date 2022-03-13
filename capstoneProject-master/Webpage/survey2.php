<?php
session_start();
    
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}

$currentNumber = $_SESSION["Tracker"];
$currentNumber = $_SESSION["Page"][$_SESSION["Tracker"]];
$shuffle = range(1, 10);
    shuffle($shuffle);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="launchpg.css" type="text/css" rel="stylesheet">
    <script src="color_input.js"></script>
</head>
<body id="Launch">
<!--      <ul>
            <li class="firstTab"><a class="active" href="survey.php">Back</a></li>
        </ul> -->
     <h1 id="SecondQ">Below contains a set of 20 frames of the movie ("insert movie here") With the given palettes below, which one gives the best representation of the overall movie?</h1>
    <div id="container" class="contain">
                <form action="Thanks.php" method="post">
                 <div class="grid-container2">
                     <div class="img">
                    <div id="frame1">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[0] ?>;
                            document.getElementById('frame1').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                   <div id="frame2">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[1] ?>;
                            document.getElementById('frame2').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame3">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[2] ?>;
                            document.getElementById('frame3').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame4">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[3] ?>;
                            document.getElementById('frame4').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame5">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[4] ?>;
                            document.getElementById('frame5').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame6">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[5] ?>;
                            document.getElementById('frame6').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame7">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[6] ?>;
                            document.getElementById('frame7').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame8">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[7] ?>;
                            document.getElementById('frame8').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame9">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[8] ?>;
                            document.getElementById('frame9').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div id="frame10">
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[9] ?>;
                            document.getElementById('frame10').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                     </div>
                     <div class="frame11"> <img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[10] ?>;
                            document.getElementsByClassName('frame11').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                   <div class="frame12"><img src="city-image.jpg" alt="img1" style="width:100%">
                       <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[11] ?>;
                            document.getElementsByClassName('frame12').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame13"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[12] ?>;
                            document.getElementsByClassName('frame13').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame14"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[13] ?>;
                            document.getElementsByClassName('frame14').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame15"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[14] ?>;
                            document.getElementsByClassName('frame15').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame16"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[15] ?>;
                            document.getElementsByClassName('frame16').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame17"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[16] ?>;
                            document.getElementsByClassName('frame17').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame18"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[17] ?>;
                            document.getElementsByClassName('frame18').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame19"><img src="city-image.jpg" alt="img1" style="width:100%">
                         <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[18] ?>;
                            document.getElementsByClassName('frame19').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                     <div class="frame20"><img src="city-image.jpg" alt="img1" style="width:100%"><script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            var shuffle = <?php echo $shuffle[19] ?>;
                            document.getElementsByClassName('frame20').innerHTML = '<img src="Color/' + num + '/b/' + shuffle + '.jpg" id="Main-Frame"/>';
                        </script>
                         </div>
                    
<!--                     <div class="grid-container">-->
                       <figure class="KMEANS2"> <a href="Thanks.php"><img src="city-image.jpg" alt="img1" class="grid_img"></a>
                           <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementsByClassName('KMEANS2').innerHTML = '<img src="Color/' + num + '/b/KMeans.png" id="Main-Frame"/>';
                        </script></figure>
                         
                       <figure class="TT102"> <a href="Thanks.php"><img src="city-image.jpg" alt="img1" class="grid_img"></a>
                           <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementsByClassName('TT102').innerHTML = '<img src="Color/' + num + '/b/TT10.png" id="Main-Frame"/>';
                        </script></figure>
                         
                         <figure class="Avg2"><a href="Thanks.php"><img src="city-image.jpg" alt="img1" class="grid_img"></a>
                             <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementsByClassName('Avg2').innerHTML = '<img src="Color/' + num + '/b/Avg2.png" id="Main-Frame"/>';
                        </script></figure>
                    </div>
                    </div>
                  <!--  <script type="text/javascript">
                        if($shuffle[0]%2 == 0){
                            
                        }
                    </script>-->
<!--                      <div class="grid-container">
                       <figure class="KMEANS2">
                        <div id="KMeans"></div>
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementById('KMeans').innerHTML = '<img src="Color/' + num + '/b/KMeans.png" id="Main-Frame"/>';
                        </script>
                         </figure>
                       <figure class="TT10">
                           <div id="TT10"></div>
                        <script type="text/javascript">
                            var num = <?php echo $currentNumber ?>;
                            document.getElementById('TT10').innerHTML = '<img src="Color/' + num + '/b/TT10.png" id="Main-Frame"/>';
                        </script></figure>
                            <div class="options">
                            <button id="checkBtn2" class="optionA"> A </button> -->
<!--                        <span class="checked"></span>-->
<!--                         </div>
                        <div class="options">
                            <button id="checkBtn2" class="optionB"> B </button> -->
<!--                        <span class="checked"></span>-->
<!--                          </div> -->
<!--                      </div> -->
                </form>
    </div>      
</body>
</html>
