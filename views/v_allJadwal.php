<title>ADMIN - DATA JADWAL</title>
<style type="text/css">
</style>
<?php foreach ($list_jadwal->result() as $rowJadwal) { ?>
	<?php 
		switch ($rowJadwal->jadwal_day) {
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
		}
	 ?>
	<div class="modal fade" id="modal_<?php echo $rowJadwal->jadwal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div style="background-image: linear-gradient(to right, #DB1414, #FF2E2E); color: #fff;" class="modal-header">
	        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Penghapusan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <!-- <span class="input-group-text" id="inputGroup-sizing-default">
			    	<i class="fa fa-question-circle" aria-hidden="true"></i>
			    </span> -->
			    <h6>
			    	Apakah anda yakin akan menghapus Jadwal dengan:<br> Nama Mata Kuliah: <?php echo strtoupper($rowJadwal->matakuliah_name)." <br/>Kelas: ".strtoupper($rowJadwal->class_name)."<br/>Nama Dosen: ".strtoupper($rowJadwal->user_name)." <br/>Hari: ".$hari."<br/>Pukul: ".date('H:i', strtotime($rowJadwal->jadwal_start_at)); ?>?
			    </h6>
			  </div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <form action="<?php echo base_url();?>index.php/AdminAcademic/deleteJadwal/<?php echo $rowJadwal->jadwal_id; ?>" method="POST">
	            <div class="form-group">
	               <input type="hidden" value="<?php echo "$rowJadwal->jadwal_id"; ?>" class="form-control" name="user_id">
	               <a href="#" data-dismiss="modal" class="btn btn-success btn-hadir"><i class="fa fa-times" aria-hidden="true"></i>&nbsp &nbsp Batal</a>
	               <button type="submit" name="submit" class="btn btn-success btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp &nbsp HAPUS</button>
	            </div>
	         </form>
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?>
<div class="container mt-5 mb-0 p-5 rounded">
	<h3 class="py-3" style="text-align: center;">Tabel Data Jadwal</h3>
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

  	<div style="background-color: #F0F0F0;" class="container my-5 p-5 rounded">
	  	<div class="container">
	  		<?php //var_dump($detail_presence);exit(); ?>
	  		<table class="table table-bordered table-success table-hover table-striped">
	  			<thead class="thead-dark text-center">
	  				<th class="bg-info align-middle" scope="col">No</th>
	  				<th class="bg-info align-middle" scope="col">Nama Mata Kuliah</th>
	  				<th class="bg-info align-middle" scope="col">Nama Kelas</th>
	  				<th class="bg-info align-middle" scope="col">Nama Dosen Pengampu</th>
	  				<th class="bg-info align-middle" scope="col">Jadwal Dimulai</th>
	  				<th class="bg-info align-middle" scope="col">Jadwal Berakhir</th>
	  				<th class="bg-info align-middle" scope="col">Hari</th>
	  				<th colspan="2" class="bg-info text-center align-middle" scope="col">
	  					<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/AdminAcademic/insertJadwal">
	  						<i class="fa fa-plus-circle"></i> | Tambah Data
	  					</a>
	  				</th>
	  			</thead>
	  			<?php //var_dump($list_jadwal->result()); ?>
	  		<?php $no = 1; foreach ($list_jadwal->result() as $rowJadwal) { ?>
	  			<?php 
		  			switch ($rowJadwal->jadwal_day) {
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
					}
				?>
	  			<tr>
	  				<td><?php echo $no; ?></td>
	  				<td>
	  					<?php echo $rowJadwal->matakuliah_name; ?>
	  				</td>
	  				<td><?php echo $rowJadwal->class_name; ?></td>
	  				<td><?php echo $rowJadwal->user_name; ?></td>
	  				<td><?php echo date('H:i', strtotime($rowJadwal->jadwal_start_at)); ?></td>
	  				<td><?php echo date('H:i', strtotime($rowJadwal->jadwal_ended_at)); ?></td>
	  				<td><?php echo $hari; ?></td>
	  				<td class="text-center">
	  					<a class="btn btn-info btn-usai" href="<?php echo base_url();?>index.php/AdminAcademic/updateJadwal/<?php echo $rowJadwal->jadwal_id; ?>"><i class="fa fa-pencil"></i> Edit</a>
	  				</td>
	  				<td class="text-center">
	  					<a class = "btn btn-primary" href="" data-toggle='modal' data-target = <?php echo "'#modal_".$rowJadwal->jadwal_id."'"; ?>><i class="fa fa-trash-o"></i> Hapus</a>
	  				</td>
	  			</tr>
	  			<?php //$no++; } elseif ($rowJadwal->user_status == NULL) { ?>
	  			<!-- <tr>
	  				<td>-</td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  			</tr> -->
	  			<?php $no++; } ?>
	  		<?php //} ?>
	  		</table>
  <!-- Submit button -->
  <!-- Register buttons -->
  			<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminAcademic/dataMataKuliah">
  				Data Mata Kuliah
  			</a>
  			<!-- <a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Mahasiswa">
  				Data Mahasiswa
  			</a> -->
  		</div>
  	</div>

</div>
</div>
</div>