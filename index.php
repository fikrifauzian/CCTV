<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<title>Simulasi CCTV</title>
<head>
<!-- file webcam.js untuk fungsi default webcam yaitu record gambar dan menyimpannya -->
<script type="text/javascript" src="js/webcam.js"></script>
<style type="text/css">

</style>
</head>

<body>
<?php
	session_start();
	if(isset ($_POST["send"]))
	{
		$getname=$_POST["myname"];
		include 'connection.php';
		$idvalue=$_SESSION["myvalue"];
		$sql="update entry set name='$getname' where id='$idvalue'";
		$result=mysqli_query($con,$sql)
				or die("error in query");
		if($result)
		{
			echo "Uploaded $_SESSION[myvalue] re ..... ";
		}
		else
		{
			echo "$_SESSION[myvalue] nahi hua";
		}
	}
?>

<!-- form yang akan menempatkan jendela webcam untuk menampilkan layar webcam -->
<script language="JavaScript">
		document.write( webcam.get_html(800, 600) );
		webcam.set_api_url( 'saveImage.php' );
		webcam.set_quality( 90 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
		webcam.set_hook( 'onComplete', 'my_completion_handler' );
		
		<!-- record gambar -->
		function take_snapshot(){
			webcam.freeze();
			var x;
			if (confirm("Simpan gambar?") == true) {
				x = "Menyimpan gambar ...";
				webcam.upload()
			} else {
				x = "Gambar tidak tersimpan.";
				webcam.reset();
			}
			document.getElementById("upload_results").innerHTML = x;
		}
		
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML ='Penyimpanan berhasil!';
				// reset camera for another shot
				webcam.reset();
			}
			else {alert("PHP Error: " + msg);
			}
		}
		
</script>

<!-- membuat tombol untuk configurasi webcam dan mengambil snapshot -->
<form>
	<input type=button id="myBtn" value="Konfigurasi" onClick="webcam.configure()">
	<input type=button value="Rekam Gambar" onClick="take_snapshot()">
	<a href="gallery.php" style="text-decoration:none;"><input type=button value="Lihat Gambar" /></a>
</form>
	
<!-- pesan sukses -->
<div id="upload_results" style="background-color:;color:red;"></div>

</body>
</html>