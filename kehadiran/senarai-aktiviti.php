<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-aktiviti.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<h3 align='center' class="text-4xl font-bold mb-5 mt-10">Senarai Aktiviti</h3>

<body class="bg-base-200 h-full">
	
<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
<table align='center' class="table" width='100%' border='1' id='saiz'>
	<tr class='bg-base-200 '>
		<td>
			<form action='' method='POST' style="margin:0; padding:0;">

				<input type='text' name='nama_aktiviti' class="input input-bordered bg-base-200 size-60 mr-3" placeholder='🔎 Carian Aktiviti'>

				<button class="btn btn-sm bg-base-300"><input type='submit' value='Cari'></button>
			</form>
		</td>
		<td colspan='2' align='right'>
			| <a href='aktiviti-daftar-borang.php'><button class="btn btn-sm bg-base-300">Daftar Aktiviti Baru</button></a> |
			<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
			<?php include('butang-saiz.php'); ?>

		</td>
	</tr>
	<tr class='bg-secondary text-white' align='center'>
		<td>Nama Aktiviti</td>
		<td>Tarikh | Masa</td>
		<td>Tindakan</td>
	</tr>

	<?php

	# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
	$tambahan = "";
	if (!empty($_POST['nama_aktiviti'])) {
		$tambahan = "where nama_aktiviti like '%" . $_POST['nama_aktiviti'] . "%'";
	}
	# arahan query untuk mencari senarai Aktiviti 
	$arahan_papar = "select* from aktiviti $tambahan ";

	# laksanakan arahan mencari data aktiviti 
	$laksana = mysqli_query($condb, $arahan_papar);

	# Mengambil data yang ditemui 
	while ($m = mysqli_fetch_array($laksana)) {
		# memaparkan senarai nama dalam jadual 
		echo "<tr align='center'> 
        <td>" . $m['nama_aktiviti'] . "</td> 
        <td>" . $m['tarikh_aktiviti'] . " | " . $m['masa_mula'] . " </td> ";

		# memaparkan navigasi untuk kemaskini dan hapus data aktiviti
		echo "<td align='right'>
        <a href='aktiviti-kemaskini-borang.php?id_aktiviti=" . $m['id_aktiviti'] . "'>
        <button class='btn btn-info'>
			Kemaskini
		</button></a>

		
        <a href='kehadiran-borang.php?id_aktiviti=" . $m['id_aktiviti'] . "'>
        <button class='btn btn-info'>Pengesahan Kehadiran</button></a>

		<a href='aktiviti-padam-proses.php?id_aktiviti=" . $m['id_aktiviti'] . "' 
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        <button class='btn btn-error'>
	Hapus
		</button></a>

    

        </td>
        </tr>";
	}

	?>
</table>
</body>


<?php include('footer.php'); ?>