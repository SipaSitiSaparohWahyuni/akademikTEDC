<div class="container">
	<script type="text/javascript">
      function setDatePicker(){
      $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
      }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
    }
  </script>
  <div class="row">
    <div class="col-3">
      &nbsp
    </div>
    <div class="col-6">
      <form class="signUp" action="<?php echo base_url();?>index.php/adminPresence/getSelected/" method="POST" enctype="multipart/form-data">
      <div class="input-group mb-4">
            <div class="input-group date">
              <table class="table table-borderless">
                <thead class="text-center">
                  <th colspan="2">
                    <label for="dob">Pilih Tanggal Presensi</label>
                  </th>
                </thead>
                <tr>
                  <td><input value="" name="presence_date" type="text" id="datepicker" class="form-control"></td>
                  <td><button class=" btn btn-hadir btn-success"><i class="fa fa-search"></i> | Cari Data</button></td>
                </tr>
              </table>
             <script>
              $('#datepicker').datepicker({
                  uiLibrary: 'bootstrap4'
              });
             </script>
            </div>
      </div>
    </div>
  </form>
  </div>
<?php
	$days = array();
	$numDays = 6;

	// $count = 0;
	// for ($i=0; $i < $numDays; $i++) {

	// 	$date = date('j M Y', strtotime("$startDate +$i days"));
	// 	$dateArr[] = $date;
	// 	$jadwal_table = "jadwal_table";

	// 	$this->db->select('*');
	// 	$this->db->from($jadwal_table);
	// 	$this->db->where('jadwal_day', date("l", strtotime($date)));

	// 	$query = $this->db->get(); 
