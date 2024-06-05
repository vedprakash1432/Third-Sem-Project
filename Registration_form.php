<?php
// include("./admin/connection.php");
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
?>
<?php 
already_login();

?>

<?php
if(isset($_POST['submit'])){
   $title = $_POST['title'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $address =$_POST['address'];
   $image  =$_FILES['image']['name'];
   $target = "./upload/".basename($_FILES['image']['name']);

   $phone = $_POST['phone'];
   $password = $_POST['password'];
   $con_password = $_POST['Con_password'];
//    / admin userName and admin password empty validation 
  if(empty($fname)||empty($password)||empty($lname)||empty($address)||empty($phone)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("Registration_form.php");
  }
//   elseif(is_numeric((int)$fname)){
//     $_SESSION['ErrorMessage'] ="Name should be alphabetical!";
//     Redirect_to("Registration_form.php");
    
//   }
  elseif(strlen($fname)&&strlen($lname)<3){
    $_SESSION['ErrorMessage'] ="first name and last name should be more than 3 charector!!";
    Redirect_to("Registration_form.php");

  }elseif(strlen($phone)<10){
    $_SESSION["ErrorMessage"]= "Number should be 10 digits";
    Redirect_to("Registration_form.php");

  }elseif (strlen($password)<6) {
    $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
    Redirect_to("Registration_form.php");
  }elseif ($password != $con_password) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
    Redirect_to("Registration_form.php");
  }elseif(CheckUserNameExistsOrNot($fname)){
    $_SESSION['ErrorMessage'] ="Name Exists. Try Another One!";
    Redirect_to("Registration_form.php");
  }
  else{

    global $db_ob;
    $sql = "INSERT INTO register(Title,First_Name,Last_Name,Email,Phone,Image,Address,Password)";
    $sql .="VALUES(:title,:fname,:lname,:email,:phone,:image,:address,:password)";
    
    $stmt= $db_ob->prepare($sql);
    $stmt->bindValue(':title',$title);
    $stmt->bindValue(':fname',$fname);
    $stmt->bindValue(':lname',$lname);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':phone',$phone);
    $stmt->bindValue(':image',$image);
    $stmt->bindValue(':address',$address);
    $stmt->bindValue(':password',$password);
    $Execute =$stmt->execute();
    // move_uploaded_file($_FILES["image"]["tmp_name"],$Target);
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    if($Execute){
     $_SESSION['SuccessMessage'] ="Register ".$fname." successfully";
    //   Redirect_to('index.php');
    }else {
     $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
     Redirect_to("registration_form.php");
   }

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
                         <h3 class="text-center text-primary ">
                            Get a RV Travel Account
                        </h3>
                <div class="center">
                    <div class="main border border-1 border-dark rounded shadow px-4 pb-2">
                      
                        <!-- <hr class="mx-3 m-0 p-0"> -->
                        
                     <form actcion="Registration_form.php" method ="post" enctype="multipart/form-data">

                        <div class="row mt-3">
                            <div class="col">
                                <label class="" for="">Title</label>
                                <select class="form-select w-auto mt-2" name="title" id="">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>                                   
                                </select>
                            </div>
                            <div class="col">
                                <label class="" for="">First Name <small class="text-danger">*</small></label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="fname" placeholder="First Name"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                            </div>
                            <div class="col">
                                <label class="" for="">Last Name <small class="text-danger">*</small></label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name"
                                        aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                            <label class="mt-4" for="">Mobile <small class="text-danger">*</small></label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter Your Mobile Number"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col">
                                <label class="mt-4" for="">Image</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-image"></i></span>
                                    <input type="file" name="image" class="form-control" placeholder="Enter image"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="mt-4" for="">Your Email Address <small class="text-danger">*</small></label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col">
                                <label class="mt-4" for="">Your address <small class="text-danger">*</small></label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-house"></i></span>
                                    <textarea name="address" class="form-control" placeholder="Enter Your Address"
                                    cols="10" rows="1"  aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="row mb-3">
                            <div class="col">
                            <label class="mt-4" for="">Password <small class="text-danger">*</small></label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col">
                                <label class="mt-4" for="">Confirm Password</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                    <input type="password" name="Con_password" class="form-control" placeholder="Re-Enter Your Password"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>


                        <div class="checks mt-2 ">
                            <input class="form-check-input mt-2" type="checkbox" name="check" id="" required>
                            <span>
                                I would like to be kept informed of special Promotions and offers. I hereby accept the
                                <a class="text-danger" href="#">Privacy Policy</a> and authorize SOTC and its
                                representatives to contact me.
                            </span>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary w-100 mt-4" value="Register">
                        <div class="login mt-2">
                            <span>
                                Already have an Account? <a class="text-success" href="Login_form.php">
                                    Login
                                </a>
                            </span>
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