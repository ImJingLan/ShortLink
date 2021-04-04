<?php
$url=$_GET['url'];
include 'check.php';
include 'config.php';
if($url=='')
{
    include 'list.php';
}
else
{
$conn = mysqli_connect($dbhost, $dbuser, $dbpasswd,$dbname);
 
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, links_name, links, shortlink FROM sl_links where shortlink='".$url."'";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        header("Location: http://".$row['links']);
    }
} else {
    echo "0 结果";
}
 
mysqli_close($conn);
}
?>