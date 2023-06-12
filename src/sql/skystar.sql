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
    basePrice int(4),
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
    flightDuration time,
    capacity int(3),
	foreign key (route) references routes(id),
	foreign key (plane) references planes(registryNum)
);

create table users(
	username varchar(15) primary key,
    password varchar(255),
	name varchar(50),
	surnames varchar(100),
	email varchar(100),
	phoneNum int(9)
);

create table reservations(
	id int(6) primary key auto_increment,
	user varchar(15),
	flight int(6),
	date date,
    price int(4),
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
insert into airports(icao,name)values('UTTT','Tashkent Yuzhny Airport');
insert into airports(icao,name)values('VHHH','Hong Kong International Airport');
insert into airports(icao,name)values('EDDF','Frankfurt Airport');
insert into airports(icao,name)values('RKSI','Seoul-Incheon International Airport');

insert into routes(id,origin,destination,basePrice)values(1,'LEPA','LEMD',20);
insert into routes(id,origin,destination,basePrice)values(2,'LEMD','LEPA',20);
insert into routes(id,origin,destination,basePrice)values(3,'LEMD','VHHH',400);
insert into routes(id,origin,destination,basePrice)values(4,'LEPA','EDDF',50);
insert into routes(id,origin,destination,basePrice)values(5,'LEMD','RKSI',500);
insert into routes(id,origin,destination,basePrice)values(6,'LEPA','UTTT',250);
insert into routes(id,origin,destination,basePrice)values(7,'UTTT','LEPA',250);
    
insert into planes(registryNum,brand,model,paxNum)values('EC-SKT','Airbus','A320-214',180);

insert into flights(flightNum,date,departure,arrival,route,flightDuration,plane,capacity)values('SST001',"2023-06-12",'12:00','13:30',1,'01:30','EC-SKT',0);
insert into flights(flightNum,date,departure,arrival,route,flightDuration,plane,capacity)values('SST002',"2023-06-12",'14:30','16:00',2,'01:30','EC-SKT',180);
insert into flights(flightNum,date,departure,arrival,route,flightDuration,plane,capacity)values('SST003',"2023-06-12",'17:00','18:30',1,'01:30','EC-SKT',180);
insert into flights(flightNum,date,departure,arrival,route,flightDuration,plane,capacity)values('SST005',"2023-06-12",'19:30','21:00',2,'01:30','EC-SKT',180);
insert into flights(flightNum,date,departure,arrival,route,flightDuration)values('SST641',"2023-06-26",'12:00','06:00',6,'12:30');
insert into flights(flightNum,date,departure,arrival,route,flightDuration)values('SST642',"2023-06-27",'12:00','19:00',7,'7:30');

insert into flights(flightNum,date,departure,arrival,route)values('SST002',"2023-06-13",'14:30','16:00',2);


/*
SELECT f.id, f.flightNum, f.date, f.departure, f.arrival, f.route, r1.origin AS departureApt, r1.destination AS arrivalApt
FROM flights f
JOIN routes r1 ON f.route = r1.id
JOIN routes r2 ON r1.origin = r2.origin AND r1.destination = r2.destination
WHERE f.date LIKE '2023-06-12' AND r2.origin = 'LEPA' AND r2.destination = 'LEMD';

select * from flights;

SELECT flights.flightNum, flights.date, flights.departure, flights.arrival, 
       departure_airports.name AS departureAirportName, arrival_airports.name AS arrivalAirportName
FROM flights
JOIN routes ON routes.id = flights.route
JOIN airports AS departure_airports ON departure_airports.ICAO = routes.origin
JOIN airports AS arrival_airports ON arrival_airports.ICAO = routes.destination
WHERE flights.id = 1;
*/

