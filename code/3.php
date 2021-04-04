<?php
include './config.php';
$textsql = $dbprefix.'links';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$textsql;

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo ('<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['links_name'].'</td>
        <td>'.$row['links'].'</td>
        <td>'.$row['shortlink'].'</td>
      </tr>');
    }
} else 
{
    echo "";
}

mysqli_close($con);


?>