 <?php
   include("dbConnect.php");
   session_start();

   $user_check = $_SESSION['login-admin'];

   $ses_sql = mysqli_query($con,"select user from login where user = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['user'];

   if(!isset($_SESSION['login-admin'])){
   	echo "error";
      header("location:login_admin.php");

   }
?>