<?php
//Start session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Call Tronix
        </title>
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="css/bootstrap.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <style type="text/css">

            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="facebox/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('a[rel*=facebox]').facebox({
                    loadingImage: 'facebox/loading.gif',
                    closeImage: 'facebox/closelabel.png'
                });
            });
        </script>
        <script language="javascript" type="text/javascript">
            /* Visit http://www.yaldex.com/ for full source code
             and get more free JavaScript, CSS and DHTML scripts! */

            var timerID = null;
            var timerRunning = false;
            function stopclock() {
                if (timerRunning)
                    clearTimeout(timerID);
                timerRunning = false;
            }
            function showtime() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds()
                var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
                if (timeValue == "0")
                    timeValue = 12;
                timeValue += ((minutes < 10) ? ":0" : ":") + minutes
                timeValue += ((seconds < 10) ? ":0" : ":") + seconds
                timeValue += (hours >= 12) ? " P.M." : " A.M."
                document.clock.face.value = timeValue;
                timerID = setTimeout("showtime()", 1000);
                timerRunning = true;
            }
            function startclock() {
                stopclock();
                showtime();
            }
            window.onload = startclock;
            // End -->
        </SCRIPT>	
    </head>
    <body>
        <?php
        if (isset($_SESSION['logged_in'])) { //If user is logged in
            if ($_SESSION['last_activity'] < time() - $_SESSION['expire_time']) { //have we expired?
                echo "<script>alert('Session has timed out. Please open shamborina.co.ke and supply your login credentials.')</script>";
                header("Location: ../logout.php");
                die();
            } else { //if we haven't expired:
                $_SESSION['last_activity'] = time(); //this was the moment of last activity.
            }
        } else {
            echo "<script>alert('Session has timed out. Please open shamborina.co.ke and supply your login credentials.')</script>";
            header("Location: ../logout.php");
            die();
        }
        include('./navfixed.php');
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <?php include('./sidenav.php'); ?>
                </div><!--/span-->

                <?php
                include('./controller.php');
                $route = new controller();
                $route->route($_GET["page"]);
                ?>

            </div>
        </div>
    </body>
    <?php include('footer.php'); ?>
</html>
