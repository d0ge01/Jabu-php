<?php
	$errConnection = "Error in connection, please contact admin..., host not valid";
	$errSelectDb = "Error in select DB, please contact admin....";
?>
<html>
<head>
	<title>Remove</title>
</head>
<body>
	<?php
		$host = 'localhost';
		$user = 'jasus';
		$pass = 'password';
		$dadb = 'libreria';
		if(isset($_REQUEST['id']))
		{
			$id = (int)$_REQUEST['id'];
			$db = mysql_connect($host, $user, $pass) or die($errConnection);
			mysql_select_db($dadb, $db) or die($errSelectDb);
			$query = "delete from $dadb where id=$id";
			$dbResult = mysql_query($query, $db);
			$affectedRows = mysql_affected_rows($db);
			if($affectedRows == 0)
			{
				print("Nessun record trovato con quel id</br><a href=\"index.php\">Torna alla home</a>");
			}else{
				print("Record $id è stato eliminato...</br><a href=\"index.php\">Torna alla home</a>");
			}
			mysql_close($db);
		}else{
			echo "<script>location.href=\"list.php\";</script>";
		}
	?>
</body>
</html>