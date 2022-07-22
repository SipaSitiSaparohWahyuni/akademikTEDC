<title>ADMIN - DATA DOSEN</title>
<style type="text/css">
	.btn-hadir{
		background-color: #1FB523;
	}
	.btn-siap{
		background-color: #F4BC32;
	}
	.btn-usai{
		background-color: #1AB9C6;
	}
</style>
<?php foreach ($list_dosen->result() as $rowDosen) { ?>
	<div class="modal fade" id="modal_<?php echo $rowDosen->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
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
			    <h6>Apakah anda yakin akan menghapus <?php echo strtoupper($rowDosen->user_name); ?>?</h6>
			  </div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <form action="<?php echo base_url();?>index.php/adminChangeUser/deleteDosen/<?php echo $rowDosen->user_id; ?>" method="POST">
	            <div class="form-group">
	               <input type="hidden" value="<?php echo "$rowDosen->user_id"; ?>" class="form-control" name="user_id">
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
	<h3 class="py-3" style="text-align: center;">Tabel Data Dosen</h3>
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

  	<div  style="background-color: #F0F0F0;" class="container my-5 p-5 rounded">
	  	<div class="container">
	  		<?php //var_dump($detail_presence);exit(); ?>
	  		<table class="table table-bordered table-success table-hover table-striped">
	  			<thead class="thead-dark">
	  				<th class="bg-info align-middle" scope="col">No</th>
	  				<th class="bg-info align-middle" scope="col">Nama Dosen</th>
	  				<th class="bg-info align-middle" scope="col">NIDN</th>
	  				<th class="bg-info align-middle" scope="col">Alamat</th>
	  				<th class="bg-info align-middle" scope="col">Jenis Kelamin</th>
	  				<th class="bg-info align-middle" scope="col">Tanggal Lahir</th>
	  				<th class="bg-info align-middle" scope="col">Program Studi</th>
	  				<th colspan="2" class="bg-info align-middle" scope="col">
	  					<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/insert/Dosen">
	  						<i class="fa fa-plus-circle"></i> | Tambah Data
	  					</a>
	  				</th>
	  			</thead>
	  		<?php $no = 1; foreach ($list_dosen->result() as $rowDosen) { ?>
	  			<?php if ($rowDosen->user_status == 'Dosen' AND $rowDosen->user_active == 'active') { ?>
	  			<tr>
	  				<td><?php echo $no; ?></td>
	  				<td><?php echo $rowDosen->user_name; ?></td>
	  				<td><?php echo $rowDosen->user_nidn; ?></td>
	  				<td><?php echo $rowDosen->user_address; ?></td>
	  				<td><?php echo $rowDosen->user_gender; ?></td>
	  				<?php $tgl_lahir = date("d M Y", strtotime($rowDosen->user_date)); ?>
	  				<td><?php echo $tgl_lahir; ?></td>
	  				<td><?php echo $rowDosen->jurusan_name; ?></td>
	  				<td>
	  					<a class="btn btn-info btn-usai" href="<?php echo base_url();?>index.php/adminChangeUser/update/<?php echo $rowDosen->user_id; ?>"><i class="fa fa-pencil"></i> Edit</a>
	  				</td>
	  				<td>
	  					<a class = "btn btn-primary" href="" data-toggle='modal' data-target = <?php echo "'#modal_".$rowDosen->user_id."'"; ?>><i class="fa fa-trash-o"></i> Hapus</a>
	  				</td>
	  			</tr>
	  			<?php $no++; } elseif ($rowDosen->user_status == NULL) { ?>
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
  			<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Mahasiswa">
  				Data Mahasiswa
  			</a>
  			<a class="btn btn-success btn-hadir" href="<?php echo base_url();?>index.php/adminChangeUser/Admin">
  				Data Admin
  			</a>
  		</div>
  	</div>
</div>
</div>
</div>