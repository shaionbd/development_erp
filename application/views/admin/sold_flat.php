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
                    <div class="card-head full-display">
                        <div class="right">
                            <button id="exportExcel" class="btn btn-default btn-xs">Excel</button>
                            <button id="exportCSV" class="btn btn-default btn-xs">CSV</button>
                            <button id="exportPDF" class="btn btn-default btn-xs">PDF</button>
                            <button id="exportPrint" class="btn btn-default btn-xs">Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head full-display">
                        <div class="text-center color-default">
                            <p class="font-18">Enosis Development Solution</p>
                            <p>Rokeya Mansion, Level-9, Suit-903,36 Purana Paltan Line, VIP Road, Dhaka-1000</p>
                            <p>Email: <a href="mailto:hr@enosisltd.com.bd">hr@enosisltd.com.bd</a></p>
                            <p>Phone: <a href="tel:+880123456789">+880 123 456789</a></p>
                        </div>
                    </div>
                    <div style="border-top: 1px solid #ddd;" class="card-body">
                        <div class="table-responsive">
                        <table class="datatables table table-bordered">
                            <thead>
                                <tr>
                                    <div class="row" style="padding-bottom: 20px;">
                                        <div class="col-md-4">
                                            <div class="left color-default">
                                                <p class="font-14"><strong>Name of the Customer:</strong> <?php echo $flat_info->customer_name;?></p>
                                                <p class="font-14"><strong>Address:</strong> <?php echo $flat_info->customer_address;?></p>
                                                <p class="font-14"><strong>Phone:</strong> <?php echo $flat_info->customer_phone;?></p>
                                                <p class="font-14"><strong>Passport/NID:</strong> <?php echo $flat_info->customer_nid;?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="font-14"><strong>Project: </strong><?php echo $flat_info->project_name;?></p>
                                            <p class="font-14"><strong>Flat: </strong><?php echo $flat_info->name;?></p>
                                            <p class="font-14"><strong>Floor: </strong><?php echo $flat_info->floor;?></p>
                                            <p class="font-14"><strong>Stf: </strong><?php echo $flat_info->stf;?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="font-14"><strong>Flat Cost(৳):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><?php echo number_format($flat_info->costs, 2);?></p>
                                            <p class="font-14"><strong>Utility Cost(৳):&nbsp;&nbsp;&nbsp;</strong><?php echo number_format($flat_info->utility_costs, 2);?></p>
                                            <p class="font-14"><strong>Discount(৳):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><?php echo number_format($flat_info->discount, 2);?></p>
                                            <p class="font-14"><strong>Total Cost(৳):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><b><?php echo number_format($flat_info->total_costs-$flat_info->discount, 2);?></b></p>
                                        </div>
                                    </div>
                                </tr>
                            </thead>
                            <thead>
                                <tr><p style="border-top: 1px solid #ccc; padding: 20px" class="font-20 text-center">Installment</p></tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Install</th>
                                    <th>Receivable Date</th>
                                    <th>Receivable Amount</th>
                                    <th>Receiving Date</th>
                                    <th>Payment By</th>
                                    <th>Date of CH/PO/DD</th>
                                    <th>Bank</th>
                                    <th>Branch</th>
                                    <th>M.R</th>
                                    <th>Amount Received</th>
                                    <th>Total Received</th>
                                    <th>Balance</th>
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
                                        <td><?php echo number_format($receipt_book->receive_amount, 2);?></td>
                                        <td><?php echo date("d-m-Y", strtotime($receipt_book->receive_date));?></td>
                                        <td><?php echo $receipt_book->payment_by;?></td>
                                        <td><?php echo ($receipt_book->check_cash_date)? date("d-m-Y", strtotime($receipt_book->check_cash_date)):'-';?></td>
                                        <td>
                                            <?php if($receipt_book->bank_id){
                                                $bank = $this->db->get_where('banks', ['id' => $receipt_book->bank_id])->row();
                                                echo $bank->name;   
                                            }else{
                                                echo "-";   
                                            }?>
                                        </td>
                                        <td>
                                        <?php if($receipt_book->branch_id){
                                            $branch = $this->db->get_where('bank_branches', ['id' => $receipt_book->branch_id])->row();
                                            echo $branch->name;   
                                        }else{
                                            echo "-";   
                                        }?>
                                        </td>
                                        <td><?php echo $receipt_book->mr_no;?></td>
                                        <td><?php echo number_format($receipt_book->receive_amount, 2);?></td>
                                        <td>
                                            <?php 
                                                $total_received += $receipt_book->receive_amount;
                                                echo number_format($total_received, 2);
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo number_format(($flat_info->total_costs-$flat_info->discount)-$total_received, 2);?>
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

  <!-- end Layout -->

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
                    <tr>
                    <tr>
                        <th colspan="4">
                            <div class="left color-default">
                                <p class="font-12"><strong>Name of the Customer:</strong> <?php echo $flat_info->customer_name;?></p>
                                <p class="font-12"><strong>Address:</strong> <?php echo $flat_info->customer_address;?></p>
                                <p class="font-12"><strong>Phone:</strong> <?php echo $flat_info->customer_phone;?></p>
                                <p class="font-12"><strong>Passport/NID:</strong> <?php echo $flat_info->customer_nid;?></p>
                            </div>
                        </th>
                        <th colspan="3">
                            <div class="col-md-4 color-default">
                                <p class="font-12"><strong>Project: </strong><?php echo $flat_info->project_name;?></p>
                                <p class="font-12"><strong>Flat: </strong><?php echo $flat_info->name;?></p>
                                <p class="font-12"><strong>Floor: </strong><?php echo $flat_info->floor;?></p>
                                <p class="font-12"><strong>Stf: </strong><?php echo $flat_info->stf;?></p>
                            </div>
                        </th>
                        <th colspan="3">
                            <div class="col-md-4 color-default">
                                <p class="font-12"><strong>Flat Cost(৳):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><?php echo number_format($flat_info->costs, 2);?></p>
                                <p class="font-12"><strong>Utility Cost(৳):&nbsp;</strong><?php echo number_format($flat_info->utility_costs, 2);?></p>
                                <p class="font-12"><strong>Discount(৳):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><?php echo number_format($flat_info->discount, 2);?></p>
                                <p class="font-12"><strong>Total Cost(৳):&nbsp;&nbsp;&nbsp;</strong><b><?php echo number_format($flat_info->total_costs-$flat_info->discount, 2);?></b></p>
                            </div>
                        </th>
                    </tr>
                    <tr><th colspan="10"><p class="font-20 text-center color-default">Installment</p></th></tr>
                    <tr>
                        <th>Ins.</th>
                        <th>Receivable<br>Date</th>
                        <th>Receivable<br>Amount</th>
                        <th>Payment By</th>
                        <th>Date of<br>CH/PO/DD</th>
                        <th>Bank &<br>Branch</th>
                        <th>M.R</th>
                        <th>Amount<br>Received</th>
                        <th>Total<br>Received</th>
                        <th>Balance</th>
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
                            <td><?php echo number_format($receipt_book->receive_amount, 2);?></td>
                            <td><?php echo $receipt_book->payment_by;?></td>
                            <td><?php echo ($receipt_book->check_cash_date)? date("d-m-Y", strtotime($receipt_book->check_cash_date)):'-';?></td>
                            <td>
                                <?php if($receipt_book->bank_id){
                                    $bank = $this->db->get_where('banks', ['id' => $receipt_book->bank_id])->row();
                                    echo $bank->name;   
                                }
                               if($receipt_book->branch_id){
                                    $branch = $this->db->get_where('bank_branches', ['id' => $receipt_book->branch_id])->row();
                                    echo ', '.$branch->name;   
                                }
                                ?>
                            </td>
                            
                            <td><?php echo $receipt_book->mr_no;?></td>
                            <td><?php echo number_format($receipt_book->receive_amount, 2);?></td>
                            <td>
                                <?php 
                                    $total_received += $receipt_book->receive_amount;
                                    echo number_format($total_received, 2);
                                ?>
                            </td>
                            <td>
                                <?php echo number_format(($flat_info->total_costs-$flat_info->discount)-$total_received, 2);?>
                            </td>
                            <td><?php echo $receipt_book->signature_mark;?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


  <!-- script -->
  <?php $this->load->view('admin/partials/footer');?>
</body>
</html>
