<?php
# memulakan fungsi  SESSION
session_start();

# Memanggil fail header.php & fail connection.php
include('header.php');
include('connection.php');
?>

<!-- Tajuk antaramuka-->

<!-- Borang Pendaftaran ahli Baru-->


<link rel="stylesheet" href="./styling/login-borang.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<body class="bg-base-200 h-full">
<div>

<body>
	<div class="container">
		<input type="checkbox" id="check">
		<div class="login form">
			<header>Daftar Ahli</header>
			<form action="signup-proses.php" method="POST">
				<input type="text" name="nama" placeholder="Nama Ahli">
				<input type="text" name="nokp" placeholder="Nombor Kad Pengenalan">


				<input type="password" name="katalaluan" placeholder="Kata Laluan">
				Tingkatan : <select class="mt-1 mb-3 pr-3 bg-base-100 border border-gray-300 text-neutral text-sm
				rounded-lg h-10 pl-2" name='id_kelas'><br>
					<option selected disabled value>Sila Pilih Kelas</option>
					<?php
					# Proses memaparkan senarai kelas dalam bentuk drop down list
					$arahan_sql_pilih       =   "select* from kelas";
					$laksana_arahan_pilih   =   mysqli_query($condb, $arahan_sql_pilih);
					while ($m = mysqli_fetch_array($laksana_arahan_pilih)) {
						echo "<option value='" . $m['id_kelas'] . "'>
" . $m['ting'] . " " . $m['nama_kelas'] . "</option>";
					}
					?>
				</select> <br>
				<input type="submit" class="btn btn-secondary mt-2" value="Daftar" required>
			</form>
			<div class="signup">
				<span class="signup">Mempunyai Akaun Ahli?
					<a href="login-borang.php">Login</a>
				</span>
			</div>
		</div>

	</div>
</body>
</div>
</body>
<?PHP include('footer.php'); ?>