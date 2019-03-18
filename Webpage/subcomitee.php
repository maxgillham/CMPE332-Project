<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Organizing Commitee Info :D</h1>
  <?php
  $subname = $_POST["subcomitee_name"];
  echo "<p>Here is a list of members on the $subname</p>";
  echo "<table><tr><th>Name</th></tr>";
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select name from organiser_rel where sub_commit = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$subname]);
  while ($row = $stmt->fetch()) {
	   echo "<tr><td>".$row["name"]."</td></tr>";
  }
  ?>
</body>
</html>
