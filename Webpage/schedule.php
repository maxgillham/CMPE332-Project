<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Schedule Information</h1>
  <?php
  $day_value = $_POST["day"];
  echo "<p>For day number $day_value</p>";
  echo "<table><tr><th>Speaker Name</th><th>Start Time</th><th>End Time</th><th>Location</th></tr>";
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select speaker_name, start_time, end_time, room_location from session where day = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$day_value]);
  while ($row = $stmt->fetch()) {
	   echo "<tr><td>".$row["speaker_name"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["room_location"]."</td></tr>";
  }
  ?>
</body>
</html>
