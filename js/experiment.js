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
var variants = [
	[
		"a", "a", "a", "a", 
		"b", "b", "b", "b", 
		"c", "c", "c", "c",
		"d", "d", "d", "d"
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

	// Save the file data
	function processData(filedata, pronounPositions, variant){
		var results = [];
		var sentenceData = [];
		// Remove all the message results.
		for (i=0; i< filedata.length; i+=2)
			sentenceData.push(filedata[i]);

		// Process every sentence
		for (i=0; i<sentenceData.length; ++i)
		{
			// This sentence's result
			var sentenceResult = [];

			var sentenceName = "" + (i+1) + variant[i];
			// Save the sentence name, pronoun position RT + the two following RT's
			sentenceResult.push(sentenceName);
			sentenceResult.push(sentenceData[i][pronounPositions[i] ].rt);
			sentenceResult.push(sentenceData[i][pronounPositions[i]+1 ].rt);
			sentenceResult.push(sentenceData[i][pronounPositions[i]+2 ].rt);

			results.push(sentenceResult);
		}
		console.log(results);

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
	// Parse in the XML

	$.getJSON('test.json', function(data) {
		var sentences = data["sentences"];
		var structure = [];
		var filler = "<div id='instructions'>Prepare for the next sentence!<br>Press any button to continue</div>";
		var filler_block = {
			type: "text",
			text: [filler]
		};

		// Choose a variant (0-3) at random
		var count = parseInt(document.getElementById("count-target").textContent);
		var variant = variants[count%4];
		var pronounPositions= [];
		// Create an experiment block for every sentence
		for (i=0; i<sentences.length; ++i) {
			var sentence = sentences[i][variant[i]];
			var correct = sentence.correct.split(" ");
			var incorrect = sentence.incorrect.split(" ");
			pronounPositions.push(sentence.ppos);
			var answers = [];
			var stimuli = [];
			for (j=0; j<correct.length; ++j) {
				if (Math.random() > 0.5) {
					stimuli.push(
							"<div class = stimulus id=left>" 	+ correct[j]   + "</div>"+ 
							"<div class = stimulus id=right>" + incorrect[j] + "</div>"
							);
					answers.push(37);
				} else { 
					stimuli.push(
							"<div class = stimulus id=left>" 	+ incorrect[j]   + "</div>"+ 
							"<div class = stimulus id=right>" + correct[j] + "</div>"
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
			structure.push(block);
			structure.push(filler_block);
		}
		// Remove the last filler block
		structure.pop();

		// Run the experiment 
		jsPsych.init({
			experiment_structure: structure,
			on_finish: function(data) {
						var json = JSON.stringify(processData(data, pronounPositions, variant));
						saveData(json);
						//window.location.replace("savedata.php?data="+json);
			}
		});

	});
});
