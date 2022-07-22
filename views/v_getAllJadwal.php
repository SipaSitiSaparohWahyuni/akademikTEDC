<?php 
	$days = array();
	$numDays = 6;
	setlocale(LC_ALL, 'id_ID');

	// $count = 0;
	for ($i=0; $i < $numDays; $i++) {

		$date = date('j M Y', strtotime("$startDate +$i days"));
		$dateArr[] = $date;
		$jadwal_table = "jadwal_table";
		switch (date("l", strtotime($date))) {
			case 'Monday':
				$hari = 'Senin';
				break;
			case 'Tuesday':
				$hari = 'Selasa';
				break;
			case 'Wednesday':
				$hari = 'Rabu';
				break;
			case 'Thursday':
				$hari = 'Kamis';
				break;
			case 'Friday':
				$hari = 'Jumat';
				break;
			case 'Saturday':
				$hari = 'Sabtu';
				break;
		}
 ?>
	 <div class="row my-4">
	 	<div class="col-4">
	 		&nbsp
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
	 	<div class="col-4 text-center">
			<h2><?php echo $hari; ?></h2>
			<h3><?php //echo date("d-m-Y", strtotime($date)); ?></h3>
	 	</div>
	 </div>
	<div class="row my-4">
	<?php $no = 0 ;?>
	<?php if ($this->session->userdata('mahasiswa')) { ?>
	<?php $countRow =  $this->M_akademik->getAllCountJadwalMhs($class_id, date("l", strtotime($date))); ?>
	<?php } elseif ($this->session->userdata('dosen')) { ?>
	<?php $countRow =  $this->M_akademik->getAllCountJadwalDosen($user_id, date("l", strtotime($date))); ?>
	<?php }
		$setTime = strtotime($rowJadwal->jadwal_start_at);
		$timeNormal = date("H:i", strtotime($rowJadwal->jadwal_start_at));
		$addTime = date("H:i", strtotime('+ 15 minutes', $setTime));
		$now = date("H:i");
		$timeNormalObject = DateTime::createFromFormat('H:i', $timeNormal);
		$timeNow = DateTime::createFromFormat('H:i', $now);
		$timeAdd = DateTime::createFromFormat('H:i', $addTime);
	 ?>
	<?php foreach ($list_allJadwal->result() as $rowJadwal) { ?>
		<?php if ($rowJadwal->jadwal_day == date("l", strtotime($date))) { ?>
			<?php if ($countRow %3 == 0) { ?>
			<div class="col-4 my-2">
			<?php } elseif ($countRow %2 == 0) { ?>
			<div class="col-6 my-2">
			<?php } elseif ($countRow == 1) { ?>
			<div class="col-3 my-2">
				&nbsp
			</div>
			<div class="col-6">
			<?php } ?>
				<a href="#">
				<?php $checkStatus = $this->M_akademik->checkPresenceStatus($rowJadwal->jadwal_id, date("Y-m-d"), $user_id); ?>
					<div class="card text-center">
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
					   </div>
					</div>
				</a>
			</div>
		<?php } ?>
	<?php } ?>
	</div>
<?php } ?>