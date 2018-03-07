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
                        <div class="left">Add New Customer</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="collapse <?php if(validation_errors()) echo 'show'; ?> card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/customer');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="your name" value="<?php echo set_value('name'); ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="demo@example.com" value="<?php echo set_value('email'); ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('email'))? form_error('email'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="permanent_address" class="control-label"><span class="text-danger">*</span>Permanent Address</label>
                                <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3" required><?php echo set_value('permanent_address'); ?></textarea>
                                <div class="help-block with-errors">
                                <?php echo (form_error('permanent_address'))? form_error('permanent_address'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="nid_passport" class="control-label"><span class="text-danger">*</span>NID/Passport</label>
                                <input type="text" class="form-control" id="nid_passport" name="nid_passport" placeholder="nid or passport" value="<?php echo set_value('nid_passport'); ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('nid_passport'))? form_error('nid_passport'):''; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="gender" class="control-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="marital_status" class="control-label">Marital Status</label>
                                        <select class="form-control" id="marital_status" name="marital_status">
                                            <option value="0">Unmarried</option>
                                            <option value="1">Married</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="phone" class="control-label"><span class="text-danger">*</span>Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="your phone number" value="<?php echo set_value('phone'); ?>" required>
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
                                        <input type="text" id="father_name" name="father_name" class="form-control" placeholder="your father's name" value="<?php echo set_value('father_name'); ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('father_name'))? form_error('father_name'):''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="mother_name" class="control-label">Mother's Name</label>
                                        <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="your mother's name" value="<?php echo set_value('mother_name'); ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('mother_name'))? form_error('mother_name'):''; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="husband_wife" class="control-label">Husband/Wife Name</label>
                                        <input type="text" id="husband_wife" name="husband_wife" class="form-control" placeholder="your husband/wife name" value="<?php echo set_value('husband_wife'); ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('husband_wife'))? form_error('husband_wife'):''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="job_status" class="control-label"><span class="text-danger">*</span>Job Status</label>
                                <input type="text" id="job_status" name="job_status" class="form-control" placeholder="what do you do?" value="<?php echo set_value('job_status'); ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('job_status'))? form_error('job_status'):''; ?>
                                </div>
                            </div>
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Add Customer</button>
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
                                    <th>Email</th>
                                    <th>Permanent Address</th>
                                    <th>Phone</th>
                                    <th>NID/Passport</th>
                                    <th>Gender</th>
                                    <th>Marital Status</th>
                                    <th>Job Info</th>
                                    <th width="80"><i class="zmdi zmdi-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($customers as $customer):?>
                                    <tr>
                                        <td><?php echo $customer->name;?></td>
                                        <td><?php echo $customer->email;?></td>
                                        <td><?php echo $customer->permanent_address;?></td>
                                        <td><?php echo $customer->phone;?></td>
                                        <td><?php echo $customer->nid_passport;?></td>
                                        <td><?php echo $customer->gender;?></td>
                                        <td><?php echo ($customer->marital_status)?'Married':'Unmarried';?></td>
                                        <td><?php echo $customer->job_status;?></td>
                                        <td>
                                        <!-- <a href="<?php echo base_url('admin/customer/'.$customer->id);?>" class="btn btn-sm btn-info text-center"><i class="zmdi zmdi-eye"></i></a> -->
                                        <a href="<?php echo base_url('admin/edit/customer/'.$customer->id);?>" class="btn btn-sm btn-primary text-center"><i class="zmdi zmdi-edit"></i></a>
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
