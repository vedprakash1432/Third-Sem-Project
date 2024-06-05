<?php
//  include("connection.php");
 include("../functions/session.php");
 include("../functions/functions.php");
 
 if(isset($_GET['id'])){
    echo $user_id = $_GET['id'];


    global $db_ob;

    $del_sql ="DELETE FROM register WHERE id =:id";

    $stmt = $db_ob->prepare($del_sql);
    $stmt->bindValue(':id',$user_id);

    $Execute= $stmt->execute();
    if($Execute){
        $_SESSION['SuccessMessage'] ="User deleted successfully..";
        Redirect_to("registered_user.php");
    }else{
        $_SESSION['ErrorMessage'] ="Something went wrong!!!";
    }
 }


?>