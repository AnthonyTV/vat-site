CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `database`;

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(11)  NOT NULL AUTO_INCREMENT ,
  `name` varchar(40) NOT NULL,
	`surname` varchar(40) NOT NULL,
	`username` varchar(40) NOT NULL,
	`password` varchar(32) NOT NULL,
	`landlord_student` varchar(10) NOT NULL,
	`sex` varchar(10) NULL,
	`college` varchar(100) NULL,
	`email` varchar(100) NOT NULL,
	`profile_image` varchar(255) NOT NULL,
	`age` INT(11) NULL, PRIMARY KEY (`id`)

);
INSERT INTO `people` VALUES (1,'Eric', 'Moyo', 'emoyo', '5f4dcc3b5aa765d61d8327deb882cf99','Landlord', 'Male', NULL, 'emoyo@email.com','images/download.png',NULL);
INSERT INTO `people` VALUES (2,'Richard', 'Ncube', 'rncube', '5f4dcc3b5aa765d61d8327deb882cf99', 'Landlord', 'Male',NULL, 'rncube@email.com','images/download.pnpg' ,NULL);
INSERT INTO `people` VALUES (3,'Ralph' , 'Shumba', 'rshumba', '5f4dcc3b5aa765d61d8327deb882cf99','Landlord', 'Male', NULL, 'rshumba@email.com','images/download.png',NULL);
INSERT INTO `people` VALUES (4,'John' , 'Dombo', 'jdombo', '5f4dcc3b5aa765d61d8327deb882cf99d','Landlord', 'Male', NULL, 'jdombo@email.com','images/download.png',NULL);
INSERT INTO `people` VALUES (5,'Robert' , 'Chimuti', 'rchimuti', '5f4dcc3b5aa765d61d8327deb882cf99','Landlord', 'Male', NULL, 'rchimuti@email.com','images/download.png',NULL);
INSERT INTO `people` VALUES (6,'Martin', 'Moyo', 'mmoyo', '5f4dcc3b5aa765d61d8327deb882cf99','Landlord', 'Male', NULL, 'mmoyo@email.com','images/download.png',NULL);


