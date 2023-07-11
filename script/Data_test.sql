Insert into categorie_regime values (default,'Basique'),(default,'Dinamique');

CREATE TABLE plat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL UNIQUE,
    etat INT NOT NULL, -- 0 matin, 5 midi, 10 soir
    CHECK(etat >= 0)
);

Insert into plat values (default,'Vary Soa',0),(default,'Dite',0),(default,'Cafe',0),(default,'Mofo',0),(default,'Jus orange',0),
(default,'Pate',5),(default,'Vary',5),(default,'Mofo sy Atody',5),(default,'Anana sy Voanjo',5),(default,'Sosisy',5),
(default,'Soupe',10),(default,'Vary @ anana',10),(default,'Tsock',10),(default,'Silamangany',10),(default,'Spagethi',10);




INSERT INTO entrainement values (default,0),(default,11),(default,21);

INSERT into activite values (default,'Pompe'),(default,'Marche a pied'),(default,'Pont');

INSERT into activite_entrainement values 
    (default,2,1,5),(default,2,2,10),(default,2,3,7),
    (default,1,1,5),(default,1,2,5),(default,1,3,6),
    (default,3,1,10),(default,3,2,15),(default,3,3,12),
INSERT INTO entrainement values (default,0),(default,11),(default,21);

INSERT INTO code VALUES
('1283081qwe1823', 123780234, 1),
('uroiew27489122', 123780234, 1),
('sdfhide456werr', 123780234, 1),
('271807ed08hap2', 123780234, 1),
('23asd2a5fhu131', 123780234, 1),
('xh11cb23ai1232', 123780234, 1),
('sdyf234i9jcq34', 123780234, 1),
('hvwyiwu64279q8', 123780234, 1),
('wry78suhri2y23', 123780234, 1),
('y2984y5wefh3y2', 123780234, 1),
('xcuv42923u4iof', 123780234, 1),
('4w9tjosqy9e8hi', 123780234, 1),
('43u89hcinq4311', 123780234, 1),
('4gwsr2354y7815', 123780234, 1),
('134urioehfb723', 123780234, 1);

INSERT INTO user_account VALUES(DEFAULT, 'Alain', 'Rico', '2004-05-31', '1234', 'alainricor@gmail.com');

INSERT INTO pending_validation VALUES(DEFAULT, NOW(), 1, '4gwsr2354y7815', 1);
