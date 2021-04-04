<?php
$sql1 = "CREATE TABLE ".$sqlurl." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
links_name VARCHAR(30) NOT NULL,
links VARCHAR(30) NOT NULL,
shortlink VARCHAR(60),
reg_date TIMESTAMP
)";
        $sql2 = "CREATE TABLE ".$sqluser." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
passwd VARCHAR(45) NOT NULL,
usergroup VARCHAR(30)
)";

        mysqli_query($con,$sql1);
        mysqli_query($con,$sql2);
        
        if (mysqli_query($con,$sql1) && mysqli_query($con,$sql2)) {
            $com=1;
        } else {
            echo "创建数据表错误: " . $con->error;
        }
        
        touch("../config.php");
        $CONFIGfile = fopen("../config.php", "w");
        $txt = (
            "<?php\n"
.'$dbhost = "'.$dbhost."\";
".'$dbname = "'.$dbname."\";
".'$dbuser = "'.$dbuser."\";
".'$dbpasswd = "' .$dbpasswd . "\";
".'$dbprefix = "'. $dbprefix."\";
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);

        touch('./userdata.php');
        $CONFIGfile=fopen('./userdata.php',"w");
        $txt=('<?php
$name =$_GET["username"];
$passwd =$_GET["passwd"];

include "../config.php";
$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$passwdsha1 = sha1($passwd);

$sqluser =$dbprefix."user";

$sql = "INSERT INTO ".$sqluser." (username, passwd, usergroup)
VALUES (\'".$name."\', \'".$passwdsha1."\', \'admin\')";

mysqli_query($con, $sql);

header("Location: ./?code=complete");

?>');
fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);
        
        
?>