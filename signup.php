/* This is a mockup */
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<!-- <meta charset="ISO-8859-1">-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type = "text/javascript" src = "validator-reactions.js" >
</script>
<link rel="stylesheet" type="text/css" href="QASstyle.css"/>
<title>Signup</title>
</head>

<body>

<nav>
<ul>
  <li><a href="index.html">Return</a></li>
</ul>
</nav>
    
<header>
<h1> Test Signup </h1>
</header>

<?php
if (isset($_POST["signup"]))
{
    $conn = mysqli_connect("localhost", "root", "", "chess_game");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    
    if (trim($_POST["uname"]) != "" && trim($_POST["eml"]) != "" && preg_match("/\w+@\w+\.\w+/", $_POST["eml"], $matches) && trim($_POST["pwd"]) != "" && preg_match("/\S*[^A-Za-z]/", $_POST["pwd"], $matches))
    {
        $sql = "INSERT INTO user_information (username, password, email) VALUES ('$_POST[uname]', '$_POST[pwd]', '$_POST[eml]')";
    }
    else {
        echo "Error, one of the values you have entered is in an inappropriate format.";
    }
    
    if (mysqli_query($conn, $sql)) {
	header("Location: http://localhost/login.php");
	} 
    else { 
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
?>

<section>
<h1> Sign-up </h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<div> <p id="err_email" class="error"></p> 
Email:  <input type="text" id="email" name = "eml"/> 
<br/> <br/> <p id="err_usrname" class="error"></p>
Username:  <input type="text" id="usrname" name = "uname"/>
<br/> <br/> <p id="err_pwd2" class="error"></p>
Password:  <input type="password" id="pwd2" name = "pwd"/>
<br/> <br/> <p id="err_verpwd" class="error"></p>
Re-enter Password:  <input type="password" id="verpwd" name = "rpwd"/> 
<br/> <br/> <input type="submit" name="signup" value="Sign-up"/> 
</div>
</form>
</section>
    
<footer>
</footer>
<script type = "text/javascript" src = "validator-reactionsr.js" >
    </script>
</body>
</html>
