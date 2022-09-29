create table cliente(codigo int PRIMARY KEY AUTO_INCREMENT,
                     nome varchar(50) not null,
                     cpf varchar(20) not null,
                     rg varchar(20) not null,
                     cep varchar(20) not null,
                     numero varchar(10) not null,
					 celular varchar(20) not null,
                     email varchar(40) not null)