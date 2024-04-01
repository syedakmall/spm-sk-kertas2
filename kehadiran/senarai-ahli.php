<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan kawalan-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');


?>

<body class="bg-base-200 h-full">
	
<!-- Header bagi jadual untuk memaparkan senarai ahli -->
<h3 align='center' class="font-bold text-4xl mb-5 mt-10">Senarai Ahli</h3>

<table align='center' width='100%' border='1' class="table mb-10" style="margin-right: 2;" id='saiz'>
	<tr class='bg-base-200'>
		<td colspan='3'>
			<form action='' method='POST' style="margin:0; padding:0;">


				<input type='text' name='nama' class="input input-bordered bg-base-200 size-60 mr-3" placeholder='🔎 Carian Nama Ahli'>

				<button class="btn btn-sm bg-base-300"><input type='submit' value='Cari'></button>

			</form>
		</td>
		<td colspan='3' align='right'>
			| <a href='upload.php'><button class="btn btn-sm bg-base-300">Muat Naik Ahli</button></a> |
			<?php include('butang-saiz.php'); ?>
		</td>
	</tr>
	<tr class='bg-secondary text-white'>
		<td align="center" width='20%'>Nama</td>
		<td width='15%'>Kad Pengenalan</td>
		<td width='10%'>Kelas</td>
		<td width='10%'>Kata Laluan</td>
		<td width='13%'>Tahap</td>
		<td width='20%'>Tindakan</td>
	</tr>

	<?php

	# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai ahli
	$tambahan = "";
	if (!empty($_POST['nama'])) {
		$tambahan = " and ahli.nama like '%" . $_POST['nama'] . "%'";
	}
	# arahan query untuk mencari senarai nama ahli 
	$arahan_papar = "select* from ahli, kelas 
where ahli.id_kelas = kelas.id_kelas 
$tambahan ";

	# laksanakan arahan mencari data ahli 
	$laksana = mysqli_query($condb, $arahan_papar);

	# Mengambil data yang ditemui 
	while ($m = mysqli_fetch_array($laksana)) {
		# umpukkan data kepada tatasusunan bagi tujuan kemaskini ahli
		$data_get = array(
			'nama'          =>  $m['nama'],
			'nokp'          =>  $m['nokp'],
			'katalaluan'    =>  $m['katalaluan'],
			'tahap'         =>  $m['tahap'],
			'id_kelas'      =>  $m['id_kelas'],
			'ting'          =>  $m['ting'],
			'nama_kelas'    =>  $m['nama_kelas']

		);

		# memaparkan senarai nama dalam jadual 
		echo "<tr class='hover'> 
        <td align='center'>" . $m['nama'] . "</td> 
        <td>" . $m['nokp'] . "</td> 
        <td>" . $m['ting'] . " " . $m['nama_kelas'] . "</td> 
        <td>" . $m['katalaluan'] . "</td>
        <td>" . $m['tahap'] . "</td>  ";

		# memaparkan navigasi untuk kemaskini dan hapus data ahli
		echo "<td>

		<a href='ahli-kemaskini-borang.php?" . http_build_query($data_get) . "'>
		<button class='btn btn-info'>Kemaskini</button></a>


		<a href='ahli-padam-proses.php?nokp=" . $m['nokp'] . "' 
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        <button class='btn btn-error ml-3'>Hapus</button></a>

        </td>
        </tr>";
	}

	?>
</table>
	
</body>


<?php include('footer.php'); ?>