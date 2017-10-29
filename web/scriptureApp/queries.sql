CREATE TABLE users (email VARCHAR(65), user_name VARCHAR(25), password VARCHAR(255));
ALTER TABLE users ADD id SERIAL PRIMARY KEY NOT NULL;

ALTER TABLE notes DROP CONSTRAINT 'notes_pkey';

ALTER TABLE notes ADD FOREIGN KEY (user_id) REFERENCES users;

INSERT INTO topics (name, user_id) values ('Faith', 1);
INSERT INTO topics (name, user_id) values ('Sacrifice', 1);
INSERT INTO topics (name, user_id) values ('Charity', 1);
INSERT INTO topics (name, user_id) values ('Hope', 1);
INSERT INTO topics (name, user_id) values ('Prayer', 1);
INSERT INTO topics (name, user_id) values ('Faith', 2);
INSERT INTO topics (name, user_id) values ('Sacrifice', 2);
INSERT INTO topics (name, user_id) values ('Charity', 2);
INSERT INTO topics (name, user_id) values ('Hope', 2);
INSERT INTO topics (name, user_id) values ('Prayer', 2);