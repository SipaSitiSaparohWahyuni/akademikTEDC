<title>ADMIN - DATA ADMIN</title>
<style type="text/css">
</style>
<div class="container mt-5 mb-0 p-5 rounded">
	<h3 class="py-3" style="text-align: center;">Tabel Data Admin dan Kaprodi</h3>
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
	  				<th class="bg-info align-middle" scope="col">Nama Admin</th>
	  				<th class="bg-info align-middle" scope="col">Alamat</th>
	  				<th class="bg-info align-middle" scope="col">Jenis Kelamin</th>
	  				<th class="bg-info align-middle" scope="col">Tanggal Lahir</th>
	  				<th class="bg-info align-middle" scope="col">Program Studi</th>
	  				<th class="bg-info align-middle" scope="col">Status</th>
	  			</thead>
	  		<?php $no = 1; foreach ($list_admin->result() as $rowAdmin) { ?>
	  			<?php if ($rowAdmin->user_status == 'Admin') { ?>
	  			<tr>
	  				<td><?php echo $no; ?></td>
	  				<td><?php echo $rowAdmin->user_name; ?></td>
	  				<td><?php echo $rowAdmin->user_address; ?></td>
	  				<td><?php echo $rowAdmin->user_gender; ?></td>
	  				<?php $tgl_lahir = date("d M Y", strtotime($rowAdmin->user_date)); ?>
	  				<td><?php echo $tgl_lahir; ?></td>
	  				<td><?php echo $rowAdmin->jurusan_name; ?></td>
	  				<td>
	  					<?php echo ucwords($rowAdmin->user_active); ?>
	  				</td>
	  			</tr>
	  			<?php $no++; } elseif ($rowAdmin->user_status == NULL) { ?>
	  			<tr>
	  				<td>-</td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  			</tr>
	  			<?php break; } ?>
	  		<?php } ?>
	  		</table>
  <!-- Submit button -->
  <!-- Register buttons -->
  			<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Dosen">
  				Data Dosen
  			</a>
  			<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Mahasiswa">
  				Data Mahasiswa
  			</a>
  		</div>
  	</div>

</div>
</div>
</div>