<?php
include("../include/header.php");
include("../functions/session.php");
include("../functions/functions.php");

?>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div
                    class="sticky-top d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a class=" d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none ps-3">
                       <?php echo '<img class="img-fluid pro_img" src="../images/'.$_SESSION['AdminImage'].'" alt="image is missing">'?>
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
                    <div class="row mt-3"> 
                        <div class="col">
                          <h1>
                          Destinations
                         </h1>
                        </div>                   
                        <div class="col">
                          <a href="add_destination.php" ><button type="button" class="btn btn-primary">Add_Destination</button></a>
                        </div>                   
                    
                    </div>
                    <?php
                       echo SuccessMessage();
                       echo ErrorMessage();
                    ?>
                   <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover border-dark table-bordered text-center table-info">
                                        <thead class="table-dark sticky-top">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Destinations Image</th>
                                                <th scope="col">Destinations Name</th>
                                                <th scope="col">Destinations Price</th>
                                                <th scope="col">Destination type</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>                                       
                                        <tbody>
                                        <?php
                                          global $db_ob;

                                          $select_sql ="SELECT * FROM destinations";
                                          $data = $db_ob->query($select_sql);
                                          $sn =0;
                                          while($DataRow = $data->fetch()){
                                              $id = $DataRow['id'];
                                              $dName = $DataRow['Name'];
                                              $dImage = $DataRow['Image'];
                                              $dPrice = $DataRow['Price'];
                                              $holiday_type = $DataRow['Destination_type'];
                                              $Description = $DataRow['Description'];
                                              $sn++;
                                           ?>
                                            <tr>
                                                <th scope="row"><?php echo $sn?></th>
                                                <td class="pro_img">
                                                    <?php echo '<img src="../upload/'.$dImage.'" alt="Image No Avilable">' ?>
                                                </td>
                                                <td><?php echo $dName?></td>
                                                <td>$<?php echo $dPrice?></td>
                                                <td><?php echo $holiday_type?></td>
                                                <td><?php echo substr($Description,0,30)?>..</td>
                                                <td>
                                                   
                                                    <!-- Edit Button Modal -->
                                                    <a href="update_destinations.php?id=<?php echo $id?>"><span class="btn btn-outline-warning shadow"><i class="fa fa-edit f-2x"></i> </span></a>                                        
                                                  <a href="delete_destination.php?id=<?php echo $id?>">
                                                  <span class="btn btn-outline-danger shadow"><i class="bi bi-trash"></i></span></a>
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

        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>

</body>

</html>