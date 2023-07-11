Insert into categorie_regime values
    (default,'Basique'),
    (default,'Dinamique');

CREATE TABLE plat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL UNIQUE,
    etat INT NOT NULL, -- 0 matin, 5 midi, 10 soir
    CHECK(etat >= 0)
);

Insert into plat values
    (default,'Vary Soa',0),(default,'Dite',0),(default,'Cafe',0),
    (default,'Mofo',0),(default,'Jus orange',0),(default,'Pate',5),
    (default,'Vary',5),(default,'Mofo sy Atody',5),(default,'Anana sy Voanjo',5),(default,'Sosisy',5),
    (default,'Soupe',10),(default,'Vary @ anana',10),(default,'Tsock',10),
    (default,'Silamangany',10),(default,'Spagethi',10);

INSERT INTO entrainement values
    (default,0),
    (default,11),
    (default,21);

INSERT into activite values
    (default,'Pompe'),
    (default,'Marche a pied'),
    (default,'Pont');

INSERT into activite_entrainement values 
    (default,2,1,5),(default,2,2,10),(default,2,3,7),
    (default,1,1,5),(default,1,2,5),(default,1,3,6),
    (default,3,1,10),(default,3,2,15),(default,3,3,12),

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

INSERT INTO user_account VALUES
    (DEFAULT, 'Alain', 'Rico', '2004-05-31', '1234', 'alainricor@gmail.com'),
    (DEFAULT, 'Tsiky', 'Aro', '2003-11-24', '5678', 'tsikyaro@gmail.com'),
    (DEFAULT, 'Vioart', 'Vidoc', '2004-07-10', '9101', 'vioart@gmail.com');

INSERT INTO pending_validation VALUES
    (DEFAULT, NOW(), 1, '4gwsr2354y7815', 1);

INSERT INTO regime VALUES
    (DEFAULT, 'Sans glutene', 1, 3, 1, 4, 2500),
    (DEFAULT, 'Proteine', 2, 2, 1, 3, 4750),
    (DEFAULT, 'Modere', 1, 6, 1, 7, 3500);

INSERT INTO detail_regime VALUES
    (DEFAULT, 1, 1, 5, 4, 9, 1),
    (DEFAULT, 1, 2, 3, 6, 8, 1),
    (DEFAULT, 1, 3, 2, 10, 5, 2),
    (DEFAULT, 1, 4, 5, 11, 11, 1),
    (DEFAULT, 1, 5, 6, 3, 2, 3),
    (DEFAULT, 1, 6, 9, 2, 1, 2),
    (DEFAULT, 1, 7, 13, 5, 6, 3),
    (DEFAULT, 2, 1, 3, 7, 8, 1),
    (DEFAULT, 2, 2, 6, 4, 9, 1),
    (DEFAULT, 2, 3, 7, 14, 1, 3),
    (DEFAULT, 2, 4, 1, 11, 10, 1),
    (DEFAULT, 2, 5, 13, 4, 3, 2),
    (DEFAULT, 2, 6, 3, 12, 6, 2),
    (DEFAULT, 2, 7, 9, 10, 1, 2),
    (DEFAULT, 3, 1, 12, 10, 8, 2),
    (DEFAULT, 3, 2, 13, 11, 7, 1),
    (DEFAULT, 3, 3, 4, 14, 2, 3),
    (DEFAULT, 3, 4, 10, 13, 3, 3),
    (DEFAULT, 3, 7, 1, 4, 2, 3),
    (DEFAULT, 3, 6, 3, 13, 6, 2),
    (DEFAULT, 3, 9, 8, 10, 1, 1);

INSERT INTO user_income_flow VALUES
    (DEFAULT, 1, '2022-02-12 20:55:10', 1025000),
    (DEFAULT, 2, '2022-02-12 19:22:00', 1016700),
    (DEFAULT, 3, '2022-02-12 09:36:58', 1015300);
