DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS to_do;
DROP TABLE IF EXISTS usr_info;
DROP TABLE IF EXISTS to_do_list;
DROP TABLE IF EXISTS share;

CREATE TABLE category (
  cat_id INTEGER PRIMARY KEY,
  cat_name VARCHAR NOT NULL,
  cat_photo VARCHAR( 100 ) NOT NULL
);

CREATE TABLE to_do_list (
  toDoList_id INTEGER PRIMARY KEY AUTOINCREMENT,
  toDoList_name VARCHAR NOT NULL,
  toDoList_isCompleted BIT NOT NULL DEFAULT 0,
  cat_id INTEGER REFERENCES category NOT NULL,
  usr_id INTEGER REFERENCES usr_info NOT NULL
);

CREATE TABLE to_do (
  toDO_id INTEGER PRIMARY KEY AUTOINCREMENT,
  toDO_description VARCHAR NOT NULL,
  toDO_priority VARCHAR NOT NULL,
  toDO_deadline DATE,
  toDo_isCompleted BIT NOT NULL DEFAULT 0,
  toDoList_id INTEGER REFERENCES to_do_list NOT NULL,
  usr_id INTEGER REFERENCES usr_info NOT NULL
);

CREATE TABLE usr_info (
  usr_id INTEGER PRIMARY KEY AUTOINCREMENT,
  usr_name VARCHAR NOT NULL,
  usr_username VARCHAR NOT NULL UNIQUE,
  usr_password VARCHAR NOT NULL,
  usr_age Integer NOT NULL,
  usr_email VARCHAR NOT NULL,
  usr_photo VARCHAR( 100 ) NOT NULL
);

CREATE TABLE share (
  share_id INTEGER PRIMARY KEY AUTOINCREMENT,
  toDoList_id INTEGER REFERENCES to_do_list NOT NULL,
  usr_id INTEGER REFERENCES usr_info NOT NULL
);

INSERT INTO category VALUES (1, 'Finances', 'images/finances.png');
INSERT INTO category VALUES (2, 'Free time' , 'images/freeTime.png');
INSERT INTO category VALUES (3, 'Job','images/job.png');
INSERT INTO category VALUES (4, 'Others' , 'images/others.png');
INSERT INTO category VALUES (5, 'Personal Projects', 'images/projects.png');
INSERT INTO category VALUES (6, 'Sport', 'images/sports.png');
