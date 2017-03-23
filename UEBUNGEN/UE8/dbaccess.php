<!DOCTYPE html>
<html>

<head>
	<title></title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	</head>
	<body  style="margin:0 6% 0 6%;";>
	<?php
		// DB Settings
		$host = 'localhost';
		$dbname = 'medt3';
		$user = 'root';
		$pwd = '';
		try{
			// Establish connection
			$db = new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd );				
		}
		catch(PDOException $e){
			exit("<p class=\"bg-danger\">System nicht verfügbar!</p>");
		}
		$res = $db->query ("SELECT * FROM project");
		$tmp = $res->fetchAll();
		?>
		
		<?php
		if(isset($_GET['delid'])){
			$res = $db->query("DELETE FROM project WHERE id =".$_GET['delid']);
			
				$feedbackClass="bg-danger";
			$feedbackText="nicht";
			
			if($res->rowcount())
			{
			$feedbackClass="bg-success";
			$feedbackTex="";
			}
			echo "<p class=\"$feedbackClass\">Löschen $feedbackText erfolgt!</p>";
			//<meta http-equiv="refresh" content="5; url=http://localhost:82/medt-3/UEBUNBGEN/UE8/dbaccess2.php">
		}
		if(isset($_GET['submit'])){
			$res = $db->query("UPDATE project SET name ='".$_GET['name']."', description ='".$_GET['description']."', createDate ='".$_GET['date']."' WHERE id =".$_GET['submit']);
		}
		if (isset($_GET['editid'])) {
			$res = $db->query("SELECT * FROM project WHERE id =".$_GET['editid']);
			$temp = $res->fetchAll();
			echo "
			<form action=".$_SERVER['PHP_SELF'].">
    			<label>Name<input type=\"text\" class=\"form-control\" name=\"name\" value=\"".$temp[0]['name']."\"></label>
    			<br>
    			<label>Description<input type=\"text\" class=\"form-control\" name=\"description\" value=\"".$temp[0]['description']."\"></label>
    			<br>
    			<label>Date<input type=\"text\" class=\"form-control\" name=\"date\" value=\"".$temp[0]['createDate']."\"></label>
    			<br><br>
  				<button type=\"submit\" name=\"submit\" value=\"".$temp[0]['id']."\" class=\"btn btn-default\">Aktualisieren</button>
  				<button type=\"submit\" class=\"btn btn-default\" style=\"margin-left:10px;\">Abbrechen</button>
			</form>
			";
		}
		//Add

		if (isset($_GET['addid'])) {
			$res = $db->query("SELECT * FROM project");
			$temp = $res->fetchAll();
			echo "
			<form action=".$_SERVER['PHP_SELF'].">
    			<label>Name<input type=\"text\" class=\"form-control\" name=\"name\"></label>
    			<br>
    			<label>Description<input type=\"text\" class=\"form-control\" name=\"description\"></label>
    			<br>
    			<label>Date<input type=\"text\" class=\"form-control\" name=\"date\"></label>
    			<br><br>
  				<button type=\"submit\" name=\"submit2\" class=\"btn btn-default\">Add</button>
  				<button type=\"submit\" class=\"btn btn-default\" style=\"margin-left:10px;\">Abbrechen</button>
			</form>
			";
		}
		if(isset($_GET['submit2'])){
			$sql = "INSERT INTO project (name, description, createDate) VALUES ('".($_GET['name']."','". $_GET['description']."','". $_GET['date']."');");
			$res = $db->query($sql);
			
		}
			?>
		<div class=\"container\">
		<h1>Projektübersicht</h1>
		<table class='table table-striped'>
			<tr>
				<th><p>ProjektID</p></th>
				<th><p>Name</p></th>
				<th><p>Beschreibung</p></th>
				<th><p>Datum</p></th>
				<th><p>Operationen</p></th>
			</tr>
			
			<?php
			echo"
		<a href=\"".$_SERVER['PHP_SELF']."?addid=\"><button>Add</button></a> ";
		?>
		<br>
		<?php		
		foreach ($tmp as $row) {
			echo "
			<tr>
			 
				<td>".htmlspecialchars($row['id'])."</td>
				<td>".htmlspecialchars($row['name'])."</td>
				<td>".htmlspecialchars($row['description'])."</td>
				<td>".htmlspecialchars($row['createDate'])."</td>
				<td><a href=\"".$_SERVER['PHP_SELF']."?delid=".$row['id']."\"><button onClick=\"javascript:return confirm('Bist du sicher, dass du dieses Projekt löschen möchtest?');\">Delete</button></a>  
					<a href=\"".$_SERVER['PHP_SELF']."?editid=".$row['id']."\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a></td>
			</tr>
			";
		}
		?>
		
		</div>


</body>
</html>