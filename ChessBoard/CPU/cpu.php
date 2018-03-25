<?php 
session_start();     
if (!isset($_SESSION['email']) || $_SESSION['email'] == '' ) {
    header("Location: http://localhost/Chess_LoginPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lib/chessboardjs/css/chessboard-0.3.0.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div id="board" class="board"></div>
<div class="info">
    Search depth:
    <select id="search-depth">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <br>
    <span>Positions evaluated: <span id="position-count"></span></span>
    <br>
    <span>Time: <span id="time"></span></span>
    <br>
    <span>Positions/s: <span id="positions-per-s"></span> </span>
    <br>
    <br>
    <div id="move-history" class="move-history">
    </div>
</div>
<div id="lightbox", class="modal" style='display:block; position:fixed; padding-top: 100px; left: 25%; top: 25%; width: 50%; height: 25%; background-color: white; box-shadow:0 0 0 1600px rgba(0,0,0,0.55);'>
    <div class="modal-content" style='width: 50%; margin: 0 auto;'>
        <h1 style="font-size: 12pt; display:none;" id="message"></h1>
        <a class="btn" type="button" href="http://localhost/Welcome.php">Ok</a>
    </div>
</div>
<script src="lib/jquery/jquery-3.2.1.min.js"></script>
<script src="lib/chessboardjs/js/chess.js"></script>
<script src="lib/chessboardjs/js/chessboard-0.3.0.js"></script>
<script src="script.js"></script>
<script>

</script>
</body>
</html>