<style>
  .nav-itme{margin-top: -10px !important;}
</style>
<div class="sidebar">
  <h1 class="head">Navigation</h1>
  <ul class="navbar-nav">
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'dashboard')?'active':'';?>" href="<?php echo base_url('admin');?>">
        <i class="left zmdi zmdi-home"></i>Dashboard
      </a>
    </li>
  </ul>

  <h1 class="head">Users</h1>
  <ul class="navbar-nav">
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'customers')?'active':'';?>" href="<?php echo base_url('admin/customers');?>">
        <i class="left zmdi zmdi-accounts-outline"></i>Customers
      </a>
    </li>
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'users')?'active':'';?>" href="<?php echo base_url('admin/users');?>">
        <i class="left zmdi zmdi-account-box-o"></i>Users
      </a>
    </li>
  </ul>

  <h1 class="head">Projects</h1>
  <ul class="navbar-nav">
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'projects')?'active':'';?>" href="<?php echo base_url('admin/projects');?>">
        <i class="left zmdi zmdi-balance"></i>Projects
      </a>
    </li>
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'flats')?'active':'';?>" href="<?php echo base_url('admin/flats');?>">
        <i class="left zmdi zmdi-layers"></i>Flats
      </a>
    </li>
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'utilities')?'active':'';?>" href="<?php echo base_url('admin/utilities');?>">
        <i class="left zmdi zmdi-collection-item-9-plus"></i>Utilities
      </a>
    </li>
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'banks')?'active':'';?>" href="<?php echo base_url('admin/banks');?>">
        <i class="left zmdi zmdi-pin-assistant"></i>Banks
      </a>
    </li>
  </ul>

  <h1 class="head">Invoice</h1>
  <ul class="navbar-nav">
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'book_flats')?'active':'';?>" href="<?php echo base_url('admin/invoice/book/flats');?>">
        <i class="left zmdi zmdi-store"></i>Book Flats
      </a>
    </li>
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'sold_flats')?'active':'';?>" href="<?php echo base_url('admin/invoice/sold/flats');?>">
        <i class="left zmdi zmdi-tag-close"></i>Sold Flats
      </a>
    </li>
    <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'receipt_books')?'active':'';?>" href="<?php echo base_url('admin/invoice/receipt/books');?>">
        <i class="left zmdi zmdi-receipt"></i>Receipt Books
      </a>
    </li>
    <!-- <li class="nav-itme">
      <a class="nav-link <?php echo ($active == 'project_invoice')?'active':'';?>" href="<?php echo base_url('admin/invoice/projects');?>">
        <i class="left zmdi zmdi-dialpad"></i>Project Invoice
      </a>
    </li> -->
  </ul>
</div>
 
