<?php
$id=$_POST['id'];

$textsql = $dbprefix.'links';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "DELETE FROM ".$textsql."
WHERE id='".$id."'";
 
if (mysqli_query($con, $sql)) {
    echo "删除成功";
        echo '<meta http-equiv="refresh" content = "2;url=./delete.php">';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


?>