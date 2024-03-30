<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail kawalan-admin.php
include('header.php');
include('kawalan-admin.php');
?>


<!-- borang untuk menerima data dari pengguna -->

<link rel="stylesheet" href="login-borang.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<div>

    <body>
        <div class="container">
            <input type="checkbox" id="check">
            <div class="login form">
                <header>Daftar Aktiviti Baru</header>
                <form action="aktiviti-daftar-proses.php" method="POST">
                    <input type="text" name="nama_aktiviti" placeholder="Nama Aktiviti">
                    Tarikh Aktiviti
                    <input type='date' name='tarikh_aktiviti' min='<?= date("Y-m-d") ?>' required><br>
                    <input type="text" name="masa_mula" placeholder="Masa Mula">
                    <input type="submit" class="btn btn-secondary" value="Daftar">

                </form>

            </div>

        </div>
    </body>
</div>

