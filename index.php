<!DOCTYPE html>
<html>
	<head>
		 <title>L-Maze Experiment</title>
			<link rel="stylesheet" href="css/style.css">
	</head>
	<body >
		 <form name="info" method="post" action="consent.php">
					<p>
						Naam (initialen):<br>
						<input type="text" name="name" size="40">
					</p>
					<p>
						Wat is je moedertaal?<br>
						<input type="text" name="native_language" size="40">
					</p>
					<p>
						Welke taal sprak je in de kleuterklas (5-jarige leeftijd)?<br>
						<input type="text" name="language_at_5" size="40">
					</p>
					<p>
						Spreek je Fries?<br>
						<select name="frisian">
						<option value="null">(selecteer)</option>
						<option value="true">Ja</option>
						<option value="false">Nee</option>
						</select><br>
						Zo ja, zou je dan je e-mailadres op willen geven, zodat we contact met je op kunnen nemen om wat meer vragen te stellen.<br>
						<input type="text" name="email" size="40">
					</p>
					<p>
						Waar ben je opgegroeid?<br>
						<input type="text" name="grow_up" size="40">
					</p>
					<p>
						Geslacht:<br>
						<select name="gender">
						<option value="null">(selecteer)</option>
						<option value="m">Man</option>
						<option value="f">Vrouw</option>
						</select>
					</p>
					<p>
						Leeftijd:<br>
						<input type="text" name="age" size="40">
					</p>
					<input type="submit" class="start" value="Volgende"><br><br>
				</form>
	</body>
</html>
