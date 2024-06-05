<?php
include("./functions/functions.php");
include("./functions/session.php");

include("./include/header.php");
 
?>

<?php
     if(isset($_POST['click'])){

        $name           = $_POST['name'];
        $email           =$_POST['email'];
        $number          =$_POST['number'];
        $destinatin_name =$_POST['destination'];
        $date            =$_POST['date'];
        $adult           =$_POST['adult'];
        $child           =$_POST['child'];
        $playboy         =$_POST['playboy'];

        if(strlen($name)<3){
            $_SESSION["ErrorMessage"]= "Name must be more than 3 charector!!";
            
        }elseif(strlen($number)<10){
            $_SESSION["ErrorMessage"]= "Number should be in 10 digits!!";
        }else{

     

        global $db_ob;
        $insert_sql ="INSERT INTO booking(Name,Email,Number,Destination_Name,Traveling_date,Adult,Child,Playboy)";
        $insert_sql .="VALUES(:name,:email,:number,:destination_name,:travelling_date,:adult,:child,:playboy)";

        $stmt = $db_ob->prepare($insert_sql);
        $stmt->bindValue(':name',$name);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':number',$number);
        $stmt->bindValue(':destination_name',$destinatin_name);
        $stmt->bindValue(':travelling_date',$date);
        $stmt->bindValue(':adult',$adult);
        $stmt->bindValue(':child',$child);
        $stmt->bindValue(':playboy',$playboy);

        $Execute =$stmt->execute();
        if($Execute){
            $_SESSION['SuccessMessage'] ="Booking confirmed successfully";
            // Redirect_to('destinations.php');
        }else{
            $_SESSION['ErrorMessage'] ="something went wrong, try again.!!";
            // Redirect_to('destinations.php');
        }
       }

    }
?>

