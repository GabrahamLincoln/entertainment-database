<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Yourself</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
		<?php //https://www.w3schools.com/cssref/sel_class.php ?>
		p.goodData
		{
			background: #a3dd94;
			color: #eaece6;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
			margin: 20px auto;
		}
</style>
</head>
<body style = "flex-direction: column">
	<img src="logo.png" alt="Logo", style="height:100px; width:350px; margin:50px; border-radius:5px">
	<?php 
		$connection = mysqli_connect("localhost", "root", "","entertainment_db");
		//check if connection was made properly or no
		if(mysqli_connect_errno())
		{
			echo "Failed to connect: " . mysqli_connect_error();
		}
		//echo "Connection made to database ";
	?>
	<br><br>

	<?php
		//for to ask for user information
		//ask for Username
		//ask for Password
		//ask for Num_Reviews = 0 (as it is a new user)
		//ask for Rating = 0 (as it is a new user)
		echo "<form action = \"\" method = \"post\">";
	?>
	<h2>Register New User</h2>
	<?php
		echo "<label>USERNAME</label>";
		echo "<input type=\"text\" name=\"newUsername\" placeholder=\"Enter username\"><br>";
		echo "<label>PASSWORD</label>";
		echo "<input type=\"password\" name=\"newPassword\" placeholder=\"Enter password\"><br>";

		echo "<button type = \"submit\">REGISTER</button>";
		echo "</form>";

		if ((isset($_POST['newUsername'])) && (isset($_POST['newPassword'])) )
		{
			$newUser 	= $_POST['newUsername'];
			$newPass 	= $_POST['newPassword'];
			$newReviews = 0;
			$newRating 	= 0;

			//https://www.geeksforgeeks.org/php-strlen-function/
			//https://www.w3schools.com/php/func_var_empty.asp
			if (empty($newUser) || empty($newPass))
			{
				echo "<p class = \"error\">";
				echo "Please enter both username and password.</p>";
			} elseif (strlen($newPass) < 7) {
				echo "<p class = \"error\">";
				echo "Password must be at least 7 characters long.";
			} else {
				//https://www.php.net/manual/en/function.str-contains.php
				//should be good to prevent SQL injections
				//check for ;  =  -  ' '  \
				//if the username or password contains, then stop otherwise execute the query
				if(str_contains($newUser, ';')|| str_contains($newUser, '=') || str_contains($newUser, '-')|| str_contains($newUser, ' ') ||  str_contains($newUser, '\\') )
				{
					echo "<p class = \"error\">";
					echo "Invalid characters in Username, try again<br>";
					echo "</p>";
				}
				else if(str_contains($newPass, ';')|| (str_contains ($newPass, '=')) || str_contains($newPass, '\\') ||  str_contains($newPass, ' ') || str_contains($newPass, '-'))
				{
					echo "<p class = \"error\">";
					echo "Invalid characters in Password, try again<br>";
					echo "</p>";
				}
                else if(str_contains($newUser, 'administrator'))
				{
					echo "<p class = \"error\">";
					echo "Cannot add 'administrator', try again with different username<br>";
					echo "</p>";
				}
				else
				{
				//data is good, add to sql database
				$sql_insert = "INSERT INTO user (Username, Password, Num_Reviews, Rating) VALUES('$newUser','$newPass', '$newReviews', '$newRating' )";
				try
				{
					mysqli_query($connection, $sql_insert);
					echo "<p class = \"goodData\">";
					echo "Data added successfully to the database";
					echo "</p>";
					//header("Location: admin_editUserInfo.php");

					echo "<br>";
					echo "<form style = \"width: 200px\" action=\"./user_login/user_login.php\"  method = \"post\">";
					echo "<button name = \"\" type = \"submit\">Click here to go to login page</button>";
					echo "</form>";
				}
				catch (Exception $e)
				{
					echo "<p class = \"error\">";
					echo "Username already exists. Try a new one.</p>";
					//header("Location: admin_editUserInfo.php");
				}	
			}
			}
		}
	?>



</body>
</html>