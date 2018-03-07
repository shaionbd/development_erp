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
                        <div class="left">Add New User</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="collapse <?php if(validation_errors()) echo 'show'; ?> card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/user');?>" method="post" id="validator" data-toggle="validator" role="form">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="role" class="control-label">Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="0">Super Admin</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Manager</option>
                                            <option value="3">Executive</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="enter your password" value="<?php echo set_value('password'); ?>" required>
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('password'))? form_error('password'):''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="passconf" class="control-label">Confirm Password</label>
                                        <input type="text" id="passconf" name="passconf" class="form-control" placeholder="confirm your password" required>
                                        <div class="help-block with-errors">
                                        <?php echo (form_error('passconf'))? form_error('passconf'):''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form form-group">
                                <label for="designation" class="control-label">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control" placeholder="designation" value="<?php echo set_value('job_status'); ?>">
                                <div class="help-block with-errors">
                                <?php echo (form_error('designation'))? form_error('designation'):''; ?>
                                </div>
                            </div>
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Add User</button>
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
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Designation</th>
                                    <th width="80"><i class="zmdi zmdi-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user):?>
                                    <tr>
                                        <td><?php echo $user->name;?></td>
                                        <td><?php echo $user->email;?></td>
                                        <td><?php echo $user->phone;?></td>
                                        <td>
                                            <?php if($user->role == 0):?>
                                                Super Admin
                                            <?php elseif($user->role == 1):?>
                                                Admin
                                            <?php elseif($user->role == 2):?>
                                                Manager
                                            <?php elseif($user->role == 3):?>
                                                Executive
                                            <?php endif;?>
                                        </td>
                                        <td><?php echo $user->designation;?></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/edit/user/'.$user->id);?>" class="btn btn-sm btn-primary text-center"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="<?php echo base_url('admin/delete/user/'.$user->id);?>" class="btn btn-sm btn-danger text-center"><i class="zmdi zmdi-delete"></i></a>
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
