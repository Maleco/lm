// Experiment instructions
var thank_message = 
"<div id='instructions'><p>Thanks for contributing to ourL-Maze Experiment.</br>" + 
"Press any button to take the experiment again, or feel free to leave this page</p></div>";

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
