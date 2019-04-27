<?php
if(isset($_POST["register"])) {
	$reg = new register();
	
}
?>
<html>
<head>
	<title>Pendaftaran</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="signup">
	<table width='80%' border=0 bgcolor='#CCCCCC'>
	<tr>
		<td>Username</td>
		<td><input type="" name=""></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
	</tr>
	<tr>
		<td>Provinsi</td>
	</tr>
	<tr>
		<td>Password</td>
	</tr>
	</table>
</body>
</html>