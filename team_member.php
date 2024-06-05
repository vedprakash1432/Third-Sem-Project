<?php
include("./functions/functions.php");
include("./functions/session.php");
include("./include/header.php");
 ?>
<?php
include("./include/navbar.php");
?>
<?php confirm_login();?>
    
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-5 text-primary">
                Team Members
            </h1>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="card p-2 my-5 shadow-lg border border-2 border-primary">
                    <div class="raj my-2">
                        <img class="rounded-circle border shadow"
                            src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgddNKGd9uVhyphenhyphenBlob_uRbY9eT9ACFifm_khufCE8kyrb0EyNFWhY2upDhXpRrpADCh6DBPr6GM_k9-iZQkSk1sa3t5GYifXa6VVsyUJ3yBINaE4lWEsT4Xfcb4Oi3zxk2JN6KpL8gegY9RbwZ-oUHwG0E2_bXNXorL1l4_lvF6nwvkVzXsc6HIEP7_7/s320/166929175940-removebg-preview.png"
                            alt="">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title text-center">
                            Raj
                        </h1>
                    </div>
                    <div class="card-footer text-center border">
                        <a href="https://www.linkedin.com/in/rajkumar-sharma-411a44248/">
                            <i class="bi bi-linkedin text-primary"></i>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100008727841677">
                            <i class="bi bi-facebook text-primary"></i>
                        </a>
                        <a href="https://www.instagram.com/raj_kumar_g/">
                            <i class="bi bi-instagram text-danger"></i>
                        </a>
                        <a href="https://github.com/rajkumardevl">
                            <i class="bi bi-github text-dark"></i>
                        </a>
                        <a href="https://wa.me/7052141220">
                            <i class="bi bi-whatsapp text-success"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2 my-5 shadow-lg border border-2 border-primary">
                    <div class="raj my-2">
                        <img class="rounded-circle border shadow"
                            src="./images/ved2.jpg"
                            alt="">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title text-center">
                            Ved
                        </h1>
                    </div>
                    <div class="card-footer text-center border">
                        <a href="https://www.linkedin.com/in/rajkumar-sharma-411a44248/">
                            <i class="bi bi-linkedin text-primary"></i>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100008727841677">
                            <i class="bi bi-facebook text-primary"></i>
                        </a>
                        <a href="https://www.instagram.com/raj_kumar_g/">
                            <i class="bi bi-instagram text-danger"></i>
                        </a>
                        <a href="https://github.com/rajkumardevl">
                            <i class="bi bi-github text-dark"></i>
                        </a>
                        <a href="https://wa.me/7052141220">
                            <i class="bi bi-whatsapp text-success"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
 include("./include/footer.php");
?>