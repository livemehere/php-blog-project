# DB 구조

## SQL

### posts

```sql
create table posts(
	id INT AUTO_INCREMENT NOT NULL,
    userid INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    tags VARCHAR(255),
    thumbnail_url VARCHAR(255),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

INSERT INTO sample.posts VALUES(1,99,'제목이에요','내용이에요','#태그#아니#그 래','https://t1.kakaocdn.net/kakaocorp/kakaocorp/admin/news/3c6a6974018100001.png?type=thumb&opt=C630x472',DEFAULT,DEFAULT);

```

