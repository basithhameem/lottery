




<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("p1").value;
        var confirmPassword = document.getElementById("p2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.jpg">
    <title>LFMS</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="starter-template.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/figure.css" rel="stylesheet">
  </head>
  <body>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-book" aria-hidden="true"></span>    Lottery Forgery Management System</h1>
          </div>
        </div>
      </div>
    </header>
<br><br><br>
        <div class="container">
          <div class="row">
            <div class="wrap-login col-md-4 col-md-offset-4">
            <br>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-default main-color-bg" onclick="window.location.href='home.html'">Lift me to Home page</button>
                </div>
              </div>
              <h2 style="margin-bottom: 30px;"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>    Agent |  Sign Up</h2>
              <form action="signup_agent_action.php" method="POST" onsubmit="return Validate()">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="" placeholder="Username" name="name" required>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" id="" placeholder="Password" name="pass" required>
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control" id="" placeholder="Password" name="pass" required>
                </div> 
                <button type="submit" class="btn btn-default main-color-bg btn-login col-md-4 col-md-offset-4">Sign Up Now</button>
              </form>
              <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-default main-color-bg" onclick="window.location.href='signup_agent.php'">Not Yet Registered ! ! !</button>
                </div>
              </div>
              <br>
              </div>
            </div>
        </div>
        <br><br><br>
        <footer id="footer">
            <p> &nbsp &nbsp &nbsp &copy; 2018  All Rights Reserved |Team4 Department of ECE | CET </p>
        </footer>
  </body>
</html>
