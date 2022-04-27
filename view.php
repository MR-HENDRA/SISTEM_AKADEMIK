<?php
//memasukkan file config.php
include('conn.php');
?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Mahasiswa</font></center>
		<hr>
		<a href="insert.php"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Program Studi</th>
					<th>Angkatan</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>No. WhatsApp</th>

					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan NIM yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa_tb ORDER BY nim DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nim'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['program_studi'].'</td>
							<td>'.$data['angkatan'].'</td>
                            <td>'.$data['jenis_kelamin'].'</td>
                            <td>'.$data['alamat'].'</td>
                            <td>'.$data['tempat_lahir'].'</td>
                            <td>'.$data['tanggal_lahir'].'</td>
                            <td>'.$data['whatsapp'].'</td>
							<td>
								<a href="edit.php?nim='.$data['nim'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?nim='.$data['nim'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
