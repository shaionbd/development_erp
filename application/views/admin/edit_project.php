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
                    <div class="card-danger">
                        <div class="left">Edit Project</div>
                        <div class="right">
                            <i class="zmdi zmdi-edit"></i>
                        </div>
                    </div>
                    <div id="card-body" class="card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/update/project');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <input type="hidden" name="id" value="<?php echo $project->id;?>">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Project Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="your name" value="<?php echo $project->name; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="location" class="control-label"><span class="text-danger">*</span>Location</label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Dhanmondi-8/a, Dhaka, Bangladesh" value="<?php echo $project->location; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('location'))? form_error('location'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="storied" class="control-label"><span class="text-danger">*</span>Storied</label>
                                <input type="number" class="form-control" name="storied" id="storied" value="<?php echo $project->storied; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('storied'))? form_error('storied'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="flats" class="control-label"><span class="text-danger">*</span>Total Flats</label>
                                <input type="number" class="form-control" name="flats" id="flats"  value="<?php echo $project->flats; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('flats'))? form_error('flats'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="costs" class="control-label"><span class="text-danger">*</span>Total Costs</label>
                                <input type="text" class="form-control" name="costs" id="costs"  value="<?php echo $project->costs; ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('costs'))? form_error('costs'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="date" class="control-label">Estimate Start Date</label>
                                <input type="date" class="form-control" name="date" id="date"  value="<?php echo date("Y-m-d", strtotime($project->date)); ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('date'))? form_error('date'):''; ?>
                                </div>
                            </div>
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Update Customer</button>
                            </div>
                        </form>
                            <!-- end form -->
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