<?php
 if(isset($_POST['submit'])){
    
    $name      =$_POST['name'];
    $email     =$_POST['email'];
    $mobile    =$_POST['mobile'];
    $query     =$_POST['query'];
    $destination =$_POST['destination'];
   
    if(strlen($name)<3){
        $_SESSION["ErrorMessage"]= "Name must be more than 3 charector!!";
        // Redirect_to("destinations.php");
    }elseif(strlen($mobile)<10){
        $_SESSION["ErrorMessage"]= "Number should be in 10 digits!!";

    } else{

 

    global $db_ob;
    $insert ="INSERT INTO query(Name,Email,Contact,Holiday_Type,Destination)";
    $insert .="VALUES(:name,:email,:mobile,:query,:destination)";
    $stmt = $db_ob->prepare($insert);
    $stmt->bindValue(':name',$name);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':mobile',$mobile);
    $stmt->bindValue(':query',$query);
    $stmt->bindValue(':destination',$destination);
    $Execute =$stmt->execute();

    if($Execute){
        $_SESSION['SuccessMessage']="You enquiry submited successfully!";
        Redirect_to("index.php");
    }
    
}
}
?>
<?php
include("./include/navbar.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    global $db_ob;
    $sql ="SELECT * FROM destinations WHERE id =$id";
    $stmt = $db_ob->query($sql);
    while($DataRow =$stmt->fetch()){
        $name = $DataRow['Name'];
       $image = $DataRow['Image'];
       $price = $DataRow['Price'];
       $Culture = $DataRow['Culture'];
       $Tourism_Tips = $DataRow['Tourism_Tips'];
       $Descriptions = $DataRow['Description'];
    }
}
?>
           

    <div class="container-fluid bg-white">
        <div class="row">
            <?php echo'<img class="img-fluid" src="./upload/'.$image.'" alt="" style="height:500px;width:100%">'?>
            <!-- <div class="top_img"></div> -->
        </div>
        <div class="row">
            <?php 
            echo SuccessMessage();
            echo SuccessMessage();
            ?>
            <div class="col-md-2"></div>

            <div class="col-md-6">
                <div class="overview">
                    <h3 class="text-primary my-2 text-decoration-underline">
                       <span class="text-success"> <?php echo htmlentities($name)?> </span>, Tourism
                    </h3>
                    <h2 class="text-primary">
                        Quick Overview
                    </h2>
                    <p class="">
                    <?php echo $name?>, 
                      <?php  echo $Culture ?>
                    </p>
                    <h2 class="text-primary">
                        Geography And Climate In <?php echo $name?>
                    </h2>
                    <p>
                    <?php
                      echo $Descriptions;
                     ?>
                    </p>
                    <h2 class="text-primary">
                    <?php echo $name?>'s Culture
                    </h2>
                    <p>
                    <?php echo $name?> 
                        Things took a blissful turn when oil was discovered in the 1960s. After that, the ruler of
                         and progressed.
                        <br>
                        <?php echo $Tourism_Tips ?>
                        <br>
                        International visitors usually find the people here humble and honest, irrespective of how rich
                        
                        
                        <br>
                        In addition, the culture of Dubai heavily focuses on poetry and dance, a highlight of Arabic
                        traditions. These activities find their roots in the nomadic Bedouin culture. Nabati and
                        Al-Taghrooda, the two poetry types, are equally prominent in the city, and you will find their
                        subtle influences in the city's architecture.
                        
                        While the city welcomes tourists with open arms, it is advisable to follow the laws defined by
                        the government. Activities such as causing a nuisance, being drunk, or selling illegal items are
                        strictly prohibited.
                    </p>
                    <h2 class="text-primary">
                    <?php echo $name?> Tourism Tips
                    </h2>
                    <p>
                        we suggest you skip this month unless
                        you are occupied during the rest of the calendar year.
                        <br>
                        Do not forget to pack sunscreen. Tourism in Dubai is incomplete without high SPF sunscreens,
                        body wipes, and perfumes, especially if you are coming from a colder country.
                        <br>
                        You will land at the Dubai International Airport, 30.6 km from Abu Dhabi. The airport has three
                        main terminals for international tourists. Do not carry any prohibited items.
                    </p>

                    <ul class="list">
                        <li class="my-3 list-group-item-primary p-2 rounded">
                        <?php echo $name?> Shopping Festival takes place in January, and Dubai Summer Surprises is scheduled in
                            July. These are heavenly experiences for shopping enthusiasts. You will get hefty discounts
                            on premium brands. However, these items are not tax-free.
                        </li>
                        <li class="my-3 list-group-item-warning p-2 rounded">
                            Nightlife in Dubai is real! However, you must understand and follow the laws of the region.
                        </li>
                        <li class="my-3 list-group-item-success p-2 rounded">
                            Eating in public is considered rude, and it is one of the first things any Dubai travel
                            guide will tell you. Especially if you land in the city during Ramadan, even drinking water
                            in public (even though not banned) will raise some eyebrows.
                        </li>
                        <li class="my-3 list-group-item-danger p-2 rounded">
                            Hotels in Dubai can range from moderate to premium. Depending on the amenities you need and
                            your budget, you can stay in a three-star or five-star accommodation.
                        </li>
                        
                    </ul>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning float-end shadow my-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-check2"></i> Book Now
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">

                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Book Now</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                             
                                    <form  action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="col-form-label">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="col-form-label">Number:</label>
                                            <input type="number" name="number" class="form-control" id="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="col-form-label">Destination Name:</label>
                                            <input type="text" name="destination" class="form-control" id="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="col-form-label">Travel date:</label>
                                            <input type="date" name="date" class="form-control" id="" required>
                                        </div>
                                        <div class="row">
                                            <label for="">Room:</label>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="" class="col-form-label">Adult</label>
                                                    <input type="number" name="adult" class="form-control" id="" value="0" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="" class="col-form-label">Child</label>
                                                    <input type="number" name="child" class="form-control" id="" value="0" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="" class="col-form-label">Playboy</label>
                                                    <input type="number" name="playboy" class="form-control" id="" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <input type="submit" name="click" class="btn btn-primary" value="book">
                                         </div>
                                    </form>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    <!-- model end here -->

                </div>
            </div>
