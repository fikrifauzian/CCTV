<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />

		<title>Zoomer Demo</title>

		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,900" rel="stylesheet" type="text/css" media="all" />
		<link href="http://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet" type="text/css">
		<link href="http://formstone.it/css/demo.css" rel="stylesheet" type="text/css" media="all" />

		<!--[if LTE IE 8]>
			<link href="http://formstone.it/css/demo.ie.css" rel="stylesheet" type="text/css" media="all" />
		<![endif]-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://formstone.it/js/demo.js"></script>

		<link href="css/jquery.fs.zoomer.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.fs.zoomer.js"></script>

		<style>
			.zoomer_wrapper { border: 1px solid #ddd; border-radius: 3px; height: 500px; margin: 10px 0; overflow: hidden; width: 100%; }

			.zoomer.dark_zoomer { background: #333 url(http://formstone.it/files/demo/zoomer-bg-dark.png) repeat center; }
			.zoomer.dark_zoomer img { box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); }
		</style>

		<script>
			$(document).ready(function() {
				$(".zoomer_basic").zoomer();

				$(".zoomer_custom").zoomer({
					controls: {
						zoomIn: ".zoomer_custom_zoom_in",
						zoomOut: ".zoomer_custom_zoom_out"
					},
					customClass: "dark_zoomer",
					increment: 0.03,
					interval: 0.1,
					marginMax: 50
				});

				$(window).on("resize", function(e) {
					$(".zoomer_wrapper").zoomer("resize");
				});
			});
		</script>
	</head>
	<body class="gridlock demo">
		
		<article class="row page">
			<div class="mobile-full tablet-full desktop-8 desktop-push-2">
				<div class="clear_fix">
					<a href="index.php" style="text-decoration:none; color:#000"><input type=button value="Kembali" /></a>
				</div>

				<!-- GALLERY -->
				<h2>Preview Gambar</h2>

				<div class="zoomer_wrapper zoomer_basic">
				<?php
				include 'connection.php';

				$result = mysqli_query($con,"SELECT * FROM webcam order by id desc");

				while($row = mysqli_fetch_array($result)) {
				  echo "<img src= '".$row['imageLocation']."'/>";
				}
				?>
				</div>
				
	</body>
</html>