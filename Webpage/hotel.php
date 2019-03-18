<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Hotel Room Information</h1>
  <?php
  $room = $_POST["room"];
  echo "<p>For room number $room...</p>";
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select name from attendee, room_rel where attendee.attendee_id = room_rel.a_id and room_rel.room_numb = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$room]);
  if ($stmt->rowCount() > 0){
    echo "We have the following students housed here.";
    echo "<table><tr><th>Name</th></tr>";
    while ($row = $stmt->fetch()) {
       echo "<tr><td>".$row["name"]."</td></tr>";
    }
  } else {
    echo "<p>We have no students housed here.</p>";
  }
  ?>
</body>
</html>
