<?php             
              require_once("dbConnect.php");
              $query="SELECT id FROM temp_ticket_info ORDER BY id DESC LIMIT 1;";
              $result=mysqli_query($con,$query);
              if (mysqli_num_rows($result)>0)
              {
                  while($row = mysqli_fetch_array($result))
                    {
                    $last_id=$row['id'];
                    }
                  $query="SELECT * from temp_ticket_info where id=$last_id;";
                  $result=mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($result))
                    {
                    $xval=$row['x'];
                    $yval=$row['y'];
                    }
                  $query="SELECT id from ticket_info where secret_code='$xval' AND code='$yval' AND mobile_number='';";
                  $result=mysqli_query($con,$query);
                  if (mysqli_num_rows($result)>0)
                      {
                      while($row = mysqli_fetch_array($result))
                        {
                        $wid=$row['id'];
                        }
                      session_start();
                      $_SESSION["wonid"] = $wid;
                      echo "Congratulations You won the prize";
                      header( "refresh:3;url=agent_mobile_entry.php" );
                      }
                  else
                    {
                     echo "You dont have any prize or some one grabbed your prize or some discrepency found on ticket..Try Again..";
                      header( "refresh:3;url=agent_dashboard.php" ); 
                    }
              }
              else 
              {
                echo "Upload an image of lottery and try again!!!";
                header( "refresh:3;url=agent_dashboard.php" );
              }
              mysqli_close($con);
?>