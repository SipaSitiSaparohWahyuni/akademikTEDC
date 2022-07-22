<?php error_reporting(E_ERROR | E_PARSE); date_default_timezone_set('Asia/Jakarta'); ?>
<style type="text/css">
	.btn-hadir{
		background-color: #1FB523;
	}
	.btn-siap{
		background-color: #F4BC32;
	}
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	.switch input { 
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
</style>
<title>Presensi</title>
<div class="container py-4 my-3">
	<?php foreach ($list_jadwal->result() as $rowJadwal) { ?>
	<div class="modal fade" id="modal_<?php echo $rowJadwal->jadwal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div style="background-image: linear-gradient(to right, #Ff7800, #Ff9500); color: #fff;" class="modal-header">
	        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Kehadiran</h5>
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
			    <h6>Tekan HADIR untuk mengonfirmasi kehadiran anda <br> pada mata kuliah <?php echo strtoupper($rowJadwal->matakuliah_name); ?>!</h6>
			  </div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <form action="<?php echo base_url();?>index.php/Presence/update" method="POST">
	            <div class="form-group">
	               <input type="hidden" value="<?php echo "$rowJadwal->jadwal_id"; ?>" class="form-control" name="jadwal_id">
	               <?php if ($_SESSION['dosen']) { ?>
	               <input type="hidden" value="<?php echo $_SESSION['dosen']['session_user_id']; ?>" class="form-control" name="user_id">
	               <input type="hidden" value="<?php echo $_SESSION['dosen']['session_user_nidn']; ?>" class="form-control" name="user_nidn">
	           	   <?php } elseif ($_SESSION['mahasiswa']) { ?>
	           	   <input type="hidden" value="<?php echo $_SESSION['mahasiswa']['session_user_id']; ?>" class="form-control" name="user_id">
	               <input type="hidden" value="<?php echo $_SESSION['mahasiswa']['session_user_nim']; ?>" class="form-control" name="user_nim">
	               <?php } ?>
	               <input type="hidden" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="presence_date">
	               <a href="#" data-dismiss="modal" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>&nbsp &nbsp Batal</a>
	               <button type="submit" name="submit" class="btn btn-success btn-hadir"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp &nbsp HADIR</button>
	            </div>
	         </form>
	      </div>
	    </div>
	  </div>
	</div>
	<?php } ?>
	<div class="container mt-5">
		<div class="row pt-5 mt-5">
			<div class="col-4">
				&nbsp
			</div>
			<div class="col-4">
				Tampilkan Semua Jadwal
			</div>
			<div class="col-4">
				<form id="form" action="" method="POST">
				<label class="switch">
				  <input type="checkbox" name="checkbox" onchange="$('#form').submit();" <?php if(isset($_POST['checkbox'])) { echo 'checked="checked"'; } ?>>
				  <span class="slider round"></span>
				</label>
				</form>
			</div>
		</div>
		<?php  ?>
		<?php if (isset($_POST['checkbox'])){ ?>
			<?php $this->load->view('v_getAllJadwal'); ?>
		<?php }else{ ?>
			<?php $this->load->view('v_getTodayJadwal') ?>
		<?php } ?>
	</div>
</div>