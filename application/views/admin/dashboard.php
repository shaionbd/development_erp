<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="<?php echo base_url('assets/src/img/fav.png');?>">
  <!-- style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/src/plug/bootstrap.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/chartist/dist/chartist.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/src/plug/fullcalendar.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/src/dist/style/app.css');?>">
  <!-- titel -->
  <title><?php echo $title;?></title>
</head>
<body>

  <!-- start top-navbar -->
  <section id="top-navbar" class="nav4">

    <?php $this->load->view('admin/partials/navbar');?>
    <!-- start page directory -->

  </section>
  <!-- end top navbar -->

  <!-- strat Layout -->

  <div id="layout"  >

      <!-- start side bar -->
      <div id="sidebar">
          <?php $this->load->view('admin/partials/sidebar');?>
      </div>
      <!-- end side bar -->
      <!-- start content -->
      <div id="content">

        <div id="dashOne">
          <!-- first row -->
          
          <!-- end six -->
        </div>
      </div>
     <!-- end content -->
  </div>

  <!-- end Layout -->


  <!-- script -->
  <script src="<?php echo base_url('assets/src/plug/jquery.js');?>"></script>
  <script src="<?php echo base_url('assets/src/plug/tether.js');?>"></script>
  <script src="<?php echo base_url('assets/src/plug/bootstrap.js');?>"></script>
  <script src="<?php echo base_url('assets/src/plug/moment.js');?>"></script>
  <script src="<?php echo base_url('assets/src/plug/jquery.flot.js');?>"></script>
  <script src="<?php echo base_url('assets/node_modules/CurvedLines/curvedLines.js');?>"></script>
  <script src="<?php echo base_url('assets/node_modules/peity/jquery.peity.min.js');?>"></script>
  <script src="<?php echo base_url('assets/node_modules/easy-pie-chart/dist/jquery.easypiechart.min.js');?>"></script>
  <script src="<?php echo base_url('assets/node_modules/chartist/dist/chartist.min.js');?>"></script>
  <script src="<?php echo base_url('assets/src/plug/fullcalendar.min.js');?>"></script>
  <script src="<?php echo base_url('assets/src/dist/js/dashone.js');?>"></script>
  <script src="<?php echo base_url('assets/src/dist/js/app.js');?>"></script>
</body>
</html>
