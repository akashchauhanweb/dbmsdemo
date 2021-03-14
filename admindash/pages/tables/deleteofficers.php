<?php
    include("conn.php");
    error_reporting(0);
    if(isset($_POST['delete']))
    {
        $chkarr = $_POST['checkbox'];
        foreach($chkarr as $empid)
        {
            $succ=mysqli_query($conn,"DELETE FROM officer WHERE empid=$empid");
        }
        if($succ)
        {?>
            <pre id="info">Delete successful ! Redirecting...</pre>
            <?php
            header( "refresh:3;url=officers.php" );
        }
        else
        {?>
            <pre id="error">Something went wrong. Please try again! Redirecting...</pre><br/>
            <?php
            header( "refresh:3;url=officers.php" );
        }
    }
    if(isset($_POST['update']))
    {
        $chkarr = $_POST['checkbox'];
        unset($_POST);
        foreach($chkarr as $empid)
        {
            $suc=mysqli_query($conn,"SELECT * FROM officer WHERE empid=$empid");
            $res=mysqli_fetch_assoc($suc);
            $off=mysqli_query($conn,"SELECT * FROM officer");
            $stt=mysqli_query($conn,"SELECT * FROM station");
            $e=$res['empid'];
            unset($_GLOBAL);
            ?>
            <form method="POST" action="runofficers.php">
                <br/>
                <div>
                    EmpID : <input type="number" name="emp" id="emp" maxlength="10" value="<?php echo $res['empid'] ?>" readonly="" required><br/><br/>
                    Name : <input type="text" name="newname" id="newname" maxlength="30" value="<?php echo $res['name'] ?>" required><br/><br/>
                    Age : <input type="number" name="newage" id="newage" maxlength="3" value="<?php echo $res['age'] ?>" required><br/><br/>
                    Rank : <input type="text" name="newrank" id="newrank" maxlength="20" value="<?php echo $res['rank'] ?>" required><br/><br/>
                    Salary : <input type="number" name="newsalary" id="newsalary" maxlength="10" value="<?php echo $res['salary'] ?>" required><br/><br/>
                    Contact :   <input type="number" name="newcontact" id="newcontact" maxlength="10" value="<?php echo $res['contact'] ?>" required><br/><br/>
                    Supervisor ID : <select name="newsuperid" style="width:150px;">
                                    <?php 
                                        while ($rows = mysqli_fetch_assoc($off)) {
                                            $value= $rows['empid'];
                                    ?>
                                    <option value="<?= $value?>"><?= $value?></option>
                                    <?php } ?>
                                    </select><br/><br/>
                    Station ID : <select name="newsid" style="width:150px;">
                                    <?php 
                                        while ($rows = mysqli_fetch_assoc($stt)) {
                                            $value= $rows['sid'];
                                    ?>
                                    <option value="<?= $value?>"><?= $value?></option>
                                    <?php } ?>
                                    </select><br/><br/>
                </div>
                <?php $_POST['emp']=$e; ?>
                <input type="submit" name="update" id="update" value="Update" class="login100-form-btn" style="width: 150px;">
            </form>
            <?php
        }
    }
    if(isset($_POST['insert']))
    {
        unset($_POST);
        $off=mysqli_query($conn,"SELECT * FROM officer");
        $stt=mysqli_query($conn,"SELECT * FROM station");
        unset($_GLOBAL);
        ?>
        <form method="POST" action="runofficers.php">
        <br/>
            <div>
                EmpID : <input type="number" name="emp" id="emp" maxlength="10" value="" required><br/><br/>
                Name : <input type="text" name="newname" id="newname" maxlength="30" value="" required><br/><br/>
                Age : <input type="number" name="newage" id="newage" maxlength="3" value="" required><br/><br/>
                Rank : <input type="text" name="newrank" id="newrank" maxlength="20" value="" required><br/><br/>
                Salary : <input type="number" name="newsalary" id="newsalary" maxlength="10" value="" required><br/><br/>
                Contact :   <input type="number" name="newcontact" id="newcontact" maxlength="10" value="" required><br/><br/>
                Supervisor ID : <select name="newsuperid" style="width:150px;">
                                <?php 
                                    while ($rows = mysqli_fetch_assoc($off)) {
                                        $value= $rows['empid'];
                                ?>
                                <option value="<?= $value?>"><?= $value?></option>
                                <?php } ?>
                                </select><br/><br/>
                Station ID : <select name="newsid" style="width:150px;">
                             <?php 
                                    while ($rows = mysqli_fetch_assoc($stt)) {
                                        $value= $rows['sid'];
                                ?>
                                <option value="<?= $value?>"><?= $value?></option>
                                <?php } ?>
                                </select><br/><br/>
            </div>
            <input type="submit" name="insert" id="insert" value="Insert" class="login100-form-btn" style="width: 150px;">
        </form>
        <?php
        
    }
    mysql_close($conn);
?>