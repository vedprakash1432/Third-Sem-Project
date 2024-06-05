<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
include("./include/navbar.php");
?>
<?php
  $user_id = $_SESSION['UserId'];

  if(isset($_POST['update'])){
    $password =$_POST['password'];
    $cnf_password =$_POST['cnf_password'];
    //    / admin userName and admin password empty validation 
    if(empty($password)||empty($cnf_password)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("settings.php");
    }elseif (strlen($password)<4) {
    $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
    Redirect_to("settings.php");
  }elseif ($password != $cnf_password) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
    Redirect_to("settings.php");
  }else{

    global $db_ob;

    $update ="UPDATE register SET Password =:password WHERE id=$user_id";
    $stmt= $db_ob->prepare($update);
    $stmt->bindValue(':password',$password);
    $Execute =$stmt->execute();
    if($Execute){
        $_SESSION['SuccessMessage'] ="Password change successfully";
        // Redirect_to("settings.php");
    }else{
        $_SESSION['ErrorMessage'] ="something went wrong";
        // Redirect_to("settings.php");
    }

  }


  }

?>
    <div class="row m-0 p-0">
        <div class="col-md-3">
            <div class="row">
                <div id="list-example" class="list-group p-5">
                    <a class="list-group-item list-group-item-action" href="profile.php"><i class="bi bi-person"></i>
                        My Profile</a>
                    <a class="list-group-item list-group-item-action" href="my_booking.php"><i class="bi bi-book"></i>
                        My Booking</a>
                    <a class="list-group-item list-group-item-action active border-start border-5 border-dark"
                        href="settings.php"><i class="bi bi-gear"></i>
                        Settings</a>
                    <a class="list-group-item list-group-item-action" href="co_travellers.php"><i
                            class="bi bi-people"></i> Co-Travellers</a>
                    <a class="list-group-item list-group-item-action" href="manage_holiday.php"><i
                            class="bi bi-calendar"></i> Manage Your Holidays</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 m-0 p-0 ps-5 pt-3">
            <div class="mid">
                <h5 class="bg-primary text-light shadow rounded p-2">
                    Account Setting
                </h5>
                <h3>
                    Hi, <span class="text-success">
                        <?php 
                          $user_name = $_SESSION['UserName'];
                        echo $user_name?>
                    </span>
                </h3>
                <?php
                  echo SuccessMessage();
                  echo ErrorMessage();
                ?>
                <div class="accordion border p-3 rounded" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Change Password
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input class="form-control" type="password" name="old" id="" placeholder="Old Password" readonly value="Raj@123">
                                            <input class="form-control mt-3" type="password" name="password" id="" placeholder="New Password">
                                            <input class="form-control mt-3" type="password" name="cnf_password" id="" placeholder="Confirm Password">
                                            <button class="btn btn-primary mt-3 w-100"name="update" >Change Password</button>

                                        </form>
                                        

                                        
                                    </div>
                                    <div class="col">
                                        <div class="right border-2 border-dark border-start p-3">
                                            <p>
                                                <i class="bi bi-check"></i>
                                                Contains between X- XX characters
                                            </p>
                                            <p>
                                                <i class="bi bi-check"></i>
                                                Contains at least X- mixed case letter
                                            </p>
                                            <p>
                                                <i class="bi bi-check"></i>
                                                Contains at least X number
                                            </p>
                                            <p>
                                                <i class="bi bi-check"></i>
                                                Contains at least X special character
                                            </p>
                                            <p>
                                                <i class="bi bi-check"></i>
                                                Does not contain white space
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-3 m-0 p-0"></div>
    </div>

  <?php
    include("./include/footer.php");
  ?>