<!-- Enquiry code start here -->
            <div class="col-md-4 p-5">
                <div class="queries border border-primary p-4 rounded shadow bg-light">
                    <div class="">
                        <h3 class="text-center">For Enquiry</h3>
                    </div>
                    <?php
                       echo SuccessMessage();
                       echo ErrorMessage();
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group my-4 shadow">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group my-4 shadow">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group my-4 shadow">
                            <input type="number" name="mobile" id="mobile" class="form-control"
                                placeholder="Enter Your Number" required>
                        </div>
                        <div class="form-group my-4 shadow">
                            <select name="query" id="query" class="form-select">
                                <option value="0">Holiday Type</option>
                                <option value="domestic">Domestic</option>
                                <option value="international">International</option>
                            </select>
                        </div>
                        <div class="form-group my-4 shadow">
                            <select name="destination" id="query" class="form-select">
                            <?php
                            global $db_ob;
                            $sql ="SELECT * FROM destinations";
                            $stmt = $db_ob->query($sql);
                            while($DataRow =$stmt->fetch()){
                               $name = $DataRow['Name'];

                              ?>
                              <option value="<?php echo $name?>"><?php echo $name?></option>
                              <?php } ?> 
                            </select>
                        </div>
                        <div class="check">
                            <input class="form-check-input shadow" type="checkbox" name="check" id="check" required>
                            <label for="check">I accept <a class="text-danger text-decoration-underline"
                                    href="#">Privacy Policy</a> and I authorise Thomas Cook Group Companies to contact
                                me.</label>
                        </div>
                        <div class="form-group my-4">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success w-25 shadow">
                        </div>
                    </form>
                </div>
            </div>
            <!-- Enquiry code end here -->
        </div>
    </div>
    <hr class="m-0 p-0">
    <div class="container">
        <div class="row">
            <h2 class="text-primary my-4">
                Recommended Holidays
            </h2>
             <?php
               global $db_ob;
               $sql ="SELECT * FROM destinations LIMIT 4";
               $stmt = $db_ob->query($sql);
               while($DataRow =$stmt->fetch()){
                $id = $DataRow['id'];
                $Name = $DataRow['Name'];
                $Image = $DataRow['Image'];
                $Price = $DataRow['Price'];
                $Destination_type = $DataRow['Destination_type'];

                ?>
             
            <div class="col-md-3">
                <div class="card p-2 view_card shadow">
                    <?php echo '<img class="card-img" src="./upload/'.$Image.'" alt="">'?>
                    <div class="p-4">
                        <p>
                           <?php echo $Name?> Fully Loaded - Buy 1 Get 1 Free (Al Barsha) 4N-5D International Customized Tour
                            Package
                        </p>
                        <hr class="m-0 p-0">
                        <span>
                            All Inclusive Group Tour
                        </span>
                        <div class="card_icon d-flex align-items-center justify-content-around">
                            <i class="bi bi-airplane"></i>
                            <i class="bi bi-camera"></i>
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </div>
                        <hr class="m-0 p-0 my-2">
                        <div class="price d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="p-0 m-0">
                                    ₹ <?php echo $Price?>
                                </h5>
                                <span>
                                    Starting Price
                                </span>
                            </div>
                            <a href="destinations.php?id=<?php echo $id?>" class="btn btn-outline-primary">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
               }
             ?>

            <div class="more_btn p-4 text-center">
                <a class="btn btn-outline-primary w-25" href="others.php">
                    View More Packages
                </a>
            </div>


        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="down_img">
                <h1 class="text-center display-4 mt-5">Customer Tour Review Images</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-3">
                <a href="#"><span class="btn btn-warning">Uploda Tour Image</span></a>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                          <?php echo '<img class="img-fluid" src="./upload/'.$image.'" alt="">'?>
                        </a>
                    </div>
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/ThingsToDo/Things-to-Do.jpg"
                                alt="">
                        </a>
                    </div>
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/HowToReach/How-to-Reach.jpg"
                                alt="">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/StaticPhoto/Photos_Videos.jpg"
                                alt="">
                        </a>
                    </div>
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/PlacesToVisit/Places_to_Visit.jpg"
                                alt="">
                        </a>
                    </div>
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/Restaruants/Places-to-Eat.jpg"
                                alt="">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/EventsAndFestivals/Festivals_Events.jpg"
                                alt="">
                        </a>
                    </div>
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/SrpPageLink/SRP_Link.jpg"
                                alt="">
                        </a>
                    </div>
                    <div class="col m-0 p-0 last_three_img card p-1 shadow m-2 mt-3">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://resources.sotc.in/images/holidays/staticPage/currency/currency.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <hr class="m-0 p-0 mt-4">
        
    </div>

<?php
 include("./include/footer.php");
?>