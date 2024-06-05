<?php
//  include("connection.php");
 include("../functions/functions.php");
 include("../include/header.php");
 include("../functions/session.php");
?>
<?php
if(isset($_POST['submit'])){
   $dname =$_POST['dname'];
   $image =$_FILES['image']['name'];
   $target = "../upload/".basename($_FILES['image']['name']);

   $price =$_POST['price'];
   $HolidayType =$_POST['holiday_type'];
   $Culture =$_POST['culture'];
   $Tourism_Tips =$_POST['tourism_Tips'];
   $description =$_POST['description'];
   if(empty($dname)||empty($image)||empty($price)||empty($description)||empty($HolidayType)){
     $_SESSION['ErrorMessage'] ="All field must be fill out!!";
     Redirect_to("add_destination.php");
   }elseif(strlen($dname)<3){
    $_SESSION['ErrorMessage'] ="Destination name shuold be more than 3 charector!";
    Redirect_to("add_destination.php"); 
   }elseif(strlen($description)<40){
    $_SESSION['ErrorMessage'] =" Description shuold be more than 40 charector!";
    Redirect_to("add_destination.php"); 

   }else{


   global $db_ob;
   $insert_sql ="INSERT INTO destinations(Name,Image,Price,Destination_type,Culture,Tourism_Tips,Description)";
   $insert_sql .="VALUES(:dname,:image,:price,:holiday_type,:culture,:tourism_tips,:description)";

   $stmt = $db_ob->prepare($insert_sql);

   $stmt->bindValue(':dname',$dname);
   $stmt->bindValue(':image',$image);
   $stmt->bindValue(':price',$price);
   $stmt->bindValue(':holiday_type',$HolidayType);
   $stmt->bindValue(':culture',$Culture);
   $stmt->bindValue(':tourism_tips',$Tourism_Tips);
   $stmt->bindValue(':description',$description);
   $Execute =$stmt->execute();
   
   move_uploaded_file($_FILES['image']['tmp_name'],$target);
   if($Execute){
      $_SESSION['SuccessMessage'] = "Destination added successfully...";

   }else{
    $_SESSION['ErrorMessage'] ="Something went wrong!!!!";

   }
}

}
?>

<div class="container col-md-6 border border-primary rounded bg-light p-3 mt-5">
    <div class="row">
        <h1 class="text-center">Add destination</h1>
    </div>
    <hr style="color:red" >
    <?php
       echo SuccessMessage();
       echo ErrorMessage();
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="">Destination Name</label>
            <input type="text" name="dname" class="form-control" required placeholder="Enter destionation like- mumbai,usa,ect.">
        </div>
        <div class="form-group mb-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Holiday type</label>
            <select name="holiday_type" id="" class="form-control">
                <option value="domestic">select holiday type</option>
                <option value="domestic">Domestic</option>
                <option value="international">International</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="">Culture</label>
            <textarea name="culture" id="" cols="10" rows="2" class="form-control" placeholder="Enter culture" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="">Tourism Tips</label>
            <textarea name="tourism_Tips" id="" cols="10" rows="3" class="form-control" required placeholder="Enter tourism tips"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="">Descriptions</label>
            <textarea name="description" id="" cols="10" rows="4" class="form-control" required placeholder="Enter descriptions about place"></textarea>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group ">
                    <input type="submit" name="submit" class="btn btn-success" value="Add now">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                 <a href="dashboard.php"> <button type ="button" class="btn btn-warning">Back</button></a>
                </div>
            </div>
        </div>
        
        
    </form>
</div>

</body>
</html>
