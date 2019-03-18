<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Attendees</h1>
  <?php
  echo "<table><tr><th>Student Atendees</th></tr>";
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select name from attendee where type = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["student"]);
  while ($row = $stmt->fetch()) {
	   echo "<tr><td>".$row["name"]."</td></tr>";
  }
  echo "<br><br><br>";
  echo "<table><tr><th>Sponsor Atendees</th></tr>";
  $stmt->execute(["sponsor"]);
  while ($row = $stmt->fetch()){
    echo "<tr><td>".$row["name"]."</td></tr>";
  }
  echo "<br><br><br>";
  echo "<table><tr><th>Professional Attendees</th></tr>";
  $stmt->execute(["professional"]);
  while ($row = $stmt->fetch()){
    echo "<tr><td>".$row["name"]."</td></tr>";
  }
  echo "<br><br><br>";
  ?>
</body>
</html>
