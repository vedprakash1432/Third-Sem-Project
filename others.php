<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
 ?>
<?php
include("./include/navbar.php");
?>
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <h1>
                    Tour Packages
                </h1>
                <p>Jammu and Kashmir is a Union Territory located in the northernmost region of India. It is one of the most
                    sought-after holiday destinations in... <a href="#">Read More</a></p>
            </div>
            <div class="col mt-3">

                <!-- searching -->
<?php
   if(isset($_GET['searchbtn'])){
     $search =$_GET['searchinput'];
   
     
    }
?> 

         <form action="" method="get">
         <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" name="searchinput" id="search" class="form-control" placeholder="Search"/>
                    </div>
                   <span> <input type="submit" name="searchbtn" class="btn btn-primary" value="search" data-mdb-ripple-init/>
                        <i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
      </form>

        <!-- first row -->
  <?php
    if(isset($_GET['id'])){
        $id =$_GET['id'];
    }
    global $db_ob;
   
   $sql ="SELECT * FROM destinations LIMIT 8";
    $stmt = $db_ob->query($sql);
    while($DataRow =$stmt->fetch()){
    $id = $DataRow['id'];
    $Name = $DataRow['Name'];
    $Image = $DataRow['Image'];
    $Price = $DataRow['Price'];
    $Destination_type = $DataRow['Destination_type'];

    ?>
 
        <div class="row my-3">
            <div class="col-md-9 shadow">
                <div class="left_10">
                    <div class="row border rounded p-1">
                        <div class="col-md-4 m-0 p-0">
                            <div class="left_img">
                                <a href="destinations.php?id=<?php echo $id?>">
                                  <?php echo '<img class="img-fluid" src="./upload/'.$Image.'" alt="">'?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="right_8">
                                <div class="right_8_head d-flex">
                                    <a href="#">
                                    <?php echo htmlentities($Name)?> Tour with Gulmarg And Sonmarg 7N/8D Domestic Customized tour package
                                        With Optional Flight
                                    </a>
                                    <span class="border p-1">
                                        3 Nights 4 Days
                                    </span>
                                </div>
                                <hr class="m-0 p-0 mb-2">
                                <div class="port">
                                    <i class="bi bi-airplane"></i>
                                    <span>
                                        →
                                        Port Blair (1N)→Havelock Island (1N)→Port Blair (1N)→
                                    </span>
                                    <i class="bi bi-airplane"></i>
                                </div>
                                <hr class="my-2 p-0">
                                <p class="mb-0">
                                    Customized Holidays
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <a href="#">
                                            <div class="costomized_icon text-center">
                                                <i class="bi bi-sun"></i>
                                                <span class="text-dark">
                                                    Highlights
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <div class="costomized_icon text-center">
                                                <i class="bi bi-airplane"></i>
                                                <span class="text-dark">
                                                    Flights
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <div class="costomized_icon text-center">
                                                <i class="bi bi-hospital"></i>
                                                <span class="text-dark">
                                                    Hotels
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <div class="costomized_icon text-center">
                                                <i class="bi bi-camera"></i>
                                                <span class="text-dark">
                                                    Sightseeing
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#">
                                            <div class="costomized_icon text-center">
                                                <i class="bi bi-cup"></i>
                                                <span class="text-dark">
                                                    Meals
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
               
                <div class="right_3 border rounded py-3 shadow">

                    <p class="text-center mt-2">
                        Tour Booking
                    </p>
                    <hr class="m-0 p-0 mx-2">
                    <h3 class="text-center mt-3">
                        ₹ <?php echo $Price?>
                    </h3>
                    <p class="text-center">
                        Starting price per adult
                    </p>
                    <div class="buttons text-center">    
                        <a class="btn btn-outline-primary" href="#">
                            Want us to call you?
                        </a>
                        <a class="btn btn-primary" href="destinations.php?id=<?php echo $id?>">
                            BOOK ONLINE
                        </a>
                    </div>
                </div>
            </div>
        </div>
       
        <?php
            }
        ?>
  
 <!--descriptions start  -->
        <div class="row mt-5">
            <div class="dis">
                <p>
                    People also ask about Andaman and Nicobar Tour Packages
                </p>
                <p>
                    What would be the cost of my Andaman & Nicobar Island tour package from India?
                </p>
                <span>
                    It totally depends on the number of days that you are choosing for Andaman trips. If you choose Andaman tour packages from India that come with 3 nights and 4 days, it would cost you around INR 16000. If you choose Andaman tourism packages that come with 6 nights and 7 days, it may cost you around INR 42000. Therefore, you must go for the Andaman and Nicobar tour packages that suit your budget.
                </span>
                <p>
                    What is the ideal time to visit Andaman & Nicobar Island?
                </p>
                <span>
                    The best time to visit Andaman & Nicobar Island and choose from the Andaman tourist packages is between October and May. The weather is pleasant and you can feel the breeze on and off. Planning your Andaman and Nicobar tour between these months will make your trip memorable. So, choose from the Andaman and Nicobar tour packages in one of these months.
                </span>
                <p>
                    How many days do I need for the Andaman trips?
                </p>
                <span>
                    For a memorable Andaman and Nicobar tour, you should have at least a week in hand. In seven days, you can explore the islands, try various water sports, and eat some of the best cuisines in Andaman. Therefore, accordingly, you can choose from the Andaman and Nicobar packages.
                </span>
                <p>
                    What are the main attractions in Andaman & Nicobar Island?
                </p>
                <span>
                    Some of the top attractions that are often found added to the Andaman and Nicobar packages are Radhanagar Beach, Mahatma Gandhi Marine National Park, Chidiya Tapu Beach, Barren Island, Neil Island, Mount Harriet National Park, Little Andaman, etc. You can find these attractions being added to most of the Andaman packages.
                </span>
                <p>
                    What are the top things to do in Andaman & Nicobar Island?
                </p>
                <span>
                    As you are going for the Andaman and Nicobar packages, you can visit Cellular jail, indulge in scuba diving, snorkeling, island hopping, shopping, try sumptuous cuisines, etc. You need to make sure to add these things to Andaman tours.
                </span>
                <p>
                    How do I book an Andaman & Nicobar tour package?
                </p>
                <span>
                    You first have to visit the website of SOTC and visit the <a class="text-primary" href="#">India Holidays</a> section. Now from the drop-down, you can find Andaman tour packages. You can click on it and choose from the Andaman tour packages that you find suitable for you.
                </span>
                <br>
                <br>
                <span>
                    *Disclaimer- The family discount mentioned for this destination is defined basis 2 adults &amp; 1 child combination.
                </span>
                <h5 class="mt-5">
                   Andaman and Nicobar Islands Tourism
                </h5>
                <a class="btn btn-outline-primary shadow m-2" href="#">Andaman and Nicobar Islands Tourism</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Places to Visit in Andaman and Nicobar</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">How to Reach Andaman and Nicobar</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Things to do in Andaman and Nicobar</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Best Time to Visit Andaman and Nicobar</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Andaman and Nicobar Photos and Videos</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Food and Restaurants in Andaman and Nicobar</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Famous Festivals of Andaman and Nicobar</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Andaman and Nicobar Travel Guide</a>

                <h5 class="mt-5">
                   Trending International Destinations:
                </h5>
                <a class="btn btn-outline-primary shadow m-2" href="#">Australia Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Bali Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Cambodia Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Dubai Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Egypt Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Europe Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Malaysia Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">Spain Tour Packages</a>
                <a class="btn btn-outline-primary shadow m-2" href="#">USA Tour Packages</a>

                
                <h5 class="mt-5">
                    Weekend Gateways in India:
                 </h5>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Goa</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Gujarat</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Hyderabad</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Kerala</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Rajasthan</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Uttar Pradesh</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in Uttarakhand</a>
                 <a class="btn btn-outline-primary shadow m-2" href="#">Weekend Gateways in West Bengal</a>
            </div>
        </div>
    </div>
  
<?php
 include("./include/footer.php");
?>