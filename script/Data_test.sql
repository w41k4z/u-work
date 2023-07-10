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