<?php
    include("conn.php");
    if(isset($_POST['update']))
    {
        $e=$_POST['cid'];
        $newcname=$_POST['newcname'];
        $newregion=$_POST['newregion'];
        $newcommanderid=$_POST['newcommanderid'];
        $query="UPDATE command SET cname='$newcname', region='$newregion', commanderid=$newcommanderid WHERE cid=$e;";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info">Update Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=commands.php" );
        }
        else if($newcname!="")
		{ ?>
		    <pre id="error">Update Aborted! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=commands.php" );
        }
    }
    if(isset($_POST['insert']))
    {
        $newcid=$_POST['newcid'];
        $newcname=$_POST['newcname'];
        $newregion=$_POST['newregion'];
        $newcommanderid=$_POST['newcommanderid'];
        $query="INSERT INTO command VALUES($newcid,'$newcname','$newregion',$newcommanderid);";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info2">Insert Successful! Redirecting...</pre>
            <?php
            header( "refresh:3;url=commands.php" );
        }
        else if($newcname!="")
		{ ?>
		    <pre id="error2">Command ID already exists. Please try again! Redirecting...</pre>
            <?php
            header( "refresh:3;url=commands.php" );
        }
    }
?>
