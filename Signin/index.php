<?php 

include ('config.php');

session_start();

error_reporting(0);

if (isset($_SESSION['name'])) {
    header("Location: Home.php");
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user WHERE name='$name' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		header("Location: Home.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Signin</title>
</head>
<body>
<div class="container"> 
	<form method="post" action="" class="form">
<div style="width:100px;height: 100px; margin-left: 75px ; background-color: blueviolet; padding-top: 10px; border-radius: 25px; width: 200px;"><p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign In</p></div>
<br><br><br>
<input type="text" name="name" placeholder="Username" value="<?php echo $name; ?>"><br><br>
<input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>"><br><br>
<a href="">Forgot your password?</a><br><br>
<input type="submit" name="submit" value="submit" class="submit"><br><br>
<a href="">Dont have an Account?</a>
</form>
</div>
</body>
</html>