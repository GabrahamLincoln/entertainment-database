<?php
// session_start();
// if (isset($_GET['ename'])) { 
//     $ename = $_GET['ename'];
// } else {
//     $ename = ' ';
// }
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
</style>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entertainment</title>

</head>

<body>
    <img src="../logo.png" alt="Logo", style="height:100px; width:350px; border-radius:5px">

    <div class = "search_bar">
        <form action="search_results.php" method="post">
            <!-- <input type="hidden" name="varname" value="var_value"> -->
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
        echo "Rating: $rating";
        echo "<br>";

		// //echo "Connection made to database ";
		// //$result = mysqli_query($connection, "SELECT E.eid, E.name AS Ename, E.type, E.rating, E.date, PC.name AS PC_name, PC.address,D.ssn, D.fname, D.lname, AI.city_name AS city, AI.theatre_name as Theatre_name, AO.url AS url, P.name AS platform FROM entertainment AS E, productioncompany AS PC, director as D, available_in AS AI, available_on AS AO, Platform as P WHERE E.prod_pid = PC.pid AND E.dir_ssn = D.ssn AND AI.eid = E.eid AND AO.eid = E.eid AND P.url = AO.url");
        // $result = mysqli_query($connection, "SELECT E.eid, E.name AS Ename, E.type, E.rating, E.date, PC.name AS PC_name, PC.address,D.ssn, D.fname, D.lname FROM entertainment AS E, productioncompany AS PC, director as D WHERE E.prod_pid = PC.pid AND E.dir_ssn = D.ssn ");
		// echo "<table style = \"background: #D0E4F5;border: 1px solid #AAAAAA;
		// padding: 3px 2px;font-size: 20px;\" border = '1'>
		// 	<tr>
		// 	<th>EID</th>
		// 	<th>Name</th>
		// 	<th>Type</th>
		// 	<th>Rating</th>
		// 	<th>Release Date</th>
		// 	<th>Production Company, Location</th>";
            
        //     //echo"
		// 	//<th>Director Name</th>
        //    // <th>Available ON</th>
        //    // <th>Available IN</th>";
		// 	echo"</tr>";
		// while($row = mysqli_fetch_array($result))
		// {
		// 	echo "<tr>";
		// 	echo "<td>" . $row['eid'] . "</td>";
		// 	echo "<td>" . $row['Ename'] . "</td>";
		// 	echo "<td>" . $row['type'] . "</td>";
		// 	echo "<td>" . $row['rating'] . "</td>";
		// 	echo "<td>" . $row['date'] . "</td>";
		//    	echo "<td>" . $row['PC_name'] ." , " . $row['address'] .  "</td>";
		//    	echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
        //    // echo "<td>" . $row['Theatre_name'] . "," . $row['city'] . "</td>";
        //    // echo "<td>" . $row['platform'] . "," . $row['url'] . "</td>";
		// 	echo "</tr>";

		// }
		// echo "</table>";
	    ?>
    </div>
</body>
</html>