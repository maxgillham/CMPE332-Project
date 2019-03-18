<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Our Lovely Sponsors</h2>
  <?php
  echo "<table><tr><th>Company Name</th><th>Sponsorship Rank</th></tr>";
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  $sql = "select company_name, sponsorship_rank from company";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
	   echo "<tr><td>".$row["company_name"]."</td><td>".$row["sponsorship_rank"]."</td></tr>";
  }
  ?>
</body>
</html>
