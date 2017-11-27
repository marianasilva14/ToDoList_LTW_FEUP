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

INSERT INTO category VALUES (1, 'Finances');
INSERT INTO category VALUES (2, 'Job');
INSERT INTO category VALUES (3, 'Personal Projects ');
INSERT INTO category VALUES (4, 'Sport');
INSERT INTO category VALUES (5, 'Tasks');
INSERT INTO category VALUES (6, 'Free time');
INSERT INTO category VALUES (7, 'Others');

INSERT INTO to_do VALUES (1,'Pay the light',1,1);

INSERT INTO to_do VALUES (2,'Pay the water',1,1);

INSERT INTO to_do VALUES (3,'Project LTW',2,1);

INSERT INTO to_do VALUES (4,'Curry the car',3,1);

INSERT INTO to_do VALUES (5,'Changing the bathroom lamp',5,1);

INSERT INTO to_do VALUES (6,'Watch Star Wars',6,1);

INSERT INTO usr_info VALUES(1, 'John', 'John123', 25, 'john@fe.up.pt');
