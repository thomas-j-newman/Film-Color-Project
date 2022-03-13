<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo "This is the size of the array";
echo count($_SESSION["Page"]);
    echo "<br>";

$arrlength = count($_SESSION["Page"]);
echo "These are the values randomized:";
for($x = 0; $x < $arrlength; $x++) {
    echo $_SESSION["Page"][$x];
    echo "<br>";
}
   echo "This is the the zeroeth position in the array"; 
echo $_SESSION["Page"][0];
        echo "<br>";
    echo "This is the Trackers initial value";
    echo $_SESSION["Tracker"];
        echo "<br>";
    echo "This is using the trackers value to reference an array position";
    echo $_SESSION["Page"][$_SESSION["Tracker"]];
    
    echo "<br>";
    echo "This is getTrack storing the tracker value in a new variable";
    $getTrack = $_SESSION["Tracker"];
    echo $getTrack;
    echo "<br>";
    echo "This is getTrack +1";
    $getTrack = $getTrack +1;
    echo $getTrack;
    echo "<br>";
    echo "This is what happens when adding Tracker to getTrack: ";
    $_SESSION["Tracker"] =  $getTrack;
    echo $_SESSION["Tracker"];
    if ($getTrack < 9){
        echo "<br>";
        echo "get track is equal to ";
        echo $getTrack;
    }
    else{
        echo "failed to echo getTrack";
    }
    //$TrackerNum = $_SESSION["Tracker"];
    //echo $TrackerNum;
    $shuffle = $_SESSION["Page"];
    echo"<br>";
    echo $shuffle[0];
    $numbers = range(1, 10);
    shuffle($numbers);
    echo"<br>";
    echo $numbers[0];
    echo"<br>";
    echo $numbers[1];
    

?>

</body>
</html>