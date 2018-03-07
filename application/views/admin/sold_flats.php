<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('admin/partials/header');?>
</head>
<body>

  <!-- start top-navbar -->
  <section id="top-navbar" class="nav4">
    <?php $this->load->view('admin/partials/navbar');?>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <div class="left">Sold Flats</div>
                        <div class="right">
                        <i class="zmdi zmdi-chevron-down"></i>
                        <i class="zmdi zmdi-refresh-sync"></i>
                        <i class="zmdi zmdi-close-circle-o"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="datatables display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Project Name</th>
                                    <th>Floor</th>
                                    <th>Square Foot</th>
                                    <th>Total Costs</th>
                                    <th>Estimate Flat Ready Date</th>
                                    <th>Flat Bought By</th>
                                    <th>Total Received</th>
                                    <th>Balance</th>
                                    <th width="80"><i class="zmdi zmdi-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($sold_flats as $flat):?>
                                    <tr>
                                        <td><?php echo $flat->name;?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/project/'.$flat->project_id);?>"><?php echo $flat->project_name;?></a>
                                        </td>
                                        <td><?php echo $flat->floor;?></td>
                                        <td><?php echo $flat->stf;?></td>
                                        <td><?php echo $flat->costs;?></td>
                                        <td><?php echo date("d/m/Y", strtotime($flat->flat_ready));?></td>
                                        <td>
                                            <?php echo $flat->customer_name;?>
                                        </td>
                                        <td>
                                            <?php 
                                                $total_received = $this->db->query("SELECT SUM(receive_amount) AS amount FROM receipt_books WHERE flat_id= '$flat->id'")->row();
                                            ?>
                                            <?php echo $total_received->amount;?>
                                        </td>
                                        <td><?php echo number_format((($flat->total_costs-$flat->discount)-$total_received->amount), 2); ?></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/invoice/sold/flat/'.$flat->id);?>" class="btn btn-sm btn-info text-center"><i class="zmdi zmdi-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
  </div>

  <!-- end Layout -->


  <!-- script -->
  <?php $this->load->view('admin/partials/footer');?>
</body>
</html>
