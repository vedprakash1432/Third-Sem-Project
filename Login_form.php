<?php
// include("./admin/connection.php");
include("./functions/functions.php");

include("./functions/session.php");
include("./include/header.php");
?>
<?php already_login();?>
<?php
if(isset($_POST['submit'])){
   
    $username = $_POST['uname'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)){
        $_SESSION['ErrorMessage'] ="All field must be fill out";
        Redirect_to("Login_form.php");

    }else{
        $found_account =login_Attempt($username,$password);
        if($found_account){
          $_SESSION['UserId'] = $found_account['id'];
          $_SESSION['UserName'] = $found_account['First_Name'];
          $_SESSION['SuccessMessage'] = "Welcome ".$_SESSION['UserName']."!";
           redirect_to("profile.php");
        }else{
          $_SESSION['ErrorMessage'] = "incorrect Username / Password";
          redirect_to('Login_form.php');
        }
    }
 
}
?>

<?php
 include("./include/navbar.php");
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 m-0 p-0">
                <div class="main">
                    <form class="border border-2 border-primary p-5 rounded shadow-lg" action="Login_form.php" method="post" enctype="multipart/form-data">
                        <div class="pic img-responsive text-center">
                            <img class="img-responsive rounded shadow" src="images/main logo.png" alt="Profile Image">
                            <h2 class=" text-center my-4">
                                Login
                            </h2>
                        </div>
                        <?php
                        //   echo SuccessMessage();
                          echo ErrorMessage();
                        ?>
                        <div class="form-group  ">
                            <div class="input-group mb-4 shadow">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" name="uname" class="form-control" placeholder="Username" aria-label="Username"
                                    aria-describedby="basic-addon1" >
                            </div>
                            <div class="input-group shadow">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                    <span class="input-group-text span_eye" onclick="myFunction()"><i class="bi bi-eye"></i></span>
                            </div>
                        </div>
                        <div class="check my-3">
                            <input class=" form-check-input shadow" type="checkbox" name="check" id="check">
                            <label for="check">Remember Me</label>
                        </div>
                        <div class="forgot text-center ">
                            <a href="#">
                                Forgot Password
                            </a>
                        </div>
                        <div class="text-center">
                            <span>
                                Haven't Account
                            </span>
                            <a href="Registration_form.php">Register</a>
                        </div>
                        <div class="text-center my-3">
                            <input type="submit" name="submit" class="btn btn-primary w-25 shadow-lg" value="Login">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php
include("./include/footer.php");
?>