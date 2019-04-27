<?php 

/*
*	Function to making login form about the user account
*	As long as function suificient, it will return into the cookies and session start
*/

if(isset($_POST['login'])) {	
	$log = new logIn();
	$log->db = $db;
	$log->url = $CONF['url'];
	$log->username = $_POST['username'];
	$log->password = $_POST['password'];

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
	<div class="login">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login">
			<table width='80%' border=0>
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="login"></td>
					<td>Forget Password?</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="register">
		Belum punya akun? <button name="register" onclick="signup.php">Register</button>
	</div>
</body>
</html>