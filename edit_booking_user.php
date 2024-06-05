<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
?>

<?php
//  $UserId =$_SESSION['UserId'];
if(isset($_GET['id'])){
   $id =$_GET['id'];
                
    global $db_ob;
    $select ="SELECT * FROM booking WHERE id=$id";
    $stmt = $db_ob->query($select);
    
    while($DataRow =$stmt->fetch()){
      $name=$DataRow['Name'];
        $email=$DataRow['Email'];
      $number=$DataRow['Number'];
      $Destination_Name=$DataRow['Destination_Name'];
     $Traveling_date=$DataRow['Traveling_date'];
     $Adult=$DataRow['Adult'];
    $Child=$DataRow['Child'];
    $Playboy=$DataRow['Playboy'];
    }
               
}
?>
<?php

if(isset($_POST['update'])){
    $name =$_POST['name'];
    $email =$_POST['email'];
    $number =$_POST['phone'];
    $Destination_Name =$_POST['Destination_Name'];
    $travelling_date =$_POST['travelling_date'];
    $Adult =$_POST['Adult'];
    $Child =$_POST['Child'];
    $Playboy =$_POST['Playboy'];
    
    global $db_ob;
    $update ="UPDATE booking SET Name='$name',Email='$email',Number=$number,Destination_Name='$Destination_Name',Traveling_date='$travelling_date',Adult='$Adult',Child='$Child',Playboy='$Playboy'  WHERE id=$id";
    $stmt = $db_ob->prepare($update);
    $Execute =$stmt->execute();
    
    if($Execute){
       $_SESSION['SuccessMessage'] = "Booking updated successfully...";
    //    echo "<script>window.location.href='profile.php'</script>";
          Redirect_to('my_booking.php'); 
    }else{
     $_SESSION['ErrorMessage'] ="Something went wrong!!!!";
    //    echo "<script>window.location.href='profile.php'</script>";
          Redirect_to('my_booking.php'); 
        
    }
    
 }
?>

<?php
include("./include/navbar.php");
?>
        <div class="row mb-5 mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>
                <h3 class="text-center text-primary">
                    Update your Booking
                </h3>
                
                <div class="center">                    
                    <div class="main shadow px-4 pb-2">                      
                        <!-- <hr class="mx-3 m-0 p-0"> -->
                        
                     <form actcion="" method ="post" enctype="multipart/form-data">
                     
                        <div class="row">
                            <div class="col">
                                <label class="" for="">Name</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="name" value="<?php echo $name?>"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                            </div>
                            <div class="col">
                                <label class="" for="">Destination_Name</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="Destination_Name" value="<?php echo $Destination_Name?>"
                                        aria-label="Username" aria-describedby="basic-addon1">
                               </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col">
                            <label class="mt-4" for="">Mobile</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                    <input type="number" name="phone" class="form-control" value="<?php echo $number?>"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col">
                                <label for="" class="col-form-label mt-2">Travel date:</label>
                                <div class="mt-2">
                                    <input type="date" name="travelling_date" class="form-control" id="">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="mt-4" for="">Your Email Address</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" value="<?php echo $email?>"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="">Room:</label>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Adult</label>
                                    <input type="number" name="Adult" class="form-control" id="" value="<?php echo $Adult?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Child</label>
                                    <input type="number" name="Child" class="form-control" id="" value="<?php echo $Child?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Playboy</label>
                                    <input type="number" name="Playboy" class="form-control" id="" value="<?php echo $Playboy?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" name="update" class="btn btn-primary w-100 mt-4" value="Update Now">
                        </div>

                        </form>                      
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
<?php
include("./include/footer.php");
?>