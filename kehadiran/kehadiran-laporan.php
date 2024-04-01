<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-aktiviti.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>

<body class="bg-base-200 h-full">
	
<!-- Boarang carian Aktiviti -->
<form action='' method='GET'  style="max-width: fit-content;
	margin-left: auto;
	margin-right: auto;">
	<h1 align="center" class="font-bold text-4xl mt-10 mb-3">Laporan Kehadiran Aktiviti</h1>
	<div align="center">
	<select align="center" class="mt-1 bg-base-200 border border-gray-300 text-neutral text-sm
					rounded-lg h-10 pl-2" name='id_aktiviti'>
		<option selected disabled value>Sila Pilih Aktiviti</option>

		<?php
		# Proses memaparkan senarai aktiviti dalam bentuk drop down list
		$arahan_sql_pilih       =   "select* from aktiviti";
		$laksana_arahan_pilih   =   mysqli_query($condb, $arahan_sql_pilih);
		while ($n = mysqli_fetch_array($laksana_arahan_pilih)) {
			echo "<option value='" . $n['id_aktiviti'] . "'>
                " . $n['id_aktiviti'] . " | " . $n['nama_aktiviti'] . "
                </option>";
		}
		?>
	</select>
	<input type='submit' class="btn text-base-100  btn-accent ml-3" value='Cari'>
	</div>
</form>

<?php
# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
$tambahan = "";
if (!empty($_GET['id_aktiviti'])) {
	# Mengambil nilai data GET di URL
	$id_aktiviti = $_GET['id_aktiviti'];

	# proses mendapatkan maklumat aktiviti
	$sql_aktiviti = "select* from aktiviti where id_aktiviti = '$id_aktiviti'";
	$laksana_aktiviti = mysqli_query($condb, $sql_aktiviti);
	$ma = mysqli_fetch_array($laksana_aktiviti);

	# Mendapatkan Analisis Kehadiran (bil hadir & bil ahli)
	$arahanSQL = " SELECT 
    ( SELECT COUNT(*) FROM kehadiran 
where id_aktiviti = '" . $ma['id_aktiviti'] . "' ) AS bil_hadir,
    ( SELECT COUNT(*) FROM ahli ) AS bil_ahli ";
	$laksanaSQL     =   mysqli_query($condb, $arahanSQL);
	$da             =   mysqli_fetch_array($laksanaSQL);
?>

	<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
	<h3 style="margin-top:10;max-width: fit-content;
  margin-left: auto;
  margin-right: auto;">
		<b>Nama : </b><?= $ma['nama_aktiviti'] ?><br>
		<b>Tarikh : </b><?= $ma['tarikh_aktiviti'] ?> <br> <b>Masa Mula : </b> <?= $ma['masa_mula'] ?><br>
		<b>Kehadiran : </b> <?= $da['bil_hadir'] . " / " . $da['bil_ahli'] ?> <br>
		<b>Peratus : </b> <?php echo number_format(($da['bil_hadir'] / $da['bil_ahli'] * 100), 2); ?> %
	</h3>

	<table align='center' width='100%' class="table bg-base-200 mb-20" border='1' id='saiz' style="margin-top:10;">
		<tr>
			<td colspan='3'>

				<form action='kehadiran-laporan.php?id_aktiviti=<?= $id_aktiviti; ?>' method='POST' style="margin-bottom:20; padding:0; ">

					<input type='text' name='nama' class="input bg-base-200 input-bordered" placeholder='🔎 Carian Nama Ahli' style="margin-left:10;">

					<input type='submit' class="btn btn-sm bg-base-300" style="margin-left:10;" value='Cari'>
				</form>

			</td>
			<td colspan='3' align='right'>
				<?php include('butang-saiz.php'); ?>
			</td>
		</tr>
		<tr class="bg-secondary text-base-100">
			<td>Bil</td>
			<td>Nama</td>
			<td>Kad Pengenalan</td>
			<td>Kelas</td>
			<td>Kehadiran</td>
		</tr>

	<?PHP

	# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai ahli
	$tambahan = "";
	if (!empty($_POST['nama'])) {
		$tambahan = " where ahli.nama like '%" . $_POST['nama'] . "%'";
	}

	# arahan query untuk mencari senarai Aktiviti 
	$arahan_papar = "
	SELECT *,  ahli.nokp
	FROM ahli
	LEFT JOIN kelas
	ON ahli.id_kelas = kelas.id_kelas
	LEFT JOIN kehadiran
	ON ahli.nokp = kehadiran.nokp 
	and id_aktiviti like '%$id_aktiviti%'
	$tambahan
	ORDER BY ahli.nama ";

	# laksanakan arahan mencari data aktiviti 
	$laksana = mysqli_query($condb, $arahan_papar);
	$hadir = $takhadir = $bil = 0;
	# Mengambil data yang ditemui 
	while ($m = mysqli_fetch_array($laksana)) {

		# memaparkan senarai nama dalam jadual 
		echo "<tr> 
        <td>" . ++$bil . "</td>
        <td>" . $m['nama'] . "</td> 
        <td>" . $m['nokp'] . "</td> 
        <td>" . $m['ting'] . " | " . $m['nama_kelas'] . " </td> 
        <td align='center'>";

		if (strlen($m['id_aktiviti']) >= 1) {
			echo "&#9989;";
		} else {
			echo "&#10060;";
		}

		echo "</td> 
        
        </tr>";
	}
	echo "</table>";
}
	?>
</body>



	<?php include('footer.php'); ?>