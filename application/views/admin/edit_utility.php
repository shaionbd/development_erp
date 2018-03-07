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
                        <div class="left">Edit Utility</div>
                        <div class="right">
                            <i class="zmdi zmdi-edit"></i>
                        </div>
                    </div>
                    <div id="card-body" class="card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/update/utility');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <input type="hidden" name="id" value="<?php echo $utility->id;?>">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="your name" value="<?php echo $utility->name; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="cost" class="control-label">Cost</label>
                                <input type="text" id="cost" name="cost" class="form-control" value="<?php echo $utility->cost; ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('cost'))? form_error('cost'):''; ?>
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
