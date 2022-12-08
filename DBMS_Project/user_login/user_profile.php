<?php
session_start();

$connection = mysqli_connect("localhost", "root", "","entertainment_db");
//check if connection was made properly or no
if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_error();
}
?>
		

<!DOCTYPE html>
<style>
    html {
	    scroll-behavior: smooth;
    }

    body {
        background: rgb(20, 20, 20);
        margin: 20px;
    }

    form {
        width: 500px;
        height: 40px;
        line-height: 40px;

        border-radius: 15px;
        background: rgb(30, 30, 30);
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2)
    }

    input {
        border: none;
        color: rgba(255, 255, 255, 0.555);
        height: 35px;
        width: 90%;
        margin-left: 20px;
        background: none;
    }

    .search_bar {
        display: inline-block;
        float: right;
        justify-content: center;
        align-items: center
    }

    *:focus {
        outline: none;
    }

    h2 {
        height: 50px;
        width: 350px;
        line-height: 50px;
        text-align: center;

        border-radius: 7px;
        color: rgb(255, 255, 255);
        background: rgb(30, 30, 30);
    }

    h1 {
        font-size:20px;
        line-height: 25px;
        width: 350px;
        text-align: left;
        color: rgb(255, 255, 255);
        border-radius: 7px;
        background: rgb(30, 30, 30);
        padding: 20px;
    }
</style>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>

</head>

<body>
    <img src="../logo.png" alt="Logo", style="height:100px; width:350px; border-radius:5px">

    <div class = "search_bar">
        <form action="search_results.php" method="post">
		    <input type="text" name="search" placeholder="Search the database">
        </form>
    </div>

    <?php
        if (isset($_GET['visiting'])) {
            $uname = $_GET['visiting'];
        } else {
            $uname = $_SESSION['username'];
        }
    ?>
    
    <h2><?php echo $uname;?>'s Profile</h2>

    <?php
    $result = mysqli_query($connection, "SELECT COUNT(*) FROM reviews AS R WHERE R.username = '$uname'");
    ?>

    <h2>Reviews Written: <?php echo mysqli_fetch_array($result)[0]?></h2>
    
    <h1>
    <?php
    $result = mysqli_query($connection, "SELECT e.name, e.eid, r.rating, r.comments FROM reviews r left join entertainment e on (r.eid = e.eid) WHERE r.username = '$uname'");
    while($row = mysqli_fetch_array($result)) {
        echo "Name: " . "<a href=entertainment_page.php?eid=$row[1]>$row[0]</a>" . "<br>";
        echo "Rating: " . $row[2] . "<br>";
        echo $row[3] . "<br><br>";
    }
    ?>
    </h1>
    
    <a href="./../index.php">Link to Main Page</a>
</body>
</html>