<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Job Board</h1>
  <?php
  if (isset($_POST["company_name"]) && empty($_POST["company_name"])){
    echo "<p>Here are all of the jobs posted by the sponsoring companies</p>";
    echo "<table><tr><th>Job Title</th><th>Location</th><th>Salary</th><th>Company</th></tr>";
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "select job_title, location, salary, ad_company from job_ad";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()){
      echo "<tr><td>".$row["job_title"]."</td><td>".$row["location"]."</td><td>".$row["salary"]."</td><td>".$row["ad_company"]."</td></tr>";
    }
  } else {
    $company_name = $_POST["company_name"];
    echo "<p>For $company_name:</p>";
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "select job_title, location, salary from job_ad where ad_company = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$company_name]);
    if ($stmt->rowCount() > 0){
      echo "<p>We have the following job postings.</p>";
      echo "<table><tr><th>Job Title</th><th>Location</th><th>Salary</th></tr>";
      while ($row = $stmt->fetch()) {
       echo "<tr><td>".$row["job_title"]."</td><td>".$row["location"]."</td><td>".$row["salary"]."</td></tr>";
     }
   } else {
      echo "<p>We have no jobs listed by that company :( </p>";
   }

  }
  ?>
</body>
</html>
