<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="it">
	
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<title>Remove</title>
</head>
<body>
	<center>
	<h1>Modifica dei libri</h1>
	<h3><a href="index.php">Torna alla home</a></h3>
	<div id="centered" align="left">
	<?php
		$host = 'localhost';
		$user = 'jasus';
		$pass = 'password';
		$dadb = 'libreria';
		if(isset($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];
			
			$db = mysql_connect($host, $user, $pass) or die("Impossibile connettersi al db");
			mysql_select_db($dadb, $db) or die("Impossibile selezionare db");
			if(!isset($_REQUEST['confirm']))
			{
				$query = "select * from $dadb where id=$id";
				$dbResult = mysql_query($query, $db);
				
				$AffectedRows = mysql_affected_rows($db);
				
				if ( $AffectedRows==0 )
				{
					print("Non esistono record con questo id");
				}else
				{
					mysql_data_seek($dbResult,0);
					$row = mysql_fetch_row($dbResult);
					
					print("<table>");
					print("<form method=\"post\">");
					foreach ( $row as $k => $v )
					{
						$myfield = mysql_fetch_field($dbResult, $k);
						print("<tr><td>$myfield->name</td>");
						print("<td><input type=\"text\" value=\"" . $v . "\" name=\"" . $myfield->name . "\" size=\"100\" maxlength=\"254\"></td></tr>");
					}
					print("<tr><td colspan=\"2\"><input type=\"submit\" value=\"conferma modifiche\"></td></tr> ");
					print("<input type=\"hidden\" name=\"confirm\" value=\"1\">");
					print("</form></table>");
					mysql_free_result($dbResult);
					mysql_close($db);
				}
			}else{
				$nome = $_REQUEST['nome'];
				$autore = $_REQUEST['autore'];
				$casaed = $_REQUEST['casaeditrice'];
				
				$query = "update $dadb set nome=\"$nome\"," .
						 "autore=\"$autore\", " . 
						 "casaeditrice=\"$casaed\" where id=$id";
				$dbResult = mysql_query($query,$db);
				$AffectedRows = mysql_affected_rows($db);
				
				if($AffectedRows != 0 )
				{
					print("Record aggiornato</br>");
					print("<a href=\"index.php\">Torna alla home</a>");
				}
				mysql_close($db);
			}
		}else{
			print("Id mandatory...");
		}
	?>
	</div>
</body>
</html>