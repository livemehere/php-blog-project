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
    <link rel="stylesheet" href="css/index.css">
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
                for($i=0;$i<9;$i++){
                    echo '
                        <li class="card">
                <h4 class="card__title">제목</h4>
                <div class="card__tags">#해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그 #해시태그</div>
                <img class="card__thumbnail" src="https://t1.kakaocdn.net/kakaocorp/kakaocorp/admin/news/3c6a6974018100001.png?type=thumb&opt=C630x472" alt="thumbnail">
            </li>
                    ';
                }
            ?>
        </ul>
    </section>
</body>
</html>