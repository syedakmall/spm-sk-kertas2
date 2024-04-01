<!-- Tajuk sistem. Akan dipaparkan disebelah atas -->


<link rel="stylesheet" href="./styling/header.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<html data-theme="fantasy">
<?PHP if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "ADMIN") { ?>



    <div class="navbar bg-primary text-base-100">
        <div class="navbar-start">


            <a class="btn btn-ghost text-xl  font-bold">Sistem Kehadiran Kelab Robotik 🤖</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href='index.php'>Laman Utama</a>
                </li>

                <li><a href='profil.php'>Profil</a></li>
                <li><a href='kehadiran-rekod.php'>Kaunter Kehadiran</a></li>
                <li><a href='kehadiran-laporan.php'>Laporan Kehadiran</a></li>

                <li><a href='senarai-ahli.php'>Ahli</a></li>
                <li><a href='senarai-aktiviti.php'>Aktiviti</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn" href="logout.php">Log Out</a>
        </div>
    </div>


<?php } else if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "AHLI BIASA") { ?>
    <!-- Menu ahli biasa : dipaparkan sekiranya ahli telah login -->

    <div class="navbar bg-primary text-white">
        <div class="navbar-start">

            <a class="btn btn-ghost text-xl  font-bold">Kelab Robotik 🤖</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>

        </div>
        <div class="navbar-end">
            <a class="btn" href="logout.php">Log Out</a>
        </div>
    </div>

<?php } else { ?>
    <!-- menu Laman Utama : dipaparkan sekiranya admin atau ahli tidak login -->

    <div class="navbar bg-primary text-white">
        <div class="navbar-start">

            <a class="btn btn-ghost text-xl  font-bold">Kelab Robotik 🤖</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="index.php">Laman Utama</a></li>
            </ul>
        </div>

        <div class="navbar-end">
            <a class="btn" href="login-borang.php">Daftar Masuk Ahli</a>
        </div>
    </div>

<?php } ?>