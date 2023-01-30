--Instruções para criar o banco de dados


--Criação do banco e usando o mesmo 
create database logusers;
use logusers;

--Criação da tabela com os seus respectivos campos
create table users(
	id int not null auto_increment primary key,
    nome varchar(100) not null,
    email varchar(110) not null,
    senha varchar(20) not null,
    telefone varchar(20) not null,
    sexo varchar(50) not null,
    nascimento varchar(50) not null,
    cidade varchar(50) not null,
    estado varchar(50) not null,
    endereco varchar(100) not null
);