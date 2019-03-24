<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Schedule Information</h1>
  <?php
  if (!empty($_POST["request_type"])){
    if ($_POST["request_type"] == "Display"){
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
     } else{
      $speaker_name = $_POST["speaker_name"];
      $day = $_POST["day"];
      $start = $_POST["start"];
      $end = $_POST["end"];
      $location = $_POST["location"];
      $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
      $sql = "update session set day=?, start_time=?, end_time=?, room_location=? where speaker_name=?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$day, $start, $end, $location, $speaker_name]);
      echo "<p>Updated $speaker_name session to day $day, from $start to $end at $location</p>";
    }
  } else{
    echo "<p>invalid request</p>";

   }
  ?>
</body>
</html>
