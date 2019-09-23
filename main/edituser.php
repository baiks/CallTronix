<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM user WHERE id= :id");
$result->bindParam(':id', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    ?>
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <form action="saveedituser.php" method="post">
        <center><h4><i class="icon-plus-sign icon-large"></i>Edit User</h4></center>
        <hr>
        <div id="ac">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <span>Full Name: </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['name']; ?>" placeholder="Full Name" Required/><br>
            <span>Username: </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" Required/><br>
            <span>Password: </span><input type="password" style="width:265px; height:30px;" name="password" value="<?php echo openssl_decrypt($row['password'], "AES-128-ECB", "baiksoft"); ?>" placeholder="Password" Required/><br>
            <span>Mobile: </span><input type="text" style="width:265px; height:30px;" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Mobile Number" Required/><br>
            <span>Role: </span><select name="role" style="width:265px; "class="chzn-select" required>
                <option value="<?php echo $row['position']; ?>" selected><?php echo $row["position"]; ?> </option>
                <?php
                $query = "SELECT * FROM rights WHERE rolecode<>" . "'" . $row["position"] . "'" . " ORDER BY ID DESC";
                $result = $db->prepare($query);
                $result->execute();
                for ($i = 0; $row = $result->fetch(); $i++) {
                    ?>
                    <option value="<?php echo $row['rolecode']; ?>"><?php echo $row['rolename']; ?> </option>
                    <?php
                }
                ?>
            </select>
            <div style="float:right; margin-right:10px;">
                <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
            </div>
        </div>
    </form>
    <?php
}
?>