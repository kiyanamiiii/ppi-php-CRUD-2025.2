create database php;
use php;

create table usuarios (
	id int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null    
);

#('HOST', '127.0.0.1');
#('USUARIO', 'root');
#('SENHA', 'root');
#('DB', 'php');
