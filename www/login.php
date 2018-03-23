/* This is a mockup */
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<!-- <meta charset="ISO-8859-1">-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type = "text/javascript" src = "validator-reactions.js" >
    </script>
<link rel="stylesheet" type="text/css" href="QASstyle.css"/>
<title>Login</title>
</head>

<body>
 
<nav>
<ul>
  <li><a href="index.html">Return</a></li>
</ul>
</nav>

<header>
<h1> Test Login </h1>
</header>

<?php
if (isset($_POST["Login"]))
{
    $conn = mysqli_connect("localhost", "root", "", "chess_game");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    
    if (trim($_POST["uname"]) != "" && trim($_POST["pwd"]) != "" && preg_match("/\S*[^A-Za-z]/", $_POST["pwd"], $matches))
    {
        $sql = "SELECT * FROM user_information WHERE username='$_POST[uname]'";
	 $result = mysqli_query($conn, $sql);
	 $pass = mysqli_fetch_assoc($result);
        if ($pass['password'] != NULL && $pass['password'] == $_POST["pwd"])
        {
	     $user = $_POST['uname'];
	     $_SESSION['user'] = $user;
	     header("Location: http://localhost/");
        }
        else
        {
            echo "Username or password is incorrect.";
        }
    }
    else {
        echo "Error, one of the values you have entered is in an inappropriate format.";
    }
    
    if (mysqli_query($conn, $sql)) {
	} 
    else { 
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
?>
    
<section>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<div>
<p id="err_usrname" class="error"></p>
Username:  <input type="text" id = "usrname" name = "uname"/>
<br/> <br/> <p id="err_pwd" class="error"></p> 
Password:  <input type="password" id = "pwd1" name = "pwd"/> 
<br/> <br/> <input type="submit" name="Login" value="Login"/> 
<br/> <br/> Don't have an account? 
<br/> <br/> <a href="form-signup.html">Sign-up</a> </div>
</form>
</section>

<script type = "text/javascript" src = "validator-reactionsr.js" >
    </script>
    
</body>
</html>
