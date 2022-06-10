<!doctype html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/posts.css">
    <title>공태민의 블로그</title>
</head>
<body>
    <?php include 'header.php'?>
    <section>
        <div class="tags">
            <h1>해시태그</h1>
            <ul>
                <li>태그1</li>
                <li>태그2</li>
                <li>태그3</li>
            </ul>
        </div>
        <ul class="cards">
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
                echo '
                    <li class="card">
                    <a href="/www/post/detail.php?num='.$row[0].'">
                        <h4 class="card__title">'.$row[2].'</h4>
                        <div class="card__tags">'.$row[4].'</div>
                        <img class="card__thumbnail" src="'.$row[5].'">
                    </a>
                    </li>       
                ';
            }
            mysqli_close($connect);
            ?>
        </ul>
    </section>
</body>
</html>