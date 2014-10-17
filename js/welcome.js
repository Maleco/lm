// Experiment instructions
var welcome_message = 
"<div id='instructions'><p>Welcome to the L-Maze Experiment.<br>" + 
"Before beginning, please close as much programs as possible. This includes browser tabs.<br>" + 
" Press a key to begin</p></div>";

var instruction = "<div id='instructions'>Press left arrow button to select the left word, press the right arrow button for the word on the right.</div>";
var close = "<div id='instructions'>Press a key to start the experiment.</div>";

var instruction_block = {
	 type: "text", 
	 text:[welcome_message, instruction, close]
};

jsPsych.init({
	 display_element: $('#target'),
	 experiment_structure: [instruction_block],
	 on_finish: function(data) {
			window.location.href = "experiment.php";
	 }
}
);
