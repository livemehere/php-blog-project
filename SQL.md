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

INSERT INTO sample.posts VALUES(DEFAULT,99,'PHP에 대해서','php에 대한 글입니다','#php#ssr#굿','https://www.miltonmarketing.com/wp-content/uploads/2018/04/customphplogo.png',DEFAULT,DEFAULT);

```

