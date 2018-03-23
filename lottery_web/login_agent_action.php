<?php
   include("dbConnect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($con,$_POST['id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']);

      $sql = "SELECT id FROM agent_table WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login-agent']=$myusername;
         header("location: agent_dashboard.php");
      }else 
      {

         header( "location: login_agent.php");
      }

   }
?>