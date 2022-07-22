<title>TABEL KELAS <?php echo strtoupper($data_class->class_name); ?></title>
<style type="text/css">
</style>
<div class="container mt-5 mb-0 p-5 rounded">
	<h3 class="py-3" style="text-align: center;">Tabel Data Kelas <?php echo $data_class->class_name; ?></h3>
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
	  			<thead class="thead-dark">
	  				<th class="bg-info align-middle" scope="col">No</th>
	  				<th class="bg-info align-middle" scope="col">Nama Mahasiswa</th>
	  				<th class="bg-info align-middle" scope="col">NIM</th>
	  				<th class="bg-info align-middle" scope="col">Email</th>
	  				<th class="bg-info align-middle" scope="col">Jenis Kelamin</th>
	  			</thead>
	  		<?php if($list_MhsByClass->result() != NULL) { ?>
	  		<?php $no = 1; foreach ($list_MhsByClass->result() as $rowHasil) { ?>
	  			<?php //if ($rowHasil->user_status == 'Admin') { ?>
	  			<tr>
	  				<td><?php echo $no; ?></td>
	  				<td><?php echo $rowHasil->user_name; ?></td>
	  				<td><?php echo $rowHasil->user_nim; ?></td>
	  				<td><?php echo $rowHasil->user_email; ?></td>
	  				<td><?php echo $rowHasil->user_gender; ?></td>
	  			</tr>
	  			<?php //$no++; } elseif ($rowHasil->user_status == NULL) { ?>
	  			<!-- <tr>
	  				<td>-</td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  			</tr> -->
	  		<?php $no++; } ?>
	  		<?php } else { ?>
	  			<tr>
	  				<td>-</td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  			</tr>
	  		<?php } ?>
	  		</table>
  <!-- Submit button -->
  <!-- Register buttons -->
  			<!-- <a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Dosen">
  				Data Dosen
  			</a>
  			<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Mahasiswa">
  				Data Mahasiswa
  			</a> -->
  		</div>
  	</div>

</div>
</div>
</div>