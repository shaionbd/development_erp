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
                        <div class="left">Edit Customer</div>
                        <div class="right">
                            <i class="zmdi zmdi-edit"></i>
                        </div>
                    </div>
                    <div id="card-body" class="card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/update/customer');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <input type="hidden" name="id" value="<?php echo $customer->id;?>">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="your name" value="<?php echo $customer->name; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="demo@example.com" value="<?php echo $customer->email; ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('email'))? form_error('email'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="permanent_address" class="control-label"><span class="text-danger">*</span>Permanent Address</label>
                                <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3" required><?php echo $customer->permanent_address; ?></textarea>
                                <div class="help-block with-errors">
                                <?php echo (form_error('permanent_address'))? form_error('permanent_address'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="nid_passport" class="control-label"><span class="text-danger">*</span>NID/Passport</label>
                                <input type="text" class="form-control" id="nid_passport" name="nid_passport" placeholder="nid or passport" value="<?php echo $customer->nid_passport ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('nid_passport'))? form_error('nid_passport'):''; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="gender" class="control-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option <?php echo ($customer->gender == 'Male')?'selected':'';?> value="Male">Male</option>
                                            <option <?php echo ($customer->gender == 'Female')?'selected':'';?> value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="marital_status" class="control-label">Marital Status</label>
                                        <select class="form-control" id="marital_status" name="marital_status">
                                            <option <?php echo ($customer->marital_status == 0)?'selected':'';?> value="0">Unmarried</option>
                                            <option <?php echo ($customer->marital_status == 1)?'selected':'';?> value="1">Married</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="phone" class="control-label"><span class="text-danger">*</span>Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="your phone number" value="<?php echo $customer->phone; ?>" required>
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('phone'))? form_error('phone'):''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="father_name" class="control-label">Father's Name</label>
                                        <input type="text" id="father_name" name="father_name" class="form-control" placeholder="your father's name" value="<?php echo $customer->father_name; ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('father_name'))? form_error('father_name'):''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="mother_name" class="control-label">Mother's Name</label>
                                        <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="your mother's name" value="<?php echo $customer->mother_name; ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('mother_name'))? form_error('mother_name'):''; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="husband_wife" class="control-label">Husband/Wife Name</label>
                                        <input type="text" id="husband_wife" name="husband_wife" class="form-control" placeholder="your husband/wife name" value="<?php echo $customer->husband_wife; ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('husband_wife'))? form_error('husband_wife'):''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="job_status" class="control-label"><span class="text-danger">*</span>Job Status</label>
                                <input type="text" id="job_status" name="job_status" class="form-control" placeholder="what do you do?" value="<?php echo $customer->job_status; ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('job_status'))? form_error('job_status'):''; ?>
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
