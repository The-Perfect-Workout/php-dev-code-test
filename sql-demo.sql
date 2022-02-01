CREATE SCHEMA demo_db;
USE demo_db;
create table users
(
    id            int auto_increment
        primary key,
    username      char(50)      not null,
    password      char(40)      not null,
    active        tinyint       not null,
    created       datetime      not null,
    modified      datetime      not null,
    constraint username
        unique (username)
)
    charset = utf8;

create table user_groups
(
    id            int auto_increment
        primary key,
    user_id      int      not null,
    group_id      int      not null,
    created       datetime      not null
)
    charset = utf8;

create table `groups`
(
    id            int auto_increment
        primary key,
    name      varchar(50)      not null,
    created       datetime      not null,
    modified      datetime      not null
)
    charset = utf8;

INSERT INTO demo_db.users (id, username, password, active, created, modified) VALUES (1, 'bob.doe@example.com', '123', 1, '2022-01-01 00:00:00', '2022-01-01 00:00:00');
INSERT INTO demo_db.`groups` (id, name, created, modified) VALUES (1, 'dev', '2022-01-01 00:00:00', '2022-01-01 00:00:00');
INSERT INTO demo_db.`groups` (id, name, created, modified) VALUES (2, 'admin', '2022-01-01 00:00:00', '2022-01-01 00:00:00');
INSERT INTO demo_db.`groups` (id, name, created, modified) VALUES (3, 'customer', '2022-01-01 00:00:00', '2022-01-01 00:00:00');
INSERT INTO demo_db.user_groups (id, user_id, group_id, created) VALUES (1, 1, 1, '2022-01-01 00:00:00');
INSERT INTO demo_db.user_groups (id, user_id, group_id, created) VALUES (2, 1, 2, '2022-01-01 00:00:00');

 -- Example query
SELECT username FROM `users`
INNER JOIN `user_groups` ON (`user_groups`.`user_id` = `users`.`id`)
INNER JOIN `groups` ON (`user_groups`.`group_id` = `groups`.`id`)
WHERE `groups`.`name` = 'customer';


-- Write a query to determine which groups bob.doe@example.com belongs to