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
                    <div class="card-danger" data-toggle="collapse" data-target="#card-body" aria-expanded="false" aria-controls="card-body">
                        <div class="left">Add New Flat</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="collapse <?php if(validation_errors()) echo 'show'; ?> card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/flat');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Flat Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="flat name" value="<?php echo set_value('name'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>

                            <div class="form form-group has-feedback">
                                <label for="project_id" class="control-label"><span class="text-danger">*</span>Project Name</label>
                                <select name="project_id" id="project_id" class="form-control">
                                    <?php foreach($projects as $project):?>
                                        <?php
                                            $total_flats = count($this->db->get_where('flats', ['project_id'=> $project->id])->result());
                                            if($total_flats != $project->flats):?>
                                            <option value="<?php echo $project->id;?>"><?php echo $project->name;?></option>
                                            <?php endif;?>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="floor" class="control-label"><span class="text-danger">*</span>Floor</label>
                                <input type="text" class="form-control" name="floor" id="floor" value="<?php echo set_value('floor'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('floor'))? form_error('floor'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="stf" class="control-label"><span class="text-danger">*</span>Square Foot</label>
                                <input type="text" class="form-control" name="stf" id="stf"  value="<?php echo set_value('stf'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('stf'))? form_error('stf'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="costs" class="control-label"><span class="text-danger">*</span>Total Costs</label>
                                <input type="text" class="form-control" name="costs" id="costs"  value="<?php echo set_value('costs'); ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('costs'))? form_error('costs'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="date" class="control-label">Estimate Start Date</label>
                                <input type="date" class="form-control" name="date" id="date"  value="<?php echo set_value('date'); ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('date'))? form_error('date'):''; ?>
                                </div>
                            </div>
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Add Flat</button>
                            </div>
                        </form>
                            <!-- end form -->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <div class="left">Flat List</div>
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
                                        <?php if(!$flat->is_sold):?>
                                        <a href="<?php echo base_url('admin/invoice/book/flats');?>" class="btn btn-sm btn-primary text-center"><i class="zmdi zmdi-store"></i></a>
                                        <?php endif; ?>
                                        <!-- <a href="<?php echo base_url('admin/flat/'.$flat->id);?>" class="btn btn-sm btn-info text-center"><i class="zmdi zmdi-eye"></i></a> -->
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


  <!-- script -->
  <?php $this->load->view('admin/partials/footer');?>
</body>
</html>
