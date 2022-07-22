<title>ADMIN - TAMBAH KELAS</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<?php //var_dump(expression) ?>
	<?php //if ($data_class != NULL) { ?>
	<h3 class="py-3" style="text-align: center;">Tambah Kelas</h3>
	<form class="signUp" action="<?php echo base_url();?>index.php/AdminAcademic/addClass/" method="POST" enctype="multipart/form-data">
		<?php if($this->session->flashdata('warning')){
					?>
					<div class="alert alert-warning pt-3 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
						<?php 
							echo $this->session->flashdata('warning');
						?>
					</div>
		<?php } ?>
		   	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
		  	<div class="container px-5">
		  		<div class="row mb-4">
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-book mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="text" name="class_name" class="form-control" placeholder="Nama Kelas" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
			  	</div>
			  	<label for="dob">Program Studi</label>
			  	<div class="input-group mb-3">
				  	<select name="jurusan_id" class="form-control form-select form-select-lg">
				  		<option disabled>Pilih Program Studi</option>
				  		<?php foreach ($data_jurusan->result() as $rowJurusan) { ?>
				  		<?php if ($rowJurusan->jurusan_name != 'Akademik'): ?>
				  		<option value="<?php echo $rowJurusan->jurusan_id; ?>">
				  			<?php echo $rowJurusan->jurusan_name; ?>
				  		</option>
				  		<?php endif ?>
				  		<?php } ?>
					</select>
				</div>
	  <!-- Submit button -->
	  		<div class="row">
	  			<div class="col-12">
	  				<button type="submit" class="btn btn-usai btn-info btn-block mb-2 w-100">Simpan Perubahan</button>
	  			</div>
	  			<div class="col-12">
	  				<a class="btn btn-danger btn-block" href="<?php echo base_url().'index.php/AdminAcademic/dataClass'; ?>">Batal</a>
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