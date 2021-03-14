<?php
    include("conn.php");
    if(isset($_POST['update']))
    {
        $e=$_POST['sid'];
        $newsname=$_POST['newsname'];
        $newarea=$_POST['newarea'];
        $newcid=$_POST['newcid'];
        $query="UPDATE station SET `sname`='$newsname', area='$newarea', cid=$newcid WHERE `sid`=$e;";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info">Update Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=stations.php" );
        }
        else if($newsname!="")
		{ ?>
		    <pre id="error">Update Aborted! Redirecting...</pre>
            <?php
            header( "refresh:3;url=stations.php" );
        }
    }
    if(isset($_POST['insert']))
    {
        $e=$_POST['sid'];
        $newsname=$_POST['newsname'];
        $newarea=$_POST['newarea'];
        $newcid=$_POST['newcid'];
        $query="INSERT INTO station VALUES($e,'$newsname','$newarea',$newcid);";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info2">Insert Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=stations.php" );
        }
        else if($newsname!="")
		{ ?>
		    <pre id="error2">Station ID already exists. Please try again ! Redirecting...</pre>
            <?php
            header( "refresh:3;url=stations.php" );
        }
    }
?>
