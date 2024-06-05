<?php
//  include("connection.php");
 include("../functions/functions.php");
 include("../include/header.php");
 include("../functions/session.php");

?>
</style>
    <title>Admin Panal</title>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>

<body>
    <?php
    $admin_id =$_SESSION['AdminId'];
    global $db_ob;

    $select= "SELECT * FROM admin WHERE id=$admin_id";
    $stmt =$db_ob->query($select);
    while($DataRow=$stmt->fetch()){
        $admin_id =$_SESSION['AdminId'];
        $Name =$DataRow['Name'];
        $Email =$DataRow['Email'];
        $Image =$DataRow['Image'];
        $Number =$DataRow['Number'];
        $Password =$DataRow['Password'];
        $Bio =$DataRow['Bio'];

    }
    ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="sticky-top d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a class=" d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none ps-3">
                    <?php echo '<img class="img-fluid pro_img" src="../images/'.$_SESSION['AdminImage'].'" alt="">'?>             
                       
                    </a>
                        <span class="fs-5 d-none d-sm-inline text-primary">
                            &nbsp; <?php echo $_SESSION['AdminName']?>
                        </span>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="registered_user.php" class="nav-link align-middle px-0">
                                <i class="fs-4  bi-people"></i> <span class="ms-1 d-none d-sm-inline">Registered
                                    Users</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="booking_users.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Booking
                                    Users</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Destinations.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-geo"></i> <span class="ms-1 d-none d-sm-inline">Destinations</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                           <?php echo '<img class="rounded-circle" src="../images/'.$_SESSION['AdminImage'].'" alt="" width="30" height="30" >'?>
                            <span class="d-none d-sm-inline mx-1">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="admin_profile.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row sticky-top">
                    <div class="top bg-dark">
                        <a href="../RV Travel.html">
                            <img src="../images/main logo.png" alt="Image No Avilable">
                        </a>
                        <h1 class="">
                            <span class="text-info">
                                R
                            </span>
                            <span class="text-warning">
                                V
                            </span>
                            <span class="text-light">
                                Travel
                            </span>
                        </h1>
                        <div class="top_ico text-light"></div>
                    </div>
                </div>
                <?php
                        if(isset($_POST['update'])){
                            
                            $name=$_POST['name'];
                            $mobile=$_POST['mobile'];
                            $email=$_POST['email'];
                            $image=$_FILES['image']['name'];
                            $bio=$_POST['bio'];
                            $target ="../images/".basename($_FILES['image']['name']);

                            global $db_ob;
                            $update_sql ="UPDATE admin SET Name='$name',Email='$email',Image='$image',Number='$mobile',Bio='$bio' WHERE id =$admin_id";

                            $stmt=$db_ob->prepare($update_sql);
                        
                            $Execute =$stmt->execute();
                            move_uploaded_file($_FILES['image']['tmp_name'],$target);
                            if($Execute){
                                $_SESSION['SuccessMessage']="Admin details updated successfully.";
                                // Redirect_to('admin_profile.php');
                            }else{
                            $_SESSION['ErrorMessage'] ="something went wrong!! try again!!!";
                                 // Redirect_to('admin_profile.php');
                            }

                        }
                        ?>

                <div class="row">
                    <?php
                       echo SuccessMessage();
                       echo ErrorMessage();
                    ?>
                    <div class="profile text-center">
                        <h1 class=" text-decoration-underline display-5 text-primary">
                            Admin
                            
                        </h1>
                       <?php echo '<img class="img-fluid border mt-2 shadow-lg" src="../images/'.$Image.'" alt=" image is missing">'?>
                        <h3 class="mt-2"><?php echo htmlentities($Name)?></h3>
                        <p>
                            <i class="bi bi-telephone-fill"></i>
                            <?php echo htmlentities($Number)?>
                        </p>
                        <p>
                            <i class="bi bi-envelope-fill"></i>
                            <?php echo htmlentities($Email)?>
                            
                        </p>
                        <p>
                            <i class="bi bi-geo-alt-fill"></i>
                            India
                        </p>
                        <p class="mt-2"><?php echo htmlentities($Bio)?></p>

                        <!-- Edit Profile Model -->
                        <button type="button" class="btn btn-warning mt-2 shadow" data-bs-toggle="modal"
                            data-bs-target="#EditProfileModal">
                            <i class="bi bi-pencil"></i> Edit Profile
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="EditProfileModal" tabindex="-1"
                            aria-labelledby="EditProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="EditProfileModalLabel">Admin Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                       
                                        <form  action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="<?php echo htmlentities($Name);?>" value="" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="mobile" name="mobile"
                                                    placeholder="<?php echo htmlentities($Number);?>" value="" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="<?php echo htmlentities($Email);?>" value="" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="file" class="form-control" id="image" name="image" required>
                                            </div>
                                            <div class="mb-3">
                                                <textarea name="bio" id="" cols="20" rows="3" class="form-control" placeholder="<?php echo htmlentities($Bio);?>"></textarea>
                                                
                                            </div>
                                            <div class="modal-footer">
                                              <input type="submit" name="update" class="btn btn-primary" value="Save changes">
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <?php
                          $admin_id = $_SESSION['AdminId'];
                         if(isset($_POST['change'])){

                            $password =$_POST['NewPassword'];
                            $cnf_password =$_POST['CnfNewPassword'];
                            //    / admin userName and admin password empty validation 
                            if(empty($password)||empty($cnf_password)){
                            $_SESSION["ErrorMessage"]= "All fields must be filled out";
                            Redirect_to("admin_profile.php");
                            }elseif (strlen($password)<4) {
                            $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
                            Redirect_to("admin_profile.php");
                            }elseif ($password != $cnf_password) {
                            $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
                            Redirect_to("admin_profile.php");
                            }else{

                            global $db_ob;

                            $update ="UPDATE admin SET Password =:password WHERE id=$admin_id";
                            $stmt= $db_ob->prepare($update);
                            $stmt->bindValue(':password',$password);
                            $Execute =$stmt->execute();
                            if($Execute){
                                $_SESSION['SuccessMessage'] ="Password change successfully";
                                 echo "<script>window.location.href='admin_profile.php'</script>";
                            }else{
                                $_SESSION['ErrorMessage'] ="something went wrong";
                                echo "<script>window.location.href='admin_profile.php'</script>";

                            }
                            }
                            }
                            ?>

                        <!-- Reset Password Model -->
                        <button type="button" class="btn btn-primary shadow mt-2" data-bs-toggle="modal"
                            data-bs-target="#PasswordResetModal">
                            <i class="bi bi-key"></i> Reset Password
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="PasswordResetModal" tabindex="-1"
                            aria-labelledby="PasswordResetModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="PasswordResetModalLabel">Reset Password</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3 input-group">
                                                <input type="password" class="form-control" id="myInput"
                                                    name="opassword" value="<?php echo $_SESSION['AdminPassword']?>" readonly>
                                                <span class="input-group-text" onclick="myFunction()">
                                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                </span>
                                            </div>
                                            <div class="mb-3 input-group">
                                                <input type="password" class="form-control" id="myInput2"
                                                    name="NewPassword" placeholder="Enter Your New Password">
                                                <span class="input-group-text" onclick="myFunction2()">
                                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                </span>
                                            </div>
                                            <div class="mb-3 input-group">
                                                <input type="password" class="form-control" id="myInput2"
                                                    name="CnfNewPassword" placeholder="Enter confirm New Password">
                                                <span class="input-group-text" onclick="myFunction2()">
                                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                </span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="change" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

</body>

</html>