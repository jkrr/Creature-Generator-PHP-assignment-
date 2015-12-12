<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Your Creature</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/uniform.default.css">
</head>
<body>
<div id="holder">
<?php
$name = $_POST["name"];
$creature_type = $_POST["creature_type"];
$creatureSuffix = "";
//Name filter & Story Generation
if (isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["creature_type"]) && $_POST["creature_type"] == "alien") {
	$name = $_POST["name"];
    $creature_type = $_POST["creature_type"];
 	$creatureSuffix = "zilla";
    $name = ucwords(htmlspecialchars(strtolower(strip_tags($name))));
    $creature_story =  "<p>Thanks " . $name . $creatureSuffix . ". Today is " . date("l\, F jS\, Y") . " and it’s been a busy day. But don’t worry! Our scientists have just finished the most awesome experiment humankind has ever witnessed! You've been transformed into an " . $creature_type . "!</p>";
    echo $creature_story;
    //Mail
    $message = "<p>" . $name . $creatureSuffix . " has been generated!</p>";
    mail("eric.chen@senecacollege.com", "Creature Generator", $message); 
} else if ($_POST["name"] && !empty($_POST["name"]) && isset($_POST["creature_type"]) && $_POST["creature_type"] == "robot") {
	$name = $_POST["name"];
    $creature_type = $_POST["creature_type"];
	$name = ucwords(htmlspecialchars(strtolower(strip_tags($name))));
	$creatureSuffix = "bot";
	$creature_story =  "<p>Thanks " . $name . $creatureSuffix . ". Today is " . date("l\, F jS\, Y") . " and it’s been a busy day. But don’t worry! Our scientists have just finished the most awesome experiment humankind has ever witnessed! You've been transformed into a " . $creature_type . "!</p>";
    echo $creature_story;
    //Mail
    $message = "<p>" . $name . $creatureSuffix . " has been generated!</p>";
    mail("eric.chen@senecacollege.com", "Creature Generator", $message); 
} else if (empty($_POST["name"]) || empty($_POST["creature_type"])) {
	header("location: step_one.php");
}
?> 
 <p>When you are ready to see the horrifying results, <button href="#" id="clickme">click here!</button></p>
<div id="results">
<?php  
//Random Creature Image
$ifAlienImage = array("<img src = 'images/aliens/alienone.jpg'>","<img src = 'images/aliens/alientwo.jpg'>","<img src = 'images/aliens/alienthree.jpg'>","<img src = 'images/aliens/alienfour.jpg'>");
$ifRobotImage = array("<img src = 'images/robots/robotone.jpg'>","<img src = 'images/robots/robottwo.png'>","<img src = 'images/robots/robotthree.png'>","<img src = 'images/robots/robotfour.jpg'>");
$random_image = $ifAlienImage[mt_rand(0,3)];
	if (isset($_POST["creature_type"]) && $_POST["creature_type"] == "alien")  {
		$random_image = $ifAlienImage[mt_rand(0, 3)];
		echo "<br>" . $random_image; 
	} else if ($_POST["creature_type"] == "robot") {
		$random_image = $ifRobotImage[mt_rand(0, 3)];
		echo "<br>" . $random_image;
	}
//Random Creature Description
$ifAlien = array("What Galaxy are you from?!", "I want to believe!", "E.T. go home!", "What an ugly alien!");
$ifRobot = array("Do the robot!", "How could you allow me to do this to you?", "Set phasers to stun!", "This is not the droid we were looking for!");
$random_type = $ifAlien[mt_rand(0, 3)];
	if (isset($_POST["creature_type"]) && $_POST["creature_type"] == "alien")  {
		$random_type = $ifAlien[mt_rand(0, 3)];
	} else if ($_POST["creature_type"] == "robot") {
		$random_type = $ifRobot[mt_rand(0, 3)];
	}
	echo "<br>" . $random_type;
?>
</div> <!-- /results -->

</div> <!-- /holder -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/jquery.uniform.min.js"></script>
<script>
//slideDown
$(document).ready(function(){
		
		$("#clickme").click(function() {
        	$("#results").slideDown();
    		});

jQuery("select, input:checkbox, input:radio, input:file, input:text, input:submit, textarea").uniform();
});
</script>
</body>
</html>