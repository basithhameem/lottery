<?php             
              require_once("dbConnect.php");
              $uname=$_POST['name'];
              $apass=$_POST['pass'];
              
              $query="INSERT INTO agent_table (username,password) VALUES ('$uname','$apass');";
              $result=mysqli_query($con,$query);
              if ($result)
              {
              echo "New Agent Account Added Successfully!";
              header( "refresh:3;url=signup_agent.php" );
              }
              else {
                echo "Failed:Database has encountered an error while uploading!!!";
                header( "refresh:3;url=signup_agent.php" );
              }
              mysqli_close($con);
?>