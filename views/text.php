<?php }

		$days = array();
		$numDays = 6;

		// $count = 0;
		for ($i=0; $i < $numDays; $i++) {

			$date = date('j M Y', strtotime("$startDate +$i days"));
			$dateArr[] = $date;
			$jadwal_table = "jadwal_table";

			$this->db->select('*');
			$this->db->from($jadwal_table);
			$this->db->where('jadwal_day', date("l", strtotime($date)));

			$query = $this->db->get();
 
	?>
	<div class="container mt-5">
		<?php if (date("l", strtotime($date)) == $today) { ?>
		<div class="row">
			<div class="col-2">
				&nbsp
			</div>
			<div class="col-8 text-center">
				<?php 
					if ($this->session->flashdata('success')){
						?>
						<div class="alert alert-success pt-3 text-center">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times; 
							</button>
							<?php 
								echo $this->session->flashdata('success');
							?>
						</div>
				<?php } ?>
				<h2><?php echo strftime('%A'); ?></h2>
				<h3><?php echo strftime('%d %B %Y'); ?></h3>
			</div>
			<script type="text/javascript"></script>
			<script>
				function currentTime() {
				  let date = new Date(); 
				  let hh = date.getHours();
				  let mm = date.getMinutes();
				  let ss = date.getSeconds();

				   hh = (hh < 10) ? "0" + hh : hh;
				   mm = (mm < 10) ? "0" + mm : mm;
				   ss = (ss < 10) ? "0" + ss : ss;
				    
				   let time = hh + ":" + mm + ":" + ss;

				  document.getElementById("clock").innerText = time; 
				  var t = setTimeout(function(){ currentTime() }, 1000); 

				}

				currentTime();
			</script>
			<div class="col-2">
				&nbsp
			</div>
		</div>
		<div class="row">
			<?php //var_dump($user_id);exit(); ?>
		<?php 
			$count = 0;
			if ($count_jadwal != 0) {
				foreach ($list_jadwal->result() as $rowJadwal) {
					$setTime = strtotime($rowJadwal->jadwal_start_at);
					$timeNormal = date("H:i", strtotime($rowJadwal->jadwal_start_at));
					$addTime = date("H:i", strtotime('+ 15 minutes', $setTime));
					$now = date("H:i");
					$timeNormalObject = DateTime::createFromFormat('H:i', $timeNormal);
					$timeNow = DateTime::createFromFormat('H:i', $now);
					$timeAdd = DateTime::createFromFormat('H:i', $addTime);

					//var_dump($count_jadwal);exit();
					if ($rowJadwal->jadwal_day == date("l", strtotime($date))) {
						if ($count_jadwal %3 == 0) { ?>
							<div class="col-4 my-4">
								<a href="#" data-toggle='modal' <?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeAdd) { ?>data-target = <?php echo "'#modal_".$rowJadwal->jadwal_id."'"; } else { echo ''; } ?>>
									<?php $checkStatus = $this->M_akademik->checkPresenceStatus($rowJadwal->jadwal_id, date("Y-m-d"), $user_id); ?>
									<?php foreach ($checkStatus as $key) {
										$cekKehadiran = $key->presence_status;
									} ?>
									<?php if ($cekKehadiran == 'Hadir') { ?>
									<div class="card border border-success">
									<?php } elseif ($timeNow < $timeNormalObject){ ?>
									<div class="card border border-warning">
									<?php } elseif($cekKehadiran == 'Tidak Hadir') { ?>
									<div class="card border border-danger">	
									<?php } ?>
									  <?php echo "<img class='card-img-top' alt='Responsive-image' src='".base_url().'assets/img/course/'.$rowJadwal->matakuliah_picture."'>";?>
									  <div class="card-body text-center">
									  	<?php //var_dump($cekKehadiran); ?>
									    <h4><?php echo $rowJadwal->matakuliah_name; ?></h4>
									    <?php if ($_SESSION['mahasiswa']) { ?>
									    <h5><?php echo $rowJadwal->user_name; ?></h5>
										<?php }elseif($_SESSION['dosen']) { ?>
										<h5><?php echo $rowJadwal->class_name; ?></h5>
										<?php } ?>
									    <p>
									    	<?php 
									    		echo date('H:i', strtotime($rowJadwal->jadwal_start_at))."-".date('H:i', strtotime($rowJadwal->jadwal_ended_at)); 
									    	?>
									    </p>
									    <?php if ($cekKehadiran == 'Hadir') { ?>
									    <div class="btn btn-success btn-hadir">
									    	Status kehadiran : <b><?php echo $cekKehadiran; ?></b>
									    </div>
									    <?php } elseif ($timeNow < $timeNormalObject){ ?>
								    	<div class="btn btn-warning btn-siap text-white">
									    	Status : <b><?php echo "Perkuliahan segera dimulai pada ".$timeNormal; ?></b>
									    </div>
										<?php } elseif($cekKehadiran == 'Tidak Hadir') { ?>
										<div class="btn btn-danger">
									    	Status kehadiran : <b><?php echo $cekKehadiran; ?></b>
									    </div>
										<?php } ?>
									  </div>
									</div>
								</a>
							</div>
						<?php } elseif ($count_jadwal %2 == 0) { ?>
							<div class="col-6 my-4">
								<a href="#" data-toggle='modal' <?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeAdd) { ?>data-target = <?php echo "'#modal_".$rowJadwal->jadwal_id."'"; } else { echo ''; } ?>>
									<?php $checkStatus = $this->M_akademik->checkPresenceStatus($rowJadwal->jadwal_id, date("Y-m-d"), $user_id); ?>
									<?php foreach ($checkStatus as $key) {
										$cekKehadiran = $key->presence_status;
									} ?>
									<?php if ($cekKehadiran == 'Hadir') { ?>
									<div class="card border border-success">
									<?php } elseif ($timeNow < $timeNormalObject){ ?>
									<div class="card border border-warning">
									<?php } elseif($cekKehadiran == 'Tidak Hadir') { ?>
									<div class="card border border-danger">	
									<?php } ?>	
									  <?php echo "<img class='card-img-top' alt='Responsive-image' src='".base_url().'assets/img/course/'.$rowJadwal->matakuliah_picture."'>";?>
									  <div class="card-body text-center">
									  	<?php //var_dump($cekKehadiran); ?>
									    <h4><?php echo $rowJadwal->matakuliah_name; ?></h4>
									    <?php if ($_SESSION['mahasiswa']) { ?>
									    <h5><?php echo $rowJadwal->user_name; ?></h5>
										<?php }elseif($_SESSION['dosen']) { ?>
										<h5><?php echo $rowJadwal->class_name; ?></h5>
										<?php } ?>
									    <p>
									    	<?php 
									    		echo date('H:i', strtotime($rowJadwal->jadwal_start_at))."-".date('H:i', strtotime($rowJadwal->jadwal_ended_at)); 
									    	?>
									    </p>
									    <?php if ($cekKehadiran == 'Hadir') { ?>
									    <div class="btn btn-success btn-hadir">
									    	Status kehadiran : <b><?php echo $cekKehadiran; ?></b>
									    </div>
									    <?php } elseif ($timeNow < $timeNormalObject){ ?>
								    	<div class="btn btn-warning btn-siap text-white">
									    	Status : <b><?php echo "Perkuliahan segera dimulai pada ".$timeNormal; ?></b>
									    </div>
										<?php } elseif($cekKehadiran == 'Tidak Hadir') { ?>
										<div class="btn btn-danger">
									    	Status kehadiran : <b><?php echo $cekKehadiran; ?></b>
									    </div>
										<?php } ?>
									  </div>
									</div>
								</a>
							</div>
						<?php } elseif ($count_jadwal == 1) { ?>
							<div class="col-3">
								&nbsp
							</div>
							<div class="col-6 my-4">
								<a href="#" data-toggle='modal' <?php echo ($timeNow >= $timeNormalObject && $timeNow <= $timeAdd) ? 'data-target = "#modal_'.$rowJadwal->jadwal_id.'"' : ''; ?>>
									<?php $checkStatus = $this->M_akademik->checkPresenceStatus($rowJadwal->jadwal_id, date("Y-m-d"), $user_id); ?>
									<?php foreach ($checkStatus as $key) {
										$cekKehadiran = $key->presence_status;
									} ?>
									<?php if ($cekKehadiran == 'Hadir') { ?>
									<div class="card border border-success">
									<?php } elseif ($timeNow < $timeNormalObject){ ?>
									<div class="card border border-warning">
									<?php } elseif($cekKehadiran == 'Tidak Hadir') { ?>
									<div class="card border border-danger">	
									<?php } ?>	
									  <?php echo "<img class='card-img-top' alt='Responsive-image' src='".base_url().'assets/img/course/'.$rowJadwal->matakuliah_picture."'>";?>
									  <div class="card-body text-center">
									  	<?php //var_dump($cekKehadiran); ?>
									    <h4><?php echo $rowJadwal->matakuliah_name; ?></h4>
									    <?php if ($_SESSION['mahasiswa']) { ?>
									    <h5><?php echo $rowJadwal->user_name; ?></h5>
										<?php }elseif($_SESSION['dosen']) { ?>
										<h5><?php echo $rowJadwal->class_name; ?></h5>
										<?php } ?>
									    <p>
									    	<?php 
									    		echo date('H:i', strtotime($rowJadwal->jadwal_start_at))."-".date('H:i', strtotime($rowJadwal->jadwal_ended_at)); 
									    	?>
									    </p>
									    <?php if ($cekKehadiran == 'Hadir') { ?>
									    <div class="btn btn-success btn-hadir">
									    	Status kehadiran : <b><?php echo $cekKehadiran; ?></b>
									    </div>
									    <?php } elseif ($timeNow < $timeNormalObject){ ?>
								    	<div class="btn btn-warning btn-siap text-white">
									    	Status : <b><?php echo "Perkuliahan segera dimulai pada ".$timeNormal; ?></b>
									    </div>
										<?php } elseif($cekKehadiran == 'Tidak Hadir') { ?>
										<div class="btn btn-danger">
									    	Status kehadiran : <b><?php echo $cekKehadiran; ?></b>
									    </div>
										<?php } ?>
									  </div>
									</div>
								</a>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			<?php } else { ?>
				<div class="col-4">
					&nbsp
				</div>
				<div class="col-4">
					<div class="card">
					  <img src="https://image.freepik.com/free-vector/404-error-page-found_24908-50943.jpg" class="card-img-top" alt="Responsive-image">
					  <div class="card-body text-center">
					    <h4><?php echo "Data tidak ditemukan!"; ?></h4>
					    <p><?php echo "Data is not exists"; ?></p>
					  </div>
					</div>
				</div>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
	<?php } ?>