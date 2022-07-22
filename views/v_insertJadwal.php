<title>ADMIN - TAMBAH JADWAL</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<?php //var_dump(expression) ?>
	<?php //if ($data_class != NULL) { ?>
	<h3 class="py-3" style="text-align: center;">Tambah Jadwal</h3>
	<form class="signUp" action="<?php echo base_url();?>index.php/AdminAcademic/addJadwal/" method="POST" enctype="multipart/form-data">
		<?php 
			if($this->session->flashdata('success')){
					?>
					<div class="alert alert-success pt-3 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
						<?php 
							echo $this->session->flashdata('success');
						?>
					</div>
			<?php
			} elseif($this->session->flashdata('warning')){
					?>
					<div class="alert alert-warning pt-3 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
						<?php 
							echo $this->session->flashdata('warning');
						?>
					</div>
			<?php
			} 
		?>
		   	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
		  	<div class="container px-5">
		  		<div class="row mb-4">
				  	<table class="table">
				  		<thead>
				  			<th><label for="dob">Nama Mata Kuliah</label></th>
				  			<th><label for="dob">Kelas</label></th>
				  			<th><label for="dob">Nama Dosen Pengampu</label></th>
				  		</thead>
				  		<tr>
				  			<td>
				  				<div class="input-group mb-3">
								  	<select name="matakuliah_id" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih Mata Kuliah</option>
								  		<?php foreach ($data_matakuliah->result() as $rowMatkul) { ?>
								  		<option value="<?php echo $rowMatkul->matakuliah_id; ?>">
								  			<?php echo $rowMatkul->matakuliah_name; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  			<td>
				  				<div class="input-group mb-3">
								  	<select name="class_id" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih Kelas</option>
								  		<?php foreach ($data_class->result() as $rowClass) { ?>
								  		<option value="<?php echo $rowClass->class_id; ?>">
								  			<?php echo $rowClass->class_name; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  			<td>
				  				<div class="input-group mb-3">
								  	<select name="user_id" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih Dosen</option>
								  		<?php foreach ($data_dosen->result() as $rowDosen) { ?>
								  		<option value="<?php echo $rowDosen->user_id; ?>">
								  			<?php echo $rowDosen->user_name; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  		</tr>
				  		<thead>
				  			<th><label for="dob">Jam Mulai</label></th>
				  			<th><label for="dob">Jam Berakhir</label></th>
				  			<th><label for="dob">Hari</label></th>
				  		</thead>
				  		<tr>
				  			<td>
				  				<div class="input-group mb-4">
								  	<div class="input-group-prepend">
									    <span class="input-group-text" id="inputGroup-sizing-default">
									    	<i class="fa fa-clock-o mx-3" aria-hidden="true"></i>
									    </span>
								  	</div>
								  	<input type="time" name="jadwal_start_at" class="form-control" placeholder="Nama Mata Kuliah" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
							  	</div>
				  			</td>
				  			<td>
				  				<div class="input-group mb-4">
								  	<div class="input-group-prepend">
									    <span class="input-group-text" id="inputGroup-sizing-default">
									    	<i class="fa fa-times-circle-o mx-3" aria-hidden="true"></i>
									    </span>
								  	</div>
								  	<input type="time" name="jadwal_ended_at" class="form-control" placeholder="Nama Mata Kuliah" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
							  	</div>
				  			</td>
				  			<td>
				  				<?php 
				  					$nama_hari = array(
				  						0 => "Monday",
				  						1 => "Tuesday",
				  						2 => "Wednesday",
				  						3 => "Thursday",
				  						4 => "Friday",
				  						5 => "Saturday"
				  					);
				  				 ?>
				  				<div class="input-group mb-3">
								  	<select name="days_post" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih Hari</option>
								  		<?php for ($i=0; $i < count($nama_hari); $i++) { 
								  			switch ($nama_hari[$i]) {
												case 'Monday':
													$hari = 'Senin';
													break;
												case 'Tuesday':
													$hari = 'Selasa';
													break;
												case 'Wednesday':
													$hari = 'Rabu';
													break;
												case 'Thursday':
													$hari = 'Kamis';
													break;
												case 'Friday':
													$hari = 'Jumat';
													break;
												case 'Saturday':
													$hari = 'Sabtu';
													break;
											} ?>
								  		<option value="<?php echo $nama_hari[$i]; ?>">
								  			<?php echo $hari; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  		</tr>
				  	</table>
				</div>
	  <!-- Submit button -->
		  		<div class="row">
		  			<div class="col-12">
		  				<button type="submit" class="btn btn-usai btn-info btn-block mb-2 w-100">Simpan Perubahan</button>
		  			</div>
		  			<div class="col-12">
		  				<a class="btn btn-danger btn-block" href="<?php echo base_url().'index.php/AdminAcademic/dataMataKuliah'; ?>">Batal</a>
		  			</div>
		  		</div>
		</form>
	  <!-- Register buttons -->
	<?php //} ?>
  <!-- Register buttons -->
  	</div>
  </div>
</div>
</div>
</div>