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
            <ul class="tag-list">
                <li class="all">전체</li>
<!--                여기에 존재하는 모든 태그가 계산됩니다-->
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
    <script>
        const allTags = document.querySelectorAll('.card__tags');
        const tagList = document.querySelector('.tag-list');
        const cardBox = document.querySelector('.cards');
        const allCards = document.querySelectorAll('.card');
        const allBtn = document.querySelector('.all');
        let finalTags = []; // 모든 태그를 담은 배열

        // 태그 추출
        allTags.forEach(element=>{
            let tags = element.innerHTML.split('#');
            tags = tags.filter(item=> item !== '' && item !== '\b');
            finalTags.push(...tags);
        })
        // 추출한 태그들로 버튼들 생성
        finalTags.forEach(tag=> {
            const li = document.createElement('li');
            li.classList.add('tag')
            li.addEventListener('click',()=>{
                document.querySelectorAll('.tag').forEach(e=> e.classList.remove('active'));
                li.classList.add('active');
                updateFilterTagList(tag);
            })
            li.innerText = tag;
            tagList.appendChild(li)
        })

        // 누른 태그를 포함한 게시글만 보이도록 필터링
        function updateFilterTagList(tag){
            cardBox.innerHTML = '';
            allCards.forEach(c=> {
                const tags = c.querySelector('.card__tags').innerHTML;
                const regRxp = new RegExp(tag);
                if(!regRxp.test(tags)) return;
                const li = document.createElement('li');
                li.innerHTML =c.innerHTML;
                li.classList.add('card')
                cardBox.append(li)
            })
        }

        // 전체 보기 버튼
        allBtn.addEventListener('click',()=>{
            cardBox.innerHTML = '';
            allCards.forEach(c=> {
                const li = document.createElement('li');
                li.innerHTML =c.innerHTML;
                li.classList.add('card')
                cardBox.append(li)
            })
        })

    </script>
</body>
</html>