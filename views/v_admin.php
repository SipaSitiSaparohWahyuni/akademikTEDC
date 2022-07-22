<?php error_reporting(E_ERROR | E_PARSE); date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <title>Home</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="icon" type="img/png" href="<?php echo base_url();?>assets/img/logo/logoAdmin.png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.min.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script> -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style> 
  .footer {
    background-color: #192735;
  }
  .btn {
    background-color: #ED5858;
  }
  button.btn-content{
    background-color: transparent;
    border: 1px solid #000;
    color: #777;
  }
  button.btn-content:hover{
    background-color: #F71C1C;
    border: 1px solid #F71C1C;
    color: #fff;
  }
  button.btn-dropdown1{
    background-color: transparent;
    border: 1px solid #fff;
    color: #777;
  }
  button.btn-dropdown1:hover{
    background-color: #F4623A;
    border: 1px solid #F4623A;
    color: #fff;
  }
  button.btn-dropdown2{
    background-color: transparent;
    border: 1px solid #fff;
    color: #777;
  }
  button.btn-dropdown2:hover{
    background-color: #F71C1C;
    border: 1px solid #F71C1C;
    color: #fff;
  }
  .avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
  .header-link li a{
    color : #fff;
  }
  .header-link li a:hover{
    color : #cacaca;
  }

  .btn-hadir{
    background-color: #1FB523;
  }
  .btn-siap{
    background-color: #F4BC32;
  }
  .btn-usai{
    background-color: #1AB9C6;
  }

</style>
<body>
<nav class="navbar navbar-expand-lg bg-success p-3 fixed-top">
  <div class="container-fluid row">
    <a class="navbar-brand col-1" href="<?php echo base_url(); ?>index.php/Admin">
      <img src="<?php echo base_url(); ?>assets/img/logo/logoAdmin.png" class="img-fluid w-75" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if ($this->session->userdata('admin')) { ?>
    <div class="collapse ml-5 col-9 navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto header-link">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>index.php/Admin">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/adminChangeUser">Manage User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/AdminAcademic">Academics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/AdminExam">Exam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/adminPresence">Presence</a>
        </li>
      </ul>
    </div>
    <div style="" class="navbar-nav mr-3 col-2">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white" id = "clock" onload="currentTime()"></a>
        </li>
        <li class="nav-item">
          <a class="fa fa-search text-white nav-link" aria-hidden="true"></a>
        </li>
        <div class="dropdown">
            <a class="text-white nav-item nav-link d-none d-lg-block dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <d class="dropdown-menu dropdown-menu-right px-5" aria-labelledby="dropdownMenuButton">
              <a href="#" class="dropdown-item m-0 w-100 rounded py-3" aria-labelledby="dropdownMenuLink">
                <table>
                  <tr>
                    <td><?php echo "<h6 style='text-align: center;'>Account Setting</h6>"; ?></td>
                  </tr>
                  <tr>
                    <td>
                      <center>
                        <img src="https://cdn2.iconfinder.com/data/icons/inclusiveness-vivid-vol-2/256/Lecturer-male-1024.png" alt="Avatar" class="avatar">
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4 class="text-primary" style="text-align: center; font-weight: bold;">
                        <?php
                          // ($_SESSION['mahasiswa']) ? $user_code = $user_nim : $user_code = $user_nidn;
                          $arr_name = str_split($user_name);
                          if (count($arr_name) >= 15) {
                            $split_name = explode(" ", $user_name, 2);
                            $first_name = $split_name[0];
                            echo $first_name;
                          }
                          else
                          {
                            echo $user_name;
                          }
                        ?>    
                      </h4>
                      <h6 style="text-align: center;"><?php echo $user_email; ?></h6>
                    </td>
                  </tr>
                </table>
              </a>
              <hr>  
              <div class="dropdown-devider">
                <a style="text-decoration: none; text-align: justify;" href="#">
                  <button class="dropdown-item rounded py-3 col-12 btn btn-dropdown1">
                    <div class="row">
                      <div class="col-1">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </div>
                      <div class="col-1">
                        <?php // var_dump((count($arr_name) >= 15));exit(); ?>
                        <?php echo (count($arr_name) >= 15) ? "Change Profile" : "Change <br/> Profile"; ?> 
                      </div>
                    </div>
                  </button>
                </a>
                <a style="text-decoration: none; text-align: justify;" href="<?php echo base_url();?>index.php/logout">
                  <button class="dropdown-item rounded py-3 col-12 btn btn-dropdown2">
                    <div class="row">
                      <div class="col-1">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                      </div>
                      <div class="col-1">
                        <?php echo "Logout"; ?> 
                      </div>
                    </div>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </ul>
    <?php } ?>
  </div>
</nav>
<div class='container-fluid py-5'>
  <?php 
    $this->load->view($content);
  ?>
</div>
<!-- Footer -->
<footer class="footer">
  <nav class="navbar navbar-expand-lg footer mt-5 p-4 py-5">
    <div class="container-fluid row">
      <a class="navbar-brand col-1" href="<?php echo base_url(); ?>index.php">
        <img src="<?php echo base_url(); ?>assets/img/logo/logo.png" class="img-fluid w-75" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-7" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mx-auto" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">
              <i class="fa fa-facebook-official" aria-hidden="true"></i>
              &nbsp&nbsp&nbspFacebook
            </a>
            <a class="nav-link text-light" href="#">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              &nbsp&nbsp&nbspEmail
            </a>
            <a class="nav-link text-light" href="#">
              <i class="fa fa-instagram" aria-hidden="true"></i>
              &nbsp&nbsp&nbspInstagram
            </a>
          </li>
        </ul>
      </div>
      <div style="" class="navbar-nav col-4">
        <form class="d-flex" role="search">
          <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search">
          <button class="rounded-0 btn" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</footer>
</body>
</html>