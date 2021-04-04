<?php
$author=$_POST['link_name'];
$text=$_POST['links'];

$textmd5=sha1($text);

$textmd5 = substr($textmd5, 0, -33);

$textsql = $dbprefix.'links';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM sl_links where shortlink='".$text."' AND links='".$textmd5."'";
if(mysqli_query($con, $sql)){echo '<meta http-equiv="refresh" content = "2;url=./insert.php">'; mysqli_close($con);}
else
{
$sql = "INSERT INTO ".$textsql." (links_name,links,shortlink)
VALUES (\"".$author."\", \"".$text."\", \"".$textmd5."\")";
 
if (mysqli_query($con, $sql)) {
    echo "添加成功";
        echo '<meta http-equiv="refresh" content = "2;url=./insert.php">';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
}

?>