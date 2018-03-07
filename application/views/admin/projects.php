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
                        <div class="left">Add New Project</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="collapse <?php if(validation_errors()) echo 'show'; ?> card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/project');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Project Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="project name" value="<?php echo set_value('name'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="location" class="control-label"><span class="text-danger">*</span>Location</label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Dhanmondi-8/a, Dhaka, Bangladesh" value="<?php echo set_value('location'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('location'))? form_error('location'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="storied" class="control-label"><span class="text-danger">*</span>Storied</label>
                                <input type="number" class="form-control" name="storied" id="storied" value="<?php echo set_value('storied'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('storied'))? form_error('storied'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="flats" class="control-label"><span class="text-danger">*</span>Total Flats</label>
                                <input type="number" class="form-control" name="flats" id="flats"  value="<?php echo set_value('flats'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('flats'))? form_error('flats'):''; ?>
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
                                <button type="submit" class="btn btn-primary">Add Project</button>
                            </div>
                        </form>
                            <!-- end form -->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <div class="left">Project List</div>
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
                                    <th>Location</th>
                                    <th>Storied</th>
                                    <th>Flats</th>
                                    <th>Total Costs</th>
                                    <th>Estimate Start Date</th>
                                    <th width="80"><i class="zmdi zmdi-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($projects as $project):?>
                                    <tr>
                                        <td><?php echo $project->name;?></td>
                                        <td><?php echo $project->location;?></td>
                                        <td><?php echo $project->storied;?></td>
                                        <td><?php echo $project->flats;?></td>
                                        <td><?php echo $project->costs;?></td>
                                        <td><?php echo date("d/m/Y", strtotime($project->date));?></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/project/'.$project->id);?>" class="btn btn-sm btn-info text-center"><i class="zmdi zmdi-eye"></i></a>
                                        <a href="<?php echo base_url('admin/edit/project/'.$project->id);?>" class="btn btn-sm btn-primary text-center"><i class="zmdi zmdi-edit"></i></a>
                                        <!-- <a href="<?php echo base_url('admin/delete/project/'.$project->id);?>" class="btn btn-sm btn-danger text-center"><i class="zmdi zmdi-delete"></i></a> -->
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
