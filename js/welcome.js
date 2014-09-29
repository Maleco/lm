// Experiment instructions
var welcome_message = "<div id='instructions'><p>Welcome to the L-Maze Experiment. Press enter to begin</p></div>";

var instruction = "<div id='instructions'>Press left button to select the left word, press right for the right word.</div>";
var close = "<div id='instructions'>Press a button to start the experiment.</div>";

var instruction_block = {
	 type: "text", 
	 text:[welcome_message, instruction, close]
};

jsPsych.init({
	 display_element: $('#target'),
	 experiment_structure: [instruction_block],
	 on_finish: function(data) {
			window.location.replace("experiment.php");
	 }
}
);
