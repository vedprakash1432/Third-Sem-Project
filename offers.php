<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
 ?>
<?php
include("./include/navbar.php");
?>
    <div class="container-fluid">
        <div class="row">
            <div class="top_img"></div>
        </div>
    </div>

    <div class="container my-3">
        <h3 class="text-center text-primary">
            Exclusive International Holiday offers
        </h3>
        <div class="row">
        <?php
          
          global $db_ob;
          $select_sql ="SELECT * FROM destinations WHERE Destination_type='international' LIMIT 9";
          $stmt =$db_ob->query($select_sql);
          
          while($DataRow = $stmt->fetch()){
              $id  =$DataRow['id'];
              $Name  =$DataRow['Name'];
              $Image  =$DataRow['Image'];
              $Price  =$DataRow['Price'];
              $Destination_type  =$DataRow['Destination_type'];
        ?>

            <div class="col-md-4 mt-4">
                <div class="card border border-5 shadow-lg rounded borde-light">
                  <?php echo' <img class="img-fluid rounded" src="./upload/'.$Image.'" style="widht:400px;height:300px" alt="">'?>
                    <span class="card-text position-absolute text-light bg-dark bg-opacity-75 p-2 mt-2">
                        7-Day Easy Bali Villa Special 4 Nights Hotel And 2 Nights Villa
                    </span>
                    <div class="cont px-3 py-2">
                        <span class="text-dark">
                            visit <?php echo $Name?>
                        </span>
                        <h2 class="">
                            ₹<?php echo $Price?>
                            <a class="btn btn-primary float-end" href="destinations.php?id=<?php echo $id?>">
                                Book Now
                            </a>
                        </h2>
                    </div>
                    <div class="card-footer border-primary m-2">
                        Get Rs.<?php echo(rand(100,2000));?> Off for Jan'20 Departures.
                    </div>
                </div>
            </div>
            <?php
               }
            ?>
        </div>      
    </div>  
<?php
 include("./include/footer.php");
?>