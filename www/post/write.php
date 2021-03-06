<!doctype html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/write.css">
    <title>공태민의 블로그</title>
</head>
<body>
<?php include '/www/header.php'?>
<section>
    <h1 class="write-title">글 작성</h1>
    <form name="board_form" method="post" action="postInsert.php" enctype="multipart/form-data">
        <ul>
            <li>
                <input required name="subject" type="text" placeholder="제목">
            </li>
            <li>
                <input required name="tags" type="text" placeholder="태그 ex) #태그#태그#태그 ... #으로 띄어쓰기 없이 작성해주세요    ">
            </li>
            <li id="text_area">
                    <textarea name="content" placeholder="내용"></textarea>
            </li>
            <li>
                <div class="col1 thumb-title"> 썸네일</div>
                <input id="imageInput" required type="file" name="imgFile" accept="image/*" onChange="onChangeImage(this)">
                <img id="preivew" src="" alt="">
            </li>
        </ul>
        <ul class="buttons">
            <button type="submit">완료</button>
            <button type="button" onclick="location.href='/www/posts.php'">목록</button>
        </ul>
    </form>
</section>
<script>
    const imageInput = document.querySelector('#imageInput');
    const preivew = document.querySelector('#preivew');

    function onChangeImage(self){
        const preivewURL = URL.createObjectURL(self.files[0]);
        preivew.setAttribute('src',preivewURL)
    }
</script>
</body>
</html>