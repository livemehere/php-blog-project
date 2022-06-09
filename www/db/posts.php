<?php
    $servername = "localhost";
    $user = "user1";
    $password = "12345";
    $database = 'sample';
    $connect = mysqli_connect($servername, $user, $password,$database);

    if (!$connect) {
        die("서버와의 연결 실패! : " . mysqli_connect_error());
    }
    $query = "select * from posts";
    $res = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($res)) {
        echo 'id: '.$row[0].'!';
    }

    mysqli_close($connect);
?>