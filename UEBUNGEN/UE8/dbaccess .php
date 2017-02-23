<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>dbAccess</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <br>

<?php
// DB Settings
$host = 'localhost';
$dbname = 'medt3';
$user ='root';
$pwd = '';
// Establish & check connection
try {
   $db = new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
   echo "<h1>Du hast es geschafft!!! Du bist in $dbname</h1>";
} catch (PDOException $e) {
   echo "<h1>Error: " . $e->getMessage()."</h1>";
   die();
}
// SELECT Statement
$sql = "SELECT * FROM project";
$res = $db->query($sql);
$tmp = $res->fetchAll(PDO::FETCH_OBJ);
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>description</th>
      <th>createDate</th>
      <th>operations</th>
    </tr>
  </thead>
  <tbody>

<?php
// Show Table
foreach ($tmp as $row) {
  echo "<tr>";
  echo "<td>" . $row->id . "</td>";
  echo "<td>" . $row->name . "</td>";
  echo "<td>" . $row->description . "</td>";
  echo "<td>" . $row->createDate . "</td>";
  echo "<td>
    <a href=\"dbaccess.php?change=$row->id\"><span class=\"glyphicon glyphicon-pencil\"></span>
    <a href=\"dbaccess.php?delete=$row->id\"><span class=\"glyphicon glyphicon-trash\"></span>
  </td>";
  echo "</tr>";
}
// DELETE Statement
if (isset($_GET['delete'])) {
  $del = "DELETE FROM project WHERE id = ".$_GET['delete'];
  $db->exec($del);
  header("refresh: 0; url=delete");
}

?>

    </div>
  </body>
</html>