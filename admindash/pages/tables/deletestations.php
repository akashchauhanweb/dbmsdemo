<?php
    include("conn.php");
    error_reporting(0);
    if(isset($_POST['delete']))
    {
        $chkarr = $_POST['checkbox'];
        foreach($chkarr as $sid)
        {
            $succ=mysqli_query($conn,"DELETE FROM station WHERE sid=$sid");
        }
        if($succ)
        {?>
            <pre id="info">Delete successful ! Redirecting...</pre>
            <?php
            header( "refresh:3;url=stations.php" );
        }
        else
        {?>
            <pre id="error">Something went wrong. Please try again! Redirecting...</pre><br/>
            <?php
            header( "refresh:3;url=stations.php" );
        }
    }
    if(isset($_POST['update']))
    {
        $chkarr = $_POST['checkbox'];
        unset($_POST);
        foreach($chkarr as $sid)
        {
            $suc=mysqli_query($conn,"SELECT * FROM station WHERE sid=$sid");
            $res=mysqli_fetch_assoc($suc);
            $stt=mysqli_query($conn,"SELECT * FROM command");
            $e=$res['sid'];
            unset($_GLOBAL);
            ?>
            <form method="POST" action="runstations.php">
                <br/>
                <div>
                    StationID : <input type="number" name="sid" id="sid" maxlength="10" value="<?php echo $res['sid'] ?>" readonly="" required><br/><br/>
                    Station Name : <input type="text" name="newsname" id="newsname" maxlength="30" value="<?php echo $res['sname'] ?>" required><br/><br/>
                    Area : <input type="text" name="newarea" id="newarea" maxlength="30" value="<?php echo $res['area'] ?>" required><br/><br/>
                    Command ID : <select name="newcid" style="width:150px;">
                                    <?php 
                                        while ($rows = mysqli_fetch_assoc($stt)) {
                                            $value= $rows['cid'];
                                    ?>
                                    <option value="<?= $value?>"><?= $value?></option>
                                    <?php } ?>
                                    </select><br/><br/>
                </div>
                <?php $_POST['sid']=$e; ?>
                <input type="submit" name="update" id="update" value="Update" class="login100-form-btn" style="width: 150px;">
            </form>
            <?php
        }
    }
    if(isset($_POST['insert']))
    {
        unset($_POST);
        $stt=mysqli_query($conn,"SELECT * FROM command");
        unset($_GLOBAL);
        ?>
        <form method="POST" action="runstations.php">
            <br/>
            <div>
            StationID : <input type="number" name="sid" id="sid" maxlength="10" value="" required><br/><br/>
            Station Name : <input type="text" name="newsname" id="newsname" maxlength="30" value="" required><br/><br/>
            Area : <input type="text" name="newarea" id="newarea" maxlength="30" value="" required><br/><br/>
            Command ID : <select name="newcid" style="width:150px;">
                                <?php 
                                    while ($rows = mysqli_fetch_assoc($stt)) {
                                        $value= $rows['cid'];
                                ?>
                                <option value="<?= $value?>"><?= $value?></option>
                                <?php } ?>
                                </select><br/><br/>
            </div>
            <?php $_POST['sid']=$e; ?>
            <input type="submit" name="insert" id="insert" value="Insert" class="login100-form-btn" style="width: 150px;">
        </form>
        <?php
        
    }
    mysql_close($conn);
?>