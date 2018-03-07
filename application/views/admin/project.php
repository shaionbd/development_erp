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
                    <div class="card-head full-display">
                        <div class="right">
                            <button id="exportExcel" class="btn btn-default btn-xs">Excel</button>
                            <button id="exportCSV" class="btn btn-default btn-xs">CSV</button>
                            <button id="exportPDF" class="btn btn-default btn-xs">PDF</button>
                            <button id="exportPrint" class="btn btn-default btn-xs">Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    
                    <div style="border-top: 1px solid #ddd;" class="card-body">
                        
                        <table class="datatables display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <div class="row" style="padding-bottom: 20px">
                                        <div class="col-md-6 color-default">
                                            <p><strong>Project Name:</strong> <?php echo $project->name;?></p>
                                            <p><strong>Storied:</strong> <?php echo $project->storied;?></p>
                                            <p><strong>Flats:</strong> <?php echo $project->flats;?></p>
                                            <p><strong>Costs:</strong> <?php echo '৳'.number_format($project->costs, 2);?></p>
                                            <p><strong>Location:</strong> <?php echo $project->location;?></p>
                                            <p><strong>Estimate Start Date:</strong> <?php echo date("d/m/Y", strtotime($project->date));?></p>
                                        </div>
                                        <div class="col-md-6 right text-right color-default">
                                            <p class="font-18">Enosis Development Solution</p>
                                            <p>Flat # M-2, Mezonet Building, <br>125 Ramna Century Ave, Dhaka 1217</p>
                                            <p>Email: <a href="mailto:hr@enosisltd.com.bd">hr@enosisltd.com.bd</a></p>
                                            <p>Phone: <a href="tel:+880123456789">+880 123 456789</a></p>
                                        </div>
                                    </div>
                                </tr>
                            </thead>
                            <thead>
                                <tr><p style="border-top: 1px solid #ccc; padding: 20px" class="font-20 text-center">Floors Of <b><?php echo ucfirst($project->name);?></b></p></tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Project Name</th>
                                    <th>Floor</th>
                                    <th>Square Foot</th>
                                    <th>Total Costs</th>
                                    <th>Estimate Flat Ready Date</th>
                                    <th>Flat Bought By</th>
                                    <th width="80"><i class="zmdi zmdi-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($flats as $flat):?>
                                    <tr>
                                        <td><?php echo $flat->name;?></td>
                                        <td>
                                            <?php 
                                                $project_info = $this->db->get_where('projects',['id'=>$flat->project_id])->row();
                                            ?>
                                            <a href="<?php echo base_url('admin/project/'.$project->id);?>"><?php echo $project_info->name;?></a>
                                        </td>
                                        <td><?php echo $flat->floor;?></td>
                                        <td><?php echo $flat->stf;?></td>
                                        <td><?php echo $flat->costs;?></td>
                                        <td><?php echo date("d/m/Y", strtotime($flat->flat_ready));?></td>
                                        <td>
                                            <?php 
                                                if(!$flat->is_sold){
                                                    echo '<span class="text-danger">has not sold</span>';
                                                }else{
                                                    $this->db->select('customers.*');
                                                    $this->db->from('sold_flats');
                                                    $this->db->join('customers', 'customers.id = sold_flats.customer_id');
                                                    $this->db->where('sold_flats.flat_id', $flat->id);
                                                    $customer = $this->db->get()->row();
                                                    echo '<a href="'.base_url("admin/invoice/sold/flat/".$flat->id).'" class="text-success">'.$customer->name.'</a>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                        <a href="<?php echo base_url('admin/flat/'.$flat->id);?>" class="btn btn-sm btn-info text-center"><i class="zmdi zmdi-eye"></i></a>
                                        <a href="<?php echo base_url('admin/edit/flat/'.$flat->id);?>" class="btn btn-sm btn-primary text-center"><i class="zmdi zmdi-edit"></i></a>
                                        <!-- <a href="<?php echo base_url('admin/delete/flat/'.$flat->id);?>" class="btn btn-sm btn-danger text-center"><i class="zmdi zmdi-delete"></i></a> -->
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
<div id="printArea" class="card hidden">
                    
    <div class="card-body">
        <div class="table-responsive">
            <table id="exportTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="5">
                            <div class="color-default">
                                <p><strong>Project Name:</strong> <?php echo $project->name;?></p>
                                <p><strong>Storied:</strong> <?php echo $project->storied;?></p>
                                <p><strong>Flats:</strong> <?php echo $project->flats;?></p>
                                <p><strong>Costs:</strong> <?php echo '৳'.number_format($project->costs, 2);?></p>
                                <p><strong>Location:</strong> <?php echo $project->location;?></p>
                                <p><strong>Estimate Start Date:</strong> <?php echo date("d/m/Y", strtotime($project->date));?></p>
                            </div>
                        </th>
                        <th colspan="5">
                            <div class="text-right color-default">
                                <p class="font-18">Enosis Development Solution</p>
                                <p>Flat # M-2, Mezonet Building, <br>125 Ramna Century Ave, Dhaka 1217</p>
                                <p>Email: <a href="mailto:hr@enosisltd.com.bd">hr@enosisltd.com.bd</a></p>
                                <p>Phone: <a href="tel:+880123456789">+880 123 456789</a></p>
                            </div>
                        </th>
                    </tr>
                    <tr><th colspan="7"><p class="font-20 text-center">Floors Of <b><?php echo ucfirst($project->name);?></b></p></th></tr>
                    <tr>
                        <th>Name</th>
                        <th>Project Name</th>
                        <th>Floor</th>
                        <th>Square Foot</th>
                        <th>Total Costs</th>
                        <th>Estimate Flat Ready Date</th>
                        <th>Flat Bought By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($flats as $flat):?>
                        <tr>
                            <td><?php echo $flat->name;?></td>
                            <td>
                                <?php 
                                    $project_info = $this->db->get_where('projects',['id'=>$flat->project_id])->row();
                                ?>
                                <a href="<?php echo base_url('admin/project/'.$project->id);?>"><?php echo $project_info->name;?></a>
                            </td>
                            <td><?php echo $flat->floor;?></td>
                            <td><?php echo $flat->stf;?></td>
                            <td><?php echo $flat->costs;?></td>
                            <td><?php echo date("d/m/Y", strtotime($flat->flat_ready));?></td>
                            <td>
                                <?php 
                                    if(!$flat->is_sold){
                                        echo '<span class="text-danger">has not sold</span>';
                                    }else{
                                        $this->db->select('customers.*');
                                        $this->db->from('sold_flats');
                                        $this->db->join('customers', 'customers.id = sold_flats.customer_id');
                                        $this->db->where('sold_flats.flat_id', $flat->id);
                                        $customer = $this->db->get()->row();
                                        echo '<a href="'.base_url("admin/invoice/sold/flat/".$flat->id).'" class="text-success">'.$customer->name.'</a>';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

  <!-- script -->
  <?php $this->load->view('admin/partials/footer');?>
</body>
</html>
