## session & cookie

### sesstion 시작하기

- 쿠키에 `PHPSESSID`가 생기면서 세션을 생성
- `session_start();`는 세션에 접근할 때마다 매번 선언해주어야한다.

> 예를 들어서 login 페이지에서 로그인에 성공하고, `session_start()`를 하고, user에 대한 정보를 변수로 저장해 두었다면, 이제 다른 페이지를 이용할 때 마다 `session`에 접근해야한다. 다른 페이지에서 유저 정보에 접근하려면 `session_start()`를 선언해 주어야, `$_SESSION['변수']`에 접근할 수 있다.

```php
sesstion_start(); // session 시작
```

### session에 아무 변수 등록하기

- userid, usernickname 등을 저장하고, 주로 로그인정보를 저장하는데 사용된다

```php
$_SESSION["변수명1"] = "값1";
$_SESSION["변수명2"] = "값2";
$_SESSION["변수명3"] = "값3";
.
.
.

```

### 변수가 null인지 체크하기

````php
isset($변수) // true || false
``

### session변수에 접근하기

- 할당할 때 그대로 사용하면된다

```php
$_SESSION["변수명1"] // '값1'

echo "제가 살고 있는 도시는 {$_SESSION['city']}입니다.<br>"; // echo와 함께 사용할때는 {} 브라켓으로 감싸주고 사용한다.
````

### session 삭제

- 세션 data를 제거합니다.**(선언한 session의 변수들은 그대로 유지됩니다)**

```php
session_destroy();
```

### session에 할당한 변수 삭제

- 해당 세션ID에 선언된 모든 변수들을 제거합니다

```php
session_unset(); // 전체 변수 삭제
unset($_SESSION["id"]); // 특정 변수 삭제
```

> 보통 로그아웃을 구현한다면 `session_unset();` , `session_destroy();` 두가지를 호출합니다.

### session id 출력 하기

- "" string 내부에 `echo "id:{session_id()}"` 처럼 호출할 수 없다

```php
echo session_id();
```

### cookie 생성

- cookie는 expire 기간을 optional로 줄 수 있다
- `setcookie(key,value,expire)`로 지정해줄 수 있고, 시간은 `time()`함수를 호출하여 원하는 초를 도하면 된다

```php
setcookie('mycookie','cookie value'); // 무기한 쿠키 설정
setcookie('mycookie','cookie value',time()+60); // expire 날짜지정 ex) 60초 이후 삭제되는 쿠키
```

### redirect

```php
header("location:/www/index.php"); // location: = 도메인
```

## mysqli 사용하기

> 이게 끝임

```php
<?php
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board";
    $result = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<h2>'.$row["name"].' / '.$row["content"].'</h2>';
    }

    mysqli_close($con);
?>
```

## history

```php
history.go(-1) // 뒤로 한 페이지 이동
```