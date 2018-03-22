<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>Signup Page</title>
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
                    <button class="btn btn-default">About</button>
                </div>
            </div>
            <br>
<a class='btn' type="button" href='http://localhost/Chess_LoginPage.php'> Return</a>
<h2 class="text-center">Create your account</h2>

<?php
if (isset($_POST["Signup"]))
{
    $conn = mysqli_connect("localhost", "root", "", "chess_game");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    echo "Why are you so mean";
    if (trim($_POST["fname"]) != "" && trim($_POST["lname"]) != "" && trim($_POST["eml"]) != "" && preg_match("/\w+@\w+\.\w+/", $_POST["eml"], $matches) && trim($_POST["pwd"]) != "" && preg_match("/\S*[^A-Za-z]/", $_POST["pwd"], $matches))
    {
        $sql = "INSERT INTO user_information (password, email, firstName, lastName) VALUES ('$_POST[pwd]', '$_POST[eml]', '$_POST[fname]', '$_POST[lname]')";
    }
    else {
        echo "Error, one of the values you have entered is in an inappropriate format.";
    }
    
    if (mysqli_query($conn, $sql)) {
	   header("Location: http://localhost/Chess_LoginPage.php");
	} 
    else { 
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
?>

<form id="SignUp" style="width:500px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<div class="container">
    <label><b>First Name</b></label>
    <label id="fname_msg" class="err_msg"></label>
    <input type="text" placeholder="Enter first name" size="30" name="fname">
    
    <label><b>Last Name</b></label>
    <label id="lname_msg" class="err_msg"></label>
    <input type="text" placeholder="Enter last name" size="30" name="lname">
    
    <label><b>Email</b></label>
    <label id="email_msg" class="err_msg"></label>
    <input type="text" placeholder="Enter email address" size="30" name="eml">
	
    <label><b>Password</b></label>
     <label id="pwd_msg" class="err_msg"></label>
    <input  type="password" placeholder="Enter password" size="30" name="pwd">
    
    <label><b>Re-enter Password</b></label>
     <label id="pwdr_msg" class="err_msg"></label>
    <input  type="password" placeholder="Confirm password" size="30" name="pswr">
    
     <input type="submit" value="Submit" name="Signup"/>
     <input type="reset" value="Reset"/>
</div>
</form>
<script>
document.getElementById("SignUp").addEventListener("submit", SignUpForm, false);
document.getElementById("SignUp").addEventListener("reset", ResetForm, false);
</script>
</body>
</html>
