<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail kawalan-admin.php
include('header.php');
include('kawalan-admin.php');
include('connection.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-kativiti
if (empty($_GET)) {
	die("<script>window.location.href='senarai-aktiviti.php';</script>");
}

# Mendapatkan maklumat aktiviti dari pangkalan data
$arahan_sql_pilih   =   "select * from aktiviti where id_aktiviti ='" . $_GET['id_aktiviti'] . "' ";
$laksana_arahan     =   mysqli_query($condb, $arahan_sql_pilih);
$m  =   mysqli_fetch_array($laksana_arahan);

?>


<link rel="stylesheet" href="login-borang.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<div>

	<body>
		<div class="container">
			<input type="checkbox" id="check">
			<div class="login form">
				<header>Kemaskini Aktiviti</header>
				<form action="aktiviti-kemaskini-proses.php?id_aktiviti=<?= $m['id_aktiviti'] ?>" method="POST">

					<input type='text' name='nama_aktiviti' value='<?= $m['nama_aktiviti'] ?>' placeholder="Nama Aktiviti" required><br>


					<input type='date' name='tarikh_aktiviti' min='<?= date("Y-m-d") ?>' placeholder="Tarikh Aktiviti" value='<?= $m['tarikh_aktiviti'] ?>' required><br>


					<input type='text' name='masa_mula' value='<?= $m['masa_mula'] ?>' placeholder="Masa Mula" required><br>

					<input type='submit' class="btn btn-secondary" value='Kemaskini'>
				</form>

			</div>

		</div>
	</body>
</div>