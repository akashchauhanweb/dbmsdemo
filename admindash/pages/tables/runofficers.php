<?php
    include("conn.php");
    if(isset($_POST['update']))
    {
        $e=$_POST['emp'];
        $newname=$_POST['newname'];
        $newage=$_POST['newage'];
        $newrank=$_POST['newrank'];
        $newsalary=$_POST['newsalary'];
        $newcontact=$_POST['newcontact'];
        $newsuperid=$_POST['newsuperid'];
        $newsid=$_POST['newsid'];
        $query="UPDATE officer SET `name`='$newname', age=$newage, `rank`='$newrank', salary=$newsalary, contact=$newcontact, superid=$newsuperid, `sid`=$newsid WHERE empid=$e;";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info">Update Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=officers.php" );
        }
        else if($newname!="")
		{ ?>
		    <pre id="error">Update Aborted! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=officers.php" );
        }
    }
    if(isset($_POST['insert']))
    {
        $e=$_POST['emp'];
        $newname=$_POST['newname'];
        $newage=$_POST['newage'];
        $newrank=$_POST['newrank'];
        $newsalary=$_POST['newsalary'];
        $newcontact=$_POST['newcontact'];
        $newsuperid=$_POST['newsuperid'];
        $newsid=$_POST['newsid'];
        $query="INSERT INTO officer VALUES ($e, '$newname', $newage, '$newrank', $newsalary, $newcontact, $newsuperid, $newsid);";
        $sql=mysqli_query($conn,$query);
        unset($_GLOBAL);
        if($sql)
        {               
            ?>
            <pre id="info2">Insert Successfull! Redirecting...</pre>
		    <?php
            header( "refresh:3;url=officers.php" );
        }
        else if($newname!="")
		{ ?>
		    <pre id="error2">Employee ID already exists. Please try again! Redirecting....</pre>
            <?php
            header( "refresh:3;url=officers.php" );
        }
    }
?>
