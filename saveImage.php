<?php
session_start();
	// untuk membangun koneksi ke database
	include 'connection.php';
	$name = date('YmdHis');
	$newname="images/".$name.".jpg";
	$file = file_put_contents( $newname, file_get_contents('php://input') );
	if (!$file) {
		print "ERROR: Gagal menyimpan $filename, cek permissions \n";
		exit();
	}
	else
	{
		// menyimpan gambar ke database
		$sql="Insert into webcam(imageLocation) values('$newname')";
		$result=mysqli_query($con,$sql) or die("error sql connect");
		$value=mysqli_insert_id($con);
		$_SESSION["myvalue"]=$value;
	}

	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $newname;
	print "$url\n";
?>