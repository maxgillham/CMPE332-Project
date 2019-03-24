<!DOCTYPE html>
<html>
<head>
<link href="conference.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Sponsorsing Company Update</h1>
  <?php
  if (!empty($_POST["request_type"])){
    $request = $_POST["request_type"];
  } else{
    $request = "Plz no hacking";
  }
  $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
  if ($request == "Add Company"){
    if (!empty($_POST["company_name"]) && !empty($_POST["sponsorship_rank"])){
      $company_name = $_POST["company_name"];
      $sponsorship_rank = $_POST["sponsorship_rank"];
      $emails_sent = $_POST["emails"];
      $sql = "insert into company values (?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(["$company_name", "$sponsorship_rank", $emails_sent]);
      echo "<p>Added $company_name of rank $sponsorship_rank, with $emails_sent emails sent.</p>";
    } else{
      echo "<p>Cannot complete this request, please fill in all paramerters</p>";
    }
  } elseif ($request == "Remove Company"){
    if (!empty($_POST["company_name"])){
      $company_name = $_POST["company_name"];
      $sql = "delete from company where company_name = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$company_name]);
      $sql = "delete attendee, company_rel from attendee inner join company_rel where company_rel.company_attendee_id = attendee.attendee_ID and company_rel.company_name = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$company_name]);
      echo "<p>Removed $company_name as a sponsor for this conference, and removed their attendees from the list</p>";
    } else{
      echo "<p>Cannot complete this request, please enter a company name</p>";
    }
  } else{
    echo "<p>Invalid request to page</p>";
  }
  ?>
</body>
</html>
