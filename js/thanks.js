// Experiment instructions
var thank_message = 
"<div id='instructions'><p>Bedankt voor het meedoen aan het experiment.<br> Druk op een toets om terug te keren naar de homepage indien gewenst.</p></div>";

var instruction_block = {
	 type: "text", 
	 text:[thank_message]
};

jsPsych.init({
	 display_element: $('#target'),
	 experiment_structure: [instruction_block],
	 on_finish: function(data) {
			window.location.replace("index.php");
	 }
}
);
