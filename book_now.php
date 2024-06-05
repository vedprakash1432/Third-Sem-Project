<?php
include("./functions/functions.php");
include("./functions/session.php");

      if(isset($_POST['click'])){

        $name            = $_POST['name'];
        $email           =$_POST['email'];
        $number          =$_POST['number'];
        $destinatin_name =$_POST['destination'];
        $date            =$_POST['date'];
        $adult           =$_POST['adult'];
        $child           =$_POST['child'];
        $playboy         =$_POST['playboy'];

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
            Redirect_to('destinations.php');
        }else{
            $_SESSION['ErrorMessage'] ="something went wrong, try again.!!";
            Redirect_to('destinations.php');
        }
       }

 ?>