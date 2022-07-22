<script type="text/javascript">
	window.onload = function(){
	    setTimeout(function(){
	        document.getElementById( 'jurusanId' ).style.display = 'none';
			document.getElementById( 'class' ).style.display = 'none';
	    }, 0);
	}
    function setDatePicker(){
	  $(".datepicker").datepicker({
	    format: "yyyy-mm-dd",
	    todayHighlight: true,
	    autoclose: true
	  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
	}
	function check() {
		 var val = document.getElementById('status').value;
		 if(val =='Mahasiswa') {
		  	document.getElementById( 'jurusanId' ).style.display = 'none';
		  	document.getElementById( 'class' ).style.display = 'block';
		 } else if (val =='Dosen') {
		  	document.getElementById( 'jurusanId' ).style.display = 'block';
		  	document.getElementById( 'class' ).style.display = 'none';
		 }
	}
</script>
<title>ADMIN - TAMBAH USER</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<?php if ($status == 'Mahasiswa') { ?>
	<h3 class="py-3" style="text-align: center;">Tambah Data Mahasiswa</h3>
	<?php } elseif ($status == 'Dosen') { ?>
	<h3 class="py-3" style="text-align: center;">Tambah Data Dosen</h3>
	<?php } ?>
	<form class="signUp" action="<?php echo base_url();?>index.php/adminChangeUser/addUser/<?php echo $status; ?>" method="POST" enctype="multipart/form-data">
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
					    	<i class="fa fa-user mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="text" name="user_name" class="form-control" placeholder="User Name" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-envelope mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<input type="text" class="form-control" name="user_email" placeholder="Email" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
			  	</div>
			  	<div class="input-group mb-4">
				  	<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-key mx-3" aria-hidden="true"></i>
					    </span>
				  	</div>
				  	<?php if ($status == 'Mahasiswa') { ?>
				  	<input type="text" class="form-control" name="user_nim" placeholder="NIM" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
				  	<?php } elseif ($status == 'Dosen') { ?>
				  	<input type="text" class="form-control" name="user_nidn" placeholder="NIDN" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
				  	<?php } ?>
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
				  	<textarea class="form-control" name="user_address" placeholder="Alamat" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
			  	</div>
			  	<div class="input-group mb-4">
			   		<label for="dob">Tanggal Lahir</label>
			      	<div class="input-group date">
			         <input value="" name="user_date" type="text" id="datepicker" class="form-control">
			         <script>
			         	$('#datepicker').datepicker({
				            uiLibrary: 'bootstrap4'
				        });
			         </script>
			      	</div>
				</div>
				<label for="dob">Status User</label>
			  	<div class="input-group mb-3">
				  	<select id = "status" name="user_status" class="form-control form-select form-select-lg" onchange="check()">
				  		<option>Pilih Status</option>
				  		<?php if ($status == 'Mahasiswa') { ?>
				  		<option value="Mahasiswa">Mahasiswa</option>
				  		<?php } elseif ($status == 'Dosen') { ?>
				  		<option value="Dosen">Dosen</option>
				  		<?php } ?>
					</select>
				</div>
			  	<label for="dob">Jenis Kelamin</label>
			  	<div class="input-group mb-3">
				  	<select name="user_gender" class="form-control form-select form-select-lg">
				  		<option disabled>Pilih Jenis Kelamin</option>
				  		<option value="Laki-laki">Laki-Laki</option>
				  		<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<label for="dob">Jurusan</label>
			  	<div class="input-group mb-3">
				  	<select id="jurusanId" name="jurusan_id" class="form-control form-select form-select-lg">
				  		<option disabled>Pilih jurusan</option>
			  			<?php foreach ($data_jurusan->result() as $rowJurusan) { ?>
			  				<?php if ($rowJurusan->jurusan_id != 3) { ?>
				  			<option value="<?php echo $rowJurusan->jurusan_id; ?>"><?php echo $rowJurusan->jurusan_name; ?></option>
				  			<?php } ?>
				  		<?php } ?>
					</select>
				</div>
				<label for="dob">Kelas</label>
			  	<div class="input-group mb-3">
				  	<select id="class" name="class_id" class="form-control form-select form-select-lg">
				  		<option disabled>Pilih kelas</option>
			  			<?php foreach ($data_class->result() as $rowClass) { ?>
				  		<option value="<?php echo $rowClass->class_id; ?>"><?php echo $rowClass->class_name; ?></option>
				  		<?php } ?>
					</select>
				</div>
	  <!-- Submit button -->
	  		<div class="row">
	  			<div class="col-12">
	  				<button type="submit" class="btn btn-hadir btn-success btn-block mb-2 w-100">Tambah User</button>
	  			</div>
	  			<div class="col-12">
	  				<a class="btn btn-danger btn-block" href="<?php echo base_url().'index.php/AdminChangeUser/'.$status; ?>">Batal</a>
	  			</div>
	  		</div>
		</form>
	  <!-- Register buttons -->
  	</div>
  </div>
</div>
</div>
</div>