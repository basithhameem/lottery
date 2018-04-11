
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
                  <h3 class="panel-title">Please enter your mobile no</h3>
                </div>
                <div class="panel-body" style="width:800px; margin:0 auto;">
                  <div class="col-md-5">
		               <form action="agent_mobile_entry_action.php" method="POST">
					    <input type="text" name="mobile" required>
					    <p> Mobile no are used for future communication</p>
					    <input type="submit" value="SUBMIT" class="btn btn-default main-color-bg">
					  </form>
					             
                
              	  </div>
              <!-- latest users -->
              

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&nbsp &nbsp &nbsp &copy; 2018  All Rights Reserved |Hisham Department of ECE | CET </p>
    </footer>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>






