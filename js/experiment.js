/* 
 *	Each participant is presented 16 sentences,
 *	with as much a-variants, as b-variants, as c-variants,
 *	as d-variants (4 each)
 *
 *	4 presentation-strategies
 *	1a,2a,3a,4a,5b,6b,7b,8b...
 *	1b,2b,3b,4b,5c,6c,7c,8c...
 *
 *	Determine strategy according to # of finished experiments on server
 */

var sentenceFile = "data/test.json";

/*
 * TODO
 *
 * 	error report
 */

var variants = 
[
	[
		"a", "a", "a", "a", 
		"b", "b", "b", "b", 
		"c", "c", "c", "c",
		"d", "d", "d", "d",
	],[
		"b", "b", "b", "b", 
		"c", "c", "c", "c",
		"d", "d", "d", "d",
		"a", "a", "a", "a" 
	],[
		"c", "c", "c", "c",
		"d", "d", "d", "d",
		"a", "a", "a", "a", 
		"b", "b", "b", "b"
	],[
		"d", "d", "d", "d",
		"a", "a", "a", "a", 
		"b", "b", "b", "b", 
		"c", "c", "c", "c"
	]
	];

	// The standard filler block for between sentences
	var filler = 
	"<div id='instructions'>Let op, hier komt een nieuwe zin! <br>Druk op een toets om verder te gaan</div>";
	var filler_block = {
		type: "text",
		text: [filler]
	};

function shuffle(array) 
{
	var currentIndex = array.length, temporaryValue, randomIndex ;

	// While there remain elements to shuffle...
	while (0 !== currentIndex) {

		// Pick a remaining element...
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;

		// And swap it with the current element.
		temporaryValue = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temporaryValue;
	}
	return array;
}

// Process the file data
function processData(filedata, shuffledStructure)
{
	console.log(filedata);
	var sentenceData = [];
	// Remove all the message results.
	for (i=0; i< filedata.length; i+=2)
		sentenceData.push(filedata[i]);

	var results = [];

	// Input column names
	results.push([
	"name", "native_language", "language_5", "grow_up", "gender", "age", "email", "sentence_id", "sentence_variant","RT_ppos", "RT_ppos1", "RT_ppos2"
	])
	// Process every sentence
	for (i=0; i<sentenceData.length; ++i)
	{
		// Check if no errors were made
		var correct = true;
		for(j=0; j<sentenceData[i].length;j++)
			if (sentenceData[i][j].correct == false)
				correct = false;
		
		// Process only correct target sentences, fillers have id:-1
		if(shuffledStructure[i].filler == 0 && correct == true)
		{
			// This sentence's result
			var sentenceResult = [];

			// Save user data
			// Name
			sentenceResult.push(
						document.getElementById("user-data-name").textContent.trim());
			// Native Language
			sentenceResult.push(
						document.getElementById("user-data-natlang").textContent.trim());
			// Language at 5
			sentenceResult.push(
						document.getElementById("user-data-lang5").textContent.trim());
			// Where they grew up
			sentenceResult.push(
						document.getElementById("user-data-growup").textContent.trim());
			// Gender
			sentenceResult.push(
						document.getElementById("user-data-gender").textContent.trim());
			// Age
			sentenceResult.push(
						document.getElementById("user-data-age").textContent.trim());
			// Email
			sentenceResult.push(
						document.getElementById("user-data-email").textContent.trim());
		
			// Save id and variant
			sentenceResult.push(shuffledStructure[i].id);
			sentenceResult.push(shuffledStructure[i].variant);
			// Save the sentence pronoun position RT + the two following RT's
			sentenceResult.push(sentenceData[i][shuffledStructure[i].ppos  ].rt);
			sentenceResult.push(sentenceData[i][shuffledStructure[i].ppos+1].rt);
			sentenceResult.push(sentenceData[i][shuffledStructure[i].ppos+2].rt);

			results.push(sentenceResult);
		}
	}
	return results;
}

function saveData(data)
{
	$.ajax({
		type:'post',
		cache: false,
		url: 'savedata.php',
		data: {data: data},
		complete: function(data) {
			window.location.href = "thanks.php";
		}
	});
}

$(document).ready(function() {
	//
	// Parse in the XML
	$.getJSON(sentenceFile, function(sentences) {
		/*
		 * The general structure of the sentences:
		 * 	sentence id,
		 * 	correct sentence string 
		 * 	incorrect sentence string 
		 * 	ppos 
		 *
		 * After creation of this structure, sentences are mixed
		 * Then put into experiment in that order
		 */
		var structure = [];

		// Choose the variant for this experiment
		var count = parseInt(document.getElementById("count-target").textContent);
		var variant = variants[count%4];

			// Collect the sentences to be used together with their id
			for (i=0; i<sentences.length/4; i++) {
				var sentence = [];
				var letter = variant[i % variant.length];
				switch (letter) {
					case "a":
						sentence = sentences[i*4 +0];
						break;
					case "b":
						sentence = sentences[i*4 +1];
						break;
					case "c":
						sentence = sentences[i*4 +2];
						break;
					case "d":
						sentence = sentences[i*4 +3];
						break;
				}	

				// Find the pronoun position
				var correct = sentence.correct.split(" ");
				var incorrect = sentence.incorrect.split(" ");
				// Only hij and ze are pronouns
				var ppos= (correct.indexOf("hij") != -1) ?
					correct.indexOf("hij") :
					correct.indexOf("ze");

				var structureSentence = {
					"id":sentence.id, 
					"variant":sentence.variant,
					"correct":correct,
					"incorrect":incorrect,
					"ppos":ppos,
					"filler":sentence.filler
				};
				structure[structure.length] = structureSentence;
			}
		var shuffledStructure = shuffle(structure);

		// Create an experiment block for every sentence
		var experimentStructure = []
			for (i=0; i<shuffledStructure.length; ++i) {
				var answers = [];
				var stimuli = [];
				for (j=0; j<shuffledStructure[i].correct.length; ++j) {
					if (Math.random() > 0.5) {
						stimuli.push(
								"<div class = stimulus id=left>" 	+ shuffledStructure[i].correct[j]   + "</div>"+ 
								"<div class = stimulus id=right>" + shuffledStructure[i].incorrect[j] + "</div>"
								);
						answers.push(37);
					} else { 
						stimuli.push(
								"<div class = stimulus id=left>" 	+ shuffledStructure[i].incorrect[j]   + "</div>"+ 
								"<div class = stimulus id=right>" + shuffledStructure[i].correct[j] + "</div>"
								);
						answers.push(39);
					}
				}

				// Create the trial block
				var block = 
				{
					type: 'categorize',
					display_element: $('#target'),
					stimuli: stimuli,
					key_answer: answers,
					choices: [37, 39],
					timing_feedback_duration: 1,
					timing_post_trial: 0,
					is_html: true,
				};
				experimentStructure.push(block);
				experimentStructure.push(filler_block);
			}
		// Remove the last filler block
		experimentStructure.pop();
		console.log("experimentStructure");
		console.log(experimentStructure);

		// Run the experiment 
		jsPsych.init({
			display_element: $('#jspsych_target'),
			experiment_structure: experimentStructure,
			on_finish: function(data) {
				var processedResults = processData(data, shuffledStructure);
				if (processedResults.length > 0)
				{
					console.log(processedResults);
					var json = JSON.stringify(processedResults);
					saveData(json);
				} else {
					window.location.href = "thanks.php";
				}
			}
		});

	});
});
