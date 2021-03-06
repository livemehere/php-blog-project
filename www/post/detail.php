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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/detail.css">
    <title>공태민의 블로그</title>
</head>
<body>
<?php include '../header.php'?>
<section>
        <?php
        $num  = $_GET["num"];
        $con = mysqli_connect("localhost", "user1", "12345", "sample");
        $sql = "select * from posts where id=$num";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);
        $id      = $row["id"];
        $userid      = $row["userid"];
        $title = $row["title"];
        $content    = $row["content"];
        $tags    = $row["tags"];
        $thumbnail_url    = $row["thumbnail_url"];
        $view          = $row["view"];
        $created_date    = $row["created_date"];
        $updated_date  = $row["updated_date"];

        $content = str_replace(" ", "&nbsp;", $content);
        $content = str_replace("\n", "<br>", $content);

        $new_view = $view + 1;
        $sql = "update posts set view=$new_view where id=$num";
        mysqli_query($con, $sql);
        ?>
        <ul id="view_content">
            <li>
                <p class="col1"><?=$title?></p>
                <p class="col2">작성자 : 공태민</p>
                <?php
                    if($created_date == $updated_date){
                        echo '<p class="col2">'.$created_date.' 작성</p>';
                    }else{
                        echo '<p class="col2">'.$updated_date.' 수정됨</p>';
                    }
                ?>

                <p class="col2">조회수 : <?=$new_view?></p>
                <p class="col2">
                <?php
                if(isset($_SESSION['userid'])){
                    echo '<span><a class="post-btn" href="delete.php?num='.$row["id"].'">삭제</a></span>';
                    echo '<span><a class="post-btn" href="postmodifyForm.php?num='.$row["id"].'">수정하기</a></span>';
                }
                ?>
                </p>
            </li>
            <li class="content-box">
                <?=$content?>
            </li>
            <div class="comment-wrap">
                <h2 class="comment-title">댓글</h2>
                    <ul class="comments">
                        <?php
                        $sql = "select * from comment where post_id=$num";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                            $content = $row['content'];
                            $content = str_replace(" ", "&nbsp;", $content);
                            $content = str_replace("\n", "<br>", $content);
                            echo '
                            <li>
                                <div class="user-info">
                                    <div class="name">'.$row['username'].'</div><div class="date">'.$row['created_date'].' 작성</div>
                                </div>
                                <p style="line-height:1.5em">'.$content.'</p>
                            </li>     
                        ';
                        }
                        mysqli_close($con);
                        ?>
                 </ul>

                <form action="createComment.php?id=<?=$num?>" method="post">
                    <div class="row">
                        <input type="text" name="username" placeholder="이름">
                        <input type="password" name="password" placeholder="비밀번호">
                    </div>
                    <div class="row">
                        <textarea type="text" name="content"></textarea>
                    </div>
                    <div class="row buttons">
                        <button>댓글등록</button>
                    </div>
                </form>
            </div>
        </ul>
</section>
<script>
    document.querySelector('.content-box').scrollIntoView({behavior:'smooth'})
</script>
</body>
</html>
