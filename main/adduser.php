<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveuser.php" method="post">
    <center><h4><i class="icon-plus-sign icon-large"></i> Add User</h4></center>
    <hr>
    <div id="ac">
        <span>Full Name: </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>
        <span>Username: </span><input type="text" style="width:265px; height:30px;" name="username" placeholder="Username"/><br>
        <span>Password: </span><input type="password" style="width:265px; height:30px;" name="password" placeholder="Password"/><br>
        <span>Mobile: </span><input type="text" style="width:265px; height:30px;" name="mobile" placeholder="Mobile Number"/><br>
        <span>Role: </span><select name="role" style="width:265px; "class="chzn-select" required>
            <option></option>
            <?php
            include('../connect.php');
            $result = $db->prepare("SELECT * FROM rights ORDER BY ID DESC");
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
                ?>
                <option value="<?php echo $row['rolecode']; ?>"><?php echo $row['rolename']; ?> </option>
                <?php
            }
            ?>
        </select>
        <span>Branch: </span><select name="branch" style="width:265px; "class="chzn-select" required>
            <option></option>
            <?php
            $resultbranches = $db->prepare("SELECT * FROM branches ORDER BY branch_id DESC");
            $resultbranches->execute();
            for ($i = 0; $row = $resultbranches->fetch(); $i++) {
                ?>
                <option value="<?php echo $row['branch_id']; ?>"><?php echo $row['branchname']; ?> </option>
                <?php
            }
            ?>
        </select>
        <div style="float:right; margin-right:10px;">
            <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
        </div>
    </div>
</form>