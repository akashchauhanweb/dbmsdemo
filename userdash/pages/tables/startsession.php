<?php
    if(isset($_POST['login']))
    {
        include("conn.php");
        error_reporting(0);
        $empid=$_POST['username'];
        $succ=mysqli_query($conn,"SELECT * FROM officer WHERE empid=$empid");
        $res=mysqli_fetch_assoc($succ);
        $sid=$res['sid'];
        $stt=mysqli_query($conn,"SELECT * FROM station WHERE `sid`=$sid");
        $sres=mysqli_fetch_assoc($stt);
        $superid=$res['superid'];
        $sup=mysqli_query($conn,"SELECT * FROM officer WHERE `superid`=$superid");
        $srs=mysqli_fetch_assoc($sup);
        $cid=$sres['cid'];
        $com=mysqli_query($conn,"SELECT * FROM command WHERE `cid`=$cid");
        $comm=mysqli_fetch_assoc($com);
        $_SESSION['empid']=$res['empid'];
        $_SESSION['name']=$res['name'];
        $_SESSION['age']=$res['age'];
        $_SESSION['rank']=$res['rank'];
        $_SESSION['salary']=$res['salary'];
        $_SESSION['contact']=$res['contact'];
        $_SESSION['supername']=$srs['name'];
        $_SESSION['sname']=$sres['sname'];
        $_SESSION['cname']=$comm['cname'];
        session_start();
    }
?>