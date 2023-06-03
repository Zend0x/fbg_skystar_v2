drop database if exists skystar_airways;
create database skystar_airways;
use skystar_airways;

create table airports(
	icao varchar(4) primary key,
	name varchar(100),
	city varchar(100),
	country varchar(100)
);

create table planes(
	registryNum varchar(10) primary key,
	brand ENUM('Airbus','Boeing','Embraer'),
	model varchar(100),
	paxNum int(3)
);

create table routes(
	id int(6) primary key auto_increment,
	origin varchar(4) not null,
	destination varchar(4) not null,
	distance int(4),
	foreign key (origin) references airports(icao),
	foreign key (destination) references airports(icao)
);

create table flights(
	flightNum varchar(8) primary key,
	departure time not null,
	arrival time not null,
	route int(6) not null,
	plane varchar(10),
	foreign key (route) references routes(id),
	foreign key (plane) references planes(registryNum)
);

create table users(
	username varchar(15) primary key,
	name varchar(50),
	surnames varchar(100),
	email varchar(100),
	phoneNum int(9)
);

create table reservations(
	id int(6) primary key,
	user varchar(15),
	flight varchar(8),
	date date,
	foreign key (user) references users(username),
	foreign key (flight) references flights(flightNum)
);

insert into airports(icao,name)values('LEPA','Palma de Mallorca International');
insert into airports(icao,name)values('LEMD','Aeropuerto de Madrid Barajas');

insert into routes(id,origin,destination)values(1,'LEPA','LEMD');
insert into flights(flightNum,departure,arrival,route)values('SST001','12:00','13:30',1);
insert into flights(flightNum,departure,arrival,route)values('SST002','14:00:00','15:30',1);
insert into flights(flightNum,departure,arrival,route)values('SST003','16:00:00','17:30',1);

select * from flights;

select flightNum,departure,route,
(select origin from routes where origin='LEPA' and destination='LEMD') as departureApt,
(select destination from routes where origin='LEPA' and destination='LEMD') as arrivalApt
from flights where route=(select id from routes where origin='LEPA' and destination='LEMD');

SELECT icao FROM airports;