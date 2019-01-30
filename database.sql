CREATE DATABASE IF NOT EXISTS school;
use school;

CREATE TABLE IF NOT EXISTS users(
id			int(255) auto_increment not null,
role		varchar(20),
name		varchar(100),
surname		varchar(200),		
email		varchar(255),
password	varchar(255),
created_at	datetime,
updated_at	datetime,
remember_token	varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'user', 'jose', 'manuel','kuchimaw@gmail.com','1234',CURTIME(),CURTIME(),null);

create table if not exists alumnes(
id int(255) auto_increment not null,
name varchar(100),
surname varchar(100),
course int(1),
dob date,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_alumnes PRIMARY KEY(id)
)ENGINE=InnoDB;

insert into alumnes values(null, 'Jaume', 'Balañá', 6, '2000-05-11', CURTIME(), CURTIME());
