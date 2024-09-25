CREATE TABLE golfers
(golferid int primary key, name varchar(100), address varchar(200), phone varchar(20));
INSERT INTO golfers VALUE 
(100, 'Rich', '123 Main St.', '555-1234');
INSERT INTO golfers VALUE (101, 'Barbara','123 Main St.', '555-5678');

INSERT INTO golfers Value (102, 'Jake', '123 Main St.', '555-9709');
INSERT INTO golfers value (103, 'Rob', '123 Main St.', '555-2268');

SELECT * FROM golfers

CREATE TABLE games (gameid int auto_increment primary key, golferid int, score int);

INSERT INTO games (golferid, score) VALUES (100, 110);
INSERT INTO games (golferid, score) VALUES (100, 115);
INSERT INTO games (golferid, score) VALUES (100, 105);
INSERT INTO games (golferid, score) VALUES (101, 110);
INSERT INTO games (golferid, score) VALUES (101, 112);
INSERT INTO games (golferid, score) VALUES (101, 130);
INSERT INTO games (golferid, score) VALUES (102, 115);
INSERT INTO games (golferid, score) VALUES (102, 125);
INSERT INTO games (golferid, score) VALUES (102, 130);
INSERT INTO games (golferid, score) VALUES (103, 115);
INSERT INTO games (golferid, score) VALUES (103, 125);
INSERT INTO games (golferid, score) VALUES (103, 130);

SELECT * FROM games

SELECT golferid, name FROM golfers ORDER BY name

SELECT COUNT(score) AS games, AVG(score) AS average FROM games WHERE golferid = 102

SELECT COUNT(score) AS games, AVG(score) AS average FROM games WHERE golferid = 103



