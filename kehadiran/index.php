<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php 
include('header.php');


?>

<body>


	<div class="hero min-h-screen bg-base-200">
		<div class="hero-content flex-col lg:flex-row-reverse">
			<div class="carousel carousel-center max-w-md p-4 space-x-4 bg-neutral rounded-box">
				<div class="carousel-item">
					<img src="./imgs/robot1.jpg" class="rounded-box" />
				</div>
				<div class="carousel-item">
					<img src="./imgs/robot2.jpeg" class="rounded-box" />
				</div>
				<div class="carousel-item">
					<img src="./imgs/robot3.jpeg" class="rounded-box" />
				</div>
				<div class="carousel-item">
					<img src="./imgs/robot4.jpeg" class="rounded-box" />
				</div>
				<div class="carousel-item">
					<img src="./imgs/robot6.jpeg" class="rounded-box" />
				</div>
				<div class="carousel-item">
					<img src="./imgs/robot5.jpeg" class="rounded-box" />
				</div>

			</div>
			<div style="margin-right:20;">
				<h1 class="text-7xl font-bold">Selamat Datang Ke</h1><br>



				<h1 class="text-7xl font-bold text-primary">Kelab Robotik. 👋</h1>
				<p class="py-6 text-2xl">Laman web sistem kehadiran yang efisien direka untuk Kelab Robotik. Mengautomasikan daftar masuk, mengurus rekod dan mengoptimumkan operasi, selari dengan visi dan misi kelab.</p>
				<a href="signup-borang.php"><button class="btn btn-primary size-70 text-4xl">Daftar Sebagai Ahli </button></a>
			</div>
		</div>
	</div>







</body>
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<footer class="footer footer-center p-4 bg-base-300 text-base-content">
	<aside>
		<p>Hak Cipta : Kelab Robotik SMK PP 11(1), 2024/25</p>
	</aside>
</footer>