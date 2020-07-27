<?php 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		 ul {
	           float: left;
	           list-style-type: none;
	           margin-top: 25px
            }
            ul li{
	           display: inline-block;
	           
            }
            ul li a{
	           text-decoration: none;
	           color: grey;
	           padding: 5px 20px;
	           border: 1px solid;
	           transition: 0.6s;
	           margin-top: 10px;
           }
	</style>
	<h3>Ini adalah form upload gambar,silahkan klik tombol dibawah ini.</h3>
	<br><br>
<form action="" method="post" enctype="multipart/form-data">
	<input type="text" name="nama" placeholder="Masukan nama gambar"><br>
	<input type="file" name="foto"><br>
	<input type="text" name="nomer" placeholder="Masukan nomer gambar"><br>
	<input type="submit" name="simpan" value="simpan gambar"><br>
</form>
<?php 
if (isset($_POST['simpan'])) {
	# code...
	$folder = './produk/';
	$name_p = $_FILES['foto']['name'];
	$sumber_p = $_FILES['foto']['tmp_name'];
	move_uploaded_file($sumber_p, $folder.$name_p);
	$insert = mysql_query($conn, "INSERT INTO produk VALUES (NULL,'".$_POST['nama']."','".$name_p."','".$_POST['nomer']."',NULL)");
	if ($insert){
		# code...
		echo 'Data Telah Disimpan';
	}
	else{
	 	echo 'Gagal disimpan';
	 }
}
 ?>
 <br>
  <ul>
  	<li role="presentation"><a href="index.php">Kembali Ke Menu</a></li>
  </ul>
</body>
</html>