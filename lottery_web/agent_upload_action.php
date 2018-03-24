<?php
              require_once("dbConnect.php");
              $filetmp = $_FILES["element_2"]["tmp_name"];
                $last_tid=0;
              //select the last id from table
              $query="SELECT tid FROM image_info ORDER BY tid DESC LIMIT 1;";
              $result=mysqli_query($con,$query);
              while($row = mysqli_fetch_array($result))
                {
              $last_tid=$row['tid'];
                }
              $last_tid=$last_tid+1;
              //renaming
              $filename="ticket".$last_tid;

              $filepath = "photo/".$filename;
              move_uploaded_file($filetmp,$filepath);
              $query="INSERT INTO image_info VALUES (DEFAULT,'$filename','$filepath');";
              $result=mysqli_query($con,$query);
              if ($result)
                {
              echo "Image Added Successfully";
              header( "refresh:3;url=agent_dashboard.php" );
                }
              else {
                echo "Failed:Database has encountered an error while uploading!!!";
                header( "refresh:3;url=agent_dashboard.php" );
                }
                mysqli_close($con);

              ?>