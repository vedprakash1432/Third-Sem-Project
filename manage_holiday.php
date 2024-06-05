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
                    <a class="list-group-item list-group-item-action" href="profile.php"><i
                            class="bi bi-person"></i> My Profile</a>
                    <a class="list-group-item list-group-item-action" href="my_booking.php"><i class="bi bi-book"></i>
                        My Booking</a>
                    <a class="list-group-item list-group-item-action" href="settings.php"><i class="bi bi-gear"></i>
                        Settings</a>
                    <a class="list-group-item list-group-item-action" href="co_travellers.php"><i
                            class="bi bi-people"></i> Co-Travellers</a>
                    <a class="list-group-item list-group-item-action active border-start border-5 border-dark" href="manage_holiday.php"><i
                            class="bi bi-calendar"></i> Manage Your Holidays</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 m-0 p-0 ps-5 pt-3">
            <div class="mid">
                <h5 class="bg-primary text-light shadow rounded p-2">
                    Manage Your Holidays
                </h5>
                <h3>
                    Hi Raj Kumar
                </h3>
                <div class="manage border rounded p-3">
                    <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow mb-3" id="pillNav2"
                        role="tablist"
                        style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button"
                                role="tab" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button"
                                role="tab" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button"
                                role="tab" aria-selected="false">Contact</button>
                        </li>
                    </ul>
                    <span class="">
                        No bookings present at this time
                    </span>
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