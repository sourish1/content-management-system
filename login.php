<?php session_start(); ?>
<?php include "includes/db.php"; ?>
<?php require "admin/includes/functions.php"; ?>



<?php

  if(isset($_POST['login']))
  {

  login_user($_POST['username'],$_POST['password']);

  }
 ?>
