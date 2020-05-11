-- Database: "ProyectoCCV"

-- DROP DATABASE "ProyectoCCV";

CREATE DATABASE "ProyectoCCV"
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'Spanish_Guatemala.1252'
       LC_CTYPE = 'Spanish_Guatemala.1252'
       CONNECTION LIMIT = -1;


CREATE TABLE Usuario(
Username varchar(30),
Clave varchar(50),
PRIMARY KEY(Username)
)

CREATE TABLE Departamento (
CodigoD integer,
NombreD varchar(20),
PRIMARY KEY (CodigoD)
)

CREATE TABLE Jornada ( --Por el contexto del problema, para evitar redundancia en la informacion hubiera sido mejor tomar como llave primaria al par (HoraEntrada,HoraSalida)
CodigoJ integer,
NombreJ varchar(20),
HoraEntrada time,
HoraSalida time,
PRIMARY KEY (CodigoJ)
)

CREATE TABLE Empleado (
CodigoE integer,
NombreE varchar(20),
CodigoD integer,
CodigoJ integer,
PRIMARY KEY (CodigoE),
FOREIGN KEY (CodigoD) REFERENCES Departamento(CodigoD),
FOREIGN KEY (CodigoJ) REFERENCES Jornada(CodigoJ)
)

CREATE TABLE Registro (
CodigoE integer,
Fecha date,
TipoMarca char(1),
Hora time,
PRIMARY KEY (CodigoE,Fecha,TipoMarca),
FOREIGN KEY (CodigoE) REFERENCES Empleado(CodigoE),
CHECK (TipoMarca IN ('E','S'))
)

CREATE TABLE Permiso (
CodigoP integer,
CodigoE integer,
Fecha date,
Descripcion varchar(100),
PRIMARY KEY (CodigoE,Fecha),
FOREIGN KEY (CodigoE) REFERENCES Empleado(CodigoE) ON DELETE CASCADE,
CHECK(CodigoP IN (1,2,3))
)

CREATE INDEX indiceUsuarios ON Usuario USING hash (Username)

CREATE INDEX indiceRegistros ON Registro USING btree (CodigoE,Fecha ASC)

CREATE INDEX indicePermisos ON Permiso USING btree (CodigoE,Fecha ASC)

INSERT INTO Usuario VALUES ('root','Z4R7S5A3D')

CREATE USER root WITH PASSWORD 'Z4R7S5A3D'

GRANT SELECT,INSERT,DELETE,UPDATE ON Permiso TO root

GRANT SELECT ON Empleado TO root

--CREAR USUARIOS SOLO DESDE LA APLICACION

--OTORGAR Y REMOVER PRIVILEGIOS SOLO DESDE LA APLICACION

