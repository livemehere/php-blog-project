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

## SQL

```sql

-- user
CREATE USER 'user1' IDENTIFIED BY '12345';
GRANT ALL PRIVILEGES ON *.* TO 'user1'@'%';
FLUSH PRIVILEGES;

-- member table
CREATE TABLE (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

```

## restart xamp

```bash
docker exec myXampp /opt/lampp/lampp restart
```
