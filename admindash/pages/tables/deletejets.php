<?php
    include("conn.php");
    error_reporting(0);
    if(isset($_POST['delete']))
    {
        $chkarr = $_POST['checkbox'];
        foreach($chkarr as $jetid)
        {
            $succ=mysqli_query($conn,"DELETE FROM jet WHERE jetid=$jetid");
        }
        if($succ)
        {?>
            <pre id="info">Delete successful ! Redirecting...</pre>
            <?php
            header( "refresh:3;url=jets.php" );
        }
        else
        {?>
            <pre id="error">Something went wrong. Please try again! Redirecting...</pre><br/>
            <?php
            header( "refresh:3;url=jets.php" );
        }
    }
    if(isset($_POST['update']))
    {
        $chkarr = $_POST['checkbox'];
        unset($_POST);
        foreach($chkarr as $jetid)
        {
            $suc=mysqli_query($conn,"SELECT * FROM jet WHERE jetid=$jetid");
            $res=mysqli_fetch_assoc($suc);
            $stt=mysqli_query($conn,"SELECT * FROM officer");
            $sto=mysqli_query($conn,"SELECT * FROM station");
            $e=$res['jetid'];
            unset($_GLOBAL);
            ?>
            <form method="POST" action="runjets.php">
                <br/>
                <div>
                    JetID : <input type="number" name="jetid" id="jetid" maxlength="10" value="<?php echo $res['jetid'] ?>" readonly="" required><br/><br/>
                    Jet Name : <input type="text" name="newname" id="newname" maxlength="30" value="<?php echo $res['name'] ?>" required><br/><br/>
                    Weight : <input type="number" name="newweight" id="newweight" maxlength="5" value="<?php echo $res['weight'] ?>" required><br/><br/>
                    Max Speed : <input type="number" name="newmspeed" id="newmspeed" maxlength="5" value="<?php echo $res['mspeed'] ?>" required><br/><br/>
                    Flying Officer ID : <select name="newempid" style="width:150px;">
                                    <?php 
                                        while ($rows = mysqli_fetch_assoc($stt)) {
                                            $value= $rows['empid'];
                                    ?>
                                    <option value="<?= $value?>"><?= $value?></option>
                                    <?php } ?>
                                    </select><br/><br/>
                    Station ID : <select name="newsid" style="width:150px;">
                                    <?php 
                                        while ($rows = mysqli_fetch_assoc($sto)) {
                                            $value= $rows['sid'];
                                    ?>
                                    <option value="<?= $value?>"><?= $value?></option>
                                    <?php } ?>
                                    </select><br/><br/>
                </div>
                <?php $_POST['jetid']=$e; ?>
                <input type="submit" name="update" id="update" value="Update" class="login100-form-btn" style="width: 150px;">
            </form>
            <?php
        }
    }
    if(isset($_POST['insert']))
    {
        unset($_POST);
        $stt=mysqli_query($conn,"SELECT * FROM officer");
        $sto=mysqli_query($conn,"SELECT * FROM station");
        unset($_GLOBAL);
        ?>
        <form method="POST" action="runjets.php">
            <br/>
            <div>
                JetID : <input type="number" name="jetid" id="jetid" maxlength="10" value="" required><br/><br/>
                Jet Name : <input type="text" name="newname" id="newname" maxlength="30" value="" required><br/><br/>
                Weight : <input type="number" name="newweight" id="newweight" maxlength="5" value="" required><br/><br/>
                Max Speed : <input type="number" name="newmspeed" id="newmspeed" maxlength="5" value="" required><br/><br/>
                Flying Officer ID : <select name="newempid" style="width:150px;">
                                <?php 
                                    while ($rows = mysqli_fetch_assoc($stt)) {
                                        $value= $rows['empid'];
                                ?>
                                <option value="<?= $value?>"><?= $value?></option>
                                <?php } ?>
                                </select><br/><br/>
                Station ID : <select name="newsid" style="width:150px;">
                                <?php 
                                    while ($rows = mysqli_fetch_assoc($sto)) {
                                        $value= $rows['sid'];
                                ?>
                                <option value="<?= $value?>"><?= $value?></option>
                                <?php } ?>
                                </select><br/><br/>
            </div>
            <?php $_POST['jetid']=$e; ?>
            <input type="submit" name="insert" id="insert" value="Insert" class="login100-form-btn" style="width: 150px;">
        </form>
        <?php
    }
    mysqli_close($conn);
?>