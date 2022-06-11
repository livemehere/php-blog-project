<?php
$id  = $_GET["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$content = $_POST["content"];
$content = htmlspecialchars($content, ENT_QUOTES);

$con = mysqli_connect("localhost", "user1", "12345", "sample");

$sql = "INSERT INTO comment VALUES(DEFAULT,$id,'$username','$password','$content',DEFAULT);";
mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
mysqli_close($con);                // DB 연결 끊기

echo "
    <script>
        alert('생성되었습니다');

    </script>
";


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>


