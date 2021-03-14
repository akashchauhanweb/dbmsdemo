<?php
    include("conn.php");
    if(isset($_POST['update']))
    {
        $newjetid=$_POST['jetid'];
        $newname=$_POST['newname'];
        $newweight=$_POST['newweight'];
        $newmspeed=$_POST['newmspeed'];
        $newempid=$_POST['newempid'];
        $newsid=$_POST['newsid'];
        $query="UPDATE jet SET `name`='$newname', `weight`=$newweight, mspeed=$newmspeed, empid=$newempid, `sid`=$newsid WHERE `jetid`=$newjetid;";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info">Update Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=jets.php" );
        }
        else if($newsname!="")
		{ ?>
		    <pre id="error">Update Aborted! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=jets.php" );
        }
    }
    if(isset($_POST['insert']))
    {
        $newjetid=$_POST['jetid'];
        $newname=$_POST['newname'];
        $newweight=$_POST['newweight'];
        $newmspeed=$_POST['newmspeed'];
        $newempid=$_POST['newempid'];
        $newsid=$_POST['newsid'];
        $query="INSERT INTO jet VALUES($newjetid, '$newname', $newweight, $newmspeed, $newempid, $newsid);";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info">Insert Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=jets.php" );
        }
        else if($newname!="")
		{ ?>
		    <pre id="error">Insert Aborted! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=jets.php" );
        }
    }
?>