?>
	<?php //if (date("l", strtotime($date)) == $today) { ?>
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
		<?php //var_dump($list_todayJadwal->result());exit(); ?>
	<?php 
		$count = 0;
		if ($count_jadwal != 0) {
			foreach ($list_todayJadwal->result() as $rowJadwal) {
				$setTime = strtotime($rowJadwal->jadwal_start_at);
				$timeNormal = date("H:i", strtotime($rowJadwal->jadwal_start_at));
				$timeEnd = date("H:i", strtotime($rowJadwal->jadwal_ended_at));
				// $addTime = date("H:i", strtotime('+ 15 minutes', $setTime));
				$now = date("H:i");
				$timeNormalObject = DateTime::createFromFormat('H:i', $timeNormal);
				$timeNow = DateTime::createFromFormat('H:i', $now);
				$timeEndObject = DateTime::createFromFormat('H:i', $timeEnd);

				//var_dump($count_jadwal);exit();
				//if ($rowJadwal->jadwal_day == date("l", strtotime($date))) {
					$count = 1;
					// echo $count_jadwal;
					if ($count_jadwal %3 == 0) { ?>
						<div class="col-4 my-4">
							<?php if ($timeNow >= $timeNormalObject){ ?>
							<a href="<?php echo base_url().'index.php/adminPresence/detailPresence/'.$rowJadwal->jadwal_id; ?>">
							<?php } else { ?>
							<a href="#">
							<?php } ?>
								<?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeEndObject) { ?>
								<div class="card border border-success">
								<?php } elseif ($timeNow > $timeEndObject){ ?>
								<div class="card border border-info">
								<?php } elseif ($timeNow < $timeNormalObject ){ ?>
								<div class="card border border-warning">
								<?php } ?>	
								  <?php echo "<img class='card-img-top' alt='Responsive-image' src='".base_url().'assets/img/course/'.$rowJadwal->matakuliah_picture."'>";?>
								  <div class="card-body text-center">
								  	<?php //var_dump($timeEnd); ?>
								    <h4><?php echo $rowJadwal->matakuliah_name; ?></h4>
								    <h5><?php echo $rowJadwal->user_name; ?></h5>
									<h5><?php echo $rowJadwal->class_name; ?></h5>
								    <p>
								    	<?php 
								    		echo date('H:i', strtotime($rowJadwal->jadwal_start_at))."-".date('H:i', strtotime($rowJadwal->jadwal_ended_at)); 
								    	?>
								    </p>
								    <?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeEndObject) { ?>
								    <div class="btn btn-success btn-hadir">
								    	Status : <b><?php echo "Perkuliahan sedang berlangsung"; ?></b>
								    </div>
									<?php } elseif ($timeNow > $timeEndObject){ ?>
									<div class="btn btn-info btn-usai">
								    	Status : <b><?php echo "Perkuliahan selesai pada pukul ".$timeEnd; ?></b>
								    </div>
									<?php } elseif ($timeNow < $timeNormalObject ){ ?>
									<div class="btn btn-warning btn-siap text-white">
								    	Status : <b><?php echo "Perkuliahan segera dimulai pada ".$timeNormal; ?></b>
								    </div>
									<?php } ?>
								  </div>
								</div>
							</a>
						</div>
					<?php } elseif ($count_jadwal %2 == 0) { ?>
						<div class="col-6 my-4">
							<?php if ($timeNow >= $timeNormalObject){ ?>
							<a href="<?php echo base_url().'index.php/adminPresence/detailPresence/'.$rowJadwal->jadwal_id; ?>">
							<?php } else { ?>
							<a href="#">
							<?php } ?>
								<?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeEndObject) { ?>
								<div class="card border border-success">
								<?php } elseif ($timeNow > $timeEndObject){ ?>
								<div class="card border border-info">
								<?php } elseif ($timeNow < $timeNormalObject ){ ?>
								<div class="card border border-warning">
								<?php } ?>	
								  <?php echo "<img class='card-img-top' alt='Responsive-image' src='".base_url().'assets/img/course/'.$rowJadwal->matakuliah_picture."'>";?>
								  <div class="card-body text-center">
								  	<?php //var_dump($timeEnd); ?>
								    <h4><?php echo $rowJadwal->matakuliah_name; ?></h4>
								    <h5><?php echo $rowJadwal->user_name; ?></h5>
									<h5><?php echo $rowJadwal->class_name; ?></h5>
								    <p>
								    	<?php 
								    		echo date('H:i', strtotime($rowJadwal->jadwal_start_at))."-".date('H:i', strtotime($rowJadwal->jadwal_ended_at)); 
								    	?>
								    </p>
								    <?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeEndObject) { ?>
								    <div class="btn btn-success btn-hadir">
								    	Status : <b><?php echo "Perkuliahan sedang berlangsung"; ?></b>
								    </div>
									<?php } elseif ($timeNow > $timeEndObject){ ?>
									<div class="btn btn-info btn-usai">
								    	Status : <b><?php echo "Perkuliahan selesai pada pukul ".$timeEnd; ?></b>
								    </div>
									<?php } elseif ($timeNow < $timeNormalObject ){ ?>
									<div class="btn btn-warning btn-siap text-white">
								    	Status : <b><?php echo "Perkuliahan segera dimulai pada ".$timeNormal; ?></b>
								    </div>
									<?php } ?>
								  </div>
								</div>
							</a>
						</div>
					<?php } elseif ($count_jadwal == 1) { ?>
						<div class="col-3">
							<?php ?>
						</div>
						<div class="col-6 my-4">
							<?php if ($timeNow >= $timeNormalObject){ ?>
							<a href="<?php echo base_url().'index.php/adminPresence/detailPresence/'.$rowJadwal->jadwal_id; ?>">
							<?php } else { ?>
							<a href="#">
							<?php } ?>
								<?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeEndObject) { ?>
								<div class="card border border-success">
								<?php } elseif ($timeNow > $timeEndObject){ ?>
								<div class="card border border-info">
								<?php } elseif ($timeNow < $timeNormalObject ){ ?>
								<div class="card border border-warning">
								<?php } ?>	
								  <?php echo "<img class='card-img-top' alt='Responsive-image' src='".base_url().'assets/img/course/'.$rowJadwal->matakuliah_picture."'>";?>
								  <div class="card-body text-center">
								  	<?php //var_dump($timeEnd); ?>
								    <h4><?php echo $rowJadwal->matakuliah_name; ?></h4>
								    <h5><?php echo $rowJadwal->user_name; ?></h5>
									<h5><?php echo $rowJadwal->class_name; ?></h5>
								    <p>
								    	<?php 
								    		echo date('H:i', strtotime($rowJadwal->jadwal_start_at))."-".date('H:i', strtotime($rowJadwal->jadwal_ended_at)); 
								    	?>
								    </p>
								    <?php if ($timeNow >= $timeNormalObject && $timeNow <= $timeEndObject) { ?>
								    <div class="btn btn-success btn-hadir">
								    	Status : <b><?php echo "Perkuliahan sedang berlangsung"; ?></b>
								    </div>
									<?php } elseif ($timeNow > $timeEndObject){ ?>
									<div class="btn btn-info btn-usai">
								    	Status : <b><?php echo "Perkuliahan selesai pada pukul ".$timeEnd; ?></b>
								    </div>
									<?php } elseif ($timeNow < $timeNormalObject ){ ?>
									<div class="btn btn-warning btn-siap text-white">
								    	Status : <b><?php echo "Perkuliahan segera dimulai pada ".$timeNormal; ?></b>
								    </div>
									<?php } ?>
								  </div>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php //} ?>
			<?php } ?>
		<?php } ?>
		<?php //} ?>
		<?php //} ?>
<?php //} ?>
	</div>
</div>
<?php if ($list_todayJadwal->result() == NULL): ?>
	<div class="container">
		<!-- <div class="row">
			<div class="col-4">
				&nbsp
			</div>
			<div class="col-4 text-center">
				<h2><?php echo strftime('%A'); ?></h2>
				<h3><?php echo strftime('%d %B %Y'); ?></h3>
			</div>
		</div> -->
		<div class="row">
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
		</div>
	</div>
<?php endif ?>