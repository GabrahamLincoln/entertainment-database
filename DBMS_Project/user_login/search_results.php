<?php
session_start();
$_SESSION['search'] = $_POST['search'];

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

        text-align: left;
        padding: 0px 20px;

        border-radius: 7px;
        color: rgb(255, 255, 255);
        background: rgb(30, 30, 30);
    }

    .results_section {
        height: 100vw;
        width: 750px;
        line-height: 15px;

        text-align: left;
        padding: 0px 20px;

        border-radius: 7px;
        color: rgba(255, 255, 255);
        background: rgb(30, 30, 30);
    }

    a {
        line-height: 20px;
        font-size: 25px;
        color: rgba(255, 255, 255, 0.7);
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
</style>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Results</title>

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

    <h2>Search: <?php echo $_SESSION['search'] ?></h2>
    <h2>Results:</h2>

    <div class = "results_section">
        <?php
        $search = $_SESSION['search'];

        if (str_contains($search, ';') || str_contains($search, '=') || str_contains($search, '-')|| str_contains($search, '  ') ||  str_contains($search, '\\') ) {
            echo "<br>Invalid characters used in search. Try again?";
        } else {
            $like = "%$search%";
            $result = mysqli_query($connection, "SELECT E.eid, E.name FROM entertainment AS E WHERE E.name LIKE '$like'");

            if (mysqli_num_rows($result) == 0) {
                echo "<br>Your search yielded no result. Try again?";
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['name'];
                    $eid = $row['eid'];
                    $link = "entertainment_page.php?eid=$eid";
                    $command = "<br><a href=$link>$name</a> <br>";
                    echo $command;
                    echo "<br>";
                }
            }
        }
        ?>
    </div>

</body>




