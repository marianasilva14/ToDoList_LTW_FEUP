CREATE TABLE category (
  cat_id INTEGER PRIMARY KEY,
  cat_name VARCHAR NOT NULL
);

CREATE TABLE to_do (
  toDO_id INTEGER PRIMARY KEY,
  toDO_description VARCHAR NOT NULL,
  cat_id INTEGER REFERENCES category NOT NULL,
  usr_id INTEGER REFERENCES usr_info NOT NULL
);

CREATE TABLE usr_info (
  usr_id INTEGER PRIMARY KEY,
  usr_username VARCHAR NOT NULL,
  usr_password VARCHAR NOT NULL,
  usr_age Integer NOT NULL,
  usr_email VARCHAR NOT NULL
);

INSERT INTO category VALUES (1, 'Finanças');
INSERT INTO category VALUES (2, 'Emprego');
INSERT INTO category VALUES (3, 'Projetos Pessoais ');
INSERT INTO category VALUES (4, 'Desporto');
INSERT INTO category VALUES (5, 'Tarefas');
INSERT INTO category VALUES (6, 'Lazer');
INSERT INTO category VALUES (7, 'Outros');

INSERT INTO to_do VALUES (1,'Pagar a luz',1,1);

INSERT INTO to_do VALUES (2,'Pagar a água',1,1);

INSERT INTO to_do VALUES (3,'Proejto LTW',2,1);

INSERT INTO to_do VALUES (4,'Arranjar o carro',3,1);

INSERT INTO to_do VALUES (5,'Mudar a lâmpada da casa de banho',5,1);

INSERT INTO to_do VALUES (6,'Ver Star Wars',6,1);

INSERT INTO usr_info VALUES(1, 'John', 'John123', 25, 'john@fe.up.pt');
