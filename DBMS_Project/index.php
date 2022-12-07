<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DBMS Project Main Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style = "flex-direction: column">
	<img src="logo.png" alt="Logo", style="height:100px; width:350px; margin:50px; border-radius:5px">

	<form style = "height:130px; width: 180px; " action="./user_login/user_login.php"  method="post">
	<button style = "float:middle"  type="submit" action="./user_login/user_login.php">User Login Page</button>	
	</form>

	<p></p>
	
	<form style = "height:130px; width: 180px" action="admin_login.php"  method="post">
	<button style = "float:middle"; type="submit"; action="./user_login/user_login.php"; >Admin Login Page</button>
	</form>

	<p></p>

	<form style = "height:130px; width: 180px" action="new_user.php"  method="post">
	<button type="submit">Register New User</button>
	</form>	
	
</body>
</html>