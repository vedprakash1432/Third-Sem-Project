<?php
include("connection.php");
include("../functions/session.php");
// include("../functions/functions.php");
include("../include/header.php");
?>
<?php
if(isset($_GET['id'])){
    $id =$_GET['id'];
}
if(isset($_POST['submit'])){
    $dname =$_POST['dname'];
    $image =$_FILES['image']['name'];
    $price =$_POST['price'];
    $HolidayType =$_POST['holiday_type'];
    $description =$_POST['description'];
 
    global $db_ob;
    $update_sql ="UPDATE destinations SET Name ='$dname',Image='$image',Price='$price',Destination_type='$HolidayType',Description='$description' WHERE id=$id"; 
    $stmt = $db_ob->prepare($update_sql);
    $Execute =$stmt->execute();
    
    if($Execute){
       $_SESSION['SuccessMessage'] = "Destination updated successfully...";
       echo "<script>window.location.href='destinations.php'</script>";
       
    //    Redirect_to('destinatins.php'); 
    }else{
     $_SESSION['ErrorMessage'] ="Something went wrong!!!!";
       echo "<script>window.location.href='update_destinations.php'</script>";

    //    Redirect_to('update_destinations.php'); 
        
    }
 }
 
 ?>
 


<div class="container col-md-6 border border-primary rounded bg-light p-3 mt-5">
    <div class="row">
        <h1 class="text-center">Update destination</h1>
    </div>
    <hr style="color:red" >
    <?php
    
   
        global $db_ob;
        $select="SELECT * FROM destinations WHERE id=$id";
        $stmt= $db_ob->query($select);
        while($DataRow=$stmt->fetch()){
           $id =$DataRow['id'];
           $Name =$DataRow['Name'];
           $Image =$DataRow['Image'];
           $Price =$DataRow['Price'];
           $Destination_type =$DataRow['Destination_type'];
           $Description =$DataRow['Description'];
        }
   
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="">Destination Name</label>
            <input type="text" name="dname" class="form-control" value="<?php echo $Name?>">
        </div>
        <div class="form-group mb-3">
            <label for=""> Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" value="<?php echo $Price?>">
        </div>
        <div class="form-group mb-3">
            <label for="">Holiday type</label>
            <select name="holiday_type" id="" class="form-control">
                <option value="<?php echo $Destination_type?>"><?php echo $Destination_type?></option>
                <option value="domestic">Domestic</option>
                <option value="international">International</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="">Descriptions</label>
            <textarea name="description" id="" cols="10" rows="3" class="form-control" value=""><?php echo $Description?></textarea>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group mb-3">
                    <input type="submit" name="submit" class="btn btn-success" value="Update now">
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-3">
                 <a href="dashboard.php"> <button type ="button" class="btn btn-warning">Back</button></a>
                </div>
            </div>
        </div>
        
        
    </form>
</div>

