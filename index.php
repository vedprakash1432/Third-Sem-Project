<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
?>
<?php
   if(isset($_POST['submit'])){

     $fname = $_POST['fName'];
     $lname = $_POST['lName'];
     $email =$_POST['email'];
     $phone =$_POST['phone'];
     $subject =$_POST['subject'];
     $message =$_POST['message'];
//  query to insert in contact table database
     global $db_ob;
     $sql ="INSERT INTO contact(First_Name,Last_Name,Email,Phone,Subject,Message)";     
     $sql .= "VALUES(:fname,:lname,:email,:phone,:subject,:message)";

     $statement =$db_ob->prepare($sql);
     $statement->bindValue(":fname",$fname);
     $statement->bindValue(":lname",$lname);
     $statement->bindValue(":email",$email);
     $statement->bindValue(":phone",$phone);
     $statement->bindValue(":subject",$subject);
     $statement->bindValue(":message",$message);

     $Execute = $statement->execute();

     if($Execute){
      $_SESSION['SuccessMessage'] = "Data successfully inserted!!";
    //   Redirect_to("index.php");
     }
   }
?>
   
<?php
include("./include/navbar.php");
?>
    <div class="container-fluid">
        <?php
           echo SuccessMessage();
           echo ErrorMessage();
        ?>
        <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide m-0 p-0" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- <img src="./images/banner_tourism3.avif"
                            class="d-block w-100" alt="..."> -->
                            <img src="https://www.sotc.in/images/home-page-banners/2023/oct/Europe-Holiday-Banner-Nov1-1920x545.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.sotc.in/images/home-page-banners/2023/oct/Europe-2024-Banner-Nov-New-1920x545.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                         <img src="./images/banner_tourism3.avif"
                            class="d-block w-100" alt="...">
                        <!-- <img src="https://www.sotc.in/images/home-page-banners/2023/nov/globus-1920x545.jpg"
                            class="d-block w-100" alt="..."> -->
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="trending mt-4 text-center">
                <h2>
                    Trending Indian Destinations
                </h2>
                <span>
                    India is a beautiful land of rich diversity, culture and adventures. It is the seventh-largest
                    country in the world, home to some of the most… <a href="#">read more</a>
                </span>
            </div>
            <div class="col-md-1"></div>
            <?php
                   global $db_ob;
                   
                   $select_sql ="SELECT * FROM destinations WHERE Destination_type ='domestic' LIMIT 5";
                   $stmt =$db_ob->query($select_sql);
                   while($DataRow =$stmt->fetch()){
                       $id =$DataRow['id'];
                       $Name =$DataRow['Name'];
                       $Image =$DataRow['Image'];
                       $Price =$DataRow['Price'];
                       $Destination_type =$DataRow['Destination_type'];
                       ?>
                

               <div class="col-md-2 my-3">
                <a href="destinations.php?id=<?php echo $id?>">
                    <div class="card trending_card bg-dark text-light shadow">
                       <?php echo '<img class="img-fluid" src="./upload/'.$Image.'" alt="">' ?>
                        <h4 class="text-center">
                           <?php echo htmlentities(strtoupper($Name))?>
                        </h4>
                        <div class="card_down text-center">
                            <span>
                                Starting Price
                            </span>
                            <h2>
                                &#8377;<?php echo htmlentities($Price)?>/-
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
                ?>
            <div class="cpl-md-1"></div>
        </div>

        <div class="row m-0 p-0">
            <div class="trending mt-4 text-center">
                <h2>
                    Trending International Destinations
                </h2>
                <span>
                    An international holiday not only offers a breath of fresh air but is also a great way to explore
                    different parts of the world and get a new… <a href="#">read more</a>
                </span>
            </div>
            <div class="col-md-1"></div>
            <?php
                  global $db_ob;
                  $select_sql ="SELECT * FROM destinations WHERE Destination_type='international' LIMIT 5";
                  $stmt =$db_ob->query($select_sql);
                  
                  while($DataRow = $stmt->fetch()){
                      $id  =$DataRow['id'];
                      $Name  =$DataRow['Name'];
                      $Image  =$DataRow['Image'];
                      $Price  =$DataRow['Price'];
                      $Destination_type  =$DataRow['Destination_type'];
                      
                      ?>
                 
                  <div class="col-md-2 my-3">
                <a href="destinations.php?id=<?php echo $id?>">
                    <div class="card trending_card bg-dark text-light shadow">
                       <?php echo '<img class=" img-fluid" src="./upload/'.$Image.'" alt="">'?>
                        <h4>
                           <?php echo htmlentities($Name)?>
                        </h4>
                        <div class="card_down">
                            <span>
                                Starting Price
                            </span>
                            <h2>
                                &#8377; <?php echo htmlentities($Price)?>/-
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
            <div class="cpl-md-1"></div>
        </div>

        <div class="container">

            <div class="row border border-dark rounded my-5">
                <div class="col-md-6 m-0 p-0">
                    <div class="reserv">
                        <h1>
                            For Reservation or Query?
                        </h1>
                    </div>
                </div>
                <div class="col-md-6 m-0 p-0">
                    <div class="reserv">
                        <a class="" href="tel:+917052141220">
                            <i class="bi bi-telephone"></i>
                            +917052141220
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 my-3">
                    <div class="card yt_card">
                    <iframe width="695" height="391" src="https://www.youtube.com/embed/Xj4E0Zry6K4" title="Travel Agency Video Template (Editable)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card yt_card">
                    <iframe width="695" height="391" src="https://www.youtube.com/embed/-ZAytzfougg" title="🤍New Travelling Song Hindi WhatsApp Status❤‍🔥Kuch To Bata Zindgi Song Status Lyrics💔💯🖤🥀" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <!-- <img src="https://www.sotc.in/images/home-page-banners/2021/october/Vistara-Banner-440x266.jpg"
                            alt=""> -->
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card yt_card">
                    <iframe width="695" height="391" src="https://www.youtube.com/embed/orbkg5JH9C8" title="Kandima Signature Video - 20 seconds" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2 my-3">
                <div class="border_bottom_card p-2 my-2 border-bottom border-5 border-primary">
                    <div class="text-center">
                        <i class="bi bi-shield-check bg-primary text-light"></i>
                        <h5>
                            Trusted Advisor
                        </h5>
                    </div>
                    <p class="">
                        Over 70 years of expertise with innovation at its core. We pioneered group travel In India & are
                        continuously evolving and investing in leading edge technology for a perfect holiday
                    </p>
                </div>
            </div>
            <div class="col-md-2 my-3">
                <div class="border_bottom_card p-2 my-2 border-bottom border-5 border-warning">
                    <div class="text-center">
                        <i class="bi bi-building-check bg-warning text-light"></i>
                        <h5>
                            Responsive
                        </h5>
                    </div>
                    <p class="">
                        Our Holidays are co-created with our customers, ensuring suggestions and feedback are the basis
                        of creating magical holidays
                    </p>
                </div>
            </div>
            <div class="col-md-2 my-3">
                <div class="border_bottom_card p-2 my-2 border-bottom border-5 border-info">
                    <div class="text-center">
                        <i class="bi bi-person-check-fill bg-info text-light"></i>
                        <h5>
                            Memorable Experiences
                        </h5>
                    </div>
                    <p class="">
                        Join the RV family - Over 5 lac customers have created their most memorable Experiences with
                        us
                    </p>
                </div>
            </div>
            <div class="col-md-2 my-3">
                <div class="border_bottom_card p-2 my-2 border-bottom border-5 border-secondary">
                    <div class="text-center">
                        <i class="bi bi-hand-thumbs-up bg-secondary text-light"></i>
                        <h5>
                            Ease
                        </h5>
                    </div>
                    <p class="">
                        Choose from a wide range of over a thousand holidays and experiences. Special holidays catering
                        to the cultural diversity of India
                    </p>
                </div>
            </div>
            <div class="col-md-2 my-3">
                <div class="border_bottom_card p-2 my-2 border-bottom border-5 border-success">
                    <div class="text-center">
                        <i class="bi bi-gear-wide-connected bg-success text-light"></i>
                        <h5>
                            Recognise & Connect
                        </h5>
                    </div>
                    <p class="">
                        An experienced team of over 1000 travel professionals across 160+ touch points In India & NRI
                        markets to cater to your travel needs
                    </p>
                </div>
            </div>
        </div>

        <div class="row plan_back border m-0 p-0">
            <div class="col-md-8">
                <div class="plan">
                    <h1 class="p-5">
                        <span class="text-primary">R</span>
                        <span class="text-warning">V</span>
                        &nbsp;
                        <span class="text-info">T</span>
                        <span class="text-success">R</span>
                        <span class="text-danger">A</span>
                        <span class="text-secondary">V</span>
                        <span class="text-light">E</span>
                        <span class="text-dark">L</span>
                    </h1>
                    <h2 class="ps-5 text-light">
                        PLAN YOUR HOLIDAYS WITH OUR ASSISTANCE,JUST FILL IN YOUR DETAILS.
                    </h2>
                </div>
            </div>
            <!-- contact code start here -->
            <div class="col-md-4 my-3">
              <h1 class="text-center mb-3">Contact Me</h1>
                <?php
                echo  SuccessMessage();
                echo ErrorMessage();
                ?>

                <form action="index.php" class="" method="post" enctype="multipart/form-data">
                    <div class="row mb-1">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" name="fName" class="form-control" placeholder="First name"
                                aria-label="First name" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lName" class="form-control" placeholder="Last name"
                                aria-label="Last name" required>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                required>
                        </div>
                        <div class="col">
                            <label class="form-label">Phone (optional)</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone" aria-label="Phone">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject"
                                aria-label="Subject" required>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label class="form-label">Message</label>
                            <textarea type="text" name="message" class="form-control" placeholder="Message"
                                aria-label="Message" required></textarea>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary m-3" value="submit"/>

                    <button type="reset" class="btn btn-danger float-end m-3">Reset</button>
                </form>
            </div>
        </div>
<!-- contact code end here -->

</div>
<?php
include("./include/footer.php");
?>