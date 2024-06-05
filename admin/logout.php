<?php
include("../functions/functions.php");
include("../functions/session.php");
 session_destroy();
 redirect_to("index.php");

?>