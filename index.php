<?php
//Start session
session_start();

//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
unset($_SESSION['SESS_USERNAME']);
?>
<html>
    <head>
        <title>
            CallTronix
        </title>
        <link rel="shortcut icon" href="main/images/favicon.ico">
        <link href="main/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
        <link rel="stylesheet" href="main/css/font-awesome.min.css">
        <script src="main/js/sweetalert.min.js"></script>
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <link href="main/css/bootstrap-responsive.css" rel="stylesheet">

        <link href="style.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4">
                </div>
            </div>
            <div id="login">
                <form action="login.php" autocomplete="off" method="post">
                    <font style=" font:bold 30px 'Aleo'; text-shadow:1px 1px 15px #000; color:#fff;"><center>Call Tronix</center></font>
                    <br>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px;" type="text" name="username" Placeholder="Username" autocomplete="off" required/><br>
                    </div>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px;" name="password" Placeholder="Password" autocomplete="off" required/><br>
                    </div>
                    <div class="qwe">
                        <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button>
                        <br></br>
                        <?php
                        if (isset($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
                            foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                                echo '<div style="color: red; text-align: center;">', $msg, '</div><br>';
                            }
                            unset($_SESSION['ERRMSG_ARR']);
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>