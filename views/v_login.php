<title>LOGIN</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<h3 class="py-5" style="text-align: center;">Login</h3>
	<?php 
		if($this->session->flashdata('warning')){
				?>
				<div class="alert alert-danger pt-3 text-center">
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
	<form class="signUp" action="<?php echo base_url();?>index.php/login/checkLogin" method="POST">
	   	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
	  	<div class="container px-5">
	  		<div class="row mb-4">
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-key" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="text" name="user_code" class="form-control" placeholder="Masukkan Email atau NIM atau NIDN" aria-label="Default" aria-describedby="inputGroup-sizing-default">
		  	</div>
		  	<div class="input-group mb-4">
			  	<div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">
				    	<i class="fa fa-lock" aria-hidden="true"></i>
				    </span>
			  	</div>
			  	<input type="password" class="form-control" name="user_password" placeholder="Password" aria-label="Default" aria-describedby="inputGroup-sizing-default">
		  	</div>

  <!-- Submit button -->
		<button type="submit" class="btn btn-primary btn-block mb-4">Masuk</button>
	</form>
  <!-- Register buttons -->
  	</div>
  </div>
</div>
</div>
</div>