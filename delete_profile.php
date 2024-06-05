<?php
include("./functions/session.php");
include("./functions/functions.php");

if(isset($_GET['id'])){
    $id =$_GET['id'];

    global $db_ob;

    $del ="DELETE FROM register WHERE id =:id";
    $stmt = $db_ob->prepare($del);
    $stmt->bindValue(':id',$id);

    $Execute= $stmt->execute();
    if($Execute){
        $_SESSION['SuccessMessage'] ="Profile deleted successfully..";
        Redirect_to("index.php");
    }else{
        $_SESSION['ErrorMessage'] ="Something went wrong!!!";
    }
}
?>