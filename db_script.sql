
create database avid_example;
use avid_example;
drop table users;

CREATE TABLE users (
	id int(11) NOT NULL AUTO_INCREMENT,
	user_id varchar(200) NOT NULL,
	user_first_name varchar(150) DEFAULT NULL,
	user_last_name varchar(150) DEFAULT NULL,
	email varchar(200) DEFAULT NULL,
	user_password varchar(200) DEFAULT NULL,
	last_login timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	new_password_code_request varchar(100) DEFAULT NULL,
	new_password varchar(100) DEFAULT NULL,
	date_created datetime default null,
   
  PRIMARY KEY (id),
  UNIQUE KEY user_id (user_id),
  UNIQUE KEY new_password_code_request (new_password_code_request)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

insert into users (user_id,user_first_name,user_last_name,email,user_password,date_created)
value('admin','Admin','User','jrareas@gmail.com','3ee32956a887a53ffaa378b3e6633fa663088da3',sysdate());
select sha1('1234');
insert into users (user_id,user_first_name,user_last_name,email,user_password,date_created)
value('rgoldglass','Richard','Goldglass','Richard Goldglass <richard.goldglass@avidlifemedia.com>','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',sysdate());

update users set user_password = sha1('1234') where user_id = 'rgoldglass';

create user avid_example identified by 'avid_example';

grant all privileges on avid_example.* to 'avid_example'@'127.0.0.1' identified by 'avid_example';

