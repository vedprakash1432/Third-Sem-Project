<?php
include("connection.php");
?>
<?php
// for give the location to redirect another page
function Redirect_to($new_location){
    header('Location:'.$new_location);
    exit;
}

//    method to check user how many time trying to login
function login_Attempt($username,$password){
    global $db_ob;
    $sql = "SELECT * FROM `register` WHERE `First_Name` = :username AND `password` = :password LIMIT 1";
    $stmt = $db_ob->prepare($sql);
    $stmt->bindValue(':username',$username);
    $stmt->bindValue(':password',$password);
    $stmt->execute();
    $result = $stmt->rowCount();    
   if($result == 1){
       return $stmt->fetch();
   }else{
       return null;
   }
}
//    method to check if you are not login
function confirm_login(){
    if(!isset($_SESSION['UserId'])){
        echo "<script>window.location.href='login_form.php'</script>";

    }
}

//  method if you are login then go to dashboard
function already_login(){
    if(isset($_SESSION['UserId'])){
        Redirect_to("profile.php"); 
    }
}

//CheckIfuserExistOrNot
function CheckUserNameExistsOrNot($username){
    global $db_ob;
    $sql ="SELECT First_Name FROM register WHERE First_Name =:UserName";
    $stmt =$db_ob->prepare($sql);
    $stmt->bindValue(':UserName',$username);
    $stmt->execute();
    $result =$stmt->rowcount();
    if($result ==1){
        return true;
    }else{
        return false;
    }
}
?>