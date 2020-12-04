<?php 

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "ss";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobileno = $_POST['mobileno'];
  $objective = $_POST['objective'];
  $undergrad_cgpa = $_POST['undergrad_cgpa'];
  $cgpa_12 = $_POST['cgpa_12'];
  $cgpa_10   = $_POST['cgpa_10'];
  $internship = $_POST['internship'];
  $skills_set = $_POST['skills_set'];
  $certification = $_POST['certification'];
  $hobby = $_POST['hobby'];
  
      $sql = "INSERT INTO resume (name, email, mobileno, objective, undergrad_cgpa, cgpa_12, cgpa_10, internship, skills_set, certification, hobby ) VALUES (:name, :email, :mobileno, :objective, :undergrad_cgpa, :cgpa_12, :cgpa_10, :internship, :skills_set, :certification, :hobby)";

      $stmt = $pdo->prepare($sql);
      
      $stmt->execute(['name' => $name, 'email' => $email, 'mobileno' => $mobileno, 'objective' => $objective, 'undergrad_cgpa' => $undergrad_cgpa, 'cgpa_12' => $cgpa_12, 'cgpa_10' => $cgpa_10,'internship' => $internship, 'skills_set' => $skills_set ,'certification' => $certification, 'hobby' => $hobby]);
     
}

?>

<html>
<head>
  <title>Fill the form</title>
  <style>
    @import "compass/css3";

    input[type=text2]
    {
      height: 70px;
    }

    .p-container {
      padding:0 20px 20px 20px; 
    }


    input[type=submit] {
      padding:5px 20px;
      border:1px solid rgba(0,0,0,0.4);
      text-shadow:0 -1px 0 rgba(0,0,0,0.4);
      box-shadow:
      inset 0 1px 0 rgba(255,255,255,0.3),
      inset 0 10px 10px rgba(255,255,255,0.1);
      border-radius:0.3em;
      background:#0184ff;
      color:white;
      float:right;
      font-weight:bold;
      cursor:pointer;
      font-size:13px;
    }

    input[type=submit]:hover {
      box-shadow:
      inset 0 1px 0 rgba(255,255,255,0.3),
      inset 0 -10px 10px rgba(255,255,255,0.1);
    }

    </style>
</head>
<body>
<p class="p-container">
      <input type="submit" name="go" id="go" value="Retrieve" onClick="location.href='http://localhost/project/retrieve.php'">
    </p>
    </body>
</html>