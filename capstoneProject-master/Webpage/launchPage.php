<?php
session_start();
    
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}
	
$numbers = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
//$numbers = range(1, 10);
shuffle($numbers);
$_SESSION['Page']=$numbers;
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["Tracker"]= 0;
echo "Session variables are set.";
?>

<!DOCTYPE html>
<html>
<head>
    <title>LaunchPage</title>
    <link href="css/launchpg.css" rel="stylesheet"> <!-- css stylesheet -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section class="section1">
    <div class="main">
        <div class="form">
            <form action="colorInput.php" method="post">
                <div class="inputA">
                    <input type="radio" name="optA"
                           <?php if(isset($optA) && $optA=="A") echo "checked";?>
                        value="optA">A
                    </div>
                <div class="inputB">
                    <input type="radio" name="optB"
                        <?php if(isset($optB) && $optA=="B") echo "checked";?>
                       value="optA">B
                </div>
            </form>
        </div>
    
    </div>
    </section>
</body>



</html>
