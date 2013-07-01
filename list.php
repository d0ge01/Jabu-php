<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="it">
	
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<title>List</title>
</head>
<body>
	<center>
	<h1>Lista dei libri</h1>
	<h3><a href="index.php">Torna alla home</a></h3>
	<div id="centered" align="left">
	<?php
		$host = 'localhost';
		$user = 'jasus';
		$pass = 'password';
		$dadb = 'libreria';
		if(isset($_REQUEST['seek']))
		{
			$startindex = $_REQUEST['seek'];
		}else{
			$startindex = 0;
		}
		
		$db = mysql_connect($host, $user, $pass) or die("impossibile connettersi al db");
		mysql_select_db($dadb, $db) or die("impossibile connetersi al db");
		
		$query = "select * from $dadb";
		
		$dbResult = mysql_query($query, $db);
		
		$AffectedRows = mysql_affected_rows($db);
		
		mysql_data_seek($dbResult,$startindex);
		
		$row = mysql_fetch_row($dbResult);
		
		foreach ( $row as $k => $v )
		{
			if($k == "id")
			{
				print "<a href=\"remove.php?id=$v\">Cancella libro</a></br>";
				print "<a href=\"modify.php?id=$v\">Modifica libro</a></br>";
			}
			$myfield = mysql_fetch_field($dbResult,$k);
			print ( $myfield->name . " : $v</br>");
		}
		mysql_free_result($dbResult);
		mysql_close($db);
		
		print("<br>Seleziona il record</br>");
		for($index=0;$index<$AffectedRows;$index++)
		{
			print("<a href=\"{$_SERVER['PHP_SELF']}?seek=$index\">" . ($index+1) . "</a>");
		}
		?>
	</div>
	</body>
</html>
