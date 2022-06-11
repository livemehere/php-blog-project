## 기능

- 관리자는 게시글 작성 가능
- 로그인하지 않은 사용자는 게시글 조회, 댓글 달기 가능
- 해시태그 수집 및 필터링 기능
- 게시글 작성시 썸네일과 함께 업로드

## 화면

<img width="1410" alt="image" src="https://user-images.githubusercontent.com/61547778/173171298-a5d3cae2-2dc0-4454-8b72-e07ebf091bb4.png">
<img width="1411" alt="image" src="https://user-images.githubusercontent.com/61547778/173171139-064a801c-71eb-4c37-a14d-3d4f2d1ccc94.png">
<img width="1209" alt="image" src="https://user-images.githubusercontent.com/61547778/173171212-76c102ff-f6a9-4ceb-9777-2ea766597619.png">
<img width="1286" alt="image" src="https://user-images.githubusercontent.com/61547778/173171279-dfc73606-0cd3-4b99-9d01-833bfeeb5f59.png">
<img width="1277" alt="image" src="https://user-images.githubusercontent.com/61547778/173171339-629f89af-5f66-4c55-8505-27aa00e5b088.png">


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
