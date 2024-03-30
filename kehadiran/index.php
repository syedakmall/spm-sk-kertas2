<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php 
include('header.php');


?>





<body>


	<div class="hero min-h-screen bg-base-200">
		<div class="hero-content flex-col lg:flex-row-reverse">
			<div class="carousel carousel-center  max-w-md p-4 space-x-4 bg-neutral rounded-box">
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
				<p class="py-6 text-2xl">Kelab robotik sekolah memperkasakan pelajar untuk mempelajari robotik dengan mereka bentuk, pengaturcaraan dan membina robot untuk tugasan dan pertandingan secara kerjasama.</p>
				<button class="btn btn-primary size-70 text-4xl"><a href="signup-borang.php">Daftar Sebagai Ahli</a></button>
			</div>
		</div>
	</div>







</body>
<?php include('footer.php'); ?>