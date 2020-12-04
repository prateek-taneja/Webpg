<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=ss", "root", "");
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 

try{
    $sql = "SELECT * FROM resume";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
               // echo "<th>id</th>";
                echo "<th>email</th>";
                echo "<th>mobileno</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['mobileno'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 

unset($pdo);
?>