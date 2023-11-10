<?php

session_start();
session_destroy();
echo "<script>window.open('signin.php', '_self')</script>"

?>