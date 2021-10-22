<?php
session_start();
echo "loging you out.Please wait........";

session_destroy();
header("location:/forum")
?>