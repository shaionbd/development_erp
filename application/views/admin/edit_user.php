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
                        <form action="<?php echo base_url('admin/update/user');?>" method="post" id="validator" data-toggle="validator" role="form">
                            <input type="hidden" name="id" value="<?php echo $user->id;?>">
                            <div class="form form-group">
                                <label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="your name" value="<?php echo $user->name; ?>" required>
                                <div class="help-block with-errors">
                                    <?php echo (form_error('name'))? form_error('name'):''; ?>
                                </div>
                            </div>
                            <div class="form form-group has-feedback">
                                <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="demo@example.com" value="<?php echo $user->email; ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('email'))? form_error('email'):''; ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="role" class="control-label">Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option <?php echo ($user->role == 0)? 'selected':'';?> value="0">Super Admin</option>
                                            <option <?php echo ($user->role == 1)? 'selected':'';?> value="1">Admin</option>
                                            <option <?php echo ($user->role == 2)? 'selected':'';?> value="2">Manager</option>
                                            <option <?php echo ($user->role == 3)? 'selected':'';?> value="3">Executive</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="phone" class="control-label"><span class="text-danger">*</span>Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="your phone number" value="<?php echo $user->phone; ?>" required>
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('phone'))? form_error('phone'):''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="enter your password" value="<?php echo set_value('password'); ?>">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('password'))? form_error('password'):''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="passconf" class="control-label">Confirm Password</label>
                                        <input type="text" id="passconf" name="passconf" class="form-control" placeholder="confirm your password">
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('passconf'))? form_error('passconf'):''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="designation" class="control-label">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control" placeholder="what do you do?" value="<?php echo $user->designation; ?>" required>
                                <div class="help-block with-errors">
                                <?php echo (form_error('designation'))? form_error('designation'):''; ?>
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
