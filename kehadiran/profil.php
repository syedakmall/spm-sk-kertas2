<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');

# Menyemak kewujudan nilai pembolehubah session['nokp']
if (empty($_SESSION['nokp'])) {

	# jika nilai session nokp tidak wujud/kosong. aturcara akan dihentikan
	die("<script>alert('sila login'); 
    window.location.href='logout.php';</script>");
}
?>

<table width='100%' class="table" border='1'>
	<tr>
		<td width='70%' align='center' valign='top'>


			<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
			<table align='center' width='100%' border='1' id='saiz' bgcolor='white'>
				<caption class="font-bold mb-5">
					*Pengesahan Kendiri hanya boleh dilakukan pada tarikh aktiviti
					dilaksana sahaja.
				</caption>
				<tr align='center' class='bg-secondary text-base-100'>
					<td>Nama Aktiviti</td>
					<td>Tarikh | Masa</td>
					<td>Kehadiran</td>
				</tr>
				<?php

				# arahan query untuk mencari senarai Aktiviti 
				$arahan_papar = "select* from aktiviti";

				# laksanakan arahan mencari data aktiviti 
				$laksana = mysqli_query($condb, $arahan_papar);

				# Mengambil data yang ditemui 
				while ($m = mysqli_fetch_array($laksana)) {
					# memaparkan senarai nama dalam jadual 
					echo "<tr align='center' > 
                        <td>" . $m['nama_aktiviti'] . "</td> 
                        <td>" . $m['tarikh_aktiviti'] . " | " . $m['masa_mula'] . " </td> 
                        <td align='center'>";

					# Arahan mendapatkan data kehadiran ahli bagi setiap aktiviti
					$arahan_sql_hadir = "select * from kehadiran where 
nokp ='" . $_SESSION['nokp'] . "' and id_aktiviti ='" . $m['id_aktiviti'] . "' ";

					# melaksanakan arahan sql mendapatkan data
					$laksana_hadir = mysqli_query($condb, $arahan_sql_hadir);

					if (mysqli_num_rows($laksana_hadir) == 1) {
						echo "&#9989;";
					} else {
						echo "&#10060; <br>";

						if (date("Y-m-d") == $m['tarikh_aktiviti']) {
							# Pengesahan Kehadiran Kendiri
							echo "<a href='profil-sahkendiri.php?id_aktiviti=" . $m['id_aktiviti'] . "'>
[ PENGESAHAN KENDIRI ] </a>";
						}
					}
					echo "</td></tr>";
				}  ?>
			</table>

		</td>
		<td align='center' valign='top'>
			<h3 class="font-bold text-2xl mt-10 mb-5">IMBAS CODE UNTUK SAH KEHADIRAN</h3>




			<div class="card card-compact w-96 bg-base-100 mb-10 shadow-xl">
				<figure class="mt-10"><?PHP

						# mengambil data untuk di jadikan QR code atau bar code
						$data = $_SESSION['nokp'];
						$saiz = "400x400";

						# set umpukkan data API untuk memaparkan QR kod 
						$qr_api = "https://chart.googleapis.com/chart?chs=$saiz&cht=qr&chl=" . $data;
						echo "<div align='center'><img width='50%' src='" . $qr_api . "'></div>";
						?></figure>
				<div class="card-body">
					<p class="text-xl">
						<b>Nama : </b> <?= $_SESSION['nama'] ?><br>
						<b>No KP : </b> <?= $_SESSION['nokp'] ?><br>
					</p>
					
				</div>
			</div>
		</td>
	</tr>
</table>
<?php include('footer.php'); ?>