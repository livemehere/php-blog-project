<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["num"])) $num = $_SESSION['num'];
else $username = "";



if ( !$userid )
{
    echo("
            <script>
                alert('포스팅은 로그인 후 이용해 주세요!');
                history.go(-1)
            </script>
        ");
    exit;
}

$subject = $_POST["subject"]; // 제목
$content = $_POST["content"]; // 내용
$tags = $_POST["tags"]; // 태그

$subject = htmlspecialchars($subject, ENT_QUOTES);
$content = htmlspecialchars($content, ENT_QUOTES);
$tags = htmlspecialchars($tags, ENT_QUOTES);

// 이미지 업로드
// 임시로 저장된 정보(tmp_name)
$tempFile = $_FILES['imgFile']['tmp_name'];

// 파일타입 및 확장자 체크
$fileTypeExt = explode("/", $_FILES['imgFile']['type']);

// 파일 타입
$fileType = $fileTypeExt[0];

// 파일 확장자
$fileExt = $fileTypeExt[1];

// 확장자 검사
$extStatus = false;

switch($fileExt){
    case 'jpeg':
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
        $extStatus = true;
        break;

    default:
        echo "이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다.";
        exit;
        break;
}

// 이미지 파일이 맞는지 검사.
if($fileType == 'image'){
    // 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외에는 업로드 불가
    if($extStatus){
        // 임시 파일 옮길 디렉토리 및 파일명
        $resFile = "../data/{$_FILES['imgFile']['name']}";
        // 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
        $imageUpload = move_uploaded_file($tempFile, $resFile);

        // 업로드 성공 여부 확인
        if($imageUpload == true){
            echo "파일이 정상적으로 업로드 되었습니다. <br>";
            echo "<img src='{$resFile}' width='100' />";
        }else{
            echo "파일 업로드에 실패하였습니다.";
        }
    }	// end if - extStatus
    // 확장자가 jpg, bmp, gif, png가 아닌 경우 else문 실행
    else {
        echo "파일 확장자는 jpg, bmp, gif, png 이어야 합니다.";
        exit;
    }
}	// end if - filetype
// 파일 타입이 image가 아닌 경우
else {
    echo "이미지 파일이 아닙니다.";
    exit;
}

$con = mysqli_connect("localhost", "user1", "12345", "sample");

$sql = "INSERT INTO posts VALUES(DEFAULT,99,'$subject','$content','$tags','http://localhost:41062/www/data/{$_FILES['imgFile']['name']}',DEFAULT,DEFAULT,DEFAULT) ";
mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
mysqli_close($con);                // DB 연결 끊기
echo "
	   <script>
	    location.href = '/www/posts.php';
	   </script>
	";
?>
