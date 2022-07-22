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
<title>ADMIN - PRESENSI</title>
<div class="container mt-5">
	<div class="row pt-5 mt-5">
		<div class="col-4">
			&nbsp
		</div>
		<div class="col-4">
			Tampilkan Semua Presensi
		</div>
		<div class="col-4">
			<form id="form" action="" method="POST">
			<label class="switch">
			  <input type="checkbox" name="checkbox" onchange="$('#form').submit();" <?php if(isset($_POST['checkbox'])) { echo 'checked="checked"'; } ?>>
			  <span class="slider round"></span>
			</label>
			</form>
		</div>
		<?php  ?>
		<?php if (isset($_POST['checkbox'])){ ?>
			<?php $this->load->view('v_getAllPresenceAdmin'); ?>
		<?php }else{ ?>
			<?php $this->load->view('v_getTodayPresenceAdmin') ?>
		<?php } ?>
	</div>
</div>