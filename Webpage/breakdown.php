<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Converence Intake Breakdown</h1>
  <?php
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select type, count(*) as count from attendee group by type";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $attendee_intake = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
  if (array_key_exists("student", $attendee_intake)){
    $paid["student"] = $attendee_intake["student"]*50;
  } else{
    $paid["student"] = 0;
    $attendee_intake["student"] = 0;
  }
  if (array_key_exists("professional", $attendee_intake)){
    $paid["professional"] = $attendee_intake["professional"]*100;
  } else{
    $paid["professional"] = 0;
    $attendee_intake["professional"] = 0;
  }
  if (array_key_exists("sponsor", $attendee_intake)){
    $paid["sponsor"] = 0;
  } else{
    $paid["sponsor"] = 0;
    $attendee_intake["sponsor"] = 0;
  }

  $sql = "select sponsorship_rank, count(*) as count from company group by sponsorship_rank";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $sponsorship_intake = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
  if (array_key_exists("Gold", $sponsorship_intake)){
    $sponsorship["Gold"] = $sponsorship_intake["Gold"]*5000;
  } else{
    $sponsorship["Gold"] = 0;
    $sponsorship_intake["Gold"] = 0;
  }
  if (array_key_exists("Platinum", $sponsorship_intake)){
    $sponsorship["Platinum"] = $sponsorship_intake["Platinum"]*10000;
  } else{
    $sponsorship["Platinum"] = 0;
    $sponsorship_intake["Platinum"] = 0;
  }
  if (array_key_exists("Silver", $sponsorship_intake)){
    $sponsorship["Silver"] = $sponsorship_intake["Silver"]*3000;
  } else{
    $sponsorship["Silver"] = 0;
    $sponsorship_intake["Silver"] = 0;
  }
  if (array_key_exists("Bronze", $sponsorship_intake)){
    $sponsorship["Bronze"] = $sponsorship_intake["Bronze"]*1000;
  } else{
    $sponsorship["Bronze"] = 0;
    $sponsorship_intake["Bronze"] = 0;
  }

  $total_by_attendance = $paid["student"]+$paid["professional"];
  $total_by_sponsorship = $sponsorship["Platinum"] + $sponsorship["Gold"] + $sponsorship["Silver"] + $sponsorship["Bronze"];
  $total = $total_by_attendance + $total_by_sponsorship;
  echo "<h2>In total, the conference has made $$total</h2>";

  echo "<p>From attendence, the conference has obtained $$total_by_attendance </p>";
  # Attendee intake break down
  echo "<table><tr><th>Attendee Type</th><th>Count</th><th>Money Earned</th></tr>";
  echo "<tr><td>Students</td><td>".$attendee_intake["student"]."</td><td>".$paid["student"]."</td></tr>";
  echo "<tr><td>Professionals</td><td>".$attendee_intake["professional"]."</td><td>".$paid["professional"]."</td></tr>";
  echo "<tr><td>Sponsors</td><td>".$attendee_intake["sponsor"]."</td><td>".$paid["sponsor"]."</td></tr>";


  # Sponsoring company break down
  echo "<table><tr><th>Sponsorship Level</th><th>Count</th><th>Money Earned</th></tr>";
  echo "<tr><td>Platinum</td><td>".$sponsorship_intake["Platinum"]."</td><td>".$sponsorship["Platinum"]."</td></tr>";
  echo "<tr><td>Gold</td><td>".$sponsorship_intake["Gold"]."</td><td>".$sponsorship["Gold"]."</td></tr>";
  echo "<tr><td>Silver</td><td>".$sponsorship_intake["Silver"]."</td><td>".$sponsorship["Silver"]."</td></tr>";
  echo "<tr><td>Bronze</td><td>".$sponsorship_intake["Bronze"]."</td><td>".$sponsorship["Bronze"]."</td></tr>";
  echo "<br>";
  echo "<p>From sponsoring companies, the conference has obtained $$total_by_sponsorship</p>";
  ?>
</body>
</html>
