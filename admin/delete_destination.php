<?php
//  include("connection.php");
 include("../functions/session.php");
 include("../functions/functions.php");
 
 if(isset($_GET['id'])){
    echo $desti_id = $_GET['id'];

    global $db_ob;

    $del_sql ="DELETE FROM destinations WHERE id =:id";

    $stmt = $db_ob->prepare($del_sql);
    $stmt->bindValue(':id',$desti_id);

    $Execute= $stmt->execute();
    if($Execute){
        $_SESSION['SuccessMessage'] ="Destination deleted successfully..";
        Redirect_to("destinations.php");
    }else{
        $_SESSION['ErrorMessage'] ="Something went wrong!!!";
        Redirect_to("destinations.php");
    }
 }
?>