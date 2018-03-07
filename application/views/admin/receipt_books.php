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
                        <div class="left">Create Receipt</div>
                        <div class="right">
                            <i class="zmdi zmdi-plus-circle-o"></i>
                        </div>
                    </div>
                    <div id="card-body" class="collapse <?php if(validation_errors()) echo 'show'; ?> card-body">
                        <!-- start fomr -->
                        <form action="<?php echo base_url('admin/create/receipt/book');?>" method="post" enctype="multipart/form-data" id="validator" data-toggle="validator" role="form">
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
                                        <label for="mr_no" class="control-label"><span class="text-danger">*</span>MR No</label>
                                        <input type="text" name="mr_no" id="mr_no" placeholder="money receipt no" value="<?php echo set_value('mr_no'); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="receive_date" class="control-label"><span class="text-danger">*</span>Received Date</label>
                                        <input type="date" name="receive_date" id="receive_date" value="<?php echo date("Y-m-d");?>" class="form-control" required>
                                    </div>
                                    <div class="help-block with-errors">
                                        <?php echo (form_error('receive_date'))? form_error('receive_date'):''; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="on_account_of" class="control-label">On Account Of</label>
                                        <input type="date" name="on_account_of" id="on_account_of" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="payment_by" class="control-label"><span class="text-danger">*</span>Payment By</label>
                                        <select class="form-control" name="payment_by" id="payment_by">
                                            <option value="Cash">Cash</option>
                                            <option value="Bank">Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="receive_amount" class="control-label"><span class="text-danger">*</span>Received Amount</label>
                                        <input type="text" name="receive_amount" id="receive_amount" value="<?php echo set_value('receive_amount'); ?>" class="form-control" required>
                                        
                                    </div>
                                    <div class="help-block with-errors">
                                        <?php echo (form_error('receive_amount'))? form_error('receive_amount'):''; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="check_cash_date" class="control-label"><span class="text-danger">*</span>Cheque/Cash Date</label>
                                        <input type="date" name="check_cash_date" id="check_cash_date" value="<?php echo date("Y-m-d");?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form form-group">
                                        <label for="bank_id" class="control-label">Bank Name</label>
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
                                        <label for="branch_id" class="control-label">Branch Name</label>
                                        <select class="form-control" name="branch_id" id="branch_id">
                                            <option>Select a Branch</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form">
                                <button type="submit" class="btn btn-primary">Add Receipt</button>
                            </div>
                        </form>
                            <!-- end form -->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head full-display">
                        <div class="right">
                            <button id="exportExcel" class="btn btn-default btn-xs">Excel</button>
                            <button id="exportCSV" class="btn btn-default btn-xs">CSV</button>
                            <button id="exportPDF" class="btn btn-default btn-xs">PDF</button>
                            <button id="exportPrint" class="btn btn-default btn-xs">Print</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatables table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="10">
                                            <div class="text-center color-default">
                                                <p class="font-18">Enosis Development Solution</p>
                                                <p>Rokeya Mansion, Level-9, Suit-903,36 Purana Paltan Line, VIP Road, Dhaka-1000</p>
                                                <p>Email: <a href="mailto:hr@enosisltd.com.bd">hr@enosisltd.com.bd</a></p>
                                                <p>Phone: <a href="tel:+880123456789">+880 123 456789</a></p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr><th colspan="10"><p class="font-20 text-center">Receipt Book</p></th></tr>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Date</th>
                                        <th>Name + Flat No + Project Name</th>
                                        <th>M.R</th>
                                        <th>On Account Of</th>
                                        <th>Received Amount</th>
                                        <th>Cash/Cheque + Date of CH/PO/DD</th>
                                        <th>Bank+Branch</th>
                                        <th>Total Amount</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1; $total_received = 0;?>
                                    <?php foreach($receipt_books as $receipt_book):?>
                                        <tr>
                                            <?php if($receipt_book->signature_mark == 'Advanced'):?>
                                                <td></td>
                                            <?php else: ?>
                                                <td><?php echo $id++;?></td>
                                            <?php endif;?>
                                            <td><?php echo date("d-m-Y", strtotime($receipt_book->receive_date));?></td>
                                            <td>
                                                <?php
                                                    $this->db->select('customers.name AS customer_name, flats.name AS flat_name, projects.name AS project_name');
                                                    $this->db->from('flats');
                                                    $this->db->join('customers', 'customers.id = '.$receipt_book->customer_id);
                                                    $this->db->join('projects', 'projects.id = '.$receipt_book->project_id);
                                                    $this->db->where('flats.id', $receipt_book->flat_id);
                                                    $info = $this->db->get()->row();
                                                    echo $info->customer_name.', '.$info->flat_name.', '.$info->project_name;
                                                ?>
                                            </td>
                                            <td><?php echo $receipt_book->mr_no;?></td>
                                            <td><?php echo ($receipt_book->on_account_of)?date("d-m-Y", strtotime($receipt_book->on_account_of)):'-';?></td>
                                            <td><?php echo number_format($receipt_book->receive_amount, 2);?></td>
                                            <td><?php echo $receipt_book->payment_by.', '.date("d-m-Y", strtotime($receipt_book->check_cash_date));?></td>
                                            <td>
                                                <?php if($receipt_book->bank_id){
                                                    $bank = $this->db->get_where('banks', ['id' => $receipt_book->bank_id])->row();
                                                    echo $bank->name;   
                                                    if($receipt_book->branch_id){
                                                        $branch = $this->db->get_where('bank_branches', ['id' => $receipt_book->branch_id])->row();
                                                        echo ', '.$branch->name;   
                                                    }
                                                }else{
                                                    echo "-";   
                                                }?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $total_received += $receipt_book->receive_amount;
                                                    echo number_format($total_received, 2);
                                                ?>
                                            </td>
                                            
                                            <td><?php echo $receipt_book->signature_mark;?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
  </div>

