<?php
include("./include/header.php");
include("./functions/functions.php");
include("./functions/session.php");
 ?>
<?php include("./include/navbar.php");?>
<?php confirm_login();?>

    <div class="row m-0 p-0">
        <div class="col-md-3">
            <div class="row">
                <div id="list-example" class="list-group p-5">
                    <a class="list-group-item list-group-item-action" href="profile.php"><i class="bi bi-person"></i>
                        My Profile</a>
                    <a class="list-group-item list-group-item-action active border-start border-5 border-dark"
                        href="my_booking.php"><i class="bi bi-book"></i>
                        My Booking</a>
                    <a class="list-group-item list-group-item-action" href="settings.php"><i class="bi bi-gear"></i>
                        Settings</a>
                    <a class="list-group-item list-group-item-action" href="co_travellers.php"><i
                            class="bi bi-people"></i> Co-Travellers</a>
                    <a class="list-group-item list-group-item-action" href="manage_holiday.php"><i
                            class="bi bi-calendar"></i> Manage Your Holidays</a>
                </div>
            </div>
        </div>
        <div class="col-md-8 m-0 p-0 ps-5 pt-3">
            <div class="mid ">
                <h5 class="bg-primary text-light shadow rounded p-2">
                    My Booking
                </h5> 
                
                <h3 >
                  Hi,
                  <span class="text-success">
                  <?php
                    $user_name = $_SESSION['UserName'];
                   echo $user_name;
                   ?>
                   </span>
                </h3>
                <?php
                  echo SuccessMessage();
                  echo ErrorMessage();
                ?>
                <!-- <div class="border mt-3 rounded p-2 shadow">
                    <div class="my-2 shadow">
                        <select class="form-select" name="" id="">
                            <option selected>Select one</option>
                            <option value="">Flights</option>
                            <option value="">Holiday</option>
                            <option value="">Hotel</option>
                            <option value="">Insurance</option>
                            <option value="">Rail Europe</option>
                        </select>
                    </div>                   
                </div> -->
<!-- booking data start here -->
              
                     <table class="table text-center table-striped shadow mt-5">
                     <thead class="table-dark sticky-top">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Dest_Name</th>
                            <th scope="col">Trav_date</th>
                            <th scope="col">Adult</th>
                            <th scope="col">Child</th>
                            <th scope="col">Playboy</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>     
                    <tbody>
                        <?php
                        $_user_name =$_SESSION['UserName'];
                        global $db_ob;
                        $select ="SELECT * FROM booking WHERE Name='$_user_name'";
                        $stmt=$db_ob->query($select);
                        $sr=0;
                        while($DataRow=$stmt->fetch()){
                            $id = $DataRow['id'];
                            $Name = $DataRow['Name'];
                            $Email = $DataRow['Email'];
                            $Number = $DataRow['Number'];
                            $Destination_Name = $DataRow['Destination_Name'];
                            $Travelling_date = $DataRow['Traveling_date'];
                            $Adult = $DataRow['Adult'];
                            $Child = $DataRow['Child'];
                            $Playboy = $DataRow['Playboy'];
                            $sr++;

                            ?>
                       
                        <tr>
                        <th scope="row"><?php echo htmlentities($sr)?></th>
                        <td><?php echo htmlentities($Name)?></td>
                        <td><?php echo htmlentities(substr($Email,0,15)).'..'?></td>
                        <td><?php echo htmlentities($Number)?></td>
                        <td><?php echo htmlentities($Destination_Name)?></td>
                        <td><?php echo htmlentities(substr($Travelling_date,0,10))?></td>
                        <td><?php echo htmlentities($Adult)?></td>
                        <td><?php echo htmlentities($Child)?></td>
                        <td><?php echo htmlentities($Playboy)?></td>
                        <td>
                            <a href="edit_booking_user.php?id=<?php echo $id?>">
                            <span class="btn btn-outline-warning">
                                <i class="bi bi-trash"></i>
                                Edit
                            </span>
                            </a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                     </table>
                   
                
                   <!-- booking data end here -->
            </div>
        </div>
    </div>
    <div class="col-md-1 m-0 p-0"></div>
    </div>

<?php
include("./include/footer.php");
?>