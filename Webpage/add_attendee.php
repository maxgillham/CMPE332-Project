<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Attendees</h1>
  <?php
  $name = $_POST["name"];
  $id = $_POST["id"];
  $type = $_POST["type"];

  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select name from attendee where attendee_ID = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  if ($stmt -> rowCount() > 0){
    echo "<p> UH OH.  Looks like that ID is taken :( </p>";
  }
  else{
  $sql = "insert into attendee values (?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id, "$name", "$type"]);
  echo "<p> Added $name of type $type with id $id to the conference </p>";
  if ($type == "student"){
    echo "<p> Since $name is a $type, we must add them to an emplty hotel room</p>";
    $sql = "select room_numb, count(*) as c, number_of_beds from room_rel, hotel_room
            where room_rel.room_numb = hotel_room.room_number
            group by room_numb
            having count(*) < number_of_beds";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() == 0){
      $sql = "select room_number from hotel_room where room_number not in (select room_numb from room_rel)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      if ($stmt -> rowCount() > 0){
        $empty_room = $stmt->fetch();
        $room_num = $empty_room["room_number"];
        $sql = "insert into room_rel values (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id, $room_num]);
        echo "<p>Adding $name to an empty room. Their room number is $room_num. </p>";
      }
      else{
        echo "<p>Currently can't add $name to a hotel room :(.  Book a new room and add them later</p>";
      }
    }
    else{
      $found_room = $stmt -> fetch();
      $number_of_roomates = $found_room["c"];
      $room_num = $found_room["room_numb"];
      $sql = "insert into room_rel values (?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$id, $room_num]);
      echo "<p>Added $name to room number $room_num with $number_of_roomates roomates :D </p>";
    }

  }
  }
  ?>
</body>
</html>
