/**=====================================================================================================================================
##################### SCRIPTS DE CRIAÇÃO DO BANCO ##################

1. Criar um banco de dados utilizando a linguagem SQL chamado polivalência de acordo com as considerações abaixo:
	1.1 O funcionário deve possuir características como nome, data de nascimento, cidade, telefone.
	1.2 O posto de trabalho deve conter informações do setor do posto, nome do posto e tipo do posto.
	1.3 O banco de dados deve ser capaz de permitir a polivalência (o funcionário pode ser habilitado a diversos postos de trabalho). 
		E a habilitação de cada funcionário deve conter uma data de validade.
=====================================================================================================================================**/;

-- Criação do banco de dados;
CREATE DATABASE polivalencia;

-- Selecionando banco de dados;
USE polivalencia;

-- Criação da tabela de funcionários;
CREATE TABLE [funcionarios] (
	[id]				 BIGINT PRIMARY KEY IDENTITY,
	[nome]				 [VARCHAR](50) NOT NULL,
	[data_de_nascimento] DATE NOT NULL,
	[cidade]			 [VARCHAR](50) NOT NULL,
	[pais]				 [VARCHAR](50) NOT NULL,
	[telefone]			 [VARCHAR](11)
);

-- Criação da tabela de posto de trabalho
CREATE TABLE [postos_de_trabalho] (
	[id]		BIGINT PRIMARY KEY IDENTITY,
	[nome]		[VARCHAR](50) NOT NULL,
	[tipo]		[VARCHAR](50) NOT NULL,
	[descricao]	[VARCHAR](100)
);

-- Criação da tabela PIVOT funcionarios_postos
CREATE TABLE [funcionarios_postos_de_trabalho] (
	[id]					BIGINT PRIMARY KEY IDENTITY,
	[id_funcionario]		BIGINT NOT NULL,
	[id_posto_de_trabalho]	BIGINT NOT NULL,
	[data_inicio]			DATE  NOT NULL,
	[data_expiracao]		DATE  NOT NULL,

	-- DEFININDO AS CHAVES ESTRANGEIRAS
	CONSTRAINT FK_id_funcionario FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id),
	CONSTRAINT FK_id_posto_de_trabalho FOREIGN KEY (id_posto_de_trabalho) REFERENCES postos_de_trabalho(id)
);


/**=====================================================================================================================================
################### SCRIPTS DE INSERÇÃO DE DADOS ##################
=====================================================================================================================================**/;

-- Adicionando funcionário
INSERT INTO funcionarios(nome, data_de_nascimento, cidade, pais, telefone) VALUES ('João Pereira', '01-01-2000', 'Salvador', 'Brasil', '719999-9999');
INSERT INTO funcionarios(nome, data_de_nascimento, cidade, pais, telefone) VALUES ('Maria Silva', '01-01-2001', 'São Paulo', 'Brasil', '119999-9999');
SELECT * FROM funcionarios;

-- Adicionando postos de trabalho;
INSERT INTO postos_de_trabalho(nome, tipo, descricao) VALUES ('Salvador', 'Desenvolvimento', 'Studio de desenvolvimento de softwares.');
INSERT INTO postos_de_trabalho(nome, tipo, descricao) VALUES ('São Paulo', 'Pesquisa', 'Célula de pesquisa sobre RPA.');
INSERT INTO postos_de_trabalho(nome, tipo, descricao) VALUES ('São Paulo', 'Desenvolvimento', 'Studio de desenvolvimento de softwares.');
SELECT * FROM postos_de_trabalho;

-- Associando funcionário ao posto de trabalho;
INSERT INTO funcionarios_postos_de_trabalho(id_funcionario, id_posto_de_trabalho, data_inicio, data_expiracao) VALUES(1,2,'01-01-2015', '01-01-2021');
INSERT INTO funcionarios_postos_de_trabalho(id_funcionario, id_posto_de_trabalho, data_inicio, data_expiracao) VALUES(1,3, GETDATE(), '01-01-2021');
SELECT * FROM funcionarios_postos_de_trabalho;


/**=====================================================================================================================================
################### Questão 02 ##################
Crie uma consulta SQL que devolva os funcionários habilitados ao posto de trabalho “São Paulo”
com mais de 1 mês de habilitação com base na data atual.
=====================================================================================================================================**/;
SELECT 
	f.nome AS [Nome do funcionário],
	pt.nome AS [Posto de trabalho],
	pt.descricao AS [Informações do posto de trabalho],
	fpt.data_inicio,
	fpt.data_expiracao
FROM funcionarios_postos_de_trabalho fpt
	LEFT JOIN funcionarios f ON f.id = fpt.id_funcionario
	LEFT JOIN postos_de_trabalho pt ON pt.id = fpt.id_posto_de_trabalho
WHERE
	pt.nome = 'São Paulo' AND DATEDIFF(MONTH, fpt.data_inicio,  GETDATE()) > 1;