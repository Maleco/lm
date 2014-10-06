<!doctype html>
<html>
	 <head>
			<title>My experiment</title>
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
			<script src="js/experiment.js"></script>
	 </body>
</html>
