<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>Leaderboards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="js/Chess_validatePage.js"> </script> 
<link rel="stylesheet" type="text/css" href="css/hw2style.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
        <div class="container-fluid chessheader">
                <div class="container text-center" style="background:none;" >
                    <br>
                    <h1 class="tittle">The <br>Chess Game</h1>
                </div>
            </div>
            <br>
  <a class='btn' type="button" href='http://localhost/Welcome.html'> Return</a>
    
<?php
    $conn = mysqli_connect("localhost", "root", "", "chess_game");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    
    $sql = "SELECT * FROM user_information ORDER BY pvpWins DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    $ranking = 0;
    
    echo "<h2 class='text-center'> PvP Rankings </h2>";
    echo "<table class='table table-bordered table-hover text-center'>
        <tr>
        <th>Ranking</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Wins</th>
        <th>Draws</th>
        <th>Games Played</th>
        </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $ranking++;
        echo "<tr>";
        echo "<td class='text-center'>" . $ranking . "</td>";
        echo "<td class='text-center'>" . $row['firstName'] . "</td>";
        echo "<td class='text-center'>" . $row['lastName'] . "</td>";
        echo "<td class='text-center'>" . $row['pvpWins'] . "</td>";
        echo "<td class='text-center'>" . $row['pvpDraws'] . "</td>";
        echo "<td class='text-center'>" . $row['pvpGamesPlayed'] . "</td>";
        echo "</tr>";
    }  
    echo '</table>';
    
    $sql = "SELECT * FROM user_information ORDER BY aiWins DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    $ranking = 0;
    
    echo "</br><h2 class='text-center'> Single Player Rankings </h2>";
    echo "<table class='table table-bordered table-hover text-center'>
        <tr>
        <th>Ranking</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Wins</th>
        <th>Draws</th>
        <th>Games Played</th>
        </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $ranking++;
        echo "<tr>";
        echo "<td class='text-center'>" . $ranking . "</td>";
        echo "<td class='text-center'>" . $row['firstName'] . "</td>";
        echo "<td class='text-center'>" . $row['lastName'] . "</td>";
        echo "<td class='text-center'>" . $row['aiWins'] . "</td>";
        echo "<td class='text-center'>" . $row['aiDraws'] . "</td>";
        echo "<td class='text-center'>" . $row['aiGamesPlayed'] . "</td>";
        echo "</tr>";
    }  
    echo '</table>';
    
    if (mysqli_query($conn, $sql)) {
	} 
    else { 
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>

</body>
</html>