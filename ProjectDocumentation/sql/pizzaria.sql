
CREATE TABLE pessoa(
	idpessoa int AUTO_INCREMENT PRIMARY KEY,
 	nome varchar(100) NOT null,
 	sobrenome varchar(100) NOT null,
    email varchar(255)  NOT null,
    senha varchar (255)  NOT null,
    cep varchar(14)  NOT null,
    cidade varchar(100) NOT null,
    bairro varchar(100) NOT null,
    numerocasa int NOT NULL,
    telefone varchar(14)  NOT null
  
);

CREATE TABLE cliente(
idpessoa int PRIMARY KEY,
FOREIGN KEY (idpessoa) REFERENCES pessoa (idpessoa) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE funcionario(
idpessoa int PRIMARY KEY,
 cargo varchar(100)  NOT null,
 salario float  NOT null,
FOREIGN KEY (idpessoa) REFERENCES pessoa (idpessoa) ON DELETE CASCADE ON UPDATE CASCADE
);
create table produto (
idproduto int AUTO_INCREMENT PRIMARY KEY,
titulo varchar(100) NOT null,
descricao varchar(100) NOT null
);
CREATE TABLE pizza(
idproduto int PRIMARY KEY ,
borda varchar(3) NOT NULL,
tamanho varchar(50) NOT NULL,
FOREIGN KEY (idproduto) REFERENCES produto (idproduto) ON UPDATE CASCADE ON DELETE CASCADE
    
);
CREATE TABLE complemento 
(
idcomplemento int AUTO_INCREMENT PRIMARY KEY,

    
 nome varchar(100) NOT Null,
 quantidade int NOT Null

 );
 create table pizzaComplemento(
idcomplemento int NOT NULL,
idproduto int NOT NULL,
FOREIGN KEY (idproduto) REFERENCES pizza(idproduto),
FOREIGN KEY (idcomplemento) REFERENCES complemento  (idcomplemento) ON UPDATE CASCADE ON DELETE CASCADE




 );
  
 create TABLE pedido (
     idproduto int,
     idpessoa int,
     stutusPedido text,
     data_hora datetime,
     preco float,   
  
     FOREIGN KEY (idproduto) REFERENCES pizza(idproduto) ON UPDATE CASCADE ON DELETE CASCADE,
     FOREIGN KEY (idpessoa) REFERENCES cliente (idpessoa) ON UPDATE CASCADE ON DELETE CASCADE

 );
 create table gerente(
 idpessoa int PRIMARY KEY,
 FOREIGN KEY (idpessoa) REFERENCES funcionario (idpessoa) ON DELETE CASCADE ON UPDATE CASCADE

 );

 insert into pessoa (nome,sobrenome,email,senha,cep,cidade,bairro,numerocasa,telefone) values('joao','batista','joaobspaula@hotmail.com','$2y$10$ZApizv/eHitUthmvcdkgSeywEvM1WI8XmFcG/ridRKSSilGBOzofG','000.000.000','uberlândia','shopping park',0,'0 0000-0000');
INSERT INTO funcionario(idpessoa,cargo,salario) VALUES (1,'grente geral',6.000);
INSERT INTO gerente(idpessoa) VALUES (1);