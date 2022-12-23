create database mobile_final;
use mobile_final;

create table Account (
	email char(150) not null,
    password char(250) not null,
    verify boolean not null default false,
    otp int not null,
    role int not null default 0,
    primary key (email)
);

create table Shop (
	shop_id int not null auto_increment,
    name nvarchar(50) not null,
    address nvarchar(255) not null,
    deleted boolean not null default false,
    logo mediumtext,
    owner nvarchar(50) not null,
    owneridcard char(15) not null,
    phone char(11) not null,
    email char(150) not null,
    primary key (shop_id),
    foreign key (email) references Account(email)
);
alter table Shop auto_increment = 2000;

create table Dish (
	dish_id int not null auto_increment,
    name nvarchar(250) not null,
    ingredients nvarchar(250) not null,
    price boolean not null,
    img mediumtext,
    deleted boolean not null default false,
    shop_id int not null,
    primary key (dish_id),
    foreign key (shop_id) references Shop(shop_id)
);
alter table Dish auto_increment = 1000;
alter table Dish add type char(30) not null default 'RICE';

create table customer(
	customer_id int not null auto_increment,
    name nvarchar(50) not null,
    dateofbirth date not null,
    email char(50),
    avatar mediumtext,
    phone char(11) not null,
    primary key (customer_id),
    foreign key (email) references Account(email)
);
alter table customer auto_increment = 3000;

create table bill(
	bill_id int not null auto_increment,
    total double not null,
    date date not null,
    time time not null,
    shop_id int not null,
    customer_id int not null,
    primary key (bill_id),
    foreign key (shop_id) references shop(shop_id),
    foreign key (customer_id) references customer(customer_id)
);
alter table bill auto_increment = 4000;
alter table bill add state char(10) not null default 'NEW';
alter table bill add address int not null default 1;

create table billdetail (
	bill_id int not null,
    dish_id int not null,
    amount double not null,
    primary key (bill_id, dish_id),
    foreign key (bill_id) references bill(bill_id),
    foreign key (dish_id) references dish(dish_id)
);

create table review (
	review_id int not null auto_increment,
    customer_id int not null,
    dish_id int not null,
    score int not null,
    comment nvarchar(255),
    primary key(review_id)
);
alter table review auto_increment = 5000;

-- drop table review;
-- drop table billdetail;
-- drop table Bill;
-- drop table customer;
-- drop table Shop;
-- drop table Dish;
-- drop table Account;


