<title>ADMIN - MANAGE USER</title>
<div class="container my-5 py-5">
  <div class="input-group mb-3">
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
  </div>
    &nbsp
  <div class="container">
    <div class="row text-center">
      <div class="col-4">
        <a href="<?php echo base_url();?>index.php/adminChangeUser/Mahasiswa">
          <div class="card">
            <div class="card-body">
              <h4><i class="fa fa-graduation-cap" aria-hidden="true"></i></h4>
              <h5 class="card-title">Data Mahasiswa</h5>
            </div>
          </div>  
        </a>
      </div>
      <div class="col-4">
        <a href="<?php echo base_url();?>index.php/adminChangeUser/Dosen">
          <div class="card">
            <div class="card-body">
              <h4><i class="fa fa-user-secret" aria-hidden="true"></i></h4>
              <h5 class="card-title">Data Dosen</h5>
            </div>
          </div>  
        </a>
      </div>
      <div class="col-4">
        <a href="<?php echo base_url();?>index.php/adminChangeUser/Admin">
          <div class="card">
            <div class="card-body">
              <h4><i class="fa fa-star" aria-hidden="true"></i></h4>
              <h5 class="card-title">Data Kaprodi</h5>
            </div>
          </div>
        </a>  
      </div>
    </div>
  </div>
</div>