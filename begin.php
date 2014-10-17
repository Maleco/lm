<!doctype html>
<?php
	$id = gmdate("\submdY-His");
	$name = $_POST["name"];
	$native_language = $_POST["native_language"];
	$language_at_5 = $_POST["language_at_5"];
	$grow_up = $_POST["grow_up"];
	$age = $_POST["age"];
	$frisian = $_POST["frisian"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	// $uuid = $_POST["uuid"];
?>
<html>
	 <head>
			<title>l-Maze Experiment</title>
			<!-- Load jQuery -->
			<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
			<!-- Load the jspsych library and plugins -->
			<script src="js/jspsych.js"></script>
			<script src="plugins/jspsych-text.js"></script>
			<script src="plugins/jspsych-categorize.js"></script>
			<link rel="stylesheet" href="css/jspsych.css">
			<link rel="stylesheet" href="css/style.css">
			<meta charset="utf-8">
	 </head>
	 <body>
			<div id='instructions'><p>
				 <h2>Let Op!</h2>
				 Welkom bij het L-Maze experiment.<br>
				 Sluit voor u verder gaat alstublieft zo veel mogelijk programma's.
				 Dit betreft ook andere tabbladen en andere zaken die een internetverbinding nodig
				 hebben.<br>
				 </p>
				 <h2>Instructies</h2>
				 <p>
				 U krijgt zometeen een aantal schermen te zien waarop telkens twee woorden worden
				 getoond. <br>
				 Het is de bedoeling dat u telkens het woord kiest wat volgens u een 
				 goed vervolg is op de vorige gekozen woorden.<br>
				 U loopt dus als het ware woord voor woord door de zinnen heen.
				 </p>
				 <p>
				 Om te kiezen voor het linker woord, drukt u op het pijltje naar links op uw toetsenbord.
				 Om te kiezen voor het rechter woord, drukt u op het pijltje naar rechts op uw toetsenbord.
				 </p>
				 <p>Druk op Ok om het experiment te starten.</p>
			</div>
				<form name="info" method="post" action="experiment.php">
					<input type="hidden" name="name" value="<?php echo $name; ?>">
					<input type="hidden" name="language_at_5" value="<?php echo $language_at_5; ?>">
					<input type="hidden" name="native_language" value="<?php echo $native_language; ?>">
					<input type="hidden" name="grow_up" value="<?php echo $grow_up; ?>">
					<input type="hidden" name="age" value="<?php echo $age; ?>">
					<input type="hidden" name="gender" value="<?php echo $gender; ?>">
					<input type="hidden" name="frisian" value="<?php echo $frisian; ?>">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" class="start" value="Ok"><br><br>
				</form>
	 </body>
</html>
