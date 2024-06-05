<?php
include("./functions/connection.php");
?>


<!-- navbar start here -->
<nav class="navbar navbar-expand-lg bg-dark shadow sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand m-0 p-0" href="index.php">
                <img class="rounded" src="images/main logo.png" alt="">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto"> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="flight.php">FLIGHTS</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="offers.php">OFFERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="others.php">PACKAGES</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                             INTERNATIONAL HOLIDAYS
                        </a>
                        <ul class="dropdown-menu bg-dark shadow">
                            <?php
                            global $db_ob;
                            $select_sql ="SELECT * FROM destinations WHERE Destination_type='international' LIMIT 12";
                            $stmt =$db_ob->query($select_sql);
                            
                            while($DataRow = $stmt->fetch()){
                                $id  =$DataRow['id'];
                                $Name  =$DataRow['Name'];
                                $Destination_type  =$DataRow['Destination_type'];
                                
                                ?>
                                <li><a class="dropdown-item" href="destinations.php?id=<?php echo $id?>"><i class="bi bi-chevron-right"></i> <?php echo htmlentities($Name)?> Tour Package</a></li>
                            <?php
                              }
                            ?>                            
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                             SERVICES
                        </a>
                        <ul class="dropdown-menu bg-dark shadow">
                            <li><a class="dropdown-item" href="team_member.php"><i class="bi bi-chevron-right"></i> Team Members</a></li>
                            <li><a class="dropdown-item" href="hdfc_offer.php"><i class="bi bi-chevron-right"></i> HDFC Bank Offer</a></li>
                            <li><a class="dropdown-item" href="about_us.php"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown bg-dark shadow rounded">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person"></i>
                            SIGNIN/SIGNOUT
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end drop_log border border-dark rounded shadow bg-dark text-center">
                            <i class="bi bi-person display-1 text-light"></i><br>
                            <a class="btn btn-success" href="Login_form.php">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                            <p class="text-light mt-3">
                                New User?
                                <a class="btn btn-primary" href="Registration_form.php">
                                    Register
                                </a>
                            </p>
                            <hr class="m-0 p-0 bg-black border border-2 border-black">
                            <a class="p-2 d-block drop_a" href="my_booking.php">
                                Manage Bookings
                            </a>
                            <a class="p-2 d-block drop_a" href="my_booking.php">
                                Cancellation
                            </a>
                            <a class="p-2 d-block drop_a" href="Login_form.php">
                                Profile
                            </a>
                            <a class="p-2 d-block drop_a" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- navbar end here -->