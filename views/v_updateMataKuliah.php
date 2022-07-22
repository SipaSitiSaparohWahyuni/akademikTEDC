 <title>ADMIN - UPDATE MATKUL</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<?php //var_dump($data_matakuliah); ?>
	<?php if ($data_matakuliah != NULL) { ?>
	<h3 class="py-3" style="text-align: center;">Update Data Mata Kuliah</h3>
	<?php //var_dump($data_matakuliah); ?>
	<form class="signUp" action="<?php echo base_url();?>index.php/AdminAcademic/saveMataKuliah/<?php echo $data_matakuliah->matakuliah_id; ?>" method="POST" enctype="multipart/form-data">
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
			<?php //var_dump($data_matakuliah); ?>
			<input type="hidden" name="matakuliah_id" value="<?php echo $data_matakuliah->matakuliah_id; ?>" class="form-control">
		   	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
		  	<div class="container px-5">
		  		<div class="row mb-4">
				  	<div class="input-group mb-4">
					  	<div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-default">
						    	<i class="fa fa-book mx-3" aria-hidden="true"></i>
						    </span>
					  	</div>
					  	<input type="text" name="matakuliah_name" class="form-control" placeholder="Nama Mata Kuliah" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data_matakuliah->matakuliah_name; ?>">
				  	</div>
				  	<table class="table">
				  		<thead>
				  			<th><label for="dob">SKS</label></th>
				  			<th><label for="dob">Kategori</label></th>
				  			<th><label for="dob">Kurikulum</label></th>
				  		</thead>
				  		<tr>
				  			<td>
				  				<div class="input-group mb-3">
								  	<select name="matakuliah_sks" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih SKS</option>
								  		<?php for ($i=1; $i <= 4 ; $i++) { ?>
								  		<option value="<?php echo $i; ?>">
								  			<?php echo $i; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  			<td>
				  				<div class="input-group mb-3">
								  	<select name="matakuliah_type" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih Kategori</option>
								  		<?php 
								  			$category = array("Teori", "Praktik"); 
								  		?>
								  		<?php for ($i = 0; $i < count($category) ; $i++) { ?>
								  		<option value="<?php echo $category[$i]; ?>">
								  			<?php echo $category[$i]; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  			<td>
				  				<div class="input-group mb-3">
								  	<select name="kurikulum_id" class="form-control form-select form-select-lg">
								  		<option disabled>Pilih Kategori</option>
								  		<?php //var_dump($list_kurikulum); ?>
								  		<?php foreach ($data_kurikulum->result() as $rowKurikulum) { ?>
								  		<option value="<?php echo $rowKurikulum->kurikulum_id; ?>">
								  			<?php echo $rowKurikulum->kurikulum_name; ?>
								  		</option>
								  		<?php } ?>
									</select>
								</div>
				  			</td>
				  		</tr>
				  	</table>
				  	<div class="input-group mb-4">
					  	<div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-default">
						    	<?php echo "Gambar <br/> Lama"; ?>
						    </span>
					  	</div>
					  	<?php echo "<img class='ml-3 w-25 img-fluid' src='".base_url().'assets/img/course/'.$data_matakuliah->matakuliah_picture."'>"; ?>
				  	</div>
				  	<label for="dob">Gambar Baru (Dapat di-skip)</label>
				  	<div class="input-group mb-4">
					  	<div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-default">
						    	<i class="fa fa-file-image-o mx-3" aria-hidden="true"></i>
						    </span>
					  	</div>
					  	<input type="file" class="mx-2" name="matakuliah_picture" aria-label="Default" aria-describedby="inputGroup-sizing-default">
				  	</div>
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
	<?php } ?>
  <!-- Register buttons -->
  	</div>
  </div>
</div>
</div>
</div>