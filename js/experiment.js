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
console.log(sentences.length)
			// Create an experiment block for every sentences
			for (i=0; i<sentences.length; ++i) {
				 var correct = sentences[i].correct.split(" ");
				 var incorrect = sentences[i].incorrect.split(" ");
				 console.log("" + correct[sentences[i].ppos]);
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


			console.log(structure);
			jsPsych.init({
				 experiment_structure: structure,
				 on_finish: function(data) {
						window.location.replace("http://www.google.nl");
				 }
			});
	 });

//			var correct = ["Dit", "is", "de", "juiste", "volgorde"];
//			var incorrect = ["onzin", "onzin", "onzin", "onzin", "onzin"];
//
//			var answers = [];
//			var stimuli = [];
//
//			for (var i = 0; i < correct.length; i++) 
//			{
//				 stimuli.push(
//							 "<div class = stimulus id=left>" 	+ correct[i]   + "</div>" + 
//							 "<div class = stimulus id=right>" + incorrect[i] + "</div>"
//							 );
//				 answers.push(37);
//			}
//			var catagorization_block = 
//			{
//				 type: 'categorize',
//				 stimuli: stimuli,
//				 key_answer: answers,
//				 choices: [37, 39],
//				 timing_feedback_duration: 1,
//				 timing_post_trial: 0,
//				 is_html: true,
//			};
//
//			struct = [catagorization_block, catagorization_block];
//			console.log(struct);
//			jsPsych.init({
//				 experiment_structure: struct,
//				 on_finish: function(data) {
//						window.location.replace("http://www.google.nl");
//				 }
//			});
});
