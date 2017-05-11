<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	// DELETE Statement
if (isset($_POST['deletepid'])) {
	echo $_POST["deletepid"];
  $del = "DELETE FROM project WHERE id = ".$_POST['deletepid'];
  $db->exec($del);
  exit;
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>PHPLogin</title>
    

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand">PHP Signup</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li><a href="register.php">Register</a></li>
          <li class="divider-vertical"></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container hero-unit">
    <h2>Hallo User <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?> hier ist die Tabelle!</h2>
      
</div>
<div class="container">

<?php

// SELECT Statement
$sql = "SELECT * FROM project";
$res = $db->query($sql);
$projects = $res->fetchAll(PDO::FETCH_OBJ);

// Show Table
?>

<h1>Tabelle</h1><hr>

<p id="info-box"></p>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Beschreibung</th>
      <th>Erstellungsdatum</th>
      <th>Operationen</th>
    </tr>
  </thead>
  <tbody>

<?php

foreach ($projects as $row) {
  echo "<tr>
  <td>".$row->id."</td>
  <td>".$row->name."</td>
  <td>".$row->description."</td>
  <td>".$row->createDate."</td>
  <td>
    <span data-pid=\"$row->id\" class=\"glyphicon glyphicon-pencil change-icon\" style=\"cursor:pointer;\"></span>
    <span id=\"$row->id\" class=\"glyphicon glyphicon-trash delete-icon\" style=\"cursor:pointer;\"></span>
  </td>";
  echo "</tr>";
}

?>
    </div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="appnew.js"></script>
</body>
</html>