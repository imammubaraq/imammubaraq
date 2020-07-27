<?php 
	include 'db.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN EDIT DATA </title>
	<style type="text/css">
		body{
			background-image: url();
		}
	</style>
</head>
<body>
	<h2>data gambar imam</h2>
	<a href="index.php">tambah</a>
	<table border="1">
		<tr>
			<td>no</td>
			<td>nama</td>
			<td>gambar</td>
			<td>aksi</td>		
		</tr>
			<?php 
			$query = mysqli_query($conn,"SELECT * FROM tb_gambar");
			while($row = mysqli_fetch_array($query)){
			 ?>
		<tr>
			<td><?php echo $row['id_gambar'] ?></td>
			<td><?php echo $row['nama'] ?></td>
			<td><img src="uploads/<?php echo $row['file'] ?>"widt= "100px" height= "100px"></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id_gambar'] ?>">edit</a> |
				<a href="hapus.php?id=<?php echo$row['id_gambar']?>">hapus</a>
			</td>		
		</tr>
	<?php } ?>
	</table>
</body>
</html>