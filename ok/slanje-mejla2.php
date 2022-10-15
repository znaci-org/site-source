<meta charset="UTF-8">

<form action="salje-mejl.php" method="post">

	<input type="submit" name="posalji" value="Pošalji svima poruku">

</form>

<?php

	$trenutnovreme = time();

	echo $trenutnovreme;
	
	$primaoci = ["gorran.despotovic@gmail.com", 
				"mudroljub@gmail.com", 
				"gorran.despotovic@gmail.com", 
				"mudroljub@gmail.com", 
				"gorran.despotovic@gmail.com"];
	
	$subject = "Zdravo, ja sam tvoja automatska poruka.";
	$body = "Ova poruka je uspešno poslata sa servera znaci.net. \nNadamo se da neće završiti u kantu za smeće. ";

	if($_POST['posalji']) {

	
		if (mail($primaoci[0], $subject, $body)) {
			echo ("<p>Poruka je uspešno poslata!</p>");
		}
		else {
			echo ("<p>Slanje poruke nije uspelo…</p>");
		} 
	
	}
	

?>
