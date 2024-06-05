<?php
//  include("connection.php");
 include("../functions/functions.php");
 include("../include/header.php");
 include("../functions/session.php");

?>
<?php
    $id=$_SESSION['AdminId'];
    $image=$_SESSION['AdminImage'];
    $name=$_SESSION['AdminName'];

  ?>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <!-- left part of dashboard -->

            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div
                    class="sticky-top d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a class=" d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none ps-3">
                       <?php echo '<img class="img-fluid pro_img" src="../images/'.$_SESSION['AdminImage'].'" alt="image is missing">'?>
                        
                    </a>
                    <span class="fs-5 d-none d-sm-inline text-primary">
                            &nbsp; <?php echo $_SESSION['AdminName'] ?>
                        </span>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
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
                           <?php echo '<img src="../images/'.$_SESSION['AdminImage'].'" alt="hugenerd" width="30" height="30" class="rounded-circle">'?>
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
           
            <!-- right part of dashboard -->
            <div class="col">
                <div class="row sticky-top">
                    <div class="top bg-dark">
                        <a href="../index.php">
                            <img src="../images/main logo.png" alt="Image No Avilable">
                        </a>
                        <h1 class="">
                            <span class="text-warning">
                                R
                            </span>
                            <span class="text-info">
                                V
                            </span>
                            <span class="text-light">
                                Travel
                            </span>
                        </h1>
                        <div class="top_ico "></div>
                    </div>
                </div>
                <div class="row">
                <?php
              echo SuccessMessage();
              echo ErrorMessage();
            ?>
                    <div class="col-md-3">
                        <div class="card bg-dark mt-3 shadow border border-2 border-dark px-2 four_card">
                          <a href="../profile.php"> <lord-icon src="https://cdn.lordicon.com/lhwyshcs.json" trigger="hover"
                                style="width:150px;height:150px">
                            </lord-icon> </a> 
                            <span class="display-6 text-light">
                                Profile
                            </span>
                          
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark mt-3 shadow border border-2 border-dark px-2 four_card">
                          <a href="../admin/registered_user.php">  <lord-icon src="https://cdn.lordicon.com/hojnqwxj.json" trigger="hover"
                                style="width:150px;height:150px">
                            </lord-icon></a>
                            <span class="display-6 text-light">
                                Users
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark mt-3 shadow px-2 four_card">
                           <a href="destinations.php"> <lord-icon src="https://cdn.lordicon.com/ajfmgpbq.json" trigger="hover"
                                style="width:150px;height:150px">
                            </lord-icon> </a>
                            <span class="display-6 text-light">
                                Destinations
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark mt-3 shadow px-2 four_card">
                          <a href="booking_users.php">  <lord-icon src="https://cdn.lordicon.com/xsqjakgm.json" trigger="hover"
                                style="width:150px;height:150px">
                            </lord-icon> </a>
                            
                            <span class="display-6 text-light">
                                Bookings
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card  mt-3 p-3 shadow text-primary">
                            <h1>
                                <i class="bi bi-people"></i>
                                Team Members
                            </h1>
                            <div class="row">
                                <?php
                                  global $db_ob;

                                  $sql ="SELECT * FROM admin";
                                  $stmt =$db_ob->query($sql);
                                  while($DataRow =$stmt->fetch()){
                                    $id =$DataRow['id'];
                                    $AdminName =$DataRow['Name'];
                                    $AdminNumber =$DataRow['Number'];
                                    $AdminImage =$DataRow['Image'];
                                    $AdminBio =$DataRow['Bio'];
                                    $AdminEmail =$DataRow['Email'];

                                    ?>
                                
                                <div class="col-md-6">
                                    <div class="card member text-center p-2 shadow border border-2 border-info">
                                        <div class="member_image">
                                           <?php echo '<img class="border shadow" src="../images/'.$AdminImage.'" alt="">'?>
                                        </div>
                                        <h2 class="mt-2">
                                           <?php echo $AdminName; ?>
                                        </h2>
                                        <span class="mb-2">
                                            <?php echo $AdminBio?>
                                        </span>
                                        <div class="member_icons border border-2 rounded shadow">
                                            <a class="text-success" href="https://wa.me/7052141220">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>
                                            <a class="text-danger" href="https://www.instagram.com/raj_kumar_g/">
                                                <i class="bi bi-instagram"></i>
                                            </a>
                                            <a class="text-primary"
                                                href="https://www.linkedin.com/in/rajkumar-sharma-411a44248/">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                            <a class="text-dark" href="https://github.com/rajkumardevl">
                                                <i class="bi bi-github"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                  }
                                ?>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-3 p-3 shadow">
                            <h1 class="text-primary">
                                <i class="bi bi-bar-chart"></i>
                                Progress Bar
                                </h2>
                                <hr>
                                <span>
                                    Registered Users
                                </span>
                                <div class="progress" role="progressbar" aria-label="Animated striped example"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar text-bg-primary progress-bar-striped progress-bar-animated" style="width: 50%">50%</div>
                                </div>
                                <span class="mt-3">
                                    Booked Users
                                </span>
                                <div class="progress" role="progressbar" aria-label="Animated striped example"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar text-bg-success progress-bar-striped progress-bar-animated" style="width: 65%">65%</div>
                                </div>
                                <span class="mt-3">
                                    Pending Users
                                </span>
                                <div class="progress" role="progressbar" aria-label="Animated striped example"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar text-bg-danger progress-bar-striped progress-bar-animated" style="width: 45%">45%</div>
                                </div>
                                <span class="mt-3">
                                    Completed Users
                                </span>
                                <div class="progress mb-2" role="progressbar" aria-label="Animated striped example"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar text-bg-info progress-bar-striped progress-bar-animated" style="width: 75%">75%</div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card text-center py-2 my-3 bg-">
                        <p class="display-4">
                            R V Travel
                        </p>
                        <span>
                            Copyright &copy; 2022 R V Travel All Rights Reserved
                        </span>
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