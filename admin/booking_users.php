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
                        Booked Users
                    </h1>
                    <?php
                      echo SuccessMessage();
                      echo ErrorMessage();
                    
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered border-dark text-center">
                                        <thead class="table-dark sticky-top">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Destination_Name</th>
                                                <th scope="col">Travelling_date</th>
                                                <th scope="col">Adult</th>
                                                <th scope="col">Child</th>
                                                <th scope="col">Playboy</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               global $db_ob;

                                               $sr=0;
                                               $select_sql="SELECT * FROM booking";
                                               $stmt =$db_ob->query($select_sql);
                                                
                                               while($DataRow = $stmt->fetch()){
                                                $id =$DataRow['id'];
                                                $Name =$DataRow['Name'];
                                                $Email =$DataRow['Email'];
                                                $Number =$DataRow['Number'];
                                                $Destination_Name =$DataRow['Destination_Name'];
                                                $Travelling_date =$DataRow['Traveling_date'];
                                                $Adult =$DataRow['Adult'];
                                                $Child =$DataRow['Child'];
                                                $Playboy =$DataRow['Playboy'];
                                                $sr++;

                                                ?>
                                               
                                            <tr>
                                                <th scope="row"><?php echo htmlentities($sr)?></th>
                                                <td><?php echo htmlentities($Name)?></td>
                                                <td><?php echo htmlentities($Email)?></td>
                                                <td><?php echo htmlentities($Number)?></td>
                                                <td><?php echo htmlentities($Destination_Name)?></td>
                                                <td><?php echo htmlentities($Travelling_date)?></td>
                                                <td><?php echo htmlentities($Adult)?></td>
                                                <td><?php echo htmlentities($Child)?></td>
                                                <td><?php echo htmlentities($Playboy)?></td>
                                                <td>
                                                    <a href="delete_booking_user.php?id=<?php echo $id?>">
                                                    <span class="btn btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                       
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