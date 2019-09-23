<div class="span9">
    <div class="contentheader">
        <i class="icon-dashboard"></i> Dashboard
    </div>
    <ul class="breadcrumb">
        <li class="active">Dashboard</li>
    </ul>
    <font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center>Call Tronix</center></font>
    <div id="mainmain">
        <?php if ($_SESSION['ROLE'] == "admin") { ?>
            <a href="index.php?page=sales&id=cash&invoice=<?php echo "RS-" . $func->createRandomPassword() ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>                          
            <a href="index.php?page=products"><i class="icon-list-alt icon-2x"></i><br> Products</a>      
            <a href="index.php?page=customer"><i class="icon-group icon-2x"></i><br> Customers</a>
            <a href="index.php?page=supplier"><i class="icon-group icon-2x"></i><br> Suppliers</a>     
            <a href="index.php?page=sales_summary"><i class="icon-bar-chart icon-2x"></i><br>Summary Sales Report</a>
            <a href="index.php?page=sales_detailed"><i class="icon-table icon-2x"></i><br>Detailed Sales Report</a> 
        <?php } else if ($_SESSION['ROLE'] == "cashier") { ?>
            <a href="index.php?page=sales&id=cash&invoice=<?php echo "RS-" . $func->createRandomPassword() ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>               
            <a href="index.php?page=products"><i class="icon-list-alt icon-2x"></i><br> Products</a>      
            <a href="index.php?page=supplier"><i class="icon-group icon-2x"></i><br> Suppliers</a>     
            <a href="index.php?page=sales_summary"><i class="icon-bar-chart icon-2x"></i><br>Summary Sales Report</a>
            <a href="index.php?page=sales_detailed"><i class="icon-table icon-2x"></i><br>Detailed Sales Report</a> 
        <?php } ?>
        <div class="clearfix"></div>
    </div>
</div>