<div class="nav fixed-top">
    <!-- navbar left -->
    <div class="nav-left">
    <a href="index.html" class="brand">Amun</a>
    </div>
    <!-- navbar right -->
    <div class="nav-right">
    <div class="left">
        <a id="NavBtn" href="#" class="btn btn-link">
        <i class="zmdi zmdi-menu"></i>
        </a>
        <div class="search input-group">
        <a href="" class="btn input-group-addon"><i class="zmdi zmdi-search"></i></a>
        <input type="text" placeholder="search">
        </div>
    </div>
    <div class="right">
        <div class="user dropdown">
            <a href="#" class="btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $admin->name;?></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo base_url('admin/try/logout');?>"><i class="zmdi zmdi-input-power"></i>log out</a>
            </div>
        </div>  
    </div>
    </div>
</div>