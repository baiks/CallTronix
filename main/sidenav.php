<?php
$position = $_SESSION['ROLE'];
include_once './Functions.php';
$func = new Functions();
$finalcode = 'RS-' . $func->createRandomPassword() . $_SESSION['SESS_BRANCH_ID'];
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

    .sidebar-nav {
        padding: 9px 0;
    }
    .dropbtn {
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 210px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<div class="well sidebar-nav">
    <ul class="nav nav-list">
        <div class="dropdown">
            <li><a href="index.php?page=Dashboard"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
        </div>
        <div class="dropdown">
            <br><li><i class="icon-group icon-2x"></i>Users</li> 
            <div class="dropdown-content">
                <li><a href="index.php?page=usermanagement"><i class="icon-group icon-1x"></i>System users</a></li> 
            </div>
        </div>
        <br>
        <div class="dropdown">
            <br><li><i class="icon-suitcase icon-2x"></i>Upload File</li> 
            <div class="dropdown-content">
                <li><a href="index.php?page=products"><i class="icon-group icon-1x"></i> Upload File </a></li> 
            </div>
        </div>

    </ul>  
    <div class="hero-unit-clock">
        <form name="clock">
            <input style="width:150px;" type="submit" class="trans" name="face" value="">
        </form>
    </div>
</div><!--/.well -->