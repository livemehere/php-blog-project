## 기능

- 관리자는 게시글 작성 가능
- 로그인하지 않은 사용자는 게시글 조회, 댓글 달기 가능
- 해시태그 수집 및 필터링 기능
- 게시글 작성시 썸네일과 함께 업로드

## PHP-APACHE 실습환경

- `www` 폴더 생성 후 source code를 그 내부에 저장 및 관리
- 해당 directory에서 `docker run` (www내부 아님 주의)

```bash
docker run --name myXampp -p 41061:22 -p 41062:80 -d -v `pwd`/www:/www tomsik68/xampp
```

### 이미지 출처

> https://hub.docker.com/r/tomsik68/xampp/

## 메인 페이지

```bash
http://localhost:41062/www/index.php
```

## phpMyadmin

```bash
http://localhost:41062/phpmyadmin/
```

## restart xamp

```bash
docker exec myXampp /opt/lampp/lampp restart
```
