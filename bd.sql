create database ProyectoClassroom;
use ProyectoClassroom;

create table tipo_usuario(
tipo varchar(40),

constraint pk_usuario primary key(tipo)
);

create table estudiante(
Id int auto_increment not null ,
Email varchar(100),
Pass varchar(25),
Nombre varchar(25),
Apellido varchar(40),
Telefono int(9),
tipoUsuario varchar(25),

constraint pk_estudiante primary key(Id),
constraint fk_tipo_usuario_estudiante foreign key (tipoUsuario)
references tipo_usuario(tipo)
);

create table curso(
Id int  auto_increment not null,
Nombre varchar(25),
Costo float,
Descripcion varchar(500),

constraint pk_curso primary key(Id)
);

create table docente(
Id int auto_increment not null ,
Email varchar(100),
Pass varchar(25),
Nombre varchar(25),
Apellido varchar(40),
Telefono int(9),
Id_curso int,
tipoUsuario varchar(25),

constraint pk_docente primary key(Id),
constraint fk_curso_docente foreign key (Id_curso)
references curso(Id),
constraint fk_tipo_usuario_docente foreign key (tipoUsuario)
references tipo_usuario(tipo)
);

create table RegistroMatricula(
Id int auto_increment not null ,
Id_curso int,
Id_estudiante int,

constraint pk_RegistroMatricula primary key(Id),
constraint fk_curso_RegistroMatricula foreign key (Id_curso)
references curso(Id),
constraint fk_estudiante_RegistroMatricula foreign key (Id_estudiante)
references estudiante(Id)
);

create table administrador(
Id int auto_increment not null ,
Email varchar(40),
Pass varchar(25),
Nombre varchar(25),
Apellido varchar(40),
Telefono int(9),
tipoUsuario varchar(25),

constraint pk_administrador primary key(Id),
constraint fk_tipo_usuario_administrador foreign key (tipoUsuario)
references tipo_usuario(tipo)
);

drop database proyectoclassroom;


SELECT d.Id, Email, Pass, d.Nombre, Apellido, Telefono, c.Nombre as curso, tipoUsuario 
FROM docente as d join curso as c on d.Id_curso=c.Id 
group by(d.Id);

delete from docente where Id = 8;

SELECT * FROM docente where Id = 1;

SELECT tu.tipo, d.Email, d.Pass
FROM docente as d join tipo_usuario as tu on d.tipoUsuario=tu.tipo;




