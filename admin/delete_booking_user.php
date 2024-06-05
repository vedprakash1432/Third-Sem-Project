<?php
//  include("connection.php");
 include("../functions/session.php");
 include("../functions/functions.php");
 
 if(isset($_GET['id'])){
    echo $booking_id = $_GET['id'];


    global $db_ob;

    $del_sql ="DELETE FROM booking WHERE id =:id";

    $stmt = $db_ob->prepare($del_sql);
    $stmt->bindValue(':id',$booking_id);

    $Execute= $stmt->execute();
    if($Execute){
        $_SESSION['SuccessMessage'] ="booking user deleted successfully..";
        Redirect_to("booking_users.php");
    }else{
        $_SESSION['ErrorMessage'] ="Something went wrong!!!";
    }
 }


?>