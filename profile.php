 <?php
include("./include/header.php");
include("./functions/functions.php");
include("./functions/session.php");
 ?>
<?php include("./include/navbar.php");?>
<?php confirm_login();?>

    <div class="row m-0 p-0">
        <?php
          echo SuccessMessage();
          echo ErrorMessage();
        ?>
        <div class="col-md-3">
            <div class="row">
                <div id="list-example" class="list-group p-5">
                    <a class="list-group-item list-group-item-action active border-start border-5 border-dark" href="profile.php"><i class="bi bi-person"></i> My Profile</a>
                    <a class="list-group-item list-group-item-action" href="my_booking.php"><i class="bi bi-book"></i> My Booking</a>
                    <a class="list-group-item list-group-item-action" href="settings.php"><i class="bi bi-gear"></i> Settings</a>
                    <a class="list-group-item list-group-item-action" href="co_travellers.php"><i class="bi bi-people"></i> Co-Travellers</a>
                    <a class="list-group-item list-group-item-action" href="manage_holiday.php"><i class="bi bi-calendar"></i> Manage Your Holidays</a>
                </div>
            </div>
        </div>
        <?php
          $userid = $_SESSION['UserId'];
         global $db_ob;
         $select_sql = "SELECT * FROM register where id =$userid";
         $execute = $db_ob->query($select_sql);
         while($DataRow = $execute->fetch()){

             $id = $DataRow['id'];
             $title = $DataRow['Title'];
             $fname = $DataRow['First_Name'];
             $lname = $DataRow['Last_Name'];
             $email = $DataRow['Email'];
             $number = $DataRow['Phone'];
             $image = $DataRow['Image'];
             $address = $DataRow['Address'];
             $password = $DataRow['Password'];
         }


        ?>
        <div class="col-md-6 m-0 p-0 ps-5 pt-3">
            <div class="mid">
                <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true"
                    class="scrollspy-example" tabindex="0">
                    <h5 class="bg-primary text-light shadow rounded p-2" id="list-item-1">My Profile</h5>
                    <h3>
                        Hi, <span class="text-success"><?php echo $fname ?></span> 
                    </h3>
                    <div class="pro_top border p-2 rounded">
                        <h5 class="text-primary">
                            My Profile
                        </h5>

                        <a class="btn btn-outline-warning float-end mx-1" onclick="confirm('would you like to edit??')" href="upadate_profile.php?id=<?php echo $userid ?>">
                            <i class="bi bi-pencil"></i>
                            Edit
                        </a>
                        <a class="btn btn-outline-danger float-end mx-1" onclick="confirm('would you like to delete??')" href="delete_profile.php?id=<?php echo $id?>">
                            <i class="bi bi-trash"></i>
                            Delete Profile
                        </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                                <img class="rounded w-25"
                                    src="./upload/<?php echo htmlentities($image)?>"
                                    alt="">
                            <table class="table table-bordered w-auto float-end">
                                <tr>
                                    <th>
                                        Name :
                                    </th>
                                    <td>
                                       <?php echo $fname." ".$lname?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Email :
                                    </th>
                                    <td>
                                        <?php echo $email?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Mobile :
                                    </th>
                                    <td>
                                        <?php echo $number?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Address :
                                    </th>
                                    <td>
                                       <?php echo $address?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="list-item-2" class="border p-2 rounded my-3">
                        <h5 class="text-primary">
                            General Info
                            <a class="btn btn-outline-warning float-end mx-1" href="#">
                                <i class="bi bi-pencil"></i>
                                Edit
                            </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Birthday : NA</td>
                                    <td>Marital Status : NA</td>
                                    <td>Anniversary : NA</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="list-item-3" class="border p-2 rounded my-3">
                        <h5 class="text-primary">
                            Alerts
                        </h5>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Flights
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        No flight alerts set
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="list-item-4" class="border p-2 rounded my-3">
                        <h5 class="text-primary">
                            Travel Document
                        </h5>
                        <div class="accordion accordion-flush border rounded" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Passport Information
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body m-2">
                                        <span>
                                            No saved passport details
                                        </span>
                                        <a class="btn btn-outline-warning float-end" href="#">
                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Pan Card
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <span>
                                            No saved pan card details
                                        </span>
                                        <a class="btn btn-outline-warning float-end" href="#">
                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        GSTIN Number
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <span>
                                            No saved GSTIN number
                                        </span>
                                        <a class="btn btn-outline-warning float-end" href="#">
                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </a>
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