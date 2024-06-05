<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
?>

<?php
 $UserId =$_SESSION['UserId'];

if(isset($_POST['update'])){
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $email =$_POST['email'];
    $number =$_POST['phone'];
    $Image =$_FILES['image']['name'];
    $address =$_POST['address'];
    
    global $db_ob;
    $update ="UPDATE register SET First_Name='$fname',Last_Name='$lname',Email='$email',Phone=$number,Image='$Image',Address='$address'  WHERE id=$UserId";
    $stmt = $db_ob->prepare($update);
    $Execute =$stmt->execute();
    
    if($Execute){
       $_SESSION['SuccessMessage'] = "Profile updated successfully...";
    //    echo "<script>window.location.href='profile.php'</script>";
          Redirect_to('profile.php'); 
    }else{
     $_SESSION['ErrorMessage'] ="Something went wrong!!!!";
    //    echo "<script>window.location.href='profile.php'</script>";
          Redirect_to('profile.php'); 
        
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
                    Update your profile
                </h3>
                <?php
                  global $db_ob;
                  
                  $select ="SELECT * FROM register WHERE id=$UserId";
                  $stmt = $db_ob->query($select);
                  
                  while($DataRow =$stmt->fetch()){
                    $fname=$DataRow['First_Name'];
                    $lname=$DataRow['Last_Name'];
                    $email=$DataRow['Email'];
                    $number=$DataRow['Phone'];
                    $address=$DataRow['Address'];
                  }
                ?>
                <div class="center">                    
                    <div class="main shadow px-4 pb-2">                      
                        <!-- <hr class="mx-3 m-0 p-0"> -->
                        
                     <form actcion="" method ="post" enctype="multipart/form-data">
                     
                        <div class="row">
                            <div class="col">
                                <label class="" for="">First Name</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $fname?>"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                            </div>
                            <div class="col">
                                <label class="" for="">Last Name</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $lname?>"
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
                                <label class="mt-4" for="">Image</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-image"></i></span>
                                    <input type="file" name="image" class="form-control"
                                        aria-label="Username" aria-describedby="basic-addon1">
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
                            <div class="col">
                                <label class="mt-4" for="">Your address</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-house"></i></span>
                                    <textarea name="address" class="form-control"
                                    cols="10" rows="1"  aria-label="Username" aria-describedby="basic-addon1"><?php echo $address?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <a href="profile.php" class="btn btn-warning">back to profile</a>
                            <input type="submit" name="update" class="btn btn-primary " value="Update Now">
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