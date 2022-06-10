<?php
$num   = $_GET["num"];

$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "select * from posts where id = $num";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$thumbnail_url = $row["thumbnail_url"];
$file_name = str_replace('http://localhost:41062/www/data/', '', $thumbnail_url);

if ($thumbnail_url)
{
    $file_path = "../data/".$file_name;
    unlink($file_path);
}

$sql = "delete from posts where id = $num";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
	     <script>
	         location.href = '/www/posts.php';
	     </script>
	   ";
?>

