<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<!-- <meta charset="ISO-8859-1">-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type = "text/javascript" src = "validator-reactions.js" >
</script>
<link rel="stylesheet" type="text/css" href="leaderboardStyle.css"/>
<title>View Leaderboards</title>
</head>

<body>

<nav>
<ul>
  <li><a href="index.html">Return</a></li>
</ul>
</nav>
    
<header>
<h1> Leaderboards </h1>
</header>

<?php
    $conn = mysqli_connect("localhost", "root", "", "chess_game");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    
    $sql = "SELECT * FROM user_information ORDER BY pvpWins DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    $ranking = 0;
    
    echo "<h2> PvP Rankings </h2>";
    echo "<table>
        <tr>
        <th>Ranking</th>
        <th>Username</th>
        <th>Wins</th>
        <th>Draws</th>
        <th>Games Played</th>
        </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $ranking++;
        echo "<tr>";
        echo "<td>" . $ranking . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['pvpWins'] . "</td>";
        echo "<td>" . $row['pvpDraws'] . "</td>";
        echo "<td>" . $row['pvpGamesPlayed'] . "</td>";
        echo "</tr>";
    }  
    echo '</table>';
    
    $sql = "SELECT * FROM user_information ORDER BY aiWins DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    $ranking = 0;
    
    echo "</br><h2> Single Player Rankings </h2>";
    echo "<table>
        <tr>
        <th>Ranking</th>
        <th>Username</th>
        <th>Wins</th>
        <th>Draws</th>
        <th>Games Played</th>
        </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $ranking++;
        echo "<tr>";
        echo "<td>" . $ranking . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['aiWins'] . "</td>";
        echo "<td>" . $row['aiDraws'] . "</td>";
        echo "<td>" . $row['aiGamesPlayed'] . "</td>";
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
    
<footer>
</footer>

</body>
</html>