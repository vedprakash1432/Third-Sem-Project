<?php
//  database connection
try{
    $db_ob = new PDO("mysql:host=localhost;dbname=traveling","root","");
}catch(PDOException $e){
    die("Error: " . $e->getMessage());
}

if($db_ob){
    // echo "db connection establish !";
}
?>