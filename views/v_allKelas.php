<title>ADMIN - DATA KELAS</title>
<style type="text/css">
</style>
<?php foreach ($list_kelas->result() as $rowKelas) { ?>
	<div class="modal fade" id="modal_<?php echo $rowKelas->class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
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
			    <h6>Apakah anda yakin akan menghapus <?php echo strtoupper($rowKelas->class_name); ?>?</h6>
			  </div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <form action="<?php echo base_url();?>index.php/AdminAcademic/deleteKelas/<?php echo $rowKelas->class_id; ?>" method="POST">
	            <div class="form-group">
	               <input type="hidden" value="<?php echo "$rowKelas->class_id"; ?>" class="form-control" name="user_id">
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
	<h3 class="py-3" style="text-align: center;">Tabel Data Kelas</h3>
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
	  				<th class="bg-info align-middle" scope="col">Nama Kelas</th>
	  				<th class="bg-info align-middle" scope="col">Program Studi</th>
	  				<th class="bg-info align-middle" scope="col">Total Mahasiswa</th>
	  				<th colspan="2" class="bg-info text-center align-middle" scope="col">
	  					<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/AdminAcademic/insertClass">
	  						<i class="fa fa-plus-circle"></i> | Tambah Data
	  					</a>
	  				</th>
	  			</thead>
	  			<?php //var_dump($list_kelas->result()); ?>
	  		<?php $no = 1; foreach ($list_kelas->result() as $rowkelas) { ?>
	  			<?php //if ($rowkelas->user_status == 'Admin') { ?>
	  			<tr>
	  				<td><?php echo $no; ?></td>
	  				<td>
	  					<a href="<?php echo base_url();?>index.php/AdminAcademic/dataMhsByClass/<?php echo $rowkelas->class_id; ?>">
	  						<?php echo $rowkelas->class_name; ?>	  							
	  					</a>
	  				</td>
	  				<td><?php echo $rowkelas->jurusan_name; ?></td>
	  				<?php $count = 0; ?>
	  				<?php foreach($list_Mhs->result() as $rowMhs) { ?>
	  				<?php if ($rowMhs->class_id == $rowkelas->class_id) { $count++; ?>
	  				<?php } ?>
	  				<?php } ?>
	  				<td class="text-center">
	  					<?php echo $count; ?>
	  				</td>
	  				<td class="text-center">
	  					<a class="btn btn-info btn-usai" href="<?php echo base_url();?>index.php/AdminAcademic/updateClass/<?php echo $rowkelas->class_id; ?>"><i class="fa fa-pencil"></i> Edit</a>
	  				</td>
	  				<?php //var_dump($list_MhsByClass->result()) ?>
	  				<td class="text-center">
	  					<a class = "btn btn-primary" href="" data-toggle='modal' data-target = <?php echo "'#modal_".$rowkelas->class_id."'"; ?>><i class="fa fa-trash-o"></i> Hapus</a>
	  				</td>
	  			</tr>
	  			<?php //$no++; } elseif ($rowkelas->user_status == NULL) { ?>
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