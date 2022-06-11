create table members(
    num int AUTO_INCREMENT,
    id int not null,
    pass char(50) not null,
    name text char(50) not null,
    email char(50) not null,
    level int default 0,
    regist_day char(50) not null,
    PRIMARY KEY(num)
);

create table posts(
      id INT AUTO_INCREMENT NOT NULL,
      userid INT NOT NULL,
      title VARCHAR(100) NOT NULL,
      content TEXT NOT NULL,
      tags VARCHAR(255),
      thumbnail_url VARCHAR(255),
      view INT DEFAULT 0,
      created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
      updated_date DATETIME DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY(id)
);

create table comment(
    id int AUTO_INCREMENT,
    post_id int not null,
    username varchar(50) not null,
    password varchar(10) not null,
    content text not null,
    created_date datetime DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY(id)
);