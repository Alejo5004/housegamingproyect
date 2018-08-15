<!DOCTYPE html>
<html>
<head>
	<title>Api</title>
	<meta charset="utf-8">
</head>
<body>
	<form class="" action="" method="get">
		<label for="informacion">Digite el nombre de invocador</label>
		<input type="text" name="informacion" placeholder="Información">
		<button type="submit" name="button">Enviar</button>
	</form>
</body>
</html>

<?php
  /*Hasta este punto los datos a lo que se puede acceder es al nick, al nivel y a un id*/
	if (isset($_GET['informacion'])) {
		$informacion= $_GET['informacion'];
    
    /*Les recuerdo que la api_key solo tiene una duracion de un día, por lo tanto se debe regenarar cada día*/
		$url="https://la1.api.riotgames.com/lol/summoner/v3/summoners/by-name/".$informacion."?api_key=RGAPI-6d29bcbf-d077-4b92-81f8-d3155595cfa4";

		$json= file_get_contents($url);
		$datos= json_decode($json, true);

		echo "<br>"." El ID de su usuario es: ". ($datos["id"])."<br>";
		//echo " Su nombre de usuario es: ". ($datos["accountId"]."<br>");
		echo " Su nombre de invocador es: ". ($datos["name"])."<br>";
		//echo " Su nombre de usuario es: ". ($datos["profileIconId"]);
		//echo " Su nombre de usuario es: ". ($datos["revisionDate"]);
		echo " El nivel de su invocador es: ". ($datos["summonerLevel"])."<br>"."<br>";

	}	
	else{
		echo "El nombre de invocador no existe";
	}
  ?>
