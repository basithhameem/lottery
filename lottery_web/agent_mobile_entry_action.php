<?php             
              require_once("dbConnect.php");
              session_start();
              $mobnum=$_POST['mobile'];
              $wid=$_SESSION["wonid"];
              $query="UPDATE ticket_info SET mobile_number='$mobnum' WHERE id=$wid;";
              $result=mysqli_query($con,$query);
              $query="DELETE FROM temp_ticket_info;";
              $result=mysqli_query($con,$query);
              if ($result)
              {
              session_destroy();
              echo "Your Data Saved Successfully";
              header( "refresh:3;url=agent_dashboard.php" );

              }
              else {
                echo "Failed:Database has encountered an error while uploading!!!";
                header( "refresh:3;url=agent_dashboard.php" );
              }
              mysqli_close($con);
?>