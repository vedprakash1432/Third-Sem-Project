<?php
include("./include/header.php");
?>
<?php
include("./include/navbar.php");
?>
    <div class="row m-0 p-0">
        <div class="col-md-3">
            <div class="row">
                <div id="list-example" class="list-group p-5">
                    <a class="list-group-item list-group-item-action" href="profile.php"><i class="bi bi-person"></i>
                        My Profile</a>
                    <a class="list-group-item list-group-item-action" href="my_booking.php"><i class="bi bi-book"></i>
                        My Booking</a>
                    <a class="list-group-item list-group-item-action" href="settings.php"><i class="bi bi-gear"></i>
                        Settings</a>
                    <a class="list-group-item list-group-item-action active border-start border-5 border-dark"
                        href="co_travellers.php"><i class="bi bi-people"></i> Co-Travellers</a>
                    <a class="list-group-item list-group-item-action" href="manage_holiday.php"><i
                            class="bi bi-calendar"></i> Manage Your Holidays</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 m-0 p-0 ps-5 pt-3">
            <div class="mid">
                <h5 class="bg-primary text-light shadow rounded p-2">
                    Co-Travellers
                </h5>
                <h3>
                    Hi Raj Kumar
                </h3>
                <div class="border p-3 rounded">
                    <span class="">
                        Co-Travellers
                    </span>
                    <button class="btn btn-primary float-end">
                        <i class="bi bi-plus"></i>
                        Add Co-Travellers
                    </button>
                    <hr>
                    <div class="travellers_body d-flex">
                        <div class="travellers border p-2 border-danger rounded w-100">
                            <i class="bi bi-person"></i>
                            <span>
                                Mr. Raj Kumar
                            </span>
                            <a class="float-end mx-2 " href="#">
                                Edit
                            </a>
                        </div>
                        <a class="btn btn-danger ms-2" href="#">
                            <i class="bi bi-trash"></i>
                        </a>
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