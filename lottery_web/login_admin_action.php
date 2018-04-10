<?php
   include("dbConnect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($con,$_POST['id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']);

      $sql = "SELECT id FROM login WHERE user = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login-admin']=$myusername;
         header("location: admin_dashboard.php");
      }else 
      {

         header( "location: login_admin.php");
      }

   }
?>