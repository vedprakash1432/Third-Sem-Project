<?php
//  include("connection.php");
 include("../functions/functions.php");
 include("../include/header.php");
 include("../functions/session.php");

?>


    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div
                    class="sticky-top d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a class=" d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none ps-3">
                    <?php echo '<img class="img-fluid pro_img" src="../images/'.$_SESSION['AdminImage'].'" alt="">'?>
                    </a>
                    <span class="fs-5 d-none d-sm-inline text-primary">
                            &nbsp; <?php echo $_SESSION['AdminName']?>
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
                    <h1 class="text-primary p-2">
                        <i class="bi bi-people"></i>
                        Registered Users
                    </h1>
                    <?php
                       echo SuccessMessage();
                       echo ErrorMessage();
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered border-dark text-center table-striped shadow">
                                        <thead class="table-dark sticky-top">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Profile Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">First_Name</th>
                                                <th scope="col">Last_Name</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            
                                            global $db_ob;

                                            $select_sql ="SELECT * FROM register";

                                            $stmt=  $db_ob->query($select_sql);
                                            $sr =0;
                                            while($DataRow = $stmt->fetch()){
                                                $id = $DataRow['id'];
                                                $title = $DataRow['Title'];
                                                $fname = $DataRow['First_Name'];
                                                $lname = $DataRow['Last_Name'];
                                                $number = $DataRow['Phone'];
                                                $image = $DataRow['Image'];
                                                $email = $DataRow['Email'];
                                                $address = $DataRow['Address'];
                                               
                                                $sr++
                                           ?>
                                            <tr>
                                                <th scope="row"><?php echo $sr;?></th>
                                                <td class="pro_img">
                                                <?php echo'<img src="../upload/'.$image.'" class="" alt="" style="width:100px; height:60px">'; ?>
                                                </td>
                                                <td><?php echo $title?></td>
                                                <td><?php echo $fname?></td>
                                                <td><?php echo $lname?></td>
                                                <td><?php echo $number?></td>
                                                <td><?php echo $email?></td>
                                                <td><?php echo $address?></td>
                                                <td>
                                                    <a href="delete_user.php?id=<?php echo $id;?>" onClick="alert('would you like to delete this user')">
                                                    <span class="btn btn-outline-danger">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </span>
                                                    </a>
                                                </td>
                                            </tr>
                                             
                                            <?php
                                            
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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