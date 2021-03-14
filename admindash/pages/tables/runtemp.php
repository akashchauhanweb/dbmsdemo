<?php
    include("conn.php");
    if(isset($_POST['approve']))
    {
        $e=$_POST['emp'];
        $newname=$_POST['newname'];
        $newage=$_POST['newage'];
        $newrank=$_POST['newrank'];
        $newsalary=$_POST['newsalary'];
        $newcontact=$_POST['newcontact'];
        $newsuperid=$_POST['newsuperid'];
        $newsid=$_POST['newsid'];
        $pass=$_POST['password'];
        $query="INSERT INTO officer VALUES ($e, '$newname', $newage, '$newrank', $newsalary, $newcontact, $newsuperid, $newsid);";
        $trig="INSERT INTO offusrpass VALUES($e, '$pass');";
        $del="DELETE FROM temp WHERE empid=$e;";
        $sql=mysqli_query($conn,$query);
        $trigg=mysqli_query($conn,$trig);
        $dell=mysqli_query($conn,$del);
        unset($_GLOBAL);
        if($sql && $trigg)
        {               
            ?>
            <pre id="info">Update Successfull! Triggered User ID and password !</pre>
		    <script>
 		        setTimeout(function(){
		            document.getElementById('info').style.display = 'none'}, 5000);
            </script>
		    <?php
            header("Location:officers.php");
        }
        else if($newname!="")
		{ ?>
		    <pre id="error">Update Aborted and didn't trigger!</pre>
		        <script>
 		            setTimeout(function(){
   		                document.getElementById('error').style.display = 'none'}, 5000);
		        </script>
		    <?php
        }
    }
?>