<div id="printArea" class="card hidden">
                    
    <div class="card-body">
        <div class="table-responsive">
            <table id="exportTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="10">
                            <div class="text-center color-default">
                                <p class="font-18">Enosis Development Solution</p>
                                <p>Rokeya Mansion, Level-9, Suit-903,36 Purana Paltan Line, VIP Road, Dhaka-1000</p>
                                <p>Email: <a href="mailto:hr@enosisltd.com.bd">hr@enosisltd.com.bd</a></p>
                                <p>Phone: <a href="tel:+880123456789">+880 123 456789</a></p>
                            </div>
                        </th>
                    </tr>
                    <tr><th colspan="10"><p class="font-20 text-center">Receipt Book</p></th></tr>
                    <tr>
                        <th>Sl No</th>
                        <th>Date</th>
                        <th>Name + Flat No + Project Name</th>
                        <th>M.R</th>
                        <th>On Account Of</th>
                        <th>Received Amount</th>
                        <th>Cash/Cheque + Date of CH/PO/DD</th>
                        <th>Bank+Branch</th>
                        <th>Total Amount</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; $total_received = 0;?>
                    <?php foreach($receipt_books as $receipt_book):?>
                        <tr>
                            <?php if($receipt_book->signature_mark == 'Advanced'):?>
                                <td></td>
                            <?php else: ?>
                                <td><?php echo $id++;?></td>
                            <?php endif;?>
                            <td><?php echo date("d-m-Y", strtotime($receipt_book->receive_date));?></td>
                            <td>
                                <?php
                                    $this->db->select('customers.name AS customer_name, flats.name AS flat_name, projects.name AS project_name');
                                    $this->db->from('flats');
                                    $this->db->join('customers', 'customers.id = '.$receipt_book->customer_id);
                                    $this->db->join('projects', 'projects.id = '.$receipt_book->project_id);
                                    $this->db->where('flats.id', $receipt_book->flat_id);
                                    $info = $this->db->get()->row();
                                    echo $info->customer_name.', '.$info->flat_name.', '.$info->project_name;
                                ?>
                            </td>
                            <td><?php echo $receipt_book->mr_no;?></td>
                            <td><?php echo ($receipt_book->on_account_of)?date("d-m-Y", strtotime($receipt_book->on_account_of)):'-';?></td>
                            <td><?php echo number_format($receipt_book->receive_amount, 2);?></td>
                            <td><?php echo $receipt_book->payment_by.', '.date("d-m-Y", strtotime($receipt_book->check_cash_date));?></td>
                            <td>
                                <?php if($receipt_book->bank_id){
                                    $bank = $this->db->get_where('banks', ['id' => $receipt_book->bank_id])->row();
                                    echo $bank->name;   
                                    if($receipt_book->branch_id){
                                        $branch = $this->db->get_where('bank_branches', ['id' => $receipt_book->branch_id])->row();
                                        echo ', '.$branch->name;   
                                    }
                                }else{
                                    echo "-";   
                                }?>
                            </td>
                            <td>
                                <?php 
                                    $total_received += $receipt_book->receive_amount;
                                    echo number_format($total_received, 2);
                                ?>
                            </td>
                            
                            <td><?php echo $receipt_book->signature_mark;?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

  <!-- end Layout -->


  <!-- script -->
  <?php $this->load->view('admin/partials/footer');?>
  <script>
    
    $('#project_id').on("change", function(){
        var project_id = $(this).val();
        $.ajax({
            url: base_url+"admin/ajax/flats",
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
