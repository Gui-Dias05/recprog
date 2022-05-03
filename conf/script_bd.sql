CREATE SCHEMA IF NOT EXISTS recuperacaoAV01 DEFAULT CHARACTER SET utf8 ;
USE recuperacaoAV01;

CREATE TABLE Livro (
l_idLivro INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
l_titulo VARCHAR(250),
l_ano_publicacao INT,
l_isdn VARCHAR(45),
l_preco DECIMAL(16,2));
CREATE TABLE Autor (
a_idAutor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
a_nome VARCHAR(45),
a_sobrenome VARCHAR(45));

CREATE TABLE Livro_Autor (
la_l_idLivro INT NOT NULL,
la_a_idAutor INT NOT NULL,
PRIMARY KEY (la_l_idLivro, la_a_idAutor),
FOREIGN KEY (la_l_idLivro) REFERENCES Livro (l_idLivro),
FOREIGN KEY (la_a_idAutor) REFERENCES Autor (a_idAutor));

CREATE TABLE Cliente (
c_idCliente INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
c_nome VARCHAR(250),
c_cpf VARCHAR(45),
c_dt_nascimento VARCHAR(45));

CREATE TABLE Venda (
v_idVenda INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
v_valor_total_venda DECIMAL(16,2),
v_desconto DECIMAL(16,2),
v_c_idCliente INT NOT NULL,
iv_data_venda VARCHAR(45),
FOREIGN KEY (v_c_idCliente) REFERENCES Cliente (c_idCliente));

CREATE TABLE Item_venda (
iv_v_idVenda INT NOT NULL,
iv_l_idLivro INT NOT NULL,
iv_quantidade INT,
iv_valor_total_item DECIMAL(16,2),
PRIMARY KEY (iv_v_idVenda, iv_l_idLivro),
FOREIGN KEY (iv_v_idVenda) REFERENCES Venda (v_idVenda),
FOREIGN KEY (iv_l_idLivro) REFERENCES Livro (l_idLivro));
-- INSERÇÃO DE REGISTROS DE EXEMPLO
INSERT INTO Autor VALUES (NULL,'MARCELA','LEITE'),
(NULL,'RODRIGO','CURVELLO');

INSERT INTO Cliente VALUES (NULL,'MARIA','0123455','31/12/1999'),
(NULL,'JOÃO','987654','01/01/2000');

INSERT INTO Livro VALUES (NULL,'PROGRAMAÇÃO OO COM
PHP','2022','123456-09',200.00),

(NULL,'COZINHANDO COM PHP','2023','342566-0',300.00),
(NULL,'A ARTE DA DEPURAÇÃO COM

PHP','2020','333444-90',100.00);
INSERT INTO Livro_Autor VALUES (1,1),(2,1),(2,2),(3,2);
INSERT INTO Venda VALUES (NULL, 800.00,0,1,'26/04/2022'),

(NULL, 350.00,50.0,2,'10/04/2022');
INSERT INTO Item_venda VALUES (1,1,1,200.0),
(1,2,2,600.0),
(2,2,1,300.0),
(2,3,1,100.0);