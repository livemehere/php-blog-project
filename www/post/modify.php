<?php
$num = $_GET["num"];

$subject = $_POST["subject"];
$tags = $_POST["tags"];
$content = $_POST["content"];

$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "update posts set title='$subject', content='$content',tags='$tags',updated_date=current_timestamp() ";
$sql .= " where id=$num";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
	      <script>
	          location.href = '/www/posts.php';
	      </script>
	  ";
?>


