<?php
$dbname = $_POST['dbname'];
$dbpasswd = $_POST['dbpasswd'];
$dbuser = $_POST['dbuser'];
$dbprefix = $_POST['dbprefix'];
$dbhost = $_POST['dbhost'];

$adminname = $_POST['adminusername'];
$adminpasswd = $_POST['adminpasswd'];

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sqlurl = $dbprefix . 'links';
$sqluser = $dbprefix . 'users';

if($con)
{
    $test1 = "SELECT * FROM ".$sqlsentence;
    $test2 = "SELECT * FROM ".$sqluser;
    if(mysqli_query($con,$test1) && mysqli_query($con,$test2))
    {
        echo "ShortLink 数据库: ".$sqlsentence.' & '.$sqluser." 已创建<br>如想在同一数据库内创建多个站点，请更改表前缀";
        echo '<meta http-equiv="refresh" content = "5;url=../">';
        
    }
    else
    {
        include 'sentdata.php';
        $url ="Location: ./userdata.php?username=".$adminname."&&passwd=".$adminpasswd;
        
        if($com=1)
            header($url);
           
    }
    
}


?>