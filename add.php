<?php
	$errConnection = "Error in connection, please contact admin..., host not valid";
	$errSelectDb = "Error in select DB, please contact admin....";
?>
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
			$db = mysql_connect($host, $user, $pass) or die($errConnection);
			mysql_select_db($dadb, $db) or die($errSelectDb);
			
			$autore = mysql_real_escape_string($_REQUEST['autore']);
			$nome = mysql_real_escape_string($_REQUEST['nome']);
			$casa = mysql_real_escape_string($_REQUEST['casaed']);
			
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