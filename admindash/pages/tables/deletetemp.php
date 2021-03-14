<?php
    include("conn.php");
    error_reporting(0);
    if(isset($_POST['delete']))
    {
        $chkarr = $_POST['checkbox'];
        foreach($chkarr as $empid)
        {
            $succ=mysqli_query($conn,"DELETE FROM temp WHERE empid=$empid");
        }
        header("Location:temp.php");
    }
    if(isset($_POST['approve']))
    {
        $chkarr = $_POST['checkbox'];
        unset($_POST);
        foreach($chkarr as $empid)
        {
            $suc=mysqli_query($conn,"SELECT * FROM temp WHERE empid=$empid");
            $res=mysqli_fetch_assoc($suc);
            $off=mysqli_query($conn,"SELECT * FROM officer");
            $stt=mysqli_query($conn,"SELECT * FROM station");
            unset($_GLOBAL);
            ?>
            <form method="POST" action="runtemp.php">
                <br/>
                <div>
                    EmpID : <input type="number" name="emp" id="emp" maxlength="10" value="<?php echo $res['empid'] ?>" readonly="" required><br/><br/>
                    Name : <input type="text" name="newname" id="newname" maxlength="30" value="<?php echo $res['name'] ?>" readonly="" required><br/><br/>
                    Age : <input type="number" name="newage" id="newage" maxlength="3" value="<?php echo $res['age'] ?>" readonly="" required><br/><br/>
                    Rank : <input type="text" name="newrank" id="newrank" maxlength="20" value="" required><br/><br/>
                    Salary : <input type="number" name="newsalary" id="newsalary" maxlength="10" value="<?php echo $res['salary'] ?>" required><br/><br/>
                    Contact :   <input type="number" name="newcontact" id="newcontact" maxlength="10" value="<?php echo $res['contact'] ?>" readonly="" required><br/><br/>
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
                    <input hidden="" name="password" id="password" maxlength="10" value="<?php echo $res['pass'] ?>" readonly="" required><br/><br/>
                </div>
                <?php $_POST['emp']=$e; ?>
                <input type="submit" name="approve" id="approve" value="Approve" class="login100-form-btn" style="width: 150px;">
            </form>
            <?php
        }
    }
    mysql_close($conn);
?>