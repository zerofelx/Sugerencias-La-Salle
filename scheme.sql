create table usuarios(
    ID integer not null AUTO_INCREMENT,
    username varchar(30) not null,
    psw varchar(50) not null,
    rol varchar(10) not null,
    locked boolean not null,
    primary key(ID)
);

-- Esta es la creación del usuario admin
INSERT INTO usuarios (username, psw, rol, locked) VALUES ("andrea", "098f6bcd4621d373cade4e832627b4f6", "admin", 0)
-- La contraseña "098f6bcd4621d373cade4e832627b4f6" es "test"

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


CREATE TABLE suggestions(
    ID integer not null AUTO_INCREMENT,
    userid integer not null,
    moduloid integer not null,
    titulo varchar(80) not null,
    descripcion varchar(250) not null,
    fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key(ID)
);

CREATE TABLE likes(
    ID integer not null AUTO_INCREMENT,
    userid integer not null,
    suggestionid integer not null,
    opinion boolean not null,
    primary key(ID)
);

CREATE TABLE comments(
    ID integer not null AUTO_INCREMENT,
    userid integer not null,
    suggestionid integer not null,
    descripcion varchar(250) not null,
    primary key(ID)
);