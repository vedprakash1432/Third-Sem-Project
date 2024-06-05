<?php
include("./functions/functions.php");
include("./functions/session.php");
 session_destroy();
 redirect_to("login_form.php");

?>