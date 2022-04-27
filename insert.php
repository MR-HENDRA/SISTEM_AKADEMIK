<?php include('conn.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$nim			= $_POST['nim'];
			$nama			= $_POST['nama'];
            $program_studi = $_POST['program_studi'];
            $angkatan     = $_POST['angkatan'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat			= $_POST['alamat'];
            $tempat_lahir	= $_POST['tempat_lahir'];
            $tanggal_lahir	= $_POST['tanggal_lahir'];
            $whatsapp		= $_POST['whatsapp'];

			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa_tb WHERE nim='$nim'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa_tb(nim, nama, program_studi, angkatan, jenis_kelamin, alamat, tempat_lahir, tanggal_lahir, whatsapp) VALUES('$nim', '$nama', '$program_studi', '$angkatan', '$jenis_kelamin', '$alamat', '$tempat_lahir', '$tanggal_lahir', '$whatsapp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil Menambahkan Data."); document.location="view.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal Menambahkan Data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>

		<form action="insert.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIM</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nim" class="form-control" size="5" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>

            <div class="item form-group"> 
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik SipilL">Teknik Sipil</option>
						<option value="Teknik Kimia">PWK</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Akuntansi">Akuntansi</option>
						<option value="Manajemen">Manajemen</option>
						<option value="Farmasi">Farmasi</option>
						<option value="Hukum">Hukum</option>
						<option value="Kedokteran">Kedokteran</option>
					</select>
				</div>
			</div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Angkatan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="number" name="angkatan" class="form-control" required>
                </div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                <div class="col-md-6 col-sm-6">
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tempat Lahir</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="tempat_lahir" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
                <div class="col-md-6 col-sm-6">
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Whatsapp</label>
                <div class="col-md-6 col-sm-6">
                    <input type="number" name="whatsapp" class="form-control" required>
                </div>
            
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
