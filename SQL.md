# members

```sql
create table members
(
    num        int      not null AUTO_INCREMENT,
    id         char(15) not null,
    pass       char(15) not null,
    name       char(10) not null,
    email      char(80),
    regist_day char(20),
    level      int,
    point      int,
    primary key (num)
);

create table board (
   num int not null auto_increment,
   id char(15) not null,
   name char(10) not null,
   subject char(200) not null,
   content text not null,
   regist_day char(20) not null,
   hit int not null,
   file_name char(40),
   file_type char(40),
   file_copied char(40),
   primary key(num)
);
```

## insert into 

```sql
insert into members values(default, 'test', '1234', '공태민', 'kong@naver.com','2022-05-26', 0, 0);
```