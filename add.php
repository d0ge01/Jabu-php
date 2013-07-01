<html>
<head>
	<title>Add</title>
</head>
<body>
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
			echo '<form method="get">Nome: <input type="text" name="nome"></br>';
			echo 'Autore: <input type="text" name="autore"></br>';
			echo 'Casa Edititrice: <input type="text" name="casaed"></br>';
			echo '<input type="submit">';
		}
		
	?>
</body>
</html>