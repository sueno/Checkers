create table users (
    id              int             not null    primary key ,
    group_id        int             not null ,
    stat            int             not null    default 0 ,
    name            varchar(30)     not null ,
    mail            varchar(100)    not null ,
    password        varchar(20)     not null ,
    img_path        varchar(100)    default 'user/img/dummy.png' ,
    latest_login    date            not null
);