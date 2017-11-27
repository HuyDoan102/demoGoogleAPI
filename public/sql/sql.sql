create database demoapi;
use demoapi;

CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL ,
  `type` VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM ;

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('1', 'Love.Fish', '580 Darling Street, Rozelle, NSW', '-33.861034', '151.171936', 'restaurant');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('2', 'Young Henrys', '76 Wilford Street, Newtown, NSW', '-33.898113', '151.174469', 'bar');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('3', 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', '-33.840282', '151.207474', 'bar');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('4', 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', '-33.910751', '151.194168', 'bar');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('5', 'Nomad', '16 Foster Street, Surry Hills, NSW', '-33.879917', '151.210449', 'bar');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('6', 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', '-33.906357', '151.263763', 'restaurant');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('7', 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', '-33.881123', '151.209656', 'restaurant');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES ('8', 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', '-33.874737', '151.215530', 'restaurant');

select * from markers;

use demoapi;
create table garbages
(
	`id` INT NOT NULL AUTO_INCREMENT ,
	`name` VARCHAR( 60 ) default 'No name' ,
	`street` VARCHAR( 100 ) default 'No name' ,
    `district` VARCHAR( 100 ) default 'No name',
    `city` VARCHAR( 100 ) default 'No name' ,
    `country` VARCHAR( 100 ) default 'No name' ,
	`lat` FLOAT( 10, 6 ) NOT NULL ,
	`lng` FLOAT( 10, 6 ) NOT NULL ,
	`type` VARCHAR( 30 ) NOT NULL ,
    CONSTRAINT pk_garbage_id PRIMARY KEY(id)
);
insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac Khanh Son', 'Duong Hoang Van Thai', 'Lien Chieu', 'Da Nang', 'Viet Nam', 16.041998, 108.142118, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac tai Quang Nam', 'No name', 'No name', 'Quang Nam', 'Viet Nam', 15.850940, 108.211314, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac tai Thua Thien Hue', 'Duong QL1', 'No name', 'Hue', 'Viet Nam', 16.405411, 107.638786, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac Nghia Ky', 'No name', 'Tu Nghia', 'Quang Ngai', 'Viet Nam', 15.076389, 108.748959, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac Ngoc Son', 'No name', 'Quynh Luu', 'Nghe An', 'Viet Nam', 19.208233, 105.605224, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac Tam Tan', 'Duong ĐT823', 'Phuoc Hiep', 'Ho Chi Minh', 'Viet Nam', 10.964555, 106.438572, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Khu xu ly chat thai Toc Tien', 'Duong so 31', 'Toc Tien', 'Vung Tau', 'Viet Nam', 10.579980, 107.128501, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac tai Ha Noi', 'No name', 'No name', 'Ha Noi', 'Viet Nam', 21.095873, 105.66169, 'Big');

insert into garbages(name, street, district, city, country, lat, lng, type)
values ('Bai rac tai Hai Phong', 'Duong De Lap Le', 'No name', 'Hai Phong', 'Viet Nam', 20.900874, 106.753099, 'Big');
