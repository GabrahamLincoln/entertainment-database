<?php
session_start();
$eid = $_GET['eid'];

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

    .entertainment_info {
        height: 100vw;
        width: 50vw;

        text-align: left;
        padding: 20px 20px;
        font-size: 25px;
        line-height: 40px;

        border-radius: 7px;
        color: rgb(255, 255, 255);
        background: rgb(30, 30, 30);
    }

    .profile_button{
        cursor: pointer;
        float: right;

        border: none;
        border-radius: 8px;

        background: rgba(55, 210, 160);
        box-shadow: 2px 2px 7px rgba(55, 210, 161, 0.437);
        color: rgba(255, 255, 255, 0.75);

        transition: all 1s;
        margin-left: 10px;
    }

    .profile_button:hover{
        opacity: .7;
        color: rgb(255, 255, 255);
        box-shadow: 2px 2px 7px rgba(55, 210, 160);
    }

    .add_review {
        display: inline-block;
        float: left;
        justify-content: center;
        align-items: center;
        height: 100px;

        background: rgb(70, 70, 70);
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2)
    }
</style>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entertainment</title>

</head>

<body>
    <img src="../logo.png" alt="Logo", style="height:100px; width:350px; border-radius:5px">

    <?php $username = $_SESSION['username'];?>

    <form class="profile_button" action="user_profile.php?username=<?php$username?>" method="post">
        <input class="button_text" type="submit" name="b1" value="Profile">
    </form>

    <div class = "search_bar">
        <form action="search_results.php" method="post">
		    <input type="text" name="search" placeholder="Search the database">
        </form>
    </div>
    
    <h2>
        <?php
        $result = mysqli_query($connection, "SELECT * FROM entertainment AS E WHERE E.eid = $eid");
        $row = mysqli_fetch_array($result);
        echo $row['name'];
        $_SESSION['row'] = $row
        ?>
    </h2>

    <div class = "entertainment_info">
        <h2 style="text-align: left; line-height: 25px">Information</h2>

        <?php
        // Entertainment Columns: name, type, rating, date, prod_pid (producer id), dir_ssn (director ssn)
        $genre = $_SESSION['row']['type'];
        $rating = $_SESSION['row']['rating'];
        $date = $_SESSION['row']['date'];
        $producer_id = $_SESSION['row']['prod_pid'];
        $director_id = $_SESSION['row']['dir_ssn'];
        
        echo "Genre: $genre";
        echo "<br>";
        echo "Production Date: $date";
        echo "<br>";
        echo "Rating: $rating/5";
        echo "<br>";
	    ?>

        <h2 style="text-align: left; line-height: 25px">Add Review</h2>

        <form class="add_review" method="post">
            <input name="review" type="text" placeholder="Enter review">
        </form>

        <?php
            if (isset($_POST['review'])) {
                $review = $_POST['review'];
                // check if review is clean
                    // add into database
            }
        ?>
    </div>
</body>
</html>