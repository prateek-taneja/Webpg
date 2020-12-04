<?php 

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "reg";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $category = $_POST['category'];
  $mobile = $_POST['mobileno'];
  
      $sql = "INSERT INTO test (email, mobile, password, category) VALUES (:email, :mobile, :password, :category)";

      $stmt = $pdo->prepare($sql);
      
      $stmt->execute(['email' => $email, 'mobile' => $mobile, 'password' => $password, 'category' => $category]);
     
}

?>