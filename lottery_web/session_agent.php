 <?php
   include("dbConnect.php");
   session_start();

   $user_check = $_SESSION['login-agent'];

   $ses_sql = mysqli_query($con,"select user from agent_table where user = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['user'];

   if(!isset($_SESSION['login-agent'])){
   	echo "error";
      header("location:login_agent.php");

   }
?>