-- DROP SCHEMA coopersystem;

CREATE SCHEMA coopersystem AUTHORIZATION postgres;

-- Drop table

-- DROP TABLE coopersystem.users

CREATE TABLE coopersystem.users (
	id bigserial NOT NULL,
	"name" varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	email_verified_at timestamp NULL,
	"password" varchar(255) NOT NULL,
	remember_token varchar(100) NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT users_email_unique UNIQUE (email),
	CONSTRAINT users_pkey PRIMARY KEY (id)
)
WITH (
	OIDS=FALSE
) ;


-- Drop table

-- DROP TABLE coopersystem.produtos

CREATE TABLE coopersystem.produtos (
	id serial NOT NULL,
	nome varchar(80) NOT NULL,
	valor_unitario numeric(10,2) NULL,
	quantidade_estoque int2 NOT NULL,
	situacao bool NOT NULL,
	updated_at timestamp NOT NULL DEFAULT now(),
	created_at timestamp NOT NULL DEFAULT now(),
	CONSTRAINT produto_pkey PRIMARY KEY (id)
)
WITH (
	OIDS=FALSE
) ;

-- Column comments

COMMENT ON COLUMN coopersystem.produtos.id IS 'Id do produto' ;
COMMENT ON COLUMN coopersystem.produtos.nome IS 'Nome do produto' ;
COMMENT ON COLUMN coopersystem.produtos.valor_unitario IS 'Valor uni' ;
COMMENT ON COLUMN coopersystem.produtos.quantidade_estoque IS 'Quantidade do produto em estoque' ;
COMMENT ON COLUMN coopersystem.produtos.situacao IS 'Situação do produto' ;


-- Drop table

-- DROP TABLE coopersystem.pedidos

CREATE TABLE coopersystem.pedidos (
	id serial NOT NULL,
	produto_id int4 NOT NULL,
	quantidade int4 NOT NULL,
	valor_unitario numeric(10,2) NOT NULL,
	data_pedido timestamp NULL DEFAULT now(),
	solicitante varchar(80) NOT NULL,
	cep varchar(8) NOT NULL,
	uf varchar(2) NOT NULL,
	municipio varchar(30) NOT NULL,
	bairro varchar(30) NOT NULL,
	rua varchar(30) NOT NULL,
	numero varchar(10) NOT NULL,
	complemento varchar(30) NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT pedido_pkey PRIMARY KEY (id),
	CONSTRAINT produtos_produto_fk FOREIGN KEY (produto_id) REFERENCES coopersystem.produtos(id)
)
WITH (
	OIDS=FALSE
) ;

COMMENT ON COLUMN coopersystem.pedidos.id IS 'Id do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.produto_id IS 'Chave estrangeira referenciando o id do produto' ;
COMMENT ON COLUMN coopersystem.pedidos.quantidade IS 'Quantidade do produto no pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.valor_unitario IS 'Valor unitário do produto' ;
COMMENT ON COLUMN coopersystem.pedidos.data_pedido IS 'Data de registro do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.solicitante IS 'Cliente solicitante do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.cep IS 'CEP para entrega do produto' ;
COMMENT ON COLUMN coopersystem.pedidos.uf IS 'UF para entrega do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.municipio IS 'Município para entrega do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.bairro IS 'Bairro para entrega do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.rua IS 'Rua para entrega do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.numero IS 'Número (endereço) para entrega do pedido' ;
COMMENT ON COLUMN coopersystem.pedidos.complemento IS 'Complemento (endereço) para entrega do pedido' ;

-- Drop table

-- DROP TABLE coopersystem.password_resets

CREATE TABLE coopersystem.password_resets (
	email varchar(255) NOT NULL,
	token varchar(255) NOT NULL,
	created_at timestamp NULL
)
WITH (
	OIDS=FALSE
) ;
CREATE INDEX password_resets_email_index ON coopersystem.password_resets USING btree (email) ;

-- Drop table

-- DROP TABLE coopersystem.migrations

CREATE TABLE coopersystem.migrations (
	id serial NOT NULL,
	migration varchar(255) NOT NULL,
	batch int4 NOT NULL,
	CONSTRAINT migrations_pkey PRIMARY KEY (id)
)
WITH (
	OIDS=FALSE
) ;

INSERT INTO coopersystem.users (id, "name", email, email_verified_at, "password", remember_token, created_at, updated_at) VALUES(1, 'usuario', 'usuario@coopersystem.com', NULL, '$2y$10$CcK17pXCQuU0tlM.N0PEuu712LnpFRx5buL8J4bEQF9fTpL9LCCGS', NULL, NULL, NULL);
