<?php
$id = $_POST["id"];
$passwd = $_POST["passwd"];
/* db 연결 */
$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "select * from members where id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$num_rows = mysqli_num_rows($result);

if($num_rows <= 0){
    echo "<script>
                    alert('존재하지 않는 ID입니다.')
                    window.location.href = '/www'; //TODO: www 제거하기
                </script>";
    return;
}

$db_passwd=$row['pass'];

if($passwd !=$db_passwd) {
    echo "<script>
                        alert('비밀번호가 일치하지 않습니다.');
                        window.location.href = '/www/login/login_form.html'; //TODO: www 제거하기
                  </script>";
} else{
    session_start();
    $_SESSION['num'] = $row['num'];
    $_SESSION['userid'] = $id;
    $_SESSION['passwd'] = $row['pass'];
    $_SESSION['username'] = $row['name'];
    header('Location: /www'); // 홈으로 리다이렉트 //TODO: www 제거하기
}
mysqli_close($con);
?>