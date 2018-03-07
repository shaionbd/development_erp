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
                        <div class="left">Add New Utility</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="collapse <?php if(validation_errors()) echo 'show'; ?> card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/utility');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Utility Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="utility name" value="<?php echo set_value('name'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="cost" class="control-label"><span class="text-danger">*</span>Cost</label>
                                <input type="text" class="form-control" name="cost" id="cost"  value="<?php echo set_value('cost'); ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('cost'))? form_error('cost'):''; ?>
                                </div>
                            </div>
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Add Utility</button>
                            </div>
                        </form>
                            <!-- end form -->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <div class="left">Powerful Datatables</div>
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
                                    <th>Cost</th>
                                    <th width="80"><i class="zmdi zmdi-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($utilities as $utility):?>
                                    <tr>
                                        <td><?php echo $utility->name;?></td>
                                        <td><?php echo $utility->cost;?></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/edit/utility/'.$utility->id);?>" class="btn btn-sm btn-primary text-center"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="<?php echo base_url('admin/delete/utility/'.$utility->id);?>" class="btn btn-sm btn-danger text-center"><i class="zmdi zmdi-delete"></i></a>
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
