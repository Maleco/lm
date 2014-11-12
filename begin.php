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
			<title>Language Modelling Experiment 1 (2015)</title>
			<!-- Load jQuery -->
			<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
			<!-- Load the jspsych library and plugins -->
			<script src="js/jspsych.js"></script>
			<script src="plugins/jspsych-text.js"></script>
			<script src="plugins/jspsych-survey-text.js"></script>
			<script src="plugins/jspsych-categorize.js"></script>
			<link rel="stylesheet" href="css/jspsych.css">
			<link rel="stylesheet" href="css/style.css">
			<meta charset="utf-8">
	 </head>
	 <body>
			<div class="content">
				 <h2>Let Op!</h2>
				 <p>
				 Welkom bij het L-Maze experiment.<br>
				 Sluit voor u verder gaat alstublieft zo veel mogelijk programma's.
				 Dit betreft ook andere tabbladen en andere zaken die een internetverbinding nodig
				 hebben.<br>
				 <br> 
				 Let op, een <b>fysiek toetsenbord</b> is vereist, 
				 dus dit experiment kan <b>Niet op een smartphone/tablet/o.i.d.</b>
				 zonder fysiek toetsenbord worden uitgevoerd.
				 </p>
				 <h2>Instructies</h2>
				 <p>
				 U krijgt zometeen een aantal schermen te zien waarop telkens twee woorden worden
				 getoond. <br>
				 Het is de bedoeling dat u telkens het woord kiest wat volgens u een 
				 goed vervolg is op de vorige gekozen woorden.<br>
				 U loopt dus als het ware woord voor woord door de zinnen heen.<br>
				 Aan het eind van de zin zal u een vraag worden gesteld over het gebruikte voornaamwoord
				 in de zin.
				 </p>
				 <h2>Besturing</h2>
				 <p>
				 Om te kiezen voor het <b>linker</b> woord, 
				 drukt u op het <b>pijltje naar links</b> op uw toetsenbord.<br>
				 Om te kiezen voor het <b>rechter</b> woord, 
				 drukt u op het <b>pijltje naar rechts</b> op uw toetsenbord.
				 </p>
				 <p>
				 Probeer zo snel mogelijk te antwoorden, maar <b>zonder fouten te maken</b>
				 </p>
				 <h2>Pauzes</h2>
				 <p>
				 Het is mogelijk om een korte pauze in te lassen, maar de pagina mag niet gesloten worden.
				 Probeer ook om de huidige zin af te maken, 
				 u kunt het scherm open laten staan op de melding die tussen de zinnen word gegeven.
				 </p>
				 <p>Druk op Ok om het experiment te starten.</p>
				 <form name="info" method="post" action="experiment.php">
					<input type="hidden" name="name" value="<?php echo $name; ?>">
					<input type="hidden" name="native_language" value="<?php echo $native_language; ?>">
					<input type="hidden" name="language_at_5" value="<?php echo $language_at_5; ?>">
					<input type="hidden" name="grow_up" value="<?php echo $grow_up; ?>">
					<input type="hidden" name="gender" value="<?php echo $gender; ?>">
					<input type="hidden" name="age" value="<?php echo $age; ?>">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<input type="submit" class="start" value="Ok"><br><br>
				</form>
		 </div>
	 </body>
</html>
