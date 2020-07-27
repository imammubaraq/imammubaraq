<?php 
	include 'db.php';  
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN IMAM MUBARAQ</title>
</head>
<body>
	<h2>silahkan input data</h2>
	<a href="data.php">data</a>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>nama</td>
				<td>:</td>
				<td><input type="text" name="nama" /></td>
			</tr>

			<tr>
				<td>file</td>
				<td>:</td>
				<td><input type="file" name="gambar" /></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="kirim" value="kirim" /></td>
			</tr>
		</table>
	</form>

	<?php 
    if(isset($_POST['kirim'])){
    	$nama = $_POST['nama'];
    	$nama_file = $_FILES['gambar']['name'];
    	$source = $_FILES['gambar']['tmp_name'];
    	$folder = './uploads/';

    	move_uploaded_file($source, $folder.$nama_file);
    	$insert = mysqli_query($conn,"INSERT INTO tb_gambar VALUES (
    	NULL,
    	'$nama',
    	'$nama_file')");

    	if($insert){
    		echo 'berhasil upload';
    	}else{
    		echo 'gagal upload';
    	}
    }

	 ?>
</body>
</html>