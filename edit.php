<?php 
	include 'db.php';

	$data = mysqli_query($conn,"SELECT * FROM tb_gambar WHERE id_gambar = '".$_GET['id']."'");
	$r = mysqli_fetch_array($data);

	$nama = $r['nama'];
	$file = $r['file']; 
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN EDIT IMAM MUBARAQ</title>
</head>
<body>
	<h2>silahkan edit data</h2>
	<a href="data.php">data</a>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $nama ?>" /></td>
			</tr>

			<tr>
				<td>file</td>
				<td>:</td>
				<td>
				<input type="hidden" name="img" value="<?php echo $file ?>">
				<input type="file" name="gambar" /></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td><img src="uploads/<?php echo $file ?>" width = "100px" height = "100px" /></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="kirim" value="update" /></td>
			</tr>
		</table>
	</form>

	<?php 
    if(isset($_POST['kirim'])){
    	$nama = $_POST['nama'];
    	$nama_file = $_FILES['gambar']['name'];
    	$source = $_FILES['gambar']['tmp_name'];
    	$folder = './uploads/';

    	if($nama_file != ''){
    		move_uploaded_file($source, $folder.$nama_file);
    		$update = mysqli_query($conn,"UPDATE tb_gambar SET
    		nama = '".$nama."',
    		file = '".$nama_file."'
    		WHERE id_gambar = '" . $_GET['id']."'
    		");
    		if($update){
    			echo "berhasil update";
    		} else{
    			echo "gagal update";
    		}
    	}else{
    		$update = mysqli_query($conn,"UPDATE tb_gambar SET
    		nama = '".$nama."',
    		WHERE id_gambar = '".$_GET['id']."'
    		");
    		if($update){
    			echo "berhasil update";
    		} else{
    			echo "gagal update";
    		}
    	}
    }

	 ?>
</body>
</html>