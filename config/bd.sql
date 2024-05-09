create database banco1;
use banco1;

create table agenda(
	id INT AUTO_INCREMENT PRIMARY KEY,
    agendamento DATE,
    momento varchar(10),
    idCliente INT,
    FOREIGN KEY (idCliente) REFERENCES usuarios(idCliente)
);

create table usuarios(
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255),
    idade int,
    email varchar(255),
    senha varchar(55),
);
insert into usuarios

DELETE FROM agenda WHERE id > 0;

select *from agenda;
select *from usuarios;