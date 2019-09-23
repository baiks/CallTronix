
<link href="css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

<link rel="stylesheet" href="css/font-awesome.min.css">
<style type="text/css">
    body {
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .sidebar-nav {
        padding: 9px 0;
    }
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    $(function () {
        $("#changepass").click(function () {
            if ($("#npassword").val() !== $("#cpassword").val())
            {
                alert("New Password and Confirm password should be the same");
                return false;
            }
        });
    });
</script>



</head>
<body>
    <div class="span10">
        <div class="contentheader">
            <i class="icon-group"></i> Change Password
        </div>
        <ul class="breadcrumb">
            <li><a href="index.php?page=Dashboardhtml">Dashboard</a></li> /
            <li class="active">Users</li>
        </ul>
        <div>
            <form action="savechangepassword.php" method="post">
                <h4><i class="icon-user-md icon-large"></i>Change Password</h4>
                <span>New Password: </span><input type="password" style="width:265px; height:30px;" name="npassword" id="npassword" placeholder="New Password" Required/><br>
                <span>Confirm Password: </span><input type="password" style="width:265px; height:30px;" name="cpassword" id="cpassword" placeholder="Confirm Password"/><br>
                <button class="btn btn-success btn-block btn-large" style="width:267px;" id="changepass"><i class="icon icon-save icon-large"></i> Change</button>
            </form>
            <br>
        </div>
        <div class="clearfix"></div>

    </div>