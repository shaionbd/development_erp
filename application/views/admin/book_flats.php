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
                        <div class="left">Book Flat</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/book/flat');?>" method="post" enctype="multipart/form-data" id="validator" data-toggle="validator" role="form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="project_id" class="control-label"><span class="text-danger">*</span>Project</label>
                                        <select class="form-control" name="project_id" id="project_id" required>
                                            <?php foreach($projects as $project):?>
                                            <option value="<?php echo $project->id;?>"><?php echo $project->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="flat_id" class="control-label"><span class="text-danger">*</span>Flat Name</label>
                                        <select class="form-control" name="flat_id" id="flat_id" required>
                                            <option value="">Select a Flat</option>
                                            <?php foreach($flats as $flat):?>
                                                <option value="<?php echo $flat->id;?>"><?php echo $flat->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <div class="help-block with-errors">
                                            <?php echo (form_error('flat_id'))? form_error('flat_id'):''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="customer_id" class="control-label"><span class="text-danger">*</span>Customer Name</label>
                                        <select class="form-control" name="customer_id" id="customer_id" required>
                                            <?php foreach($customers as $customer):?>
                                                <option value="<?php echo $customer->id;?>"><?php echo $customer->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="flat_price" class="control-label">Flat Price</label>
                                        <input type="text" name="flat_price" id="flat_price" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="discount" class="control-label">Discount Price</label>
                                        <input type="text" name="discount" id="discount" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="utilities" class="control-label">Utilities</label>
                                        <select class="select2 form-control" name="utilities[]" multiple="multiple" id="utilities">
                                            <?php foreach($utilities as $utility):?>
                                                <option value="<?php echo $utility->id;?>"><?php echo $utility->name.' - '. $utility->cost;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="advanced_type" class="control-label"></span>Advanced Type</label>
                                        <select class="form-control" name="advanced_type" id="advanced_type">
                                            <option value="Cash">Cash</option>
                                            <option value="Bank">Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="advanced" class="control-label"><span class="text-danger">*</span>Advanced</label>
                                        <input type="text" name="advanced" id="advanced" value="<?php echo set_value('advanced'); ?>" class="form-control" required>
                                        
                                    </div>
                                    <div class="help-block with-errors">
                                        <?php echo (form_error('advanced'))? form_error('advanced'):''; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="advanced_date" class="control-label">Advanced Date</label>
                                        <input type="date" name="advanced_date" id="advanced_date" value="<?php echo date("Y-m-d");?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="advanced_by" class="control-label"><span class="text-danger">*</span>Advanced By</label>
                                        <input type="text" name="advanced_by" id="advanced_by" value="<?php echo set_value('advanced_by'); ?>" class="form-control" required>
                                    </div>
                                    <div class="help-block with-errors">
                                        <?php echo (form_error('advanced_by'))? form_error('advanced_by'):''; ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="bank_id" class="control-label"></span>Bank Name</label>
                                        <select class="form-control" name="bank_id" id="bank_id">
                                            <option >Select a Bank</option>
                                            <?php foreach($banks as $bank):?>
                                                <option value="<?php echo $bank->id;?>"><?php echo $bank->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="branch_id" class="control-label"></span>Branch Name</label>
                                        <select class="form-control" name="branch_id" id="branch_id">
                                            <option>Select a Branch</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="mr_no" class="control-label">MR No</label>
                                        <input type="text" name="mr_no" id="mr_no" placeholder="check no" value="<?php echo set_value('mr_no'); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="total_installment" class="control-label">Total Installment</label>
                                        <input type="number" name="total_installment" id="total_installment" value="<?php echo set_value('total_installment'); ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Book Flat</button>
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
  <script>
    $('#flat_id').on("change", function(){
        var flat_id = $(this).val();
        $.ajax({
            url: base_url+"admin/ajax/flat/",
            type: 'post',
            data: {'id': flat_id},
            success: function(options){
                // console.log(options);
                var flat = JSON.parse(options);
                $('#flat_price').val(flat.costs);
                $('#discount').val(flat.discount);
            }
        });
    });

    $('#project_id').on("change", function(){
        var project_id = $(this).val();
        $.ajax({
            url: base_url+"admin/ajax/unsold/flat",
            type: 'post',
            data: {'id': project_id},
            success: function(options){
                $('#flat_id').html(options);
            }
        });
    });

    $('#bank_id').on("change", function(){
        var bank_id = $(this).val();
        $.ajax({
            url: base_url+"admin/ajax/branch",
            type: 'post',
            data: {'id': bank_id},
            success: function(options){
                $('#branch_id').html(options);
            }
        });
    });
  </script>
</body>
</html>
