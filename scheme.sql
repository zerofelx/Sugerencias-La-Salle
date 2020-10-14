create table usuarios(
    ID integer not null AUTO_INCREMENT,
    username varchar(30) not null,
    psw varchar(50) not null,
    rol varchar(10) not null,
    locked boolean not null,
    primary key(ID)
);

create table modulos (
    ID integer not null AUTO_INCREMENT,
    Modulo varchar(4) not null,
    Ciclo varchar(4) not null,
    Descripcion varchar(80),
    primary key(ID)
);

INSERT INTO modulos (Modulo, Ciclo, Descripcion) VALUES 
    ("M01", "ASIR", "Implantación de sistemas operativos"), 
    ("M09", "ASIR", "Implantación de aplicaciones web"), 
    ("M01", "DAM", "Programación de servicios y procesos");