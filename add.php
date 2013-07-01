<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="it">
	
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<title>Add</title>
</head>
<body>
	<center>
	<h1>Aggiungi un libro</h1>
	<h3><a href="index.php">Torna alla home</a></h3>
	<div id="centered">
	<?php
		$host = 'localhost';
		$user = 'jasus';
		$pass = 'password';
		$dadb = 'libreria';
		
		if (isset($_GET['nome']) && isset($_GET['autore']))
		{
			$db = mysql_connect($host, $user, $pass) or die("Error in connection... Host: $host");
			mysql_select_db($dadb, $db) or die("Error in selection.. $dadb");
			
			$autore = $_GET['autore'];
			$nome = $_GET['nome'];
			$casa = $_GET['casaed'];
			
			$query = "insert into $dadb " .
					 "(nome, autore, casaeditrice) " .
					 "VALUES('$nome', '$autore', '$casa')";
			if (!mysql_query($query, $db))
			{
				print("Error in insert");
			}
			else
			{
				print("Record insert..</br>");
			}
			mysql_close($db);
		}else{
			echo '<form method="get"><table><tr><td>Nome:</td><td><input type="text" name="nome"></td><tr>';
			echo '<tr><td>Autore:</td><td><input type="text" name="autore"></td></tr>';
			echo '<tr><td>Casa Edititrice:</td><td><input type="text" name="casaed"></td></tr>';
			echo '<tr><td colspan=\"2\"><input type="submit"></td></tr></table>';
		}
		
	?>
	</div>
</body>
</html>