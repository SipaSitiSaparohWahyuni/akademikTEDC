<title>ADMIN - PRESENSI</title>
<div class="container mt-5 mb-0 p-5 rounded">
	<h3 class="py-3" style="text-align: center;">Detail Presensi</h3><hr>
	<h5 style="text-align: center;">
		<?php echo $get_jadwal->matakuliah_name; ?> | <?php echo $get_jadwal->class_name; ?> | <?php echo $get_jadwal->user_name; ?>
	</h5>
	<h6 class="text-center"><?php echo $tanggal_presensi; ?></h6><hr>
	<?php //var_dump($get_jadwal); ?>
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
	<div  style="background-color: #F0F0F0;" class="container p-5 rounded">
	  	<div class="container">
	  		<?php //var_dump($detail_presenceMhs->result());exit(); ?>
  			<caption>Tabel Kehadiran Dosen</caption>
	  		<table class="table table-bordered table-info table-hover table-striped">
	  			<thead class="thead-dark">
	  				<th class="bg-success" scope="col">No</th>
	  				<th class="bg-success" scope="col">Nama Dosen</th>
	  				<th class="bg-success" scope="col">NIDN</th>
	  				<th class="bg-success" scope="col">Jam Presensi</th>
	  				<th class="bg-success" scope="col">Keterangan</th>
	  			</thead>
	  		<?php $no = 1; foreach ($detail_presenceDosen->result() as $rowDetail) { ?>
	  			<?php if ($detail_presenceDosen->result() != NULL){ ?>
	  			<tr>
	  				<?php if ($rowDetail->presence_status == 'Hadir'){ ?>
	  				<td class="text-success"><?php echo $no; ?></td>
	  				<td class="text-success"><?php echo $rowDetail->user_name; ?></td>
	  				<td class="text-success"><?php echo $rowDetail->user_nidn; ?></td>
	  				<td class="text-success"><?php echo $rowDetail->presence_time; ?></td>
	  				<td class="text-success"><b><?php echo $rowDetail->presence_status; ?> <i class="fa fa-check-circle-o"></i> </b></td>
	  				<?php }elseif($rowDetail->presence_status == 'Tidak Hadir'){ ?>
	  				<td class="text-primary"><?php echo $no; ?></td>
	  				<td class="text-primary"><?php echo $rowDetail->user_name; ?></td>
	  				<td class="text-primary"><?php echo $rowDetail->user_nidn; ?></td>
	  				<td class="text-primary"><?php echo $rowDetail->presence_time; ?></td>
	  				<td class="text-primary"><b><?php echo $rowDetail->presence_status; ?> <i class="fa fa-times-circle-o"></i> </b></td>
					<?php } ?>
	  			</tr>
	  			<?php $no++; } else { ?>
	  			<tr>
	  				<td>-</td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  			</tr>
	  			<?php } ?>
	  		<?php } ?>
	  		</table>
  <!-- Submit button -->
  <!-- Register buttons -->
  		</div>
  	</div>

  	<div  style="background-color: #F0F0F0;" class="container my-5 p-5 rounded">
	  	<div class="container px-5">
	  		<?php//var_dump($detail_presenceMhs);exit(); ?>
  			<caption>Tabel Kehadiran Mahasiswa</caption>
	  		<table class="table table-bordered table-success table-hover table-striped">
	  			<thead class="thead-dark">
	  				<th class="bg-info" scope="col">No</th>
	  				<th class="bg-info" scope="col">Nama Mahasiswa</th>
	  				<th class="bg-info" scope="col">NIM</th>
	  				<th class="bg-info" scope="col">Jam Presensi</th>
	  				<th class="bg-info" scope="col">Keterangan</th>
	  			</thead>
	  		<?php $no = 1; foreach ($detail_presenceMhs->result() as $rowDetail) { ?>
	  			<?php if ($detail_presenceMhs != NUll) { ?>
	  			<tr>
	  				<?php if ($rowDetail->presence_status == 'Hadir'){ ?>
	  				<td class="text-success"><?php echo $no; ?></td>
	  				<td class="text-success"><?php echo $rowDetail->user_name; ?></td>
	  				<td class="text-success"><?php echo $rowDetail->user_nim; ?></td>
	  				<td class="text-success"><?php echo $rowDetail->presence_time; ?></td>
	  				<td class="text-success"><b><?php echo $rowDetail->presence_status; ?> <i class="fa fa-check-circle-o"></i> </b></td>
	  				<?php }elseif($rowDetail->presence_status == 'Tidak Hadir'){ ?>
	  				<td class="text-primary"><?php echo $no; ?></td>
	  				<td class="text-primary"><?php echo $rowDetail->user_name; ?></td>
	  				<td class="text-primary"><?php echo $rowDetail->user_nim; ?></td>
	  				<td class="text-primary"><?php echo $rowDetail->presence_time; ?></td>
	  				<td class="text-primary"><b><?php echo $rowDetail->presence_status; ?> <i class="fa fa-times-circle-o"></i> </b></td>
					<?php } ?>	  					
	  			</tr>
	  			<?php $no++;} else { ?>
	  			<tr>
	  				<td>-</td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  				<td><i>Data tidak ada</i></td>
	  			</tr>
	  			<?php } ?>
	  		<?php } ?>
	  		</table>
  <!-- Submit button -->
  <!-- Register buttons -->
  		</div>
  	</div>

</div>
</div>
</div>