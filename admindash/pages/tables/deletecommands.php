<?php
    include("conn.php");
    error_reporting(0);
    if(isset($_POST['delete']))
    {
        $chkarr = $_POST['checkbox'];
        foreach($chkarr as $cid)
        {
            $succ=mysqli_query($conn,"DELETE FROM command WHERE cid=$cid");
        }
        if($succ)
        {?>
            <pre id="info">Delete successful ! Redirecting...</pre>
            <?php
            header( "refresh:3;url=commands.php" );
        }
        else
        {?>
            <pre id="error">Something went wrong. Please try again! Redirecting...</pre><br/>
            <?php
            header( "refresh:3;url=commands.php" );
        }
    }
    if(isset($_POST['update']))
    {
        $chkarr = $_POST['checkbox'];
        unset($_POST);
        foreach($chkarr as $cid)
        {
            $suc=mysqli_query($conn,"SELECT * FROM command WHERE cid=$cid");
            $res=mysqli_fetch_assoc($suc);
            $stt=mysqli_query($conn,"SELECT * FROM officer");
            $e=$res['cid'];
            unset($_GLOBAL);
            ?>
            <form method="POST" action="runcommands.php">
                <br/>
                <div>
                    CommandID : <input type="number" name="cid" id="cid" maxlength="10" value="<?php echo $res['cid'] ?>" readonly="" required><br/><br/>
                    Command Name : <input type="text" name="newcname" id="newcname" maxlength="40" value="<?php echo $res['cname'] ?>" required><br/><br/>
                    Region : <input type="text" name="newregion" id="newregion" maxlength="30" value="<?php echo $res['region'] ?>" required><br/><br/>
                    Commander ID : <select name="newcommanderid" style="width:150px;">
                                    <?php 
                                        while ($rows = mysqli_fetch_assoc($stt)) {
                                            $value= $rows['empid'];
                                    ?>
                                    <option value="<?= $value?>"><?= $value?></option>
                                    <?php } ?>
                                    </select><br/><br/>
                </div>
                <?php $_POST['cid']=$e; ?>
                <input type="submit" name="update" id="update" value="Update" class="login100-form-btn" style="width: 150px;">
            </form>
            <?php
        }
    }
    if(isset($_POST['insert']))
    {
        unset($_POST);
        $stt=mysqli_query($conn,"SELECT * FROM officer");
        unset($_GLOBAL);
        ?>
        <form method="POST" action="runcommands.php">
            <br/>
            <div>
                CommandID : <input type="number" name="newcid" id="newcid" maxlength="10" value="" required><br/><br/>
                Command Name : <input type="text" name="newcname" id="newcname" maxlength="40" value="" required><br/><br/>
                Region : <input type="text" name="newregion" id="newregion" maxlength="30" value="" required><br/><br/>
                Commander ID : <select name="newcommanderid" style="width:150px;">
                                <?php 
                                    while ($rows = mysqli_fetch_assoc($stt)) {
                                        $value= $rows['empid'];
                                ?>
                                <option value="<?= $value?>"><?= $value?></option>
                                <?php } ?>
                                </select><br/><br/>
            </div>
            <?php $_POST['newcid']=$e; ?>
            <input type="submit" name="insert" id="insert" value="Insert" class="login100-form-btn" style="width: 150px;">
        </form>
        <?php
    }
    mysqli_close($conn);
?>