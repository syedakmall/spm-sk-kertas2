<?php
# Memulakan fungsi session
session_start();

# memanggil fail header.php
include('header.php');
?>

<!-- Tajuk antaramuka log masuk   -->


<!-- borang daftar masuk (log in/sign in) 
<form action='login-proses.php' method='POST'>

	Nokp <input type='text' name='nokp'><br>
	Katalaluan <input type='password' name='katalaluan'><br>
	<input type='submit' value='Login'>
</form> -->
<link rel="stylesheet" href="./styling/login-borang.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<body class="bg-base-200 h-full">
<div>

<body>
	<div class="container">
		<input type="checkbox" id="check">
		<div class="login form">
			<header>Daftar Masuk Ahli</header>
			<form action="login-proses.php" method="POST">
				<input type="text" name="nokp" placeholder="Nombor Kad Pengenalan">
				<input type="password" name="katalaluan" placeholder="Kata Laluan">

				<input type="submit"  class="btn btn-secondary" value="Login">
			</form>
			<div class="signup">
				<span class="signup">Bukan Ahli?
					<a href="signup-borang.php">Daftar</a>
				</span>
			</div>
		</div>

	</div>
</body>
</div>
</body>
<?PHP include('footer.php'); ?>