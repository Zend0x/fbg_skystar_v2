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
	brand ENUM('Airbus','Embraer'),
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
	id int(6) auto_increment primary key,
	flightNum varchar(8),
    date date,
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
	flight int(6),
	date date,
	foreign key (user) references users(username),
	foreign key (flight) references flights(id)
);

create table flightsReservations(
	flightId int(6),
	reservationId int(6),
	primary key (flightId, reservationId),
	foreign key (flightId) references flights(id),
	foreign key (reservationid) references reservations(id)
);

insert into airports(icao,name)values('LEPA','Palma de Mallorca International');
insert into airports(icao,name)values('LEMD','Aeropuerto de Madrid Barajas');

insert into routes(id,origin,destination)values(1,'LEPA','LEMD');
insert into flights(flightNum,date,departure,arrival,route)values('SST001',"2023-06-12",'12:00','13:30',1);
insert into flights(flightNum,date,departure,arrival,route)values('SST001',"2023-06-13",'12:00','13:30',1);
insert into flights(flightNum,date,departure,arrival,route)values('SST001',"2023-06-14",'12:00','13:30',1);