<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail kawalan-admin.php
include('header.php');
include('kawalan-admin.php');
include('connection.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-ahli
if (empty($_GET)) {
	die("<script>window.location.href='senarai-ahli.php';</script>");
}
?>



<link rel="stylesheet" href="./styling/login-borang.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<div>

	<body>
		<div class="container">
			<input type="checkbox" id="check">
			<div class="login form">
				<header>Kemaskini Ahli</header>
				<form action='ahli-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>

					<input type='text' name='nama' value='<?= $_GET['nama'] ?>' placeholder="Nama" required><br>
					<input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' placeholder="Nombor Kad Pengenalan" required><br>


					<input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' placeholder="Kata Lluan" required><br>


					Tahap : <select class="mt-1 pr-2 bg-base-100 border border-gray-300 text-neutral text-sm
					rounded-lg h-10 pl-2" name='tahap'><br>
						<option value='<?= $_GET['tahap'] ?>'> <?= $_GET['tahap'] ?> </option>
						<?php
						# Proses memaparkan senarai tahap dalam bentuk drop down list
						$arahan_sql_tahap       =   "select tahap from ahli group by tahap order by tahap";
						$laksana_arahan_tahap   =   mysqli_query($condb, $arahan_sql_tahap);
						while ($n = mysqli_fetch_array($laksana_arahan_tahap)) {
							if ($n['tahap'] != $_GET['tahap']) {
								echo "<option value='" . $n['tahap'] . "'>
                " . $n['tahap'] . "
                </option>";
							}
						}
						?>
					</select> <br>


					Kelas : <select class="mt-2 bg-base-100 border border-gray-300 text-neutral text-sm
					rounded-lg h-10 pl-2" name='id_kelas'><br>
						<option value='<?= $_GET['id_kelas'] ?>'>
							<?= $_GET['ting'] . " " . $_GET['nama_kelas'] ?>
						</option>
						<?php
						# Proses memaparkan senarai kelas dalam bentuk drop down list
						$arahan_sql_pilih       =   "select* from kelas";
						$laksana_arahan_pilih   =   mysqli_query($condb, $arahan_sql_pilih);
						while ($m = mysqli_fetch_array($laksana_arahan_pilih)) {
							if ($m['id_kelas'] != $_GET['id_kelas']) {
								echo "<option value='" . $m['id_kelas'] . "'>
                " . $m['ting'] . " " . $m['nama_kelas'] . "
                </option>";
							}
						}
						?>
					</select> <br><br>

					<input type='submit' class="btn btn-secondary" value='Kemaskini'>
				</form>

			</div>

		</div>
	</body>
</div>
<?PHP include('footer.php'); ?>