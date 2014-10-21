<!DOCTYPE html>
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
			<link rel="stylesheet" href="css/style.css">
	 </head>
	 <body>
			<div class="content">
				 <h2>Ge&iuml;nformeerde toestemming</h2>
				 <p>
				 Ik stem toe om mee te doen aan een onderzoek dat wordt uitgevoerd door <a href="mailto:j.k.spenader@rug.nl">Jennifer Spenader</a>.
				 </p><p>
				 Ik ben me ervan bewust dat deelname aan dit onderzoek geheel vrijwillig is. Ik kan mijn medewerking op elk tijdstip stopzetten en de gegevens verkregen uit dit onderzoek terugkrijgen, laten verwijderen uit de database, of laten vernietigen.
				 </p><p>
				 <i>De deelnemer wordt geacht de volgende punten te lezen en begrijpen:</i>
				 </p>
				 <ol>
						<li>Het doel van dit onderzoek is het lezen van zinnen en het kiezen van een interpretatie van een voornaamwoord.<br>
						Deelname aan dit onderzoek zal meer inzicht geven omtrent de interpretatie van voornaamwoorden.</li>
						<li>Er zal mij gevraagd worden een taak uit te voeren waarbij zinnen gelezen en begrepen moeten worden en de interpretatie van een voornaamwoord gekozen moet worden.</li>
						<li>Het hele onderzoek zal ongeveer tien minuten duren. Aan het einde van het onderzoek kan ik de onderzoeker via email verzoeken uit te leggen waar het onderzoek over ging.</li>
						<li>Er behoort geen stress of ongemak voort te vloeien uit deelname aan dit onderzoek.</li>
						<li>De gegevens verkregen uit dit onderzoek zullen anoniem verwerkt worden en kunnen daarom niet bekend gemaakt worden op een individueel identificeerbare manier.</li>
						<li>De onderzoeker zal alle verdere vragen over dit onderzoek beantwoorden, indien ik hem hiertoe via email verzoek.</li>
				 </ol>
				 </p>
				 <form name="info" method="post" action="begin.php" onsubmit="return checked(this)">
						<input type="hidden" name="name" value="<?php echo $name; ?>">
						<input type="hidden" name="native_language" value="<?php echo $native_language; ?>">
						<input type="hidden" name="language_at_5" value="<?php echo $language_at_5; ?>">
						<input type="hidden" name="grow_up" value="<?php echo $grow_up; ?>">
						<input type="hidden" name="gender" value="<?php echo $gender; ?>">
						<input type="hidden" name="age" value="<?php echo $age; ?>">
						<input type="hidden" name="email" value="<?php echo $email; ?>">
						<input type="checkbox" name="consent_given" value="true"> 
						<label>
							 Ik heb alle bovenstaande punten gelezen en begrepen, en geef bij deze ge&iuml;nformeerde toestemming
						</label>
						<p>
						<input type="submit" class="start" value="Volgende">
						</p>
				 </form>
				 <script type="text/javascript">
						function checked(theForm){
									if(theForm.consent_given.checked==false){
												alert('Vink de checkbox om door te gaan!');
												return false;
										 } else {
												return true;
									}
						}
				 </script>
			</div>
	 </body>
</html>
