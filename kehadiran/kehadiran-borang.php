<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

# Mendapatkan maklumat aktiviti dari pangkalan data
$arahan_sql_aktiviti   =   "select * from aktiviti where id_aktiviti ='" . $_GET['id_aktiviti'] . "' ";
$laksana_aktiviti    =   mysqli_query($condb, $arahan_sql_aktiviti);
$n  =   mysqli_fetch_array($laksana_aktiviti);

?>



<div style="max-width: fit-content;
  margin-left: auto;
  margin-right: auto;">
	<div class="card w-96 bg-secondary text-white">
		<div class="card-body">
			<h2 class="card-title">Pengesahan Kehadiran Ahli</h2>
			Nama Aktiviti : <?= $n['nama_aktiviti'] ?> <br>
			Tarikh : <?= $n['tarikh_aktiviti'] ?><br>
			Masa : <?= $n['masa_mula'] ?><br>

		</div>
	</div>
</div>



<br><br>

<div style="max-width: fit-content;
  margin-left: auto;"><?php include('butang-saiz.php'); ?></div>


<form action='kehadiran-proses.php?id_aktiviti=<?= $_GET['id_aktiviti'] ?>' method='POST'>
	<table border='1' class="table" id='saiz' width='100%'>
		<tr class="bg-secondary text-white">
			<td>Bil</td>
			<td>Nama</td>
			<td>Nombor Kad Pengenalan</td>
			<td>Kelas</td>
			<td>Kehadiran</td>
		</tr>

		<?php

		# Arahan untuk mendapatkan data kehadiran setiap ahli
		$arahan_sql_kehadiran = "SELECT  
ahli.nokp, ahli.nama,
kelas.ting, kelas.nama_kelas,
kehadiran.id_aktiviti
FROM ahli
LEFT JOIN kelas
ON ahli.id_kelas 	= 	kelas.id_kelas
LEFT JOIN kehadiran
ON ahli.nokp 		= 	kehadiran.nokp 
AND kehadiran.id_aktiviti='" . $_GET['id_aktiviti'] . "'
ORDER BY ahli.nama";

		# Laksanakan arahan untuk memproses data
		$laksana_kehadiran 	= 	mysqli_query($condb, $arahan_sql_kehadiran);
		$bil = 0;

		# Mengambil dan memaparkan semua data kehadiran yang ditemui
		while ($m = mysqli_fetch_array($laksana_kehadiran)) {  ?>
			<tr>
				<td><?= ++$bil; ?></td>
				<td><?= $m['nama'] ?></td>
				<td><?= $m['nokp'] ?></td>
				<td><?= $m['ting'] . " " . $m['nama_kelas'] ?> </td>
				<td><?php

					if ($m['id_aktiviti'] != null) {
						$tanda = 'checked';
					} else
						$tanda = "";
					?>

					<input <?= $tanda ?> type='checkbox' name='kehadiran[]' value='<?= $m['nokp'] ?> ' style='width:30px; height:30px;'>
				</td>
			</tr>
		<?PHP
		}
		?>
		<tr>
			<td colspan='4'></td>
			<td><button class="btn btn-success "><input type='submit' value='Simpan'></button></td>
		</tr>
	</table>
</form>
<?php include('footer.php'); ?>