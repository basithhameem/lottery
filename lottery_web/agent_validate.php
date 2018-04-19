




<!-- This is agent dashboard -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Agent Area | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LFMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Dashboard</a></li>
            <li><a href="pages.html">Pages</a></li>
            <li><a href="posts.html">Winners</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="pages.html">Welcome, Ragu</a></li>
            <li><a href="login.html.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Agent Dashboard <small>Check your lottery here !!</small></h1>

          </div>
          <div class="col-md-2">
    
        </div>
      </div>
    </header>


    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          
          <div class="col-md-9">
            <!-- Website Overview -->
              <div class="panel panel-default ">
                <div class="panel-heading main-color-bg" >
                  <h3 class="panel-title">Upload lottery to validate</h3>
                </div>
                <div class="panel-body" style="width:800px; margin:0 auto;">
                  <div class="col-md-5 ec">
               
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
              

              </div>
              <!-- latest users -->
              

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&nbsp &nbsp &nbsp &copy; 2018  All Rights Reserved |Team4 Department of ECE | CET </p>
    </footer>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>







