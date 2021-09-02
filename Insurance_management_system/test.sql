create database myproject;

create table admin( 
	admin_name varchar(20), 
	password varchar(10) 
);
INSERT INTO `admin`(`admin_name`, `password`) VALUES ('Supreeta','supreeta');
INSERT INTO `admin`(`admin_name`, `password`) VALUES ('Sukanya','sukanya');

create table agent(
    ag_user_name varchar(30) not null,
    agent_name varchar(30)not null,
    agent_psw varchar(20)not null,
    address varchar(50)not null,
    pincode int not null,
    contact_no bigint not null,
    PRIMARY key (ag_user_name)
 );

create table customer(
	policy_no int not null AUTO_INCREMENT,
    user_name varchar(30) not null,
    fullname varchar(30)not null,
    password varchar(20)not null,
    ag_user_name varchar(30)not null,
    DOB date not null,
    gender char(10) not null,
    address varchar(50) not null,
    pincode int not null,
    contact_no bigint not null,
    product_name varchar(20) not null,
    PRIMARY key (policy_no),
    foreign key (ag_user_name) references agent(ag_user_name),
    foreign key (product_name) references insurance(product_name)on update cascade
 ) AUTO_INCREMENT=10001;

create table insurance(
	product_name varchar(20) not null,
    sum_assured int not null,
    premium_mode varchar(15) not null,
    premium_amt int not null,
    maturity_prd int not null,
    PRIMARY key(product_name)
);

create table payment(
    trans_id int not null AUTO_INCREMENT,
    policy_no int not null,
    premium_amt int not null,
    pay_mode varchar(20) not null,
    pay_date date not null,
    card_no bigint not null,
    exp_date date not null,
    CVV int not null,
    PRIMARY key (trans_id),
    foreign key (policy_no) references customer(policy_no) 
)AUTO_INCREMENT=658678;