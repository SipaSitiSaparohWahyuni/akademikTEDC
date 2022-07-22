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
		<div class="container">
		  <?php 
		      $dataNumber = "0";
		      $tgl_presensi = date("Y-m-d", strtotime("00/00/0000"));
		      $countRow = 0;
		      foreach($list_allPresence->result() as $rowPresence) {
		        for ($i=0; $i < $list_countAllPresence ; $i++) { 
		          if ($dataNumber != $rowPresence->jadwal_id && $tgl_presensi != $rowPresence->presence_date) {
		            $dataNumber = $rowPresence->jadwal_id;
		            $countRow++;
		          }
		        }
		      }
		      // echo $countRow;
		   ?>
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
		  <div class="row">
		  	<div class="col-4">
		  		&nbsp
		  	</div>
		  	<div class="col-4 text-center">
		  		<h4 class="pb-3">Presensi Tanggal <?php echo $tanggal_presensi; ?></h4>
		  	</div>
		  </div>
		  <div class="row">
		  	<?php if ($list_allPresence->result() == NULL) { ?>
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
		      <?php } 
		          $data = "0";
		          $tgl_presensi = date("Y-m-d", strtotime("00/00/0000")); 
		          $presence_code = $data."".$tgl_presensi;
		      ?>
		      <?php //var_dump($list_allPresence->result());exit(); ?>
		      <?php foreach ($list_allPresence->result() as $rowPresence) { ?>
		        <?php //var_dump($rowPresence->presence_code);exit(); ?>
		        <?php for ($i=0; $i < $list_countAllPresence; $i++) {
		            if ($presence_code != $rowPresence->presence_code) { ?>
		              <?php $presence_code = $rowPresence->presence_code; ?>
		              <?php if ($countRow >= 2) { ?>
		              <div class="col-6"> 
		                <div class="card m-3">
		                  <div class="card-header bg-info text-white">
		                    <?php echo "Detail Presensi" ?>
		                  </div>
		                  <div class="card-body">
		                    <table class="table table-borderless">
		                      <tr class="border-top border-bottom">
		                        <td><h5 class="card-title">Nama Mata Kuliah</h5></td>
		                        <td>:</td>
		                        <td><h5 class="card-title"><?php echo $rowPresence->matakuliah_name; ?></h5></td>
		                      </tr>
		                      <tr>
		                        <td><p class="card-text">Nama Dosen Pengampu</p></td>
		                        <td>:</td>
		                        <td><p class="card-text"><?php echo $rowPresence->user_name; ?></p></td>
		                      </tr>
		                      <tr>
		                        <td><p class="card-text">Kelas</p></td>
		                        <td>:</td>
		                        <td><p class="card-text"><?php echo $rowPresence->class_name; ?></p></td>
		                      </tr>
		                      <tr>
		                        <td><p class="card-text">Tanggal</p></td>
		                        <td>:</td>
		                        <td><p class="card-text"><?php echo date("j M Y", strtotime($rowPresence->presence_date)); ?></p></td>
		                      </tr>
		                    </table>
		                    <a class="btn btn-success btn-hadir" href="<?php echo base_url().'index.php/adminPresence/detailAllPresence/'.$rowPresence->jadwal_id.'/'.$rowPresence->presence_date; ?>">
		                      Lihat Detail
		                    </a>  
		                  </div>
		                </div>
		              </div>
		          <?php } elseif ($countRow == 1) { ?>
		              <div class="col-3">
		                &nbsp
		              </div>
		              <div class="col-6"> 
		                <div class="card m-3">
		                  <div class="card-header bg-info text-white">
		                    <?php echo "Detail Presensi" ?>
		                  </div>
		                  <div class="card-body">
		                    <table class="table table-borderless">
		                      <tr class="border-top border-bottom">
		                        <td><h5 class="card-title">Nama Mata Kuliah</h5></td>
		                        <td>:</td>
		                        <td><h5 class="card-title"><?php echo $rowPresence->matakuliah_name; ?></h5></td>
		                      </tr>
		                      <tr>
		                        <td><p class="card-text">Nama Dosen Pengampu</p></td>
		                        <td>:</td>
		                        <td><p class="card-text"><?php echo $rowPresence->user_name; ?></p></td>
		                      </tr>
		                      <tr>
		                        <td><p class="card-text">Kelas</p></td>
		                        <td>:</td>
		                        <td><p class="card-text"><?php echo $rowPresence->class_name; ?></p></td>
		                      </tr>
		                      <tr>
		                        <td><p class="card-text">Tanggal</p></td>
		                        <td>:</td>
		                        <td><p class="card-text"><?php echo date("j M Y", strtotime($rowPresence->presence_date)); ?></p></td>
		                      </tr>
		                    </table>
		                    <a class="btn btn-success btn-hadir" href="<?php echo base_url().'index.php/adminPresence/detailAllPresence/'.$rowPresence->jadwal_id.'/'.$rowPresence->presence_date; ?>">
		                      Lihat Detail
		                    </a>  
		                  </div>
		                </div>
		              </div>
		          <?php }
		          // var_dump($data[$i]);
		        } ?>
		      <?php } ?>
		  <?php } ?>
		  </div>
		  <a href="<?php echo base_url().'index.php/adminPresence/'?>" class="btn btn-info btn-usai"><i class="fa fa-arrow-left"></i> | Kembali</a>
		</div>
	</div>
</div>