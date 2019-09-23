<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_FIRST_NAME']; ?></strong></a></li>
                    <li><a><i class="icon-home icon-large"></i> Department:<strong> <?php echo $_SESSION['SESS_BRANCH_NAME']; ?></strong></a></li>
                    <li><a> <i class="icon-calendar icon-large"></i>
                            <?php
                            $Today = date('y:m:d', mktime());
                            $new = date('l, F d, Y', strtotime($Today));
                            echo $new;
                            ?>

                        </a></li>
                    <li><a href="index.php?page=ChangePassword"><i class="icon-home icon-large"></i> Change Password</a></li>
                    <li><a href="../logout.php"><i class="icon-home icon-large"></i> Log Out</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<br
