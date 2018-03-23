<!DOCTYPE HTML>
<!-- author : hameem@hmmLAB -->
<html>
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
</head>
<body>
	<form action="signup_agent_action.php" method="POST" onsubmit="return Validate()">
	<input type="text" name="name" placeholder="Your name">
	<input type="password" id="p1" name="pass" placeholder="Password">
	<input type="password" id="p2" name="pass" placeholder="Confirm password">
	<input type="submit">
	</form>
</body>
</html>