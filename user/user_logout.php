<?php

session_start();

session_unset();
session_destroy();

 echo "
          <script>
            window.location = '../user_login.php';
          </script>";
exit;
?>
