<?php
//  include("connection.php");
//  include("../include/header.php");
 include("../functions/functions.php");
 include("../functions/session.php");
?>
<?php
  if(isset($_POST['login'])){
     $admin =$_POST['admin'];
     $password =$_POST['password'];

    if(empty($admin)|| empty($password)){
        $_SESSION['ErrorMessage'] ="All field must be fill out!!";
        Redirect_to('index.php');
    }elseif(strlen($admin)<3){
        $_SESSION['ErrorMessage'] ="Admin Name must be more than 3 charectors!";
        Redirect_to('index.php');
    }elseif(!($admin =='vedprakash' && $password =='143256')){
        $_SESSION['ErrorMessage'] ="You can't login . name or password didn't match!!!";
        Redirect_to('index.php');
    }
    // elseif(!($admin =="raj" && $password =='14325')){
    //     $_SESSION['ErrorMessage'] ="You can't login . name or password didn't match!!!";
    //     Redirect_to('index.php');
    // }

    else{
        
        global $db_ob;
        $sql="SELECT * FROM `admin` WHERE `Name`=:admin AND `Password`=:password LIMIT 1";
        $stmt =$db_ob->prepare($sql);
        $stmt->bindValue(':admin',$admin);
        $stmt->bindValue(':password',$password);
        $stmt->execute();
        $result = $stmt->rowCount(); 
       
        if($result == 1){
             $found_acount =$stmt->fetch();
            $_SESSION['AdminId'] = $found_acount['id'];
            $_SESSION['AdminName'] = $found_acount['Name'];
            $_SESSION['AdminImage'] = $found_acount['Image'];
            $_SESSION['AdminPassword'] = $found_acount['Password'];
            $_SESSION['SuccessMessage'] = "Welcome ".$_SESSION['AdminName']."!";
            Redirect_to("dashboard.php");

            // return $stmt->fetch();
        }else{
            return null;
        }

    }
  }
  
?>

<!doctype html>
<html lang="en">

<head>
    <title>Verify Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>

    <!-- font famaly cdn  -->
    <link href='https://fonts.googleapis.com/css?family=Jost' rel='stylesheet'>

    <!-- bootstrap icon cdn  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Tab Icon Link -->
    <link rel="icon"
        href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhjh7xa-HOZh5w3UNZDiLs-TaVwjR0Qmt-9KFXYFK-13IvqMuosI6C9GMGLUAVmeBj8BA1mUxrX_v60aLa9Ql7DCEiDKFQjkRmdQH4jXKaG1w3TKE50Wx-W8sEOldhDSuJgLX4Um5UmHZYBseYxHWlKnxMts-YW-n-b4Y2WsskHh4tNv4vpf3RMhIB1/s320/main%20logo.png">

    <!-- AOS animation Link -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css");

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Jost;
            
        }

        a {
            text-decoration: none;
        }

        .center {
            height: 100vh;
            width: 100%;
        }

        .main {
            height: 50vh;
            width: 100%;
        }

        .input-group-text {
            cursor: pointer;
            
        }
      
    </style>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>

<body class="">

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            
                <div class="center d-flex justify-content-center align-items-center ">
                    <div class="main  border border-2 border-primary shadow rounded bg-body p-5 ">
                        <h1 class=" text-center text-decoration-underline text-primary">
                            Verify Admin
                        </h1>
                        <?php
                            echo SuccessMessage();
                            echo ErrorMessage();
                        ?>
                        <form action="" method="post">

                            <input class="form-control mt-5 shadow" type="text" name="admin" id="admin"
                                placeholder="Enter admin name">

                            <div class="input-group mt-3">
                                <input type="password" name="password" id="password" class="form-control shadow" placeholder="Enter Password"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span onclick="myFunction()" class="input-group-text" id="basic-addon2"><i class="bi bi-eye"></i></span>
                            </div>
                            <div class="buttton text-center">
                                <input class="btn btn-primary px-4 py-2 mt-3 shadow" type="submit" name="login" value="Verify">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>

</html>