DROP TABLE IF EXISTS `people_house`;
CREATE TABLE `people_house` (
 `id` int(11) NOT NULL AUTO_INCREMENT, 
`student_id` int(11) NOT NULL,
  `landlord_id` int(11) NOT NULL,
`house_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
`time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `houses`;
CREATE TABLE `houses` (
	`id`	int(11) NOT NULL AUTO_INCREMENT,
	`address`	varchar(60) NOT NULL,
	`college`	varchar(100) NOT NULL,
	`rooms`	int(11) NOT NULL,
	`capacity`	int(11) NOT NULL,
	`occupied`	int(11) NOT NULL,
	`price`	double NOT NULL,
	`description`	text NOT NULL,
	`images`	varchar(255) NOT NULL,
	`landlord_id`	int(11) NOT NULL,
	`ecocash_name`	varchar(100) NOT NULL,
	`ecocash_number` varchar(25) NOT NULL, PRIMARY KEY (`id`)
);
INSERT INTO `houses` VALUES (1,'2436 Vainona Harare','University of Zimbabwe',5,10,0,45,'Wifi, DSTV, very close to the college','images/0c747b49-6f89-4319-8558-6dd05d55ed24_thumbnail256.jpg',5,'0777524342','Robert Chimuti');
INSERT INTO `houses` VALUES (2,'2436 Mt Pleasant Harare','University of Zimbabwe',7,13,0,40,'Wifi, very close to the college','images/a3f8cb2c-736b-4f7c-a39b-becab4d4b114_thumbnail256.jpg',5,'0777524342','Robert Chimuti');
INSERT INTO `houses` VALUES (3,'2436 Vainona Harare','University of Zimbabwe',4,9,0,65,'DSTV, very close to the college','images/cbd.jpg',5,'0777524342','Robert Chimuti');


INSERT INTO `houses` VALUES (4,'14848 Inyathi Road, Selborne Park Bulawayo','National University of Science and Technology',8,15,0,40,'Wifi,Swimming pool, beds','images/0cf550fa-0310-49bd-b3d8-8504307fa9ac_thumbnail256.JPG',2,'0772564372','Richard Ncube');
INSERT INTO `houses` VALUES (5,'14848 Inyathi Road, Matsheumhlophe Bulawayo','National University of Science and Technology',7,19,0,48,'Geyser, Wifi,Swimming pool, beds','images/mtp.jpg',2,'0772564372','Richard Ncube');
INSERT INTO `houses` VALUES (6,'14848 Inyathi Road, Selborne Park Bulawayo','National University of Science and Technology',4,7,0,35,'Borehole, Wifi,Swimming pool, beds','images/hcbd.jpg',2,'0772564372','Richard Ncube');


INSERT INTO `houses` VALUES (7,'43 Brentwood Rd Coldstream Chinhoyi','Chinhoyi University of Technology',7,15,0,50,'including transport,2 meals, stove,
fridge and beds, WIFI to installed','images/00d9ec20-603b-48ec-b2ac-f7dad373b402_thumbnail256.JPG',3,'0772564872','Ralph Shumba');
INSERT INTO `houses` VALUES (8,'463 Mukova Rd Muzari Chinhoyi','Chinhoyi University of Technology',8,17,0,54,' stove,
fridge and beds, WIFI to installed','images/vainona.jpg',3,'0772564872','Ralph Shumba');
INSERT INTO `houses` VALUES (9,'143 Chamutengure Rd Gadzema Chinhoyi','Chinhoyi University of Technology',4,15,0,70,'including transport,2 meals, stove','images/vanona.jpg',3,'0772564872','Ralph Shumba');


INSERT INTO `houses` VALUES (10,'31 Richard Rd, Matsheumhlophe, Bulawayo','National University of Science and Technology',3,8,0,40,'Wifi,DSTV,tables and chairs beds','images/3c4da228-6681-4c74-9135-d7f5ec150a98_thumbnail256.jpg',2,'0772564372','Richard Ncube');

INSERT INTO `houses` VALUES (11,'34 Josiah Tongogara Harare cbd','University of Zimbabwe',8,20,0,35,'Wifi,Swimming pool, beds','images/3c4da228-6681-4c74-9135-d7f5ec150a98_thumbnail256.jpg',5,'07775243','Robert Chimuti');

INSERT INTO `houses` VALUES (12,'9 Norfolk Road, Hillside Coldstream Chinhoyi','Chinhoyi University of Technology',12,24,0,35,'10mins away from Campus, fully furnished, Internet,
DSTV. Cleaning Services Offered','images/8f8031f2-d2e4-42c6-9fb7-cc006ba6a1eb-1.jpg',4,'0772520372','John Dombo');
INSERT INTO `houses` VALUES (13,'18 Chinotimba Road, Gadzema Chinhoyi','Chinhoyi University of Technology',6,14,0,65,'5mins away from Campus, fully furnished, Internet,
DSTV. Cleaning Services Offered','images/0c747b49-6f89-4319-8558-6dd05d55ed24_thumbnail256.jpg',4,'0772520372','John Dombo');
INSERT INTO `houses` VALUES (14,'27 Dotombo Road, Muzari Chinhoyi','Chinhoyi University of Technology',9,19,0,40,'5mins away from Campus, fully furnished, Internet,
DSTV. Cleaning Services Offered','images/0cf550fa-0310-49bd-b3d8-8504307fa9ac_thumbnail256.JPG',4,'0772520372','John Dombo');


INSERT INTO `houses` VALUES (15,'823 Brentwood Riverside Bulawayo','National University of Science and Technology',10,22,0,50,'head furnished, WIFI, Library with
Computers available.','images/50ef4f26-01c4-4e7c-aaf7-3aafef3a0e43_thumbnail256.jpg',6,'0772564372','Martin Moyo');
INSERT INTO `houses` VALUES (16,'253 dentrywood Riverside Bulawayo','National University of Science and Technology',4,8,0,70,' WIFI, Library with
Computers available.','images/00d9ec20-603b-48ec-b2ac-f7dad373b402_thumbnail256.JPG',6,'0772564372','Martin Moyo');
INSERT INTO `houses` VALUES (17,'323 Brentstock Selborne Park Bulawayo','National University of Science and Technology',7,13,0,55,'head furnished, WIFI.','images/44cca9a0-6eb3-406a-809b-a1bd70c651d2_thumbnail256.JPG',6,'0772564372','Martin Moyo');

INSERT INTO `houses` VALUES (18,'23 R/Mugabe/3 rd Ave, Bowood Flat 6 Coldstream Chinhoyi','Chinhoyi University of Technology',4,11,0,50,'Available beds, fridge, stove,computers .','images/50ef4f26-01c4-4e7c-aaf7-3aafef3a0e43_thumbnail256.jpg',1,'0772564562','Eric Moyo');
INSERT INTO `houses` VALUES (19,'2 Gotongo Street, Gadzema Chinhoyi','Chinhoyi University of Technology',7,15,0,50,'Fridge, stove,computers .','images/68ccb4ec-9d89-4da6-a174-de0da5d0793b_thumbnail256.JPG',1,'0772564562','Eric Moyo');
INSERT INTO `houses` VALUES (20,'35 Gedye street Muzari Chinhoyi','Chinhoyi University of Technology',4,11,0,50,'Available beds, fridge, stove,computers .','images/a3f8cb2c-736b-4f7c-a39b-becab4d4b114_thumbnail256.jpg',1,'0772564562','Eric Moyo');

INSERT INTO `houses` VALUES (21,'23 Alps Vainona Harare','University of Zimbabwe',4,9,0,65,'DSTV, very close to the college','images/luxury-homes-real-estate-with-luxury-real-estate-luxury-homes-for-sale-luxury.jpg',6,'0772564372','Martin Moyo'); 
INSERT INTO `houses` VALUES (22,'2436 Pendenis Mt Pleasant Harare','University of Zimbabwe',7,13,0,40,'Wifi, very close to the college','images/luxury-homes-real-estate-with-tulsa-luxury-real-estate-breathtaking-tulsa-ok-luxury-home-for-sale.jpg',4,'0772520372','John Dombo');

INSERT INTO `houses` VALUES (23,'346 college road Alexandra Park Harare','University of Zimbabwe',7,13,0,40,'Wifi, very close to the college','images/8b5530268ad5eb995e209f997e38cec5.jpg',6,'0772564372','Martin Moyo');

INSERT INTO `houses` VALUES (24,'346 college road Mt Pleasant Harare','University of Zimbabwe',7,13,0,40,'Wifi, very close to the college','images/8b5530268ad5eb995e209f997e38cec5.jpg',4,'0772520372','John Dombo');


INSERT INTO `houses` VALUES (25,'6 hedgeway road Alexandra Park Harare','University of Zimbabwe',8,14,0,60,'Wifi, very close to the college','images/luxury-homes-real-estate-with-luxury-real-estate-luxury-homes-for-sale-luxury.jpg',2,'0772564372','Richard Ncube');

INSERT INTO `houses` VALUES (26,'34 remmington road Alexandra Park Harare','University of Zimbabwe',8,8,0,46,'Wifi, very close to the college','images/luxury-homes-real-estate-with-tulsa-luxury-real-estate-breathtaking-tulsa-ok-luxury-home-for-sale.jpg',4,'0772520372','John Dombo');

INSERT INTO `houses` VALUES (27,'823 Livingston Riverside Bulawayo','National University of Science and Technology',6,13,0,65,'WIFI, Library with
Computers available.','images/luxury-homes-real-estate-with-luxury-real-estate-luxury-homes-for-sale-luxury.jpg',6,'0772564372','Martin Moyo');

INSERT INTO `houses` VALUES (28,'72 broadway Matsheumhlophe Bulawayo','National University of Science and Technology',10,24,0,35,'WIFI, Library with
Computers available.','images/a3f8cb2c-736b-4f7c-a39b-becab4d4b114_thumbnail256.jpg',6,'0772564372','Martin Moyo');





DROP TABLE IF EXISTS `views_count`;
CREATE TABLE `views_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL,
	`people_id` int(11) NOT NULL, PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `universities`;
CREATE TABLE `universities` (
  `university_id` int(11) NOT NULL AUTO_INCREMENT,
  `university_name` varchar(200) NOT NULL,
  `university_href` varchar(200) NULL,
  `university_statement` text(3000) NOT NULL,  PRIMARY KEY (`university_id`)
);

INSERT INTO `universities` (`university_id`, `university_name`, `university_href`, `university_statement`) VALUES (NULL, 'University of Zimbabwe', 'www.uz.ac.zw', 'The University of Zimbabwe is the oldest, leading and finest University in Zimbabwe which is involved in teaching and research and offers degrees, diplomas and certificates in various disciplines which include arts, agriculture, law, medicine, social studies, science, engineering, education, commerce and veterinary sciences.\r\n              The rigorous academic standards and high quality research output demanded by the University of Zimbabwe on its academic staff has raised both its academic and training profile to make its graduate a highly sought after in industry, commerce, Government departments and other organisations. All University of Zimbabwe programmes are accredited by the Zimbabwe Council for Higher Education and other professional bodies in medicine, law, engineering, accountancy, social work and veterinary science. The university is accredited through the National Council for Higher Education, under the Ministry of Higher and Tertiary Education. English is the language of instruction.');

INSERT INTO `universities` (`university_id`, `university_name`, `university_href`, `university_statement`) VALUES (NULL, 'National University of Science and Technology', 'www.nust.ac.zw', 'The National University of Science and is the second oldest, and one of the leading and finest University in Zimbabwe which is involved in teaching and research and offers degrees, diplomas and certificates in various disciplines which include agriculture, medicine, science, engineering, education, commerce and veterinary sciences.\r\n              The rigorous academic standards and high quality research output demanded by the Natinal University of Science and Technology  on its academic staff has raised both its academic and training profile to make its graduate a highly sought after in industry, commerce, Government departments and other organisations. All Natinal University of Science and programmes are accredited by the Zimbabwe Council for Higher Education and other professional bodies in medicine, engineering, accountancy, social work and veterinary science. The university is accredited through the National Council for Higher Education, under the Ministry of Higher and Tertiary Education. English is the language of instruction.');

INSERT INTO `universities` (`university_id`, `university_name`, `university_href`, `university_statement`) VALUES (NULL, 'Chinhoyi University of Technology', 'www.cut.ac.zw', 'The Chinhoyi University of Technology has grown out of the Chinhoyi Technical Teachers College that was founded in 1991.The university located in Mashonaland West about 120 km from Harare towards Lake Kariba and the Zambian border the university provides undergraduate courses in the fields of agriculture, engineering, and business sciences. Technical teacher education, and creative art and design, are offered through the university’s single institute, the Institute of Lifelong Learning. With nearly 4000 students and an academic staff of 163, the university describes itself as ‘a small but highly selective institution’.');


DROP TABLE IF EXISTS `suburbs`;
CREATE TABLE `suburbs` (
  `suburb_id` int(11) NOT NULL AUTO_INCREMENT,
  `suburb_name` varchar(50) NOT NULL,
  `suburb_statement` text(3000) NOT NULL,
`suburb_college` varchar(200) NOT NULL,  PRIMARY KEY (`suburb_id`)
);

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'vainona', 'Vainona suburb in the northern part of Harare. It is situated close to the University of Zimbabwe .\r\n\r\nThere are two sports clubs in Vainona being the Old Georgians Sports Club and Vainona Sports Club.\r\n\r\nVainona also contains a number of office parks and shopping centres, notably Vainonal Office Park, Vainona Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Vainona has listings that are within walking distance of the university.', 'University of Zimbabwe');

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'mt pleasant', 'Mt Pleasant suburb in the northern part of Harare. It is the home of many University of Zimbabwe faculties.\r\n\r\nThere are two sports clubs in Mount Pleasant being the Old Georgians Sports Club and Mount Pleasant Sports Club.\r\n\r\nMount Pleasant also contains a number of office parks and shopping centres, notably Arundel Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Mount Pleasant has listings that are within walking distance of the university.', 'University of Zimbabwe');

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'alexandra park', 'Alexandra Park suburb in the northern part of Harare. It is the home of many University of Zimbabwe faculties.\r\n\r\nThere are two sports clubs in Alexandra Park being the Old Georgians Sports Club and Alexandra Park Sports Club.\r\n\r\nAlexandra Park also contains a number of office parks and shopping centres, notably Arundel Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Alexandra Park has listings that are within walking distance of the university.', 'University of Zimbabwe');

/*chinhoyi*/

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'coldstream', 'Coldstream suburb in the northern part of Chinhoyi. It is the home of many Chinhoyi University of Technology faculties.\r\n\r\nThere are two sports clubs in Coldstream being the Old Georgians Sports Club and Coldstream Sports Club.\r\n\r\nColdstreamark also contains a number of office parks and shopping centres, notably Coldstream Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Coldstream has listings that are within walking distance of the university.', 'Chinhoyi University of Technology');

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'muzari', 'Muzari suburb in the eastern part of Chinhoyi. It is the home of many Chinhoyi University of Technology faculties.\r\n\r\nThere are two sports clubs in Alexandra Park being the Old Georgians Sports Club and Muzari Sports Club.\r\n\r\nMuzari also contains a number of office parks and shopping centres, notably Muzari Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Muzari has listings that are within walking distance of the university.', 'Chinhoyi University of Technology');

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'gadzema', 'Gadzema suburb in the southern part of Chinhoyi. It is the home of many Chinhoyi University of Technology faculties.\r\n\r\nThere are two sports clubs in Gadzema being the Old Georgians Sports Club and Gadzema Sports Club.\r\n\r\nGadzema also contains a number of office parks and shopping centres, notably Gadzema Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Alexandra Park has listings that are within walking distance of the university.', 'Chinhoyi University of Technology');

/* NUST */

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'selborne Park', 'Selborne Park suburb in the southern part of Bulawayo. It is the home of many National University of Science and Technology faculties.\r\n\r\nThere are two sports clubs in Selborne Park being the Old Georgians Sports Club and Selborne Park Sports Club.\r\n\r\nSelborne Park also contains a number of office parks and shopping centres, notably Selborne Park Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Selborne Park Shopping Centre.\r\n\r\n Selborne Park has listings that are within walking distance of the university.', 'National University of Science and Technology');

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'matsheumhlophe', 'Matsheumhlophe suburb in the western part of Bulawayo. It is the home of many National University of Science and Technology faculties.\r\n\r\nThere are two sports clubs in Matsheumhlophe being the Old Georgians Sports Club and Matsheumhlophe Sports Club.\r\n\r\nMatsheumhlophe also contains a number of office parks and shopping centres, notably Matsheumhlophe Office Park, Arundel Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Matsheumhlophe Shopping Centre.\r\n\r\n Matsheumhlophe has listings that are within walking distance of the university.', 'National University of Science and Technology');

INSERT INTO `suburbs` (`suburb_id`, `suburb_name`, `suburb_statement`, `suburb_college`) VALUES (NULL, 'riverside', 'Riverside suburb in the northern part of Bulawayo. It is the home of many National University of Science and Technology faculties.\r\n\r\nThere are two sports clubs in Riverside being the Old Georgians Sports Club and Riverside Sports Club.\r\n\r\nRiverside also contains a number of office parks and shopping centres, notably Riverside Office Park, Riverside Village Shopping Centre, The Bridge Shopping Centre, Bond Shopping Centre and Pendennis Shopping Centre.\r\n\r\n Riverside has listings that are within walking distance of the university.', 'National University of Science and Technology');








