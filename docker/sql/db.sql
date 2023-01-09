CREATE DATABASE `Watchfest_DB` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */

create table Watchfest_DB.articles
(
    id    int auto_increment
        primary key,
    title text not null,
    text  text not null,
    img   text null
);

create table Watchfest_DB.users
(
    id    int auto_increment
        primary key,
    login text not null,
    email text not null,
    hash  text not null
);

INSERT INTO Watchfest_DB.articles (id, title, text, img) VALUES (1, 'Game Of Thrones: House of Dragon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi tellus, viverra a mauris ac, pulvinar finibus libero. Nullam sagittis odio turpis, interdum gravida urna fringilla sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur pulvinar scelerisque est a condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris accumsan mi vitae risus sagittis maximus dictum et turpis. Maecenas sit amet justo orci. Etiam in lectus nisl. Etiam feugiat quam a orci bibendum, vel pharetra augue euismod. Aenean non venenatis tortor. Aliquam vel elementum augue, eget suscipit tellus. Phasellus luctus volutpat elit vitae gravida. ', 'public/images/House_of_dragon.jpg');
INSERT INTO Watchfest_DB.articles (id, title, text, img) VALUES (2, 'Lord of The Rings: Rings of Power', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet tempus ex. Nunc ultrices nisi at dui congue, nec rutrum tortor tincidunt. In quis porttitor nisi, nec ornare tellus. Quisque porta justo quis massa volutpat semper. Nunc at dolor sed libero porta aliquet eu eu risus. Nullam dictum at dolor et blandit. Nulla facilisi. Integer ut rhoncus justo.', 'public/images/LOTR.jpg');
INSERT INTO Watchfest_DB.articles (id, title, text, img) VALUES (3, 'The Boys', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eleifend nunc a diam ultricies faucibus. Suspendisse fringilla euismod felis, sodales molestie elit tincidunt eget. Mauris in dui id erat varius sodales. Maecenas faucibus lectus venenatis, posuere dolor et, euismod velit. Proin ex felis, pulvinar et commodo vitae, semper vel mi. Praesent aliquam massa felis, in ultricies urna aliquam a. Cras vel commodo neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vitae arcu diam. Nunc vitae nulla eget lorem interdum rutrum eget fermentum augue.', 'public/images/The_boys.jpg');
