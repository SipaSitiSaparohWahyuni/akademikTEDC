<script type="text/javascript">
    function setDatePicker(){
	  $(".datepicker").datepicker({
	    format: "yyyy-mm-dd",
	    todayHighlight: true,
	    autoclose: true
	  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
	}
</script>
<title>ADMIN - UPDATE USER</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<?php if ($data_user != NULL) { ?>
	<h3 class="py-3" style="text-align: center;">Update Data Mahasiswa</h3>
	<form class="signUp" action="<?php echo base_url();?>index.php/adminChangeUser/save/<?php echo $data_user->user_id; ?>" method="POST" enctype="multipart/form-data">
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
			<input type="hidden" name="user_id" value="<?php echo $data_user->user_id; ?>" class="form-control">
			<input type="hidden" name="user_status" value="<?php echo $data_user->user_status; ?>" class="form-control">
		   	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
		  	<div class="container px-5">
		  		<div class="row mb-4">
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-user mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="text" name="user_name" class="form-control" placeholder="User Name" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ucwords($data_user->user_name);?>">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-envelope mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="text" class="form-control" name="user_email" placeholder="Email" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data_user->user_email;?>">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-key mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="text" class="form-control" name="user_nim" placeholder="NIM" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data_user->user_nim;?>">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-lock mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="password" class="form-control" name="user_password" placeholder="Password" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-lock mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="password" class="form-control" name="user_new_password" placeholder="Password Baru (Dapat di-skip)" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-lock mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="password" class="form-control" name="password_validation" placeholder="Konfirmasi Password (Dapat di-skip)" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-home mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<textarea class="form-control" name="user_address" placeholder="Alamat" aria-label="Default" aria-describedby="inputGroup-sizing-default"><?php echo $data_user->user_address;?></textarea>
			  	</div>
			  	<div class="input-group mb-4">
			   		<label for="dob">Tanggal Lahir</label>
			      	<div class="input-group date">
			         <input value="<?php echo date('m/d/Y', strtotime($data_user->user_date)); ?>" name="user_date" type="text" id="datepicker" class="form-control">
			         <script>
			         	$('#datepicker').datepicker({
				            uiLibrary: 'bootstrap4'
				        });
			         </script>
			      	</div>
				</div>
			  	<label for="dob">Jenis Kelamin</label>
			  	<div class="input-group mb-3">
				  	<select name="user_gender" class="form-control form-select form-select-lg">
				  		<option disabled>Pilih Jenis Kelamin</option>
			  			<?php if ($data_user->user_gender == "Laki-laki"){ ?>
				  		<option selected value="<?php echo $data_user->user_gender; ?>">
				  			<?php echo $data_user->user_gender; ?>
				  		</option>
				  		<option value="Perempuan">
				  			Perempuan
				  		</option>
					  	<?php } elseif ($data_user->user_gender == "Perempuan"){ ?>
					  	<option selected value="<?php echo $data_user->user_gender; ?>">
				  			<?php echo $data_user->user_gender; ?>
				  		</option>
				  		<option value="Laki-laki">
				  			Laki-laki
				  		</option>
					  	<?php } ?>
					</select>
				</div>
				<label for="dob">Kelas</label>
			  	<div class="input-group mb-3">
				  	<select name="class_id" class="form-control form-select form-select-lg">
				  		<option disabled>Pilih kelas</option>
				  		<option selected value="<?php echo $data_user->class_id; ?>">
							<?php echo $data_user->class_name; ?>
						</option>
			  			<?php foreach ($data_class->result() as $rowClass) { ?>
			  			<?php if ($rowClass->class_id != $data_user->class_id): ?>
				  				<option value="<?php echo $rowClass->class_id; ?>"><?php echo $rowClass->class_name; ?></option>
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
	  				<a class="btn btn-danger btn-block" href="<?php echo base_url().'index.php/AdminChangeUser/mahasiswa'; ?>">Batal</a>
	  			</div>
	  		</div>
		</form>
	  <!-- Register buttons -->
	<?php } elseif($data_dosen != NULL) { ?>
	<h3 class="py-3" style="text-align: center;">Update Data Dosen</h3>
	<form class="signUp" action="<?php echo base_url();?>index.php/adminChangeUser/save/<?php echo $data_dosen->user_id; ?>" method="POST" enctype="multipart/form-data">
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
		<input type="hidden" name="user_id" value="<?php echo $data_dosen->user_id; ?>" class="form-control">
		<input type="hidden" name="user_status" value="<?php echo $data_dosen->user_status; ?>" class="form-control">
	   	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
	  	<div class="container px-5">
	  		<div class="row mb-4">
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-user mx-3" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="text" name="user_name" class="form-control" placeholder="User Name" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ucwords($data_dosen->user_name);?>">
		  	</div>
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-envelope mx-3" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="text" class="form-control" name="user_email" placeholder="Email" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data_dosen->user_email;?>">
		  	</div>
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-key mx-3" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="text" class="form-control" name="user_nidn" placeholder="NIDN" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data_dosen->user_nidn;?>">
		  	</div>
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-lock mx-3" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="password" class="form-control" name="user_password" placeholder="Password" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
		  	</div>
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-lock mx-3" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="password" class="form-control" name="password_validation" placeholder="Konfirmasi Password" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
		  	</div>
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-home mx-3" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<textarea class="form-control" name="user_address" placeholder="Alamat" aria-label="Default" aria-describedby="inputGroup-sizing-default"><?php echo $data_dosen->user_address;?></textarea>
		  	</div>
		  	<div class="input-group mb-4">
		   		<label for="dob">Tanggal Lahir</label>
		      	<div class="input-group date">
		         <input value="<?php echo date('m/d/Y', strtotime($data_dosen->user_date)); ?>" name="user_date" type="text" id="datepicker" class="form-control">
		         <script>
		         	$('#datepicker').datepicker({
			            uiLibrary: 'bootstrap4'
			        });
		         </script>
		      	</div>
			</div>
		  	<label for="dob">Jenis Kelamin</label>
		  	<div class="input-group mb-3">
			  	<select name="user_gender" class="form-control form-select form-select-lg">
			  		<option disabled>Pilih Jenis Kelamin</option>
		  			<?php if ($data_dosen->user_gender == "Laki-laki"){ ?>
			  		<option selected value="<?php echo $data_dosen->user_gender; ?>">
			  			<?php echo $data_dosen->user_gender; ?>
			  		</option>
			  		<option value="Perempuan">
			  			Perempuan
			  		</option>
				  	<?php } elseif ($data_dosen->user_gender == "Perempuan"){ ?>
				  	<option selected value="<?php echo $data_dosen->user_gender; ?>">
			  			<?php echo $data_dosen->user_gender; ?>
			  		</option>
			  		<option value="Laki-laki">
			  			Laki-Laki
			  		</option>
				  	<?php } ?>
				</select>
			</div>
			<label for="dob">Jurusan</label>
		  	<div class="input-group mb-3">
			  	<select name="jurusan_id" class="form-control form-select form-select-lg">
			  		<option disabled>Pilih jurusan</option>
			  		<option selected value="<?php echo $data_dosen->jurusan_id; ?>">
						<?php echo $data_dosen->jurusan_name; ?>
					</option>
		  			<?php foreach ($data_jurusan->result() as $rowJurusan) {?>
		  				<?php if ($rowJurusan->jurusan_id != $data_dosen->jurusan_id && $rowJurusan->jurusan_id != 3): ?>
			  				<option value="<?php echo $rowJurusan->jurusan_id; ?>"><?php echo $rowJurusan->jurusan_name; ?></option>
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
  				<a class="btn btn-danger btn-block" href="<?php echo base_url().'index.php/AdminChangeUser/dosen'; ?>">Batal</a>
  			</div>
  		</div>
	</form>
	<?php } ?>
  <!-- Register buttons -->
  	</div>
  </div>
</div>
</div>
</div>