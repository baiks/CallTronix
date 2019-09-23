<?php
include('../connect.php');
?>
<link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="datatables/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="tcal.css" />
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css" class="init">
    body {
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .sidebar-nav {
        padding: 9px 0;
    }
</style>
<script type="text/javascript" language="javascript" src="datatables/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="tcal.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            scrollX: true,
            //scrollCollapse: true,
            paging: true,
            "pageLength": 20,
            fixedColumns: true
        });
    });
    $(function () {
        $(".delbutton").click(function () {
            //Save the link in a variable calle          d element
            var element = $(this);
            //Find the id of the link that wa          s clicked
            var del_id = element.attr("id");
            //Built a ur          l to send
            var info = 'id=' + del_id;
            if (confirm("Are you sure want to delete? There is NO undo!"))
            {
                $.ajax({
                    type: "GET",
                    url: "deleteuser.php",
                    data: info,
                    success: function () {
                        alert("User deleted successfully");
                    }
                });
                $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
                        .animate({
                            opacity: "hide"}, "slow");
            }

            return false;
        });
    });
</script>
<div class="span10">
    <div class="contentheader">
        <i class="icon-group"></i> User Management
    </div>
    <ul class="breadcrumb">
        <li><a href="index.php?page=Dashboardhtml">Dashboard</a></li> /
        <li class="active">Users</li>
    </ul>

    <div style="margin-top: -19px; margin-bottom: 21px;">
        <a  href="index.php?page=Dashboardhtml"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
        <?php
        $sessionuser = $_SESSION['SESS_FIRST_NAME'];
        $result = $db->prepare("SELECT * FROM user WHERE deleted='0' and username<>'$sessionuser' ORDER BY id DESC");
        $result->execute();
        $rowcount = $result->rowcount();
        ?>
        <div style="text-align:center;">
            Total Number of Users: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount; ?></font>
        </div>
    </div>
    <a rel="facebox" href="adduser.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add User</button></a><br><br>

    <table id="datatable" class="display wrap" style="width:100%">
        <thead>
            <tr>
                <th> Full Name </th>
                <th> Username </th>
                <th> Rights</th>
                <th> Mobile</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $result = $db->prepare("SELECT * FROM user WHERE deleted='0' and username<>'$sessionuser' ORDER BY id DESC");
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
                ?>
                <tr class="record">
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><a  title="Click To Edit User" rel="facebox" href="edituser.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
                        <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
                </tr>
                <?php
            }
            ?>

        </tbody>
        <tfoot>
            <tr>
                <th> Full Name </th>
                <th> Username </th>
                <th> Rights</th>
                <th> Mobile</th>
                <th>Edit/Delete</th>
            </tr>
        </tfoot>
    </table>
    <div class="clearfix"></div>

</div>
