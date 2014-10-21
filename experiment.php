<!doctype html>
<?php
	 $name = $_POST["name"];
	 $native_language = $_POST["native_language"];
	 $language_at_5 = $_POST["language_at_5"];
	 $grow_up = $_POST["grow_up"];
	 $gender = $_POST["gender"];
	 $age = $_POST["age"];
	 $email = $_POST["email"];
?>
<html>
	 <head>
			<title>Language Modelling Experiment 1 (2015)</title>
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
			<div id="count-target" style="display: none;">
			<?php
				 // integer starts at 0 before counting
				 $i = 0; 
				 $dir = './results/';
				 if ($handle = opendir($dir)) {
						while (($file = readdir($handle)) !== false){
							 if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
							 $i++;
						}
				 }
				 echo htmlspecialchars($i);
			?>
			</div>
			<div style="display: none;" id="user-data-name">		<?php echo htmlspecialchars($name); ?></div>
			<div style="display: none;" id="user-data-natlang">	<?php echo htmlspecialchars($native_language); ?></div>
			<div style="display: none;" id="user-data-lang5">		<?php echo htmlspecialchars($language_at_5); ?></div>
			<div style="display: none;" id="user-data-growup">	<?php echo htmlspecialchars($grow_up); ?></div>
			<div style="display: none;" id="user-data-gender">	<?php echo htmlspecialchars($gender); ?></div>
			<div style="display: none;" id="user-data-age">			<?php echo htmlspecialchars($age); ?></div>
			<div style="display: none;" id="user-data-email">		<?php echo htmlspecialchars($email); ?></div>

			<div id="jspsych_target"></div>
			<script src="js/experiment.js"></script>
	 </body>
</html>
