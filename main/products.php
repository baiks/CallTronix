<html>
    <head>
        <title>
            Call Tronix
        </title>
        <link rel="shortcut icon" href="images/favicon.ico">
        <?php
        require_once('auth.php');
        ?>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="tcal.js"></script>
        <script src="facebox/facebox.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            jQuery(document).ready(function ($) {
                $('a[rel*=facebox]').facebox({
                    loadingImage: 'facebox/loading.gif',
                    closeImage: 'facebox/closelabel.png'
                });
            });
        </script>
    </head>
    <body>


        <div class="span10">
            <div class="contentheader">
                <i class="icon-table"></i> Upload JSON
            </div>
            <ul class="breadcrumb">
                <li><a href="index.php?page=Dashboard">Dashboard</a></li> /
                <li class="active">Upload JSON</li>
            </ul>


            <div style="margin-top: -19px; margin-bottom: 21px;">
                <a  href="index.php?page=Dashboard"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
                <?php
                include('../connect.php');
                $result = $db->prepare("SELECT * FROM interviewreport ORDER BY ID DESC");
                $result->execute();
                $rowcount = $result->rowcount();
                ?>

                <div style="text-align:center;">
                    Total Number of Records:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount; ?>]</font>
                </div>
            </div>
            <br><br>
            <form action="index.php?page=products" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="btn btn-info" style="width:230px; height:35px;" required>
                <Button type="submit" name="upload" id="upload" class="btn btn-info" style="width:230px; height:35px;" /><i class="icon-upload icon-large"></i>Upload JSON File</button>
            </form>
            <?php
            //Upload products start
            if (isset($_POST['upload'])) {
                $file = $_FILES['file']['tmp_name'];
                $filename = $_FILES['file']['name'];
                if ($_FILES['file']['type'] != "application/json") {
                    echo "<script>alert('Please select a valid file');</script>";
                    exit();
                } else if (!empty($file)) {
                    $fp = fopen($file, "r");
                    $line = "";
                    while (!feof($fp)) {
                        $line = $line . fgets($fp);
                    }
                    fclose($fp);

                    $data = json_decode($line);

                    //print_r($data) . "<br>";
//                    $Report = $data[1]->Report[0]->ticketID;
//
//                    echo sizeof($data[1]->Report);
//                    exit();
                    for ($i = 0; $i < sizeof($data[1]->Report); $i++) {
                        //Check if file already uploaded
                        $qry = "SELECT * FROM interviewreport WHERE ticketID=" . $data[1]->Report[$i]->ticketID;
                        $result = $db->prepare($qry);
                        $result->execute();
                        $row = $result->fetch();
                        if (count($row) > 1) {
                            //if exists do nothing
                        } else {
                            $sql = "INSERT INTO interviewreport (ticketID,clientName,mobileNo,contactType,callType,sourceName,storeName,questionType,questionSubType,dispositionName,dateCreated )"
                                    . " VALUES (:ticketID,:clientName,:mobileNo,:contactType,:callType,:sourceName,:storeName,:questionType,:questionSubType,:dispositionName,:dateCreated )";
                            $q = $db->prepare($sql);
                            $completed = $q->execute(array(':ticketID' => $data[1]->Report[$i]->ticketID, ':clientName' => $data[1]->Report[$i]->clientName, ':mobileNo' => $data[1]->Report[$i]->mobileNo,
                                ':contactType' => $data[1]->Report[$i]->contactType, ':callType' => $data[1]->Report[$i]->callType, ':sourceName' => $data[1]->Report[$i]->sourceName, ':storeName' => $data[1]->Report[$i]->storeName, ':questionType' => $data[1]->Report[$i]->questionType,
                                ':questionSubType' => $data[1]->Report[$i]->questionSubType, ':dispositionName' => $data[1]->Report[$i]->dispositionName, ':dateCreated' => $data[1]->Report[$i]->dateCreated));
                        }
                    }



                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "<script>alert('Please select a valid file');</script>";
                }
            }
            //upload products end
            ?>
            <table class="hoverTable" id="datatable" style="text-align: left;">
                <thead>
                    <tr>
                        <th width="14%"> ticketID</th>
                        <th width="14%"> clientName </th>
                        <th width="13%"> mobileNo</th>
                        <th width="7%"> contactType </th>
                        <th width="9%"> callType </th>
                        <th width="10%"> sourceName </th>
                        <th width="6%"> storeName </th>
                        <th width="6%"> questionType </th>
                        <th width="6%"> questionSubType </th>
                        <th width="5%"> dispositionName </th>
                        <th width="8%"> dateCreated </th>
                    </tr>
                </thead>
                <tbody>

                    <?php for ($i = 0; $row = $result->fetch(); $i++) { ?>
                    <td><?php echo $row['ticketID']; ?></td>
                    <td><?php echo $row['clientName']; ?></td>
                    <td><?php echo $row['mobileNo']; ?></td>
                    <td><?php echo $row['contactType']; ?></td>
                    <td><?php echo $row['callType']; ?></td>
                    <td><?php echo $row['sourceName']; ?></td>
                    <td><?php echo $row['storeName']; ?></td>
                    <td><?php echo $row['questionType']; ?></td>
                    <td><?php echo $row['questionSubType']; ?></td>
                    <td><?php echo $row['dispositionName']; ?></td>
                    <td><?php echo $row['dateCreated']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th width="14%"> ticketID</th>
                        <th width="14%"> clientName </th>
                        <th width="13%"> mobileNo</th>
                        <th width="7%"> contactType </th>
                        <th width="9%"> callType </th>
                        <th width="10%"> sourceName </th>
                        <th width="6%"> storeName </th>
                        <th width="6%"> questionType </th>
                        <th width="6%"> questionSubType </th>
                        <th width="5%"> dispositionName </th>
                        <th width="8%"> dateCreated </th>
                    </tr>
                </tfoot>
            </table>
            <div class="clearfix"></div>
        </div>
</html>