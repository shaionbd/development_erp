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
                        <form action="<?php echo base_url('admin/update/flat');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <input type="hidden" name="id" value="<?php echo $flat->id;?>">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Flat Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="flat name" value="<?php echo $flat->name; ?>" required>
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
                                            if($project->id == $flat->project_id):?>
                                            <option value="<?php echo $project->id;?>"><?php echo $project->name;?></option>
                                            <?php endif;?>    
                                            <?php if($total_flats != $project->flats):?>
                                            <option value="<?php echo $project->id;?>"><?php echo $project->name;?></option>
                                            <?php endif;?>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="floor" class="control-label"><span class="text-danger">*</span>Floor</label>
                                <input type="text" class="form-control" name="floor" id="floor" value="<?php echo $flat->floor; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('floor'))? form_error('floor'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="stf" class="control-label"><span class="text-danger">*</span>Square Foot</label>
                                <input type="text" class="form-control" name="stf" id="stf"  value="<?php echo $flat->stf; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('stf'))? form_error('stf'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="costs" class="control-label"><span class="text-danger">*</span>Total Costs</label>
                                <input type="text" class="form-control" name="costs" id="costs"  value="<?php echo $flat->costs; ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('costs'))? form_error('costs'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="date" class="control-label">Estimate Start Date</label>
                                <input type="date" class="form-control" name="date" id="date"  value="<?php echo date("Y-m-d", strtotime($flat->flat_ready)); ?>">
                                <div class="help-block with-errors">
                                    <?php echo (form_error('date'))? form_error('date'):''; ?>
                                </div>
                            </div>
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Update Flat</button>
